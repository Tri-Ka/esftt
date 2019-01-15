<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class NoFFTTResponseException extends \Exception
{
    public function __construct($uri)
    {
        parent::__construct(
            sprintf(
                "L'appel à l'adresse '%s' n'a retourné aucune réponse.",
                $uri
            )
        );
    }
}