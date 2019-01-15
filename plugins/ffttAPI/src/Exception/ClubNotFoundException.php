<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Exception;


class ClubNotFoundException extends \Exception
{
    public function __construct($club)
    {
        parent::__construct(
            sprintf(
                "Le club '%s' n'existe pas.",
                $club
            )
        );
    }
}