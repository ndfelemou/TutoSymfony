<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

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

    #[Route('/recettes', name: 'recipe.index')]
    public function index(Request $request, RecipeRepository $repository, EntityManagerInterface $em): Response
    {
        // return new Response("Recettes");
        // $recipes = $repository->findAll();
        // $recipes =  $repository->findWithDurationLowerThan(100);
        // $recipes = $em->getRepository(Recipe::class)->findWithDurationLowerThan(100);

        // Pour la modificaiton il faut donc appeler la methode flush() pour que les m-a-j soient garder dans la database
        // $recipes[0]->setTitle("Mousse au Chocolat");

        // Creation d'une nouvelle donnees (recipe)
        // $recipe = new Recipe();
        // $recipe->setTitle('Barbe à papa')
        // ->setSlug('barbe-a-papa')
        // ->setContent('Mettez du sucre')
        // ->setDuration(15)
        // ->setCreatedAt(new \DateTimeImmutable())
        // ->setUpdatedAt(new \DateTimeImmutable());
        // $em->persist($recipe);

        // Si l'on souhaite maintenant supprimer une donnees dans la base des donnees il faut : 
        // $em->remove($recipes[0]);
        // $em->flush();

        /** Au cas nous voulons faire des requettes un peut plus differentes */
        // dd($repository->findTotalDuration());
        $recipes = $repository->findWithDurationLowerThan(50);
        return $this->render('recipe/index.html.twig', ['recipes' => $recipes]);
    }

    #[Route('/recettes/{slug}-{id}', name: 'recipe.show', requirements: ['id' => '\d+', 'slug' => '[a-z0-9-]+'])]
    public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
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


        // return $this->render('recipe/show.html.twig', [
        //     'id' => $id,
        //     'slug' => $slug,
        //     'person' => [
        //         'firstname' => 'Nyankoye Daniel',
        //         'lastname' => 'FELEMOU',
        //         'age' => 30,
        //     ]
        // ]);

        /**
         * On peut essayer plusieur maniere en faissant par 
         * $repository->findOneBySlug($slug);
         * $repository->find($id);
         * $repository->findOneBy(['slug' => $slug]);
         * $repository->findOneBySlug($slug);
         */

        // $recipe = $repository->findOneBy(['slug' => $slug]);
        $recipe = $repository->find($id);

        if ($recipe->getSlug() !== $slug) {
            return $this->redirectToRoute('recipe.show',
            [
                'slug' => $recipe->getSlug(),
                'id' => $recipe->getId()
            ]);
        }

        return $this->render('recipe/show.html.twig', [
            'id' => $id, 'recipe' => $recipe
        ]);
    }
}
