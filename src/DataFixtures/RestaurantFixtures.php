<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * @Group("dev")
 */
class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 1; $i++) {
          $resto = new Restaurant();
          $resto->setName('Le quai anthique');
          $resto->setAddress('17 rue du quai');
          $resto->setZipCode('63000');
          $resto->setCountry('Chambery');
          $resto->setphone('03 05 06 25 32');
          $resto->setEmail('lqa-resto@gmail.com');
          $resto->setMaxCapacity('50');
          $manager->persist($resto);
       }

        $manager->flush();
    }
}