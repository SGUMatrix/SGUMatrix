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

        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Неверный Логин или Пароль']);
        }

        return new JsonResponse([
            'activationDate' => $user->getActivationDate(),
            'activePartners' => 7,
            'avatar' => "/getFile/avatar/6180f21a2464b.jpg",
            'balance' => $user->getBalance(),
            'can_create_comment' => false,
            'can_use_school' => true,
            'clones' => 0,
            'comets' => 0,
            'description' => $user->getDescription(),
            'email' => $user->getEmail(),
            'firstEnter' => false,
            'firstLine' => 7,
            'firstName' => $user->getFirstName(),
            'hasFinPassword' => $user->getFinancePassword(),
            'id' => $user->getId(),
            'income' => 37075,
            'instagram' => $user->getInstagram(),
            'inviter' => $user->getReferral() ? $user->getReferral()->getUsername() : null,
            'inviterAvatar' => "/getFile/avatar/60fbf59320494.jpg",
            'inviterFio' => $user->getReferral() ? $user->getReferral()->getFullName() : null,
            'isAdmin' => in_array(UserProfile::ROLE_ADMIN, $user->getRoles()),
            'lastName' => $user->getLastName(),
            'locale' => "ru",
            'middleName' => "",
            'myDescription' => $user->getDescription(),
            'myInstagram' => null,
            'myTg' => null,
            'myVk' => null,
            'partners' => 7,
            'phone' => $user->getPhone(),
            'refLink' => "/Sign_up?ref=".$user->getUsername(),
            'showInviter' => false,
            'tg' => "",
            'tgKey' => "3155bafd856c8db07b9a440540a13855",
            'transferBalance' => $user->getTransitBalance(),
            'userOnLink' => 0,
            'vk' => "",
            'password'=>$user->getPassword()

        ]);

    }
}
