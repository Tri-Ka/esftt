<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class Historique
{
    private $anneeDebut;
    private $anneeFin;
    private $phase;
    private $points;

    public function __construct(int $anneeDebut, int $anneeFin, int $phase, int $points)
    {
        $this->anneeDebut = $anneeDebut;
        $this->anneeFin = $anneeFin;
        $this->phase = $phase;
        $this->points = $points;
    }

    public function getAnneeDebut(): int
    {
        return $this->anneeDebut;
    }

    public function getAnneeFin(): int
    {
        return $this->anneeFin;
    }

    public function getPhase(): int
    {
        return $this->phase;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

}