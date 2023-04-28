<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\DisheRepository;
use App\Repository\OpenDayRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MenuRepository $menuRepository, OpenDayRepository $openDayRepository): Response
    {
        $menus = $menuRepository->findAll();
        $openDays = $openDayRepository->findAll();


        return $this->render('home/index.html.twig', [
            'menus' => $menus,
            'days' => $openDays
        ]);
    }
}