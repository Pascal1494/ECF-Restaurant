<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


/**
 * @Group("prod")
 */
class AdminProd extends Fixture 
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

        $manager->flush();
    }
}