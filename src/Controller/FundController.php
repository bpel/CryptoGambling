<?php

namespace App\Controller;

use App\Entity\Withdrawal;
use App\Form\WithdrawalType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FundController extends AbstractController
{
    /**
     * @Route("/withdrawal", name="withdrawal", methods={"POST"})
     */
    public function withdrawal(Request $request, EntityManagerInterface $manager, ValidatorInterface $validator)
    {
        $withdrawal = new Withdrawal();

        //implement auth / token jwt

        $form = $this->createForm(WithdrawalType::class, $withdrawal);
        $form->submit($request->request->all());
		$errors = $validator->validate($withdrawal);

        if ($form->isSubmitted() && $form->isValid() && count($errors) === 0) {

        	// check user balance

        	$withdrawal->setExecuted(false);
            $manager->persist($withdrawal);
            $manager->flush();

            return $this->json([
                'code' => '201',
                'message' => 'Your withdrawal request awaits processing'
            ]);
        }

        return $this->json([
            'code' => '401',
			'message' => 'Your withdrawal request is not valid'
		]);
    }
}
