<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Service\OpenDayService;
use App\Repository\MenuRepository;
use App\Repository\DisheRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenusController extends AbstractController
{


    #[Route('/menus/menu/{slug}', name: 'app_menus_show')]
    public function index(OpenDayService $openDayService, MenuRepository $menuRepository, EntityManagerInterface $em, $slug, $id): Response
    {
        $openDays = $openDayService->getAllOpenDays();
        $menus = $menuRepository->findBy(['slug' => $slug]);
        $dishes = $menuRepository->findBy(['id' => $id]);


        return $this->render('menus/detail.html.twig', [
            'days' => $openDays,
            'menus' => $menus,
            'dishes' => $dishes
        ]);
    }
    #[Route('/menus/{slug}', name: 'app_menus_detail')]
    public function show(OpenDayService $openDayService, MenuRepository $menu, EntityManagerInterface $em, $slug): Response
    {
        $openDays = $openDayService->getAllOpenDays();
        $menu = $em->getRepository(Menu::class)->findOneBy(['slug' => $slug]);

        // dump($openDays);
        // dd($menu);

        if (!$menu) {
            throw $this->createNotFoundException('Le menu n\'existe pas');
        }

        return $this->render('menus/detail.html.twig', [
            'days' => $openDays,
            'menu' => $menu,
        ]);
    }
}
