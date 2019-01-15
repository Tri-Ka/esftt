<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class Club
{
    private $numero;
    private $nom;
    private $dateValidation;

    public function __construct(string $numero, string $nom, ?\DateTime $dateValidation)
    {
        $this->numero = $numero;
        $this->nom = $nom;
        $this->dateValidation = $dateValidation;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDateValidation(): \DateTime
    {
        return $this->dateValidation;
    }

}