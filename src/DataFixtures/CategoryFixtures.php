<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);

    $category1 = new Category();
    $category1->setName('entrée');
    $manager->persist($category1);

    $category2 = new Category();
    $category2->setName('plat');
    $manager->persist($category2);

    $category3 = new Category();
    $category3->setName('dessert');
    $manager->persist($category3);

    $category4 = new Category();
    $category4->setName('fromage');
    $manager->persist($category4);

    $category5 = new Category();
    $category5->setName('burger');
    $manager->persist($category5);


    $manager->flush();
  }
}