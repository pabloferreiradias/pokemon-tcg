<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Pokemon;

class WebController extends AbstractController
{
    #[Route('/', name: 'web_index')]
    public function index(ManagerRegistry $registry): Response
    {
        $pokemons = $registry->getRepository(Pokemon::class)->list();

        return $this->render('web/index.html.twig', [
            'pokemons' => $pokemons,
            'query' => ''
        ]);
    }

    #[Route('/search', name: 'web_search')]
    public function search(Request $request, ManagerRegistry $registry): Response
    {
        $query = $request->query->get('query', '');

        $pokemons = $registry->getRepository(Pokemon::class)->list($query);

        return $this->render('web/index.html.twig', [
            'pokemons' => $pokemons,
            'query' => $query
        ]);
    }

    #[Route('/pokemon', name: 'web_show', methods:['get'])]
    public function show(Request $request, ManagerRegistry $registry) : Response
    {
        $pokemon = null;
        $query = $request->query->get('query', '');

        if ($query) {
            $pokemon = $registry->getRepository(Pokemon::class)->findByIdAPI($query);
        }

        return $this->render('web/view.html.twig', [
            'pokemon' => $pokemon
        ]);
    }
}
