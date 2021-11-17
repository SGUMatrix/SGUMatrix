<?php

namespace App\Controller;

use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class inviterController extends AbstractController
{
    private UserProfileRepository $userProfileRepository;

    public function __construct(UserProfileRepository $userProfileRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
    }

    #[Route('/inviter', name: 'inviter', methods: ['GET','POST'])]
    public function inviter(): JsonResponse
    {
        /** @var UserProfile $user */
        $user = $this->getUser();

        return new JsonResponse([


            'inviterFio' => $user->getFullName(),
             'avatar'=>"\/getFile\/avatar\/6180f21a2464b.jpg"

        ]);
    }
}