<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/users/{id}", name="get_user_data")
     */
    public function getUserData($id, UserRepository $userRepository)
    {
        $user = $userRepository->findOneBy(['id' => $id]);

        if(empty($user)) {
            return $this->json(['code' => 404, 'message' => 'User with id = ' . $id . ' not found.']);
        }

        return $this->json(['code' => 200, 'user' => $user]);
    }

    /**
     * @Route("/users/{id}/balance", name="get_user_balance")
     */
    public function getUserBalance($id, UserRepository $userRepository)
    {
        $user = $userRepository->findOneBy(['id' => $id]);

        if(empty($user)) {
            return $this->json(['code' => 404, 'message' => 'User with id = ' . $id . ' not found.']);
        }

        return $this->json(['code' => 200, 'user_id' => $user->getId() , 'bnb_balance' => $user->getBnbBalance()]);
    }
}
