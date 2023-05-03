<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisheController extends AbstractController
{
    #[Route('/dishe', name: 'app_dishe')]
    public function index(): Response
    {
        return $this->render('dishe/index.html.twig', [
            'controller_name' => 'DisheController',
        ]);
    }
}
