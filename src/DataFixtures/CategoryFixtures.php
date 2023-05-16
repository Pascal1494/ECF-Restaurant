<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

/**
 * @Group("dev")
 */
class CategoryFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);

    // $category = $this->CreateCategory('entrée', $manager);
    // $category = $this->CreateCategory('plat', $manager);
    // $category = $this->CreateCategory('dessert', $manager);
    // $category = $this->CreateCategory('fromage', $manager);
    // $category = $this->CreateCategory('bière', $manager);
    // $category = $this->CreateCategory('vin', $manager);
    // $category = $this->CreateCategory('soda', $manager);
    // $category = $this->CreateCategory('eau plate', $manager);
    // $category = $this->CreateCategory('eau gazeuse', $manager);
    // $category = $this->CreateCategory('eau gazeuse', $manager);
    // $category = $this->CreateCategory('supplément', $manager);

    // $category = new Category();
    // $category1->setName('entrée');
    // $manager->persist($category1);

    // $category2 = new Category();
    // $category2->setName('plat');
    // $manager->persist($category2);

    // $category3 = new Category();
    // $category3->setName('dessert');
    // $manager->persist($category3);

    // $category4 = new Category();
    // $category4->setName('fromage');
    // $manager->persist($category4);

    // $category5 = new Category();
    // $category5->setName('burger');
    // $manager->persist($category5);

    // $category6 = new Category();
    // $category6->setName('bière');
    // $manager->persist($category6);

    // $category7 = new Category();
    // $category7->setName('vin');
    // $manager->persist($category7);


    $manager->flush();
  }

//   public function CreateCategory(string $name, ObjectManager $manager)
//   {
//     $category = new Category();
//     $category->setName($name);
//     $manager->persist($category);

//     return $category;
//   }
 }