<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name:"home")]
    function index(Request $request): Response {
        // return new Response("Bonjour $_GET[name] !");
        // dd($request->query->get('name'));
        // return new Response("Bonjour " . $request->query->get('name', 'Nyankoye Daniel FELEMOU') ." !");

        return $this->render('home/index.html.twig', ['name' => "TutoSymfony"]);
    }
}
