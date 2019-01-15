<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model\Rencontre;


class RencontreDetails
{
    private $nomEquipeA;
    private $nomEquipeB;
    private $scoreEquipeA;
    private $scoreEquipeB;
    private $joueursA;
    private $joueursB;
    private $parties;

    /**
     * @param  $nomEquipeA string
     * @param $nomEquipeB string
     * @param $scoreEquipeA int
     * @param $scoreEquipeA int
     * @param $joueursA Joueur[]
     * @param $joueursB Joueur[]
     * @param $parties Partie[]
     */
    public function __construct(
        string $nomEquipeA,
        string $nomEquipeB,
        int $scoreEquipeA,
        int $scoreEquipeB,
        array $joueursA,
        array $joueursB,
        array $parties
    )
    {
        $this->nomEquipeA = $nomEquipeA;
        $this->nomEquipeB = $nomEquipeB;
        $this->scoreEquipeA = $scoreEquipeA;
        $this->scoreEquipeB = $scoreEquipeB;
        $this->joueursA = $joueursA;
        $this->joueursB = $joueursB;
        $this->parties = $parties;
    }

    public function getNomEquipeA(): string
    {
        return $this->nomEquipeA;
    }

    public function getNomEquipeB(): string
    {
        return $this->nomEquipeB;
    }

    public function getScoreEquipeA(): int
    {
        return $this->scoreEquipeA;
    }

    public function getScoreEquipeB(): int
    {
        return $this->scoreEquipeB;
    }

    public function getJoueursA()
    {
        return $this->joueursA;
    }

    public function getJoueursB()
    {
        return $this->joueursB;
    }

    public function getParties()
    {
        return $this->parties;
    }
}