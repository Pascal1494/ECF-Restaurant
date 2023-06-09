<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         IdField::new('id')->hideOnForm(),
    //         EmailField::new('email'),
    //         BooleanField::new('isVerified'),
    //         TextField::new('firstname'),
    //         TextField::new('lastname'),
    //         TextField::new('pseudo'),
    //         // SlugField::new('slug'),
    //         TextField::new('password')

    //         // ImageField::new('avatar'),
    //         // TextField::new('role')
    //         //     ->setPermission('ROLE_ADMIN || ROLE_USER'),
    //     ];
    // }
}
