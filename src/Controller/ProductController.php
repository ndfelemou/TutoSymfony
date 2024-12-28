<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name:'product.index')]
    public function index(): Response
    {
        return new Response("Welcome to Product Page");
    }

    #[Route('/product/{slug}-{id}', name:"product.show", requirements:['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    // #[Route('/product/{slug}/{id}', name:"product.show", requirements:['id' => '\d+', 'slug' => '[a-z0-9-/]+'])]
    public function show(Request $request, string $slug, int $id): Response{
        return $this->json([
            'Id' => $id,
            'Slug' => $slug
        ]);
    }
}
