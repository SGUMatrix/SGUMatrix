<?php

namespace App\Controller;

use App\Entity\UserProfile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class inviterController extends AbstractController
{
    #[Route('/inviter', name: 'inviter', methods: ['GET','POST'])]
    public function index(): JsonResponse
    {
        /** @var UserProfile $user */
        $user = $this->getuser();

        return new JsonResponse([


             'firstName'=> $user->getUsername()?$user->getFirstName(): null,
             'lastName'=> $user->getUsername()? $user->getLastName(): null,
             'avatar'=>"\/getFile\/avatar\/6180f21a2464b.jpg"

        ]);
    }
}