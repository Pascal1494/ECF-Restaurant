<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Menu;
use App\Entity\Allergy;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class MenuFixtures extends Fixture
{

  // public const MENU_SLUG_REFERENCE = 'menu-classique';
  
  public function __construct(private SluggerInterface $slugger)
  {
  }

  public function load(ObjectManager $manager): void
  {
    // $faker = Factory::create('fr_FR');

    // $menu1 = new Menu();
    // $menu1->setName('L\'klassik du ch\'ti');
    // $menu1->setDescription('Ce menu est un menu traditionnel du Nord de la France qui met en valeur les plats emblématiques de la région. Il est idéal pour ceux qui veulent découvrir les saveurs traditionnelles du Nord de la France dans un cadre chaleureux et convivial.');
    // $menu1->setPrice('18.40');
    // $menu1->setSlug($this->slugger->slug($menu1->getName())->lower());
    // // $menu1->setImage('assets/images/menu/TarteMaroilles.jpg');

    // $manager->persist($menu1);

    // $menu2 = new Menu();
    // $menu2->setName('La Flamiche du Nord');
    // $menu2->setDescription('La Flamiche est une spécialité culinaire du Nord-Pas-de-Calais. Elle est composée d\'un fond de tarte garni de poireaux émincés, de crème fraîche et de lardons. La flamiche est traditionnellement accompagnée d\'une salade verte.');
    // $menu2->setPrice('14.80');
    // $menu2->setSlug($this->slugger->slug($menu2->getName())->lower());
    // // $menu2->setImage('assets/images/menu/Flamiche.jpg');

    // $manager->persist($menu2);

    // $menu3 = new Menu();
    // $menu3->setName('La Carbonnade Flamande');
    // $menu3->setDescription('La carbonnade flamande est un plat typique du Nord-Pas-de-Calais, à base de viande de bœuf mijotée dans une sauce à base de bière, de pain d\'épices, de moutarde et d\'oignons. Ce plat est généralement accompagné de frites.');
    // $menu3->setPrice('21.90');
    // $menu3->setSlug($this->slugger->slug($menu3->getName())->lower());
    // // $menu3->setImage('assets/images/menu/Carbonnade.jpg');

    // $manager->persist($menu3);

    $manager->flush();


    // $this->addReference(self::MENU_SLUG_REFERENCE, $menu1->getSlug());
  }
}