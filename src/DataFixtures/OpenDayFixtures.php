<?php

namespace App\DataFixtures;



use Faker\Factory;
use App\Entity\OpenDay;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * @Group("dev")
 */
class OpenDayFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);
    $faker = Factory::create('fr_FR');

    $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    foreach ($daysOfWeek as $dayOfWeek) {

      $openDay = new OpenDay();
      $openDay->setDay($dayOfWeek);

      // Générer une heure aléatoire entre 8h et 14h pour le temps d'ouverture du matin
      $morningOpen = $faker->dateTimeBetween('8:00', '14:00');
      $openDay->setMorningOpen($morningOpen);

      // Générer une heure aléatoire entre 8h et 14h pour le temps de fermeture du matin
      $morningClose = $faker->dateTimeBetween($morningOpen, '14:00');
      $openDay->setMorningClose($morningClose);

      // Générer une heure aléatoire entre 18h et 23h pour le temps d'ouverture du soir
      $eveningOpen = $faker->dateTimeBetween('18:00', '23:00');
      $openDay->setEveningOpen($eveningOpen);

      // Générer une heure aléatoire entre 18h et 23h pour le temps de fermeture du soir
      $eveningClose = $faker->dateTimeBetween($eveningOpen, '23:00');
      $openDay->setEveningClose($eveningClose);

      $openDay->setIsMorningOpen($faker->boolean);

      $manager->persist($openDay);
      $openDay->setIsEveningOpen($faker->boolean);
    }



    $manager->flush();
  }
}