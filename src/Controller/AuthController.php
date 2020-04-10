<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/login_check", name="login_check", methods={"POST"})
     */
    public function index()
    {
        return $this->json([
        	'user' => $this->getUser()
        ]);
    }
}
