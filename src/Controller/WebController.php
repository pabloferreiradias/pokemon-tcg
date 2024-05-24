<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Pokemon;

class WebController extends AbstractController
{
    #[Route('/', name: 'app_web')]
    public function index(ManagerRegistry $registry): Response
    {
        $pokemons = $registry->getRepository(Pokemon::class)->list();

        return $this->render('web/index.html.twig', [
            'pokemons' => $pokemons,
        ]);
    }

    #[Route('/search/{query}', name: 'app_web')]
    public function search(ManagerRegistry $registry, string $query): Response
    {
        $pokemons = $registry->getRepository(Pokemon::class)->list($query);

        return $this->render('web/index.html.twig', [
            'pokemons' => $pokemons,
        ]);
    }
}
