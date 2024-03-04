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

use Knp\Component\Pager\PaginatorInterface;

#[Route('/prod')]
class CrudFrontProdController extends AbstractController
{
    #[Route('/', name: 'app_crud_front_prod_index', methods: ['GET'])]
    public function index(ProductRepository $productRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $productRepository->createQueryBuilder('p')
            ->orderBy('p.prix', 'ASC') // Tri par prix croissant
            ->getQuery();

        $products = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('crud_front_prod/index.html.twig', [
            'products' => $products,
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




