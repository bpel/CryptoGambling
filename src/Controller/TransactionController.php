<?php

namespace App\Controller;

use App\Service\TxService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    /**
     * @Route("/txs/check", name="check_txs")
     */
    public function checkTx(TxService $txService)
    {
        $txs = $txService->getNewTxs();
        if(empty($txs)) { return $this->json( ['message' => 'no new tx'] ); }

        foreach ($txs as $tx) {
            $txService->saveTx($tx);
        }

        $nbTxSaved = count($txs);
        return $this->json( ['message' => 'tx saved', 'count' => $nbTxSaved] );
    }
}
