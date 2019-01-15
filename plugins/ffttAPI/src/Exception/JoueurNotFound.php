<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class JoueurNotFound extends \Exception
{
    public function __construct($licenceId)
    {
        parent::__construct(
            sprintf(
                "Le joueur avec l'id '%s' n'existe pas.",
                $licenceId
            )
        );
    }
}