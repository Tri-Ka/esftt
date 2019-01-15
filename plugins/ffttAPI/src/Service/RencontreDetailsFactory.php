<?php
namespace FFTTApi\Service;

use FFTTApi\FFTTApi;
use FFTTApi\Model\Rencontre\Joueur;
use FFTTApi\Model\Rencontre\Partie;
use FFTTApi\Model\Rencontre\RencontreDetails;

/**
 * Created by Antoine Lamirault.
 */
class RencontreDetailsFactory
{
    /**
     * @var FFTTApi
     */
    private $api;

    public function __construct(FFTTApi $api)
    {
        $this->api = $api;
    }

    public function createFromArray(array $array, string $clubEquipeA, string $clubEquipeB) : RencontreDetails{

        $joueursA = [];
        $joueursB = [];
        foreach ($array['joueur'] as $joueur){
            $joueursA[] = [ $joueur['xja'],  $joueur['xca']];
            $joueursB[] = [ $joueur['xjb'],  $joueur['xcb']];
        }

        $parties = $this->getParties($array['partie']);
        $rencontreDetails = new RencontreDetails(
            $array['resultat']['equa'],
            $array['resultat']['equb'],
            $array['resultat']['resa'],
            $array['resultat']['resb'],
            $this->formatJoueurs($joueursA, $clubEquipeA),
            $this->formatJoueurs($joueursB, $clubEquipeB),
            $parties
        );

        return $rencontreDetails;
    }

    private function formatJoueurs($data, string $playerClubId){
        $joueurs = [];
        foreach ($data as $joueurData) {
            $nomPrenom = $joueurData[0];
            [$nom, $prenom] = Utils::returnNomPrenom($nomPrenom);

            $availablePlayers = $this->api->getJoueursByNom($nom, $prenom);
            foreach ($availablePlayers as $availablePlayer){
                if($availablePlayer->getClubId() == $playerClubId){
                    list($sexe, $points) = !empty($joueurData[1]) ? explode(" ", $joueurData[1]) : [null, null];
                    $joueurs[] = new Joueur(
                        $availablePlayer->getNom(),
                        $availablePlayer->getPrenom(),
                        $availablePlayer->getLicence(),
                        intval(substr($points,0,-3)),
                        $sexe
                    );
                }
            }
        }
        return $joueurs;
    }

    private function getParties($data){
        $parties = [];
        foreach ($data as $partieData){
            $parties[] = new Partie(
                $partieData['ja'],
                $partieData['jb'],
                $partieData['scorea'] === '-' ? 0 : intval($partieData['scorea']),
                $partieData['scoreb'] === '-' ? 0 : intval($partieData['scoreb'])
            );
        }
        return $parties;
    }
}