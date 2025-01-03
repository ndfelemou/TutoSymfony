<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    // #[Route('/recette/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    // public function index(Request $request, string $slug, int $id): Response
    // {
    //     // dd($request->attributes->get('slug', 'id')); // Cette methode n'envoie que le premier element a savoir le 'slug'
    //     // dd($request->attributes->get('slug'), $request->attributes->get('id')); // Par contre 7 derniere affiche les deux a savoir le 'slug' et l'id'
    //     // dd($request->attributes->get('slug'), $request->attributes->getInt('id')); // Par contre 7 derniere affiche les deux a savoir le 'slug' et l'id'
    //     /**
    //      * Autre possibiliter : L'on peut uniquement preciser les paramettres de la fonction index 
    //      * en faissant de la sorte public function index(Request $request, string $slug, int $id) et en suite faire 
    //      * dd($slug, $id)
    //      */
    //     dd($slug, $id);
    // }

    #[Route('/recettes', name:'recipe.index')]
    public function index(Request $request): Response{
        // return new Response("Recettes");
        return $this->render('recipe/index.html.twig');
    }

    #[Route('/recettes/{slug}-{id}', name:'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id): Response
    {
        // return new Response("Recette : ". $slug);
        
        // return new JsonResponse([
        //     'id' => $id,
        //     'slug' => $slug,
        // ]);

        // return $this->json([
        //     'id' => $id,
        //     'slug' => $slug,
        // ]);


        return $this->render('recipe/show.html.twig', [
            'id' => $id,
            'slug' => $slug,
            'person' => [
                'firstname' => 'Nyankoye Daniel',
                'lastname' => 'FELEMOU',
                'age' => 30,
            ]
        ]);
    }
}
