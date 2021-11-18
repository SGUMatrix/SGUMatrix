<?php

namespace App\Controller;
use App\Entity\UserProfile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
class StructureController extends AbstractController
{
    #[Route('/api/structure', name: 'api_items', methods: ['GET','POST'])]
    public function items(): JsonResponse
    {
        /** @var ?UserProfile $referral */
        $referral = $this->getUser();

        return new JsonResponse([
            "id"=>$referral->getReferral()?->getId(),
            'activationDate' => "2021-06-24 09:11:13",
            'activePartners' => 7,
            'description' => null,
            'email' => $referral->getReferral()?->getEmail(),
            'firstEnter' => false,
            'firstLine' => 7,
            'firstName' => $referral->getReferral()?->getFirstName(),
            'instagram' => "",
            'lastName' => $referral->getReferral()?->getLastName(),
            'middleName' => "",
            'myDescription' => null,
            'myInstagram' => null,
            'myTg' => null,
            'myVk' => null,
            'partners' => 7,
            'phone' => $referral->getReferral()?->getPhone(),
            'registrationDate' => "2021-05-20 22:45:11",
            'showInviter' => false,
            'tg' => "",
            'vk' => "",
        ]);
    }
}