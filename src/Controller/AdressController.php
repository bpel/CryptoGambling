<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends AbstractController
{
    /**
     * @Route("/deposit/adress", name="get_deposit_adress")
     */
    public function getDepositAdress()
    {
        if(!$_ENV['BNB_ADRESS']) {
            return $this->json([
                'code' => '401',
                'message' => 'no BNB deposit adress set'
            ]);
        }

        return $this->json([
            'code' => '200',
            'deposit_adress' => $_ENV['BNB_ADRESS']
        ]);
    }
}
