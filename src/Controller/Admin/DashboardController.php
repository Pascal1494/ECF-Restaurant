<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\Dishe;
use App\Entity\Allergy;
use App\Entity\OpenDay;
use App\Entity\Category;
use App\Entity\Restaurant;
use App\Entity\Reservation;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');

        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le quai anthique');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        // yield MenuItem::section('Gestion des entités');
        // yield MenuItem::linkToCrud('Créer un plat', 'fa fa-tags', Dishe::class);

        yield MenuItem::section('LE RESTO', 'fa fa-shop');
        yield MenuItem::linkToCrud('Nouveau resto', 'fa fa-cogs', Restaurant::class)
            ->setBadge('Ajouter')
            ->setCssClass('esasyadmin');

        yield MenuItem::linkToCrud('les horaires', 'fa fa-clock', OpenDay::class)
            ->setBadge('Ajouter');

        yield MenuItem::linkToCrud('les categories', 'fas fa-map-marked', Category::class)
            ->setBadge('Ajouter');

        yield MenuItem::linkToCrud('Les menus', 'fa fa-clipboard', Menu::class)
            ->setBadge('Ajouter');

        yield MenuItem::linkToCrud('Les produits', 'fa fa-pizza-slice', Dishe::class)
            ->setBadge('Ajouter');

        yield MenuItem::linkToCrud('les allergies', 'fa fa-hand-dots', Allergy::class)
            ->setBadge('Ajouter');

        yield MenuItem::linkToCrud('les réservations', 'fa fa-hand-dots', Reservation::class)
            ->setBadge('Ajouter');
    }
}