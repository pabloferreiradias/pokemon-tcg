<?php

namespace App\Service;

use App\Entity\Pokemon;
use Pokemon\Models\Pagination;
use Pokemon\Pokemon as PokemonService;

class PokemonApi
{
    public function __construct()
    {
        PokemonService::Options(['verify' => false]);
        PokemonService::ApiKey('test1234');
    }

    public function getPokemon(string $query = '')
    {
        try {
            if (empty($query)) {
                $response = PokemonService::Card()->pageSize(20)->all();
                $pokemons = $this->createPokemonsArray($response);

                return $pokemons;
            }

            $response = PokemonService::Card()->where(['name' => $query])->pageSize(20)->all();
            $pokemons = $this->createPokemonsArray($response);

            return $pokemons;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getPokemonByFullId(string $fullId = '')
    {
        try {
            $response = PokemonService::Card()->find($fullId);
            $pokemon = $this->createPokemon($response);

            return $pokemon;
        } catch (\Throwable $th) {
            return false;
        }
    }

    private function createPokemonsArray($pokemonsResponse)
    {
        $pokemonArray = [];

        foreach ($pokemonsResponse as $pokemonData) {
            $pokemonArray[] = $this->createPokemon($pokemonData);
        }

        return $pokemonArray;
    }

    private function createPokemon($pokemonData)
    {
        $weaknessesArray = [];
        $resistancesArray = [];
        $attacksArray = [];
        
        $weaknesses = $pokemonData->getWeaknesses();
        if ($weaknesses) {
            foreach ($weaknesses as $weakness) {
                $weaknessesArray[] = [
                                        'type' => $weakness->getType(),
                                        'value' => $weakness->getValue()
                                    ];
            }
        }

        $resistances = $pokemonData->getResistances();
        if ($resistances) {
            foreach ($resistances as $resistance) {
                $resistancesArray[] = [
                    'type' => $resistance->getType(),
                    'value' => $resistance->getValue()
                ];
            }
        }

        $attacks = $pokemonData->getAttacks();
        if ($attacks) {
            foreach ($attacks as $attack) {
                $attacksArray[] = [
                    'name' => $attack->getName(),
                    'cost' => $attack->getCost(),
                    'convertedEnergyCost' => $attack->getConvertedEnergyCost(),
                    'damage' => $attack->getDamage(),
                    'text' => $attack->getText(),
                ];
            }
        }

        $pokemon = new Pokemon();
        $pokemon->setName($pokemonData->getName());
        $pokemon->setFullId($pokemonData->getId());
        $pokemon->setTypes($pokemonData->getTypes());
        $pokemon->setImgSmall($pokemonData->getImages()->getSmall());
        $pokemon->setImgLarge($pokemonData->getImages()->getLarge());
        $pokemon->setWeaknesses($weaknessesArray);
        $pokemon->setResistances($resistancesArray);
        $pokemon->setAttacks($attacksArray);

        return $pokemon;
    }
}