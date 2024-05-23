<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Pokemon;

#[Route('/api', name: 'api_')]

class PokemonController extends AbstractController
{
    #[Route('/pokemon', name: 'pokemon_search')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PokemonController.php',
        ]);
    }

    #[Route('/pokemon/{id}', name: 'pokemon_show', methods:['get'])]
    public function show(ManagerRegistry $registry, string $id) : JsonResponse
    {
        $pokemon = $registry->getRepository(Pokemon::class)->findByIdAPI($id);

        if ($pokemon) {
            return $this->json('Pokemon não encontrado, id:' . $id, 404);
        }

        $response = [
            'id' => $pokemon->getId(),
            'name' => $pokemon->getName()
        ];

        return $this->json($response);
    }
}
