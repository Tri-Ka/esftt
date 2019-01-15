<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Tests;

use FFTTApi\Service\PointCalculator;
use PHPUnit\Framework\TestCase;

class PointCalculatorTest extends TestCase
{
    protected $pointCalculator;

    public function testDefaiteNormale(){
        $res = $this->pointCalculator->getPointDefeat(769, 1030);
        $this->assertEquals(-1, $res);
    }

    public function testDefaiteAnormale(){
        $res = $this->pointCalculator->getPointDefeat(1030, 769);
        $this->assertEquals(-12.5, $res);
    }

    public function testVictoireNormale(){
        $res = $this->pointCalculator->getPointVictory(1030, 769);
        $this->assertEquals(2, $res);
    }

    public function testVictoireAnormale(){
        $res = $this->pointCalculator->getPointVictory(769, 1030);
        $this->assertEquals(17, $res);
    }

    public function testVictoireAnormaleChangementTranche(){
        $res = $this->pointCalculator->getPointVictory(500, 700);
        $this->assertEquals(17, $res);
    }


    protected function setUp()
    {
        $this->pointCalculator = new PointCalculator();
    }
}