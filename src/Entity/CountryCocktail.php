<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryCocktailRepository")
 */
class CountryCocktail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $countryIso;

    /**
     * @ORM\Column(type="integer")
     */
    private $cocktailApiId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryIso(): ?string
    {
        return $this->countryIso;
    }

    public function setCountryIso(string $countryIso): self
    {
        $this->countryIso = $countryIso;

        return $this;
    }

    public function getCocktailApiId(): ?int
    {
        return $this->cocktailApiId;
    }

    public function setCocktailApiId(int $cocktailApiId): self
    {
        $this->cocktailApiId = $cocktailApiId;

        return $this;
    }
}
