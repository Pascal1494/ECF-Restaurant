<?php

namespace App\DataFixtures;

use App\Entity\Dishe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DisheFixtures extends Fixture
{
  public function __construct(
    private SluggerInterface $slugger
  ) {
  }

  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);

    // créer un produit
    $dishe1 = new Dishe;
    $dishe1->setName('WELSH ROYAL');
    $dishe1->setDescription('Pain trempé dans la bière brune, cheddar fondu, jambon blanc, moutarde ancienne, œuf au plat, frites.');
    $dishe1->setPrice('13.90');
    $dishe1->setSlug($this->slugger->slug($dishe1->getName()));
    $manager->persist($dishe1);
  

    // créer un produit
    $dishe2 = new Dishe;
    $dishe2->setName('CARBONNADE FLAMANDE');
    $dishe2->setDescription('Viande de bœuf braisée à l`\'étouffée à la bière brune, pain d’épices, frites.');
    $dishe2->setPrice('11.90');
    $dishe2->setSlug($this->slugger->slug($dishe2->getName()));
    $manager->persist($dishe2);





    $manager->flush();
  }
}