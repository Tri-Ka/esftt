<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model\Rencontre;


class Rencontre
{
    private $libelle;
    private $nomEquipeA;
    private $clubEquipeA;
    private $nomEquipeB;
    private $clubEquipeB;
    private $scoreEquipeA;
    private $scoreEquipeB;
    private $lien;
    private $datePrevue;
    private $dateReelle;

    public function __construct(
        string $libelle,
        string $nomEquipeA,
        string $nomEquipeB,
        int $scoreEquipeA,
        int $scoreEquipeB,
        string $lien,
        \DateTime $datePrevue,
        ?\DateTime $dateReelle)
    {
        $this->libelle = $libelle;
        $this->nomEquipeA = $nomEquipeA;
        $this->nomEquipeB = $nomEquipeB;
        $this->scoreEquipeA = $scoreEquipeA;
        $this->scoreEquipeB = $scoreEquipeB;
        $this->lien = $lien;
        $this->datePrevue = $datePrevue;
        $this->dateReelle = $dateReelle;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function getNomEquipeA(): string
    {
        return $this->nomEquipeA;
    }

    public function getNomEquipeB(): string
    {
        return $this->nomEquipeB;
    }

    public function getScoreEquipeA(): int
    {
        return $this->scoreEquipeA;
    }

    public function getScoreEquipeB(): int
    {
        return $this->scoreEquipeB;
    }

    public function getLien(): string
    {
        return $this->lien;
    }

    public function getDatePrevue(): \DateTime
    {
        return $this->datePrevue;
    }

    public function getDateReelle(): ?\DateTime
    {
        return $this->dateReelle;
    }

    public function getClubEquipeA()
    {
        return $this->clubEquipeA;
    }

    public function getClubEquipeB()
    {
        return $this->clubEquipeB;
    }

    public function setClubEquipeA($clubEquipeA)
    {
        $this->clubEquipeA = $clubEquipeA;
    }

    public function setClubEquipeB($clubEquipeB)
    {
        $this->clubEquipeB = $clubEquipeB;
    }
}