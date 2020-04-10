<?php

namespace App\Service;

use App\Entity\Tx;
use App\Repository\TxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpClient\HttpClient;

class TxService {
    private $dateService;
    private $txRepository;
    private $em;

    public function __construct(DateService $dateService, TxRepository $txRepository, EntityManagerInterface $em)
    {
        $this->dateService = $dateService;
        $this->txRepository = $txRepository;
        $this->em = $em;
    }

    public function getTxs() : array {
        $client = HttpClient::create();

        $dateNow = new \DateTime();
        $endTime = $this->dateService->getTimestamp($dateNow); // now

        $startTime = date_sub($dateNow, date_interval_create_from_date_string('3 months')); // now - 3 months
        $startTime = $this->dateService->getTimestamp($startTime);

        $parameters = '?address=' . $_ENV['BNB_ADRESS'] . '&txType=TRANSFER' . '&limit=' . '&txAsset=BNB' . '&startTime=' . $startTime . '&endTime' . $endTime;
        //$request = 'https://dex.binance.org/api/v1/transactions' . $parameters;
        $request = 'https://testnet-dex.binance.org/api/v1/transactions' . $parameters;

        $response = $client->request('GET', $request);
        $response = $response->toArray();

        return $response['tx'];
    }

    public function getNewTxs() : array {
        $txs = $this->getTxs();
        $newTxs = [];

        foreach ($txs as $tx) {
            if(!$this->txRepository->findOneBy(['txHash' => $tx['txHash']])) {
                array_push($newTxs, $tx);
            }
        }
        return $newTxs;
    }

    public function getTxType(String $toAddr) :string {
        if($_ENV['BNB_ADRESS'] === $toAddr) {
            return "DEPOSIT";
        }
        return "WITHDRAW";
    }

    public function getDatetime(String $timeStamp) :\DateTime {
        return new \DateTime($timeStamp);
    }

    public function saveTx(array $tx): void {
        $txSave = new Tx();
        $txSave
            ->setTxHash($tx['txHash'])
            ->setBlockHeight($tx['blockHeight'])
            ->setTxType($this->getTxType($tx['toAddr']))
            ->setTimestamp($this->getDatetime($tx['timeStamp']))
            ->setFromAddr($tx['fromAddr'])
            ->setToAddr($tx['toAddr'])
            ->setValue($tx['value'])
            ->setTxFee($tx['txFee'])
            ->setTxAsset($tx['txAsset'])
            ->setTxAge($tx['txAge'])
            ->setMemo($tx['memo']);

        $this->em->persist($txSave);
        $this->em->flush();
    }

    public function checkTx()
    {
        $txs = $this->getNewTxs();
        if (empty($txs)) {
            return false;
            // message dans la console à la place
            //return $this->json(['message' => 'no new tx']);
        }

        foreach ($txs as $tx) {
            $this->saveTx($tx);
        }

        return true;
        // message dans la console à la place
        //$nbTxSaved = count($txs);
        //return $this->json(['message' => 'tx saved', 'count' => $nbTxSaved]);
    }

}
