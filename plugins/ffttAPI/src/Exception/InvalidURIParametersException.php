<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class InvalidURIParametersException extends \Exception
{
    public function __construct(string $uriPart, array $params)
    {
        parent::__construct(
            sprintf(
                "L'appel à l'adresse '%s' n'a pas eu tous les arguments nécessaires : '%s'",
                $uriPart,
                http_build_query($params,'',', ')
            )
        );
    }
}