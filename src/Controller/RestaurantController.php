<?php

namespace App\Controller;

use App\Service\OpenDayService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/restaurant', name: 'app_restaurant')]
    public function index(OpenDayService $openDayService): Response
    {
        $openDays = $openDayService->getAllOpenDays();

        return $this->render('restaurant/index.html.twig', [
            'days' => $openDays,
        ]);
    }
}