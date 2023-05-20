<?php

namespace App\Controller;

use App\Service\OpenDayService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChefController extends AbstractController
{
    #[Route('/chef', name: 'app_chef')]
    public function index(OpenDayService $openDayService): Response
    {
        $openDays = $openDayService->getAllOpenDays();

        return $this->render('chef/index.html.twig', [
            'days' => $openDays,
        ]);
    }
}
