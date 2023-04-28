<?php

namespace App\Controller\Admin;

use App\Entity\OpenDay;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class OpenDayCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpenDay::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('day', 'Jour'),
            TimeField::new('morningOpen', 'Ouverture matin'),
            TimeField::new('morningClose', 'Fermeture matin'),
            BooleanField::new('isMorningOpen', 'Ouvert le matin'),
            TimeField::new('eveningOpen', 'Ouverture soir'),
            TimeField::new('eveningClose', 'Fermeture soir'),
            BooleanField::new('isEveningOpen', 'Ouvert le soir'),
            DateTimeField::new('createdAt')
        ];
    }
}
