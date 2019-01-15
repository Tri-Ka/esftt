<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Tests;


use FFTTApi\ApiRequest;
use FFTTApi\Exception\InvalidURIParametersException;
use FFTTApi\Exception\URIPartNotValidException;
use PHPUnit\Framework\TestCase;

class ApiRequestTest extends TestCase
{

    public function testGetWithBadUriPart(){
        $this->expectException(URIPartNotValidException::class);

        $request = new ApiRequest("SW014", "54gsX6jbz3");
        $request->get('hello');
    }

    public function testGetWithGoodUriPartAndBadParameters(){
        $this->expectException(InvalidURIParametersException::class);

        $request = new ApiRequest("SW014", "54gsX6jbz3");
        $request->get('xml_joueur', [
            'badKey' => 'value'
        ]);
    }
}