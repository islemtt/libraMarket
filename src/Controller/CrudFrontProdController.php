<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Product1Type;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/prod')]
class CrudFrontProdController extends AbstractController
{
    #[Route('/', name: 'app_crud_front_prod_index', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('crud_front_prod/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }


    #[Route('/{id}', name: 'app_crud_front_prod_show', methods: ['GET'])]
    public function show(Product $product): Response
    {
        return $this->render('crud_front_prod/show.html.twig', [
            'product' => $product,
        ]);
    }





}




