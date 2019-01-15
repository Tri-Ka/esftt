<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class InvalidCredidentials extends \Exception
{
    public function __construct()
    {
        parent::__construct(
            sprintf(
                "Identifiant ou mot de passe incorrect."
            )
        );
    }
}