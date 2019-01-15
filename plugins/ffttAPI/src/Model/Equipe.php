<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class Equipe
{
    private $libelle;
    private $division;
    private $lienDivision;

    public function __construct(string $libelle, string $division, string $lienDivision)
    {
        $this->libelle = $libelle;
        $this->division = $division;
        $this->lienDivision = $lienDivision;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getDivision(): string
    {
        return $this->division;
    }

    public function getLienDivision(): string
    {
        return $this->lienDivision;
    }
}