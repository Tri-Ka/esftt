<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Tests;

use FFTTApi\Service\PointCalculator;
use FFTTApi\Service\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testAccentNomPrenom(){
        list($nom , $prenom ) = Utils::returnNomPrenom("MOREAU Véronique");

        $this->assertEquals("MOREAU", $nom);
        $this->assertEquals("Véronique", $prenom);
    }

    public function testNomComposeNomPrenom(){
        list($nom , $prenom ) = Utils::returnNomPrenom("DA COSTA TEIXEIRA Ana");

        $this->assertEquals("DA COSTA TEIXEIRA", $nom);
        $this->assertEquals("Ana", $prenom);
    }
}