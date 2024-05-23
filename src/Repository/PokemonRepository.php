<?php

namespace App\Repository;

use App\Entity\Pokemon;
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

    public function findByIdAPI($id): ?Pokemon
    {
        $pokemon = new Pokemon();
        $pokemon->setFullId('pikachu');
        $pokemon->setName('pikachu');
        $pokemon->setImg('pikachu');
        $pokemon->setTypes('pikachu');

        return $pokemon;
    }
}
