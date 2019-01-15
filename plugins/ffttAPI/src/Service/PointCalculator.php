<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Service;

const VICTORY_POINTS = [
    -500 => 40,
    -400 => 28,
    -300 => 22,
    -200 => 17,
    -150 => 13,
    -100 => 10,
    -50 => 8,
    -25 => 7,
    0 => 6,
    25 => 6,
    50 => 5.5,
    100 => 5,
    150 => 4,
    200 => 3,
    300 => 2,
    400 => 1,
    500 => 0.5,
    20000 => 0,
];

const DEFEAT_POINTS = [
    -500 => 0,
    -400 => 0,
    -300 => -0.5,
    -200 => -1,
    -150 => -2,
    -100 => -3,
    -50 => -4,
    -25 => -4.5,
    0 => -5,
    25 => -5,
    50 => -6,
    100 => -7,
    150 => -8,
    200 => -10,
    300 => -12.5,
    400 => -16,
    500 => -20,
    20000 => -29,
];

const EPREUVE_COEFF = [
    "Chpt France par équipes masculin" => 1.00,
    "Chpt France par équipes féminin" => 1.00,
    "Critérium fédéral" => 1.25,
    "TOP RENTREE" => 0.75,
    "Tournoi Rég - Dep" => 0.5,
    "Tournoi National et Internat." => 0.75,
];

class PointCalculator
{

    public function getPointDefeat($joueurPoints, $adversairePoints){
        $calculatedDiff = $joueurPoints - $adversairePoints;
        foreach (DEFEAT_POINTS as $diff => $value){
            if($calculatedDiff <= $diff){
                return $value;
            }
        }
    }

    public function getPointVictory($joueurPoints, $adversairePoints){
        $calculatedDiff = $joueurPoints - $adversairePoints;
        foreach ( VICTORY_POINTS as $diff => $value){
            if($calculatedDiff <= $diff){
                return $value;
            }
        }
    }

    /**
     * Amélioration en requetant directement les épreuves
     * @param string $epreuveName
     * @return float
     */
    public function getCoefficientOfEpreuve(string $epreuveName) : float
    {
        if(!key_exists($epreuveName, EPREUVE_COEFF)){
            return 1.00;
        }

        return EPREUVE_COEFF[$epreuveName];
    }
}