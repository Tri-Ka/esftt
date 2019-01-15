<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi;

use FFTTApi\Exception\InvalidURIParametersException;
use FFTTApi\Exception\NoFFTTResponseException;
use FFTTApi\Exception\URIPartNotValidException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

const FFTTURL = 'http://www.fftt.com/mobile/pxml/';

class ApiRequest
{
    private $password;
    private $id;

    public function __construct(string $password, string $id)
    {
        $this->password = $password;
        $this->id = $id;
    }

    private function prepare(string $request, array $params = [], string $queryParameter = null) : string{
        $time = round(microtime(true)*1000);
        $timeCrypted = hash_hmac("sha1", $time, $this->password);
        $uri =  FFTTURL.$request.'.php?serie='.$this->id.'&tm='.$time.'&tmc='.$timeCrypted.'&id='.$this->id;
        if($queryParameter){
            $uri.= "&".$queryParameter;
        }
        foreach ($params as $key => $value){
            $uri .= '&'.$key.'='.$value;
        }
        return $uri;
    }

    public function send(string $uri){
        $client = new Client();
        $response = $client->request('GET', $uri);
        if($response->getStatusCode() !== 200){
            throw new \DomainException("Request ".$uri." returns an error");
        }
        $xml = simplexml_load_string($response->getBody()->getContents());

        return json_decode(json_encode($xml), true);
    }

    public function get(string $request, array $params = [], string $queryParameter = null){
        $chaine = $this->prepare($request, $params, $queryParameter);
        try{
            $result =  $this->send($chaine);
        }
        catch (ClientException $ce){
            throw new URIPartNotValidException($request);
        }

        if(!$result){
            throw new InvalidURIParametersException($request, $params);
        }
        if(array_key_exists('0', $result)){
            throw new NoFFTTResponseException($chaine);
        }
        return $result;
    }
}