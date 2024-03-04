<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\Category1Type;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categ')]
class CrudFrontCategController extends AbstractController
{
    #[Route('/', name: 'app_crud_front_categ')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('crud_front_categ/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
    #[Route('/{id}', name: 'app_category_show_front', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('crud_front_categ/show.html.twig', [
            'category' => $category,
        ]);
    }
}
