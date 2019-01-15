<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model\Rencontre;


class Joueur
{
    private $nom;
    private $prenom;
    private $points;
    private $sexe;
    private $licence;

    public function __construct(string $nom, string $prenom,  string $licence, ?int $points, ?string $sexe)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->licence = $licence;
        $this->points = $points;
        $this->sexe = $sexe;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getLicence(): string
    {
        return $this->licence;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }
}