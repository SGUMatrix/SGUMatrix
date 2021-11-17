<?php

namespace App\Controller\EasyAdmin;


use App\Entity\UserProfile;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserProfile::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->onlyOnDetail();
        yield AvatarField::new('avatar')->setTemplateName('crud/field/avatar')->hideOnForm();
        yield TextField::new('LastName');
        yield TextField::new('username');
        yield EmailField::new('email');
        yield AssociationField::new('referral');
        yield AssociationField::new('phone');
    }
}
