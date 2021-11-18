<?php

namespace App\Controller;
use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class inviterController extends AbstractController
{
    private UserProfileRepository $userProfileRepository;

    public function __construct(UserProfileRepository $userProfileRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
    }
    #[Route('/inviter', name: 'app_inviter')]
    public function index(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $referral = $this->userProfileRepository->findOneByUsername($data['referral']);
        return new JsonResponse([
            'firstName' => $referral->getReferral()?->getFirstName(),
            'lastName' => $referral->getReferral()?->getLastName(),

        ]);
    }
}