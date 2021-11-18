<?php

use App\Entity\UserProfile;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class InviterController extends AbstractController
{
    private UserProfileRepository $userProfileRepository;

    public function __construct(UserProfileRepository $userProfileRepository)
    {
        $this->userProfileRepository = $userProfileRepository;
    }

    #[Route('/inviter', name: 'api_inviter', methods: ['GET','POST'])]
    public function index(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data['password'] || !$data['username']  || !$data['first_name']  || !$data['last_name']  || !$data['email']  || !$data['phone'] || !$data['referral']) {
            return new JsonResponse(['success' => false, 'message' => 'Заполните все поля']);
        }

        $user = new UserProfile();

        return new JsonResponse([

            'firstName' => $user->getFirstName(),
            'lastname' => $user->getLastName()

        ]);
    }


}