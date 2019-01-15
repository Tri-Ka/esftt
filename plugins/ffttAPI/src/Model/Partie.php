<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class Partie
{
    private $isVictoire;
    private $journee;
    private $date;
    private $pointsObtenus;
    private $coefficient;
    private $adversaireLicence;
    private $adversaireIsHomme;
    private $adversaireNom;
    private $adversairePrenom;
    private $adversaireClassement;

    public function __construct(
        bool $isVictoire,
        int $journee,
        \DateTime $date,
        float $pointsObtenus,
        float $coefficient,
        string $adversaireLicence,
        bool $adversaireIsHomme,
        string $adversaireNom,
        string $adversairePrenom,
        int $adversaireClassement
    )
    {
        $this->isVictoire = $isVictoire;
        $this->journee = $journee;
        $this->date = $date;
        $this->pointsObtenus = $pointsObtenus;
        $this->coefficient = $coefficient;
        $this->adversaireLicence = $adversaireLicence;
        $this->adversaireIsHomme = $adversaireIsHomme;
        $this->adversaireNom = $adversaireNom;
        $this->adversairePrenom = $adversairePrenom;
        $this->adversaireClassement = $adversaireClassement;
    }

    public function isIsVictoire(): bool
    {
        return $this->isVictoire;
    }

    public function getJournee(): int
    {
        return $this->journee;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getPointsObtenus(): float
    {
        return $this->pointsObtenus;
    }

    public function getCoefficient(): float
    {
        return $this->coefficient;
    }

    public function getAdversaireLicence(): string
    {
        return $this->adversaireLicence;
    }

    public function isAdversaireIsHomme(): bool
    {
        return $this->adversaireIsHomme;
    }

    public function getAdversaireNom()
    {
        return $this->adversaireNom;
    }

    public function getAdversairePrenom()
    {
        return $this->adversairePrenom;
    }

    public function getAdversaireClassement(): int
    {
        return $this->adversaireClassement;
    }
}

