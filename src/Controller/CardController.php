<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Service\CategoryService;
use App\Service\OpenDayService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route('/card', name: 'app_card')]
    public function index(OpenDayService $openDayService, CategoryService $categoryService): Response
    {

        $openDays = $openDayService->getAllOpenDays();
        $category = $categoryService->getAllcategory();

        // dd($category);

        return $this->render('card/index.html.twig', [
            'days' => $openDays,
            'category' => $category,
        ]);
    }
    #[Route('/card/{slug}', name: 'app_card_slug')]
    public function cardSlug(OpenDayService $openDayService, CategoryRepository $categoryRepository, string $slug): Response
    {

        $openDays = $openDayService->getAllOpenDays();
        $category = $categoryRepository->findOneBy(['slug' => $slug]);

        // Vérifie si la catégorie existe
        if (!$category) {
            throw $this->createNotFoundException('Catégorie non trouvée');
        }

        // dd($category);

        return $this->render('card/list.html.twig', [
            'days' => $openDays,
            'category' => $category,
        ]);
    }
}