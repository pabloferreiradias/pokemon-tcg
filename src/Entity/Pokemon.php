<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $full_id = null;

    #[ORM\Column(length: 255)]
    private ?string $img_small = null;

    #[ORM\Column(length: 255)]
    private ?string $img_large = null;

    #[ORM\Column]
    private array $types = [];

    #[ORM\Column]
    private array $weaknesses = [];

    #[ORM\Column]
    private array $resistances = [];

    #[ORM\Column]
    private array $attacks = [];

    #[ORM\Column]
    private array $rules = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFullId(): ?string
    {
        return $this->full_id;
    }

    public function setFullId(string $full_id): static
    {
        $this->full_id = $full_id;

        return $this;
    }

    public function getImgSmall(): ?string
    {
        return $this->img_small;
    }

    public function setImgSmall(string $img_small): static
    {
        $this->img_small = $img_small;

        return $this;
    }

    public function getImgLarge(): ?string
    {
        return $this->img_large;
    }

    public function setImgLarge(string $img_large): static
    {
        $this->img_large = $img_large;

        return $this;
    }

    public function getTypes(): ?array
    {
        return $this->types;
    }

    public function setTypes(array $types): static
    {
        $this->types = $types;

        return $this;
    }

    public function getWeaknesses(): ?array
    {
        return $this->weaknesses;
    }

    public function setWeaknesses(?array $weaknesses): static
    {
        $this->weaknesses = $weaknesses;

        return $this;
    }

    public function getResistances(): ?array
    {
        return $this->resistances;
    }

    public function setResistances(?array $resistances): static
    {
        $this->resistances = $resistances;

        return $this;
    }

    public function getAttacks(): array
    {
        return $this->attacks;
    }

    public function setAttacks(array $attacks): static
    {
        $this->attacks = $attacks;

        return $this;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function setRules(array $rules): static
    {
        $this->rules = $rules;

        return $this;
    }
}
