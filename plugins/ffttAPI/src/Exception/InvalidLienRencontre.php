<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class InvalidLienRencontre extends \Exception
{
    public function __construct(string $lienRencontre)
    {
        parent::__construct(
            sprintf(
                "Le lien '%s' pour les details de la rencontre n'est pas correct",
                $lienRencontre
            )
        );
    }
}