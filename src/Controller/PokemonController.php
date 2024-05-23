<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Pokemon;

#[Route('/api', name: 'api_')]

class PokemonController extends AbstractController
{
    private $serializer;

    public function __construct() {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }
    
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

        if (!$pokemon) {
            return $this->json('Pokemon não encontrado - id: ' . $id, 404);
        }

        $jsonPokemon = $this->serializer->serialize($pokemon, 'json');
        return new JsonResponse($jsonPokemon, Response::HTTP_OK, [], true);
    }
}
