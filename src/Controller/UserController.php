<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/users/{id}", name="get_user_data", methods={"GET"})
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
     * @Route("/users/{id}/balance", name="get_user_balance", methods={"GET"})
     */
    public function getUserBalance($id, UserRepository $userRepository)
    {
        $user = $userRepository->findOneBy(['id' => $id]);

        if(empty($user)) {
            return $this->json(['code' => 404, 'message' => 'User with id = ' . $id . ' not found.']);
        }

        return $this->json(['code' => 200, 'user_id' => $user->getId() , 'bnb_balance' => $user->getBnbBalance()]);
    }

    /**
     * @Route("/users", name="create_user", methods={"POST"})
     */
    public function createUser(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
			$user->setRegisterDate(new \DateTime());

			$plainPassword = $user->getPassword();
			$encoded = $encoder->encodePassword($user, $plainPassword);
			$user->setPassword($encoded);

			$manager->persist($user);
			$manager->flush();
            return $this->json(['code' => 201, 'message' => 'User created']);
        }
        return $this->json(['code' => 400, 'message' => 'Fields are not valid.']);
    }
}
