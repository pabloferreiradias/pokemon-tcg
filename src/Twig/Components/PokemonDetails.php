<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class PokemonDetails
{
    public string $fullId;
    public string $name;
    public string $imgLarge;
    public array $types;
    public array $weaknesses;
    public array $resistances;
    public array $attacks;
    public array $rules;
}
