<?php

namespace App\Controller\Admin;

use DateTime;
use App\Entity\Dishe;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DisheCrudController extends AbstractCrudController
{
    public const PRODUCTS_BASE_PATH = 'assets/images/dishes';
    public const PRODUCTS_UPLOAD_DIR = 'public/assets/images/dishes';
    public static function getEntityFqcn(): string
    {
        return Dishe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('category', 'Catégorie'),
            TextField::new('name'),
            ImageField::new('image')
                ->setBasePath(self::PRODUCTS_BASE_PATH)
                ->setUploadDir(self::PRODUCTS_UPLOAD_DIR)
                ->setSortable(false),
            TextEditorField::new('description'),
            MoneyField::new('price')->setCurrency('EUR'),
            SlugField::new('slug')->setTargetFieldName('name'),
            DateTimeField::new('createdAt'),

        ];
    }
}