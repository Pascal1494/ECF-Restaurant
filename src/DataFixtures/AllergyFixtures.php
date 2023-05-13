<?php

namespace App\DataFixtures;

use App\Entity\Allergy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AllergyFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);
    
    $allergy = $this->CreateAllergy('gluten', $manager);
    $allergy = $this->CreateAllergy('arachides', $manager);
    $allergy = $this->CreateAllergy('fruits de mer', $manager);
    $allergy = $this->CreateAllergy('mollusques', $manager);
    $allergy = $this->CreateAllergy('poisson', $manager);
    $allergy = $this->CreateAllergy('produits laitiers', $manager);
    $allergy = $this->CreateAllergy('gluten', $manager);
    $allergy = $this->CreateAllergy('œufs', $manager);
    $allergy = $this->CreateAllergy('fruits à coque', $manager);
    $allergy = $this->CreateAllergy('noix', $manager);
    $allergy = $this->CreateAllergy('soja', $manager);
    $allergy = $this->CreateAllergy('moutarde', $manager);
    $allergy = $this->CreateAllergy('céleri', $manager);
    $allergy = $this->CreateAllergy('sulfites', $manager);
    $allergy = $this->CreateAllergy('sésame', $manager);
    $allergy = $this->CreateAllergy('lupin', $manager);


    $manager->flush();
  }

  public function CreateAllergy(string $name, ObjectManager $manager)
  {
    $allergy = new Allergy();
    $allergy->setName($name);
    $manager->persist($allergy);

    return $allergy;
  }
}