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

    $arachides = new Allergy();
    $arachides->setName('arachides');
    $manager->persist($arachides);

    $fruitsDeMer = new Allergy();
    $fruitsDeMer->setName('fruits de mer');
    $manager->persist($fruitsDeMer);

    $produitsLaitiers = new Allergy();
    $produitsLaitiers->setName('produits laitiers');
    $manager->persist($produitsLaitiers);

    $gluten = new Allergy();
    $gluten->setName('gluten');
    $manager->persist($gluten);

    $oeufs = new Allergy();
    $oeufs->setName('œufs');
    $manager->persist($oeufs);

    $noix  = new Allergy();
    $noix->setName('noix');
    $manager->persist($noix);

    $soja = new Allergy();
    $soja->setName('soja');
    $manager->persist($soja);


    $manager->flush();
  }
}
