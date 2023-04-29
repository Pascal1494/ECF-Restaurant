<?php

namespace App\Controller;

use App\Service\OpenDayService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenusController extends AbstractController
{
    #[Route('/menus', name: 'app_menus')]
    public function index(OpenDayService $openDayService): Response
    {
        $openDays = $openDayService->getAllOpenDays();

        return $this->render('menus/detail.html.twig', [
            'days' => $openDays,
        ]);
    }
}
