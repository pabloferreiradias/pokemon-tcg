<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class AttackItemList
{
    public string $name;
    public array $cost;
    public string $convertedEnergyCost;
    public string $damage;
    public string $text;
}
