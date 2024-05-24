<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class PokemonCard
{
    public string $fullId;
    public string $name;
    public string $imgSmall;
    public array $types;
}
