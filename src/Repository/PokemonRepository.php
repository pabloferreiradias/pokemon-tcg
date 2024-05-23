<?php

namespace App\Repository;

use App\Entity\Pokemon;
use App\Service\PokemonApi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pokemon>
 */
class PokemonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function findByIdAPI($id)
    {
        $pokemonApi = new PokemonApi();
        $pokemon = $pokemonApi->getPokemonByFullId($id);

        return $pokemon;
    }

    public function list($query = '')
    {
        $pokemonApi = new PokemonApi();
        $pokemon = $pokemonApi->getPokemon($query);

        return $pokemon;
    }
}
