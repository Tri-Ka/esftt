<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class Joueur
{
    private $licence;
    private $clubId;
    private $club;
    private $nom;
    private $prenom;
    /**
     * @var string Points du joueur ou classement si classé dans les 1000 premiers français
     */
    private $points;

    public function __construct(string $licence, string $clubId, string $club, string $nom, string $prenom, ?string $points)
    {
        $this->licence = $licence;
        $this->clubId = $clubId;
        $this->club = $club;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->points = $points;
    }

    public function getLicence(): string
    {
        return $this->licence;
    }

    public function getClubId(): string
    {
        return $this->clubId;
    }

    public function getClub(): string
    {
        return $this->club;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getPoints(): ?string
    {
        return $this->points;
    }
}