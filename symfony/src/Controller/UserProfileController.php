<?php

namespace App\Controller;

use App\Entity\UserProfile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    #[Route('/api/user_profile', name: 'api_user', methods: ['GET','POST'])]
    public function index(): JsonResponse
    {
        /** @var UserProfile $user */
        $user = $this->getUser();

        return new JsonResponse([
            'activationDate' => "2021-06-24 09:11:13",
            'activePartners' => 7,
            'avatar' => "/getFile/avatar/6180f21a2464b.jpg",
            'balance' => 15.1,
            'can_create_comment' => false,
            'can_use_school' => true,
            'clones' => 0,
            'comets' => 0,
            'description' => null,
            'email' => $user->getEmail(),
            'firstEnter' => false,
            'firstLine' => 7,
            'firstName' => $user->getFirstName(),
            'hasFinPassword' => true,
            'id' => $user->getId(),
            'income' => 37075,
            'instagram' => "",
            'inviter' => $user->getReferral() ? $user->getReferral()->getUsername() : null,
            'inviterAvatar' => "/getFile/avatar/60fbf59320494.jpg",
            'inviterFio' => $user->getReferral() ? $user->getReferral()->getFullName() : null,
            'isAdmin' => in_array(UserProfile::ROLE_ADMIN, $user->getRoles()),
            'lastName' => $user->getLastName(),
            'locale' => "ru",
            'middleName' => "",
            'myDescription' => null,
            'myInstagram' => null,
            'myTg' => null,
            'myVk' => null,
            'partners' => 7,
            'refLink' => "/Sign_up?ref=".$user->getUsername(),
            'registrationDate' => "2021-05-20 22:45:11",
            'showInviter' => false,
            'tg' => "",
            'tgKey' => "3155bafd856c8db07b9a440540a13855",
            'transferBalance' => 0,
            'userOnLink' => 0,
            'vk' => "",
        ]);

    }
}
