<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class URIPartNotValidException extends \Exception
{
    public function __construct($uri)
{
    parent::__construct(
        sprintf(
            "La FFTT ne donne pas d'informations pour l'argument '%s'",
            $uri
        )
    );
}
}