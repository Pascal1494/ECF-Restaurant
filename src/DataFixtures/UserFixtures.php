<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
  public function __construct(
    private UserPasswordHasherInterface $passwordEncoder,
    private SluggerInterface $slugger
  ) {
  }


  public function load(ObjectManager $manager): void
  {
    // $product = new Product();
    // $manager->persist($product);

    // Créer un nouvel Aadministrateur
    $admin = new User();
    $admin->setEmail('lqa@demo.fr');
    $admin->setRoles(['ROLE_ADMIN']);
    $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'secret'));
    $admin->setIsVerified(false);
    $admin->setFirstname('Axel');
    $admin->setLastname('AIRE');
    $admin->setPseudo('Axel');
    $admin->setSlug($this->slugger->slug($admin->getPseudo())->lower());


    // Créer un  client
    $client1 = new User();
    $client1->setEmail('jean.saisrien@reef.fr');
    $client1->setRoles(['ROLE_USER']);
    $client1->setPassword($this->passwordEncoder->hashPassword($admin, 'jeannot1975'));
    $client1->setIsVerified(false);
    $client1->setFirstname('Jean');
    $client1->setLastname('SAISRIEN');
    $client1->setPseudo('Jeannot');
    $client1->setSlug($this->slugger->slug($client1->getPseudo())->lower());

    // Créer un autre client
    $client2 = new User();
    $client2->setEmail('alain.proviste@gmail.com');
    $client2->setRoles(['ROLE_USER']);
    $client2->setPassword($this->passwordEncoder->hashPassword($admin, 'lououte14'));
    $client2->setIsVerified(false);
    $client2->setFirstname('Alain');
    $client2->setLastname('PROVISTE');
    $client2->setPseudo('Louloute');
    $client2->setSlug($this->slugger->slug($client2->getPseudo())->lower());

    // Créer un dernier client
    $client3 = new User();
    $client3->setEmail('Camille.onete@orange.fr');
    $client3->setRoles(['ROLE_USER']);
    $client3->setPassword($this->passwordEncoder->hashPassword($admin, 'Pouet-pouet'));
    $client3->setIsVerified(false);
    $client3->setFirstname('Camille');
    $client3->setLastname('HONNET');
    $client3->setPseudo('kmille');
    $client3->setSlug($this->slugger->slug($client3->getPseudo())->lower());



    $manager->persist($client1);
    $manager->persist($client2);
    $manager->persist($client3);
    $manager->persist($admin);
    $manager->flush();
  }
}