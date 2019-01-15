<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class Classement
{
    private $points;
    private $anciensPoints;
    private $classement;
    private $rangRegional;
    private $rangNational;
    private $rangDepartemental;
    private $pointsOfficiels;
    private $pointsInitials;
    private $date;

    public function __construct(
        \DateTime $date = null,
        float $points = null,
        float $anciensPoints = null,
        int $classement = null,
        int $rangNational = null,
        int $rangRegional = null,
        int $rangDepartemental = null,
        int $pointsOfficiels = null,
        float $pointsInitials = null
    )
    {
        $this->date = $date;
        $this->points = $points;
        $this->anciensPoints = $anciensPoints;
        $this->classement = $classement;
        $this->rangNational = $rangNational;
        $this->rangRegional = $rangRegional;
        $this->rangDepartemental = $rangDepartemental;
        $this->pointsOfficiels = $pointsOfficiels;
        $this->pointsInitials = $pointsInitials;
    }

    public function getPoints(): float
    {
        return $this->points;
    }

    public function getAnciensPoints(): float
    {
        return $this->anciensPoints;
    }

    public function getClassement(): int
    {
        return $this->classement;
    }

    public function getRangRegional(): int
    {
        return $this->rangRegional;
    }

    public function getRangNational(): int
    {
        return $this->rangNational;
    }

    public function getRangDepartemental(): int
    {
        return $this->rangDepartemental;
    }

    public function getPointsOfficiels(): int
    {
        return $this->pointsOfficiels;
    }

    public function getPointsInitials(): float
    {
        return $this->pointsInitials;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

}