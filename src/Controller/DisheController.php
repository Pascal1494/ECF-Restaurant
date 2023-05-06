<?php

namespace App\Controller;

use App\Repository\DisheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisheController extends AbstractController
{
    #[Route('/dishe/{slug}', name: 'app_dishe')]
    public function index(string $slug, DisheRepository $disheRepository): Response
    {
        $dishe = $disheRepository->findOneBy(['slug' => $slug]);

        return $this->render('dishe/index.html.twig', [
            'dishe' => $dishe
        ]);
        
    }
}