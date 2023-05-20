<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{slug}', name: 'app_category')]
    public function show(Category $category): Response
    {
        $dishes = $category->getDishes();

        return $this->render('category/index.html.twig', [
            'category' => $category,
            'dishes' => $dishes,
        ]);
    }
}