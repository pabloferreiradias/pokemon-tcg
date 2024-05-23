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

    public function getPokemonByFullId(string $fullId = '')
    {
        try {
            $response = PokemonService::Card()->find($fullId);

            $weaknessesArray = [];
            $weaknesses = $response->getWeaknesses();
            foreach ($weaknesses as $weakness) {
                $weaknessesArray[] = [
                                        'type' => $weakness->getType(),
                                        'value' => $weakness->getValue()
                                    ];
            }

            $resistancesArray = [];
            $resistances = $response->getResistances();
            foreach ($resistances as $resistance) {
                $resistancesArray[] = [
                    'type' => $resistance->getType(),
                    'value' => $resistance->getValue()
                ];
            }

            $attacksArray = [];
            $attacks = $response->getAttacks();
            foreach ($attacks as $attack) {
                $attacksArray[] = [
                    'name' => $attack->getName(),
                    'cost' => $attack->getCost(),
                    'convertedEnergyCost' => $attack->getConvertedEnergyCost(),
                    'damage' => $attack->getDamage(),
                    'text' => $attack->getText(),
                ];
            }

            $pokemon = new Pokemon();
            $pokemon->setName($response->getName());
            $pokemon->setFullId($response->getId());
            $pokemon->setImgSmall($response->getImages()->getSmall());
            $pokemon->setImgLarge($response->getImages()->getLarge());
            $pokemon->setWeaknesses($weaknessesArray);
            $pokemon->setResistances($resistancesArray);
            $pokemon->setAttacks($attacksArray);

            return $pokemon;
        } catch (\Throwable $th) {
            return false;
        }
    }
}