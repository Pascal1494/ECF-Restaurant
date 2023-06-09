<?php

namespace App\Controller;

use App\Repository\DisheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisheController extends AbstractController
{
    // #[Route('/dishes/liste', name: 'dishe_list')]
    // public function list(DisheRepository $disheRepository): Response
    // {
    //     $dish = $disheRepository->findAll();


    //     return $this->render('dishe/list.html.twig', [
    //         'dishe' => $dish,
    //     ]);
    // }

    #[Route('/dishe/{slug}', name: 'app_dishe')]
    public function index(string $slug, DisheRepository $disheRepository): Response
    {
        $dishe = $disheRepository->findOneBy(['slug' => $slug]);

        return $this->render('dishe/index.html.twig', [
            'dishe' => $dishe
        ]);
    }
}