<?php

namespace App\DataFixtures;

use App\Entity\Dishe;
use App\Entity\Category;
use App\DataFixtures\MenuFixtures;
use App\DataFixtures\CategoryFixtures;
use App\Entity\Menu;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DisheFixtures extends Fixture implements DependentFixtureInterface
{

  public function __construct(private SluggerInterface $slugger)
  {
  }


  public function load(ObjectManager $manager): void
  {

    $category = new Category();
    $category->setName('entrée');
    $manager->persist($category);
    $this->addReference('entrée', $category);

    $category = new Category();
    $category->setName('plat');
    $manager->persist($category);
    $this->addReference('plat', $category);

    $category = new Category();
    $category->setName('dessert');
    $manager->persist($category);
    $this->addReference('dessert', $category);

    $category = new Category();
    $category->setName('fromage');
    $manager->persist($category);
    $this->addReference('fromage', $category);

    $category = new Category();
    $category->setName('bière');
    $manager->persist($category);
    $this->addReference('bière', $category);

    $category = new Category();
    $category->setName('vin');
    $manager->persist($category);
    $this->addReference('vin', $category);

    $menu = new Menu();
    $menu->setName('L\'klassik du ch\'ti');
    $menu->setSlug('l-klassik-du-ch-ti');
    $menu->setDescription('Ce menu est un menu traditionnel du Nord de la France qui met en valeur les plats emblématiques de la région. Il est idéal pour ceux qui veulent découvrir les saveurs traditionnelles du Nord de la France dans un cadre chaleureux et convivial.');
    $menu->setPrice('18.40');
    $manager->persist($menu);
    $this->addReference('L\'klassik du ch\'ti', $menu);

    //entrées
    $dishe = new Dishe();
    $dishe->setName('carbonnade flamande');
    $dishe->setDescription('un plat mijoté à base de viande de bœuf marinée dans de la bière et des oignons, servi avec des frites dorées et croustillantes.');
    $dishe->setPrice('8.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('plat');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'klassik du ch\'ti');
    $dishe->setMenu($menu);
    $manager->persist($dishe);

    $dishe = new Dishe();
    $dishe->setName('tarte aux maroilles');
    $dishe->setDescription('La tarte au maroilles est une spécialité du Nord de la France, qui associe le goût unique et prononcé du fromage de Maroilles avec une pâte brisée croustillante et une garniture crémeuse à base d\'œufs, de crème fraîche et de lait. Cette tarte salée est savoureuse et généralement servie tiède, accompagnée d\'une salade verte pour une expérience culinaire authentique et délicieuse.');
    $dishe->setPrice('8.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('dessert');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'klassik du ch\'ti');
    $dishe->setMenu($menu);
    $manager->persist($dishe);

    $dishe = new Dishe();
    $dishe->setName('bavik super pils');
    $dishe->setDescription('La Bavik Super Pils est une bière blonde belge de haute qualité, brassée selon une méthode traditionnelle qui utilise uniquement des ingrédients soigneusement sélectionnés. Cette bière à la robe dorée offre un équilibre parfait entre une amertume légère et une douceur maltée, avec des notes florales et fruitées qui la rendent rafraîchissante et agréable à boire. La Bavik Super Pils est une bière élégante et sophistiquée, qui peut être appréciée seule ou accompagnée de mets variés, en toute occasion.');
    $dishe->setPrice('8.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('bière');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'klassik du ch\'ti');
    $dishe->setMenu($menu);
    $manager->persist($dishe);

    // 2eme menu
    $menu = new Menu();
    $menu->setName('L\'terroir à l\'neut');
    $menu->setSlug($this->slugger->slug($menu->getName())->lower());
    $menu->setDescription('Welsh rarebit en entrée, Potjevleesch en plat principal et Crème brûlée à la chicorée en dessert, accompagnés de vins locaux. Un choix idéal pour une expérience culinaire authentique et raffinée, avec des saveurs locales dans un cadre rustique et convivial.');
    $menu->setPrice('26.50');
    $manager->persist($menu);
    $this->addReference('L\'terroir à l\'neut', $menu);
    //entrées
    $dishe = new Dishe();
    $dishe->setName('Welsh rarebit');
    $dishe->setDescription('une spécialité anglaise revisitée dans le Nord avec du fromage local fondu sur une tranche de pain grillé, accompagné d\'une salade verte croquante.');
    $dishe->setPrice('9.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('entrée');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'terroir à l\'neut');
    $dishe->setMenu($menu);
    $manager->persist($dishe);

    $dishe = new Dishe();
    $dishe->setName('Potjevleesch');
    $dishe->setDescription('une terrine de viande de porc et de volaille marinée dans du vinaigre et des épices, servie avec des pommes de terre vapeur');
    $dishe->setPrice('12.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('plat');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'terroir à l\'neut');
    $dishe->setMenu($menu);
    $manager->persist($dishe);

    $dishe = new Dishe();
    $dishe->setName('Crème brûlée à la chicorée');
    $dishe->setDescription('une crème onctueuse aromatisée à la chicorée, une plante cultivée dans la région depuis des siècles.');
    $dishe->setPrice('8.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('dessert');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'terroir à l\'neut');
    $dishe->setMenu($menu);
    $manager->persist($dishe);

    $dishe = new Dishe();
    $dishe->setName('gascogne horgelus');
    $dishe->setDescription('Le Gasconne Horgelus est un vin blanc produit dans la région de Gascogne, dans le Sud-Ouest de la France. Il est élaboré à partir d\'un assemblage de cépages locaux tels que le Colombard, l\'Ugni Blanc et le Gros Manseng. Ce vin se distingue par son nez intense et fruité, avec des arômes d\'agrumes, de fruits exotiques et de fleurs blanches. En bouche, il est frais, vif et légèrement acidulé, avec une finale persistante et aromatique. Le Gasconne Horgelus accompagne parfaitement les fruits de mer, les poissons grillés et les plats de viande blanche.');
    $dishe->setPrice('8.00');
    $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
    $category = $this->getReference('vin');
    $dishe->setCategory($category);
    $menu = $this->getReference('L\'terroir à l\'neut');
    $dishe->setMenu($menu);
    $manager->persist($dishe);


     // 3eme menu
     $menu = new Menu();
     $menu->setName('El mér et les marés');
     $menu->setSlug($this->slugger->slug($menu->getName())->lower());
     $menu->setDescription('menu qui met à l\'honneur les produits de la mer et des marais de la région du Nord de la France. Moules frites, waterzoi de pouletet tarte aux sucre. Ce menu est idéal pour ceux qui aiment les produits de la mer et de la terre et qui souhaitent découvrir les saveurs authentiques de la région du Nord de la France.');
     $menu->setPrice('36.50');
     $manager->persist($menu);
     $this->addReference('El mér et les marés', $menu);
     //entrées
     $dishe = new Dishe();
     $dishe->setName('moules-frites ');
     $dishe->setDescription('plat emblématique du Nord, où les moules sont cuites dans un bouillon de légumes et de vin blanc, servi avec des frites dorées.');
     $dishe->setPrice('19.00');
     $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
     $category = $this->getReference('entrée');
     $dishe->setCategory($category);
     $menu = $this->getReference('El mér et les marés');
     $dishe->setMenu($menu);
     $manager->persist($dishe);
 
     $dishe = new Dishe();
     $dishe->setName('Waterzoï de poulet');
     $dishe->setDescription('spécialité flamande à base de poulet cuit dans un bouillon crémeux à base de légumes et d\'herbes aromatiques, accompagné de pommes de terre vapeur.');
     $dishe->setPrice('21.00');
     $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
     $category = $this->getReference('plat');
     $dishe->setCategory($category);
     $menu = $this->getReference('El mér et les marés');
     $dishe->setMenu($menu);
     $manager->persist($dishe);
 
     $dishe = new Dishe();
     $dishe->setName('Tarte au sucre');
     $dishe->setDescription('une tarte sucrée et croustillante à base de cassonade, une variété de sucre brun typique de la région.');
     $dishe->setPrice('8.00');
     $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
     $category = $this->getReference('dessert');
     $dishe->setCategory($category);
     $menu = $this->getReference('El mér et les marés');
     $dishe->setMenu($menu);
     $manager->persist($dishe);
 
     $dishe = new Dishe();
     $dishe->setName('gascogne horgelus sec');
     $dishe->setDescription('Le Gasconne Horgelus est un vin blanc sec produit dans la région de Gascogne, dans le Sud-Ouest de la France. Il est élaboré à partir d\'un assemblage de cépages locaux tels que le Colombard, l\'Ugni Blanc et le Gros Manseng. Ce vin se distingue par son nez intense et fruité, avec des arômes d\'agrumes, de fruits exotiques et de fleurs blanches. En bouche, il est frais, vif et légèrement acidulé, avec une finale persistante et aromatique. Le Gasconne Horgelus accompagne parfaitement les fruits de mer, les poissons grillés et les plats de viande blanche.');
     $dishe->setPrice('8.00');
     $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
     $category = $this->getReference('vin');
     $dishe->setCategory($category);
     $menu = $this->getReference('El mér et les marés');
     $dishe->setMenu($menu);
     $manager->persist($dishe);

      // 4eme menu
      $menu = new Menu();
      $menu->setName('L\'Nord din l\'assiette ');
      $menu->setSlug($this->slugger->slug($menu->getName())->lower());
      $menu->setDescription('menu qui propose une sélection de plats emblématiques de la région du Nord de la France, revisités avec une touche moderne et créative. Ce menu est idéal pour ceux qui recherchent une cuisine moderne et inventive, tout en gardant les saveurs authentiques de la région du Nord de la France.');
      $menu->setPrice('58.50');
      $manager->persist($menu);
      $this->addReference('L\'Nord din l\'assiette ', $menu);
      //entrées
      $dishe = new Dishe();
      $dishe->setName('salade de chicons,');
      $dishe->setDescription('alade à base d\'endives, de pommes et de noix, accompagnée d\'une vinaigrette à base de vinaigre de cidre.');
      $dishe->setPrice('9.60');
      $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
      $category = $this->getReference('entrée');
      $dishe->setCategory($category);
      $menu = $this->getReference('L\'Nord din l\'assiette ');
      $dishe->setMenu($menu);
      $manager->persist($dishe);
  
      $dishe = new Dishe();
      $dishe->setName('Pavé de cabillaud');
      $dishe->setDescription('poisson blanc cuit à la perfection, servi avec une purée de céleri-rave et une sauce au beurre blanc et à l\'estragon');
      $dishe->setPrice('23.00');
      $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
      $category = $this->getReference('plat');
      $dishe->setCategory($category);
      $menu = $this->getReference('L\'Nord din l\'assiette ');
      $dishe->setMenu($menu);
      $manager->persist($dishe);
  
      $dishe = new Dishe();
      $dishe->setName('Crème brûlée à la vanille de Madagascar');
      $dishe->setDescription('une crème onctueuse et légèrement parfumée à la vanille, accompagnée d\'un biscuit croquant');
      $dishe->setPrice('11.00');
      $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
      $category = $this->getReference('dessert');
      $dishe->setCategory($category);
      $menu = $this->getReference('L\'Nord din l\'assiette ');
      $dishe->setMenu($menu);
      $manager->persist($dishe);
  
      $dishe = new Dishe();
      $dishe->setName('Igp meditérannée brise marine');
      $dishe->setDescription('L\'IGP Méditerranée Brise Marine est un vin rouge ou rosé produit dans la région méditerranéenne de la France. Ce vin est connu pour ses arômes frais et marins, rappelant l\'air salin de la mer. Il est souvent associé à des notes de fruits rouges ou de baies, avec une acidité équilibrée et une finale légèrement épicée. C\'est un vin rafraîchissant et facile à boire, parfait pour accompagner les fruits de mer ou les plats méditerranéens légers.');
      $dishe->setPrice('18.00');
      $dishe->setSlug($this->slugger->slug($dishe->getName())->lower());
      $category = $this->getReference('vin');
      $dishe->setCategory($category);
      $menu = $this->getReference('L\'Nord din l\'assiette ');
      $dishe->setMenu($menu);
      $manager->persist($dishe);
 



    $manager->flush();
  }

  public  function getDependencies(): array
  {
    return [
      CategoryFixtures::class,
      MenuFixtures::class,
    ];
  }
}