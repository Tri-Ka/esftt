<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi;

use Accentuation\Accentuation;
use FFTTApi\Exception\ClubNotFoundException;
use FFTTApi\Exception\InvalidLienRencontre;
use FFTTApi\Exception\JoueurNotFound;
use FFTTApi\Model\Classement;
use FFTTApi\Model\ClubDetails;
use FFTTApi\Model\Equipe;
use FFTTApi\Model\EquipePoule;
use FFTTApi\Model\Historique;
use FFTTApi\Model\Joueur;
use FFTTApi\Model\JoueurDetails;
use FFTTApi\Model\Partie;
use FFTTApi\Model\Club;
use FFTTApi\Exception\InvalidCredidentials;
use FFTTApi\Exception\NoFFTTResponseException;
use FFTTApi\Model\Rencontre\Rencontre;
use FFTTApi\Model\Rencontre\RencontreDetails;
use FFTTApi\Service\ClubFactory;
use FFTTApi\Service\PointCalculator;
use FFTTApi\Service\RencontreDetailsFactory;
use FFTTApi\Model\UnvalidatedPartie;
use FFTTApi\Service\Utils;

class FFTTApi
{
    private $id;
    private $password;
    private $apiRequest;

    public function __construct(string $id, string $password)
    {
        $this->id = $id;
        $this->password = md5($password);
        $this->apiRequest = new ApiRequest($this->password, $this->id);
    }

    public function initialize(){
        $time = round(microtime(true)*1000);
        $timeCrypted = hash_hmac("sha1", $time, $this->password);
        $uri = 'http://www.fftt.com/mobile/pxml/xml_initialisation.php?serie='.$this->id
            .'&tm='.$time
            .'&tmc='.$timeCrypted
            .'&id='.$this->id;

        $response = $this->apiRequest->send($uri);

        if(!$response){
            throw new InvalidCredidentials();
        }
        return $response;
    }

    /**
     * @param int $departementId
     * @return Club[]
     */
    public function getClubsByDepartement(int $departementId) : array {

        $data = $this->apiRequest->get('xml_club_dep2', [
            'dep' => $departementId
        ])['club'];

        $clubFactory = new ClubFactory();
        return $clubFactory->createFromArray($data);
    }

    public function getClubDetails(string $clubId) : ClubDetails{
        $clubData = $this->apiRequest->get('xml_club_detail', [
            'club' => $clubId
        ])['club'];
        if(empty($clubData['numero'])){
            throw new ClubNotFoundException($clubId);
        }
        return new ClubDetails(
            intval($clubData['numero']),
            $clubData['nom'],
            is_array($clubData['nomsalle']) ? null : $clubData['nomsalle'],
            is_array($clubData['adressesalle1']) ? null : $clubData['adressesalle1'],
            is_array($clubData['adressesalle2']) ? null : $clubData['adressesalle2'],
            is_array($clubData['adressesalle3']) ? null : $clubData['adressesalle3'],
            is_array($clubData['codepsalle']) ? null : $clubData['codepsalle'],
            is_array($clubData['villesalle']) ? null : $clubData['villesalle'],
            is_array($clubData['web']) ? null : $clubData['web'],
            is_array($clubData['nomcor']) ? null : $clubData['nomcor'],
            is_array($clubData['prenomcor']) ? null : $clubData['prenomcor'],
            is_array($clubData['mailcor']) ? null : $clubData['mailcor'],
            is_array($clubData['telcor']) ? null : $clubData['telcor'],
            is_array($clubData['latitude']) ? null : floatval($clubData['latitude']),
            is_array($clubData['longitude']) ? null : floatval($clubData['longitude'])
        );
    }

    /**
     * @param $clubId
     * @return Joueur[]
     * @throws ClubNotFoundException
     */
    public function getJoueursByClub(string $clubId) : array{
        try{
            $arrayJoueurs = $this->apiRequest->get('xml_liste_joueur_o', [
                    'club' => $clubId
                ]
            );
        }
        catch(NoFFTTResponseException $e){
            throw new ClubNotFoundException($clubId);
        }

        $result = [];

        foreach ($arrayJoueurs['joueur'] as $joueur){
            $realJoueur = new Joueur(
                $joueur['licence'],
                $joueur['nclub'],
                $joueur['club'],
                $joueur['nom'],
                $joueur['prenom'],
                null);
            $result[] = $realJoueur;
        }
        return $result;
    }

    /**
     * @param string $nom
     * @param string $prenom
     * @return Joueur[]
     */
    public function getJoueursByNom(string $nom, string $prenom = "") : array{
        $arrayJoueurs = $this->apiRequest->get('xml_liste_joueur', [
                'nom' => Accentuation::remove($nom),
                'prenom' => Accentuation::remove($prenom),
            ]
        )['joueur'];

        $arrayJoueurs = $this->wrappedArrayIfUnique($arrayJoueurs);

        $result = [];

        foreach ($arrayJoueurs as $joueur){
            $realJoueur = new Joueur(
                $joueur['licence'],
                $joueur['nclub'],
                $joueur['club'],
                $joueur['nom'],
                $joueur['prenom'],
                $joueur['clast']);
            $result[] = $realJoueur;
        }
        return $result;
    }

    public function getJoueurDetailsByLicence(string $licenceId) : JoueurDetails {
        try{
            $data = $this->apiRequest->get('xml_licence_b', [
                    'licence' => $licenceId
                ]
            )['licence'];
        }
        catch(NoFFTTResponseException $e){
            throw new JoueurNotFound($licenceId);
        }

        $joueurDetails = new JoueurDetails(
            $licenceId,
            $data['nom'],
            $data['prenom'],
            $data['numclub'],
            $data['nomclub'],
            $data['sexe'] === 'M' ? true : false,
            $data['cat'],
            floatval($data['initm'] ?? floatval($data['point'])),
            floatval($data['point']),
            floatval($data['pointm'] ?? floatval($data['point'])),
            floatval($data['apointm'] ?? floatval($data['point']))
        );
        return $joueurDetails;
    }

    /**
     * @param int $licenceId
     * @return Classement
     * @throws JoueurNotFound
     */
    public function getClassementJoueurByLicence(string $licenceId) : Classement{
        try{
            $joueurDetails = $this->apiRequest->get('xml_joueur', [
                'licence' => $licenceId
            ])['joueur'];
        }
        catch(NoFFTTResponseException $e){
            throw new JoueurNotFound($licenceId);
        }

        $classement = new Classement(
            new \DateTime(),
            $joueurDetails['point'],
            $joueurDetails['apoint'],
            intval($joueurDetails['clast']),
            intval($joueurDetails['clnat']),
            intval($joueurDetails['rangreg']),
            intval($joueurDetails['rangdep']),
            intval($joueurDetails['valcla']),
            intval($joueurDetails['valinit'])
        );
        return $classement;
    }

    /**
     * @param int $joueurId
     * @return Partie[]
     */
    public function getPartiesJoueurByLicence(string $joueurId) : array{

        try{
            $parties = $this->apiRequest->get('xml_partie_mysql', [
                'licence' => $joueurId
            ])['partie'];
            $parties = $this->wrappedArrayIfUnique($parties);
        }
        catch (NoFFTTResponseException $e){
            $parties=[];
        }
        $res = [];

        foreach ($parties as $partie){
            list($nom, $prenom) = Utils::returnNomPrenom($partie['advnompre']);
            $realPartie = new Partie(
                $partie["vd"]=== "V" ? true : false,
                intval($partie['numjourn']),
                \DateTime::createFromFormat('d/m/y', $partie['date']),
                floatval($partie['pointres']),
                floatval($partie['coefchamp']),
                $partie['advlic'],
                $partie['advsexe'] === 'M' ? true : false,
                $nom,
                $prenom,
                intval($partie['advclaof'])
            );
            $res[] = $realPartie;
        }
        return $res;
    }


    /**
     * @param int $joueurId
     * @return UnvalidatedPartie[]
     */
    public function getUnvalidatedPartiesJoueurByLicence(string $joueurId) : array{
        $validatedParties = $this->getPartiesJoueurByLicence($joueurId);
        try{
            $allParties = $this->apiRequest->get('xml_partie', [
                'numlic' => $joueurId
            ])["resultat"];
        }
        catch (NoFFTTResponseException $e){
            $allParties=[];
        }

        $result = [];
        foreach ($allParties as $partie){
            if($partie["victoire"]=== "V" && $partie["forfait"]=== "1"){
                break;
            }

            $found = false;
            list($nom, $prenom) = Utils::returnNomPrenom($partie['nom']);
            foreach ($validatedParties as $validatedParty){
                if($partie["date"] === $validatedParty->getDate()->format("d/m/y")
                    and $nom === $validatedParty->getAdversaireNom()
                    and preg_match('/'. $validatedParty->getAdversairePrenom() .'/', $prenom)
                ){
                    $found = true;
                    break;
                }
            }
            if(!$found and $prenom != "Absent Absent"){
                $result[] = new UnvalidatedPartie(
                    $partie["epreuve"],
                    $partie["victoire"]=== "V",
                    $partie["forfait"]=== "1",
                    \DateTime::createFromFormat('d/m/y', $partie['date']),
                    $nom,
                    $prenom,
                    Utils::formatPoints($partie["classement"])
                );
            }
        }
        return $result;
    }

    /**
     * @param int $joueurId
     * @return float points mensuel gagné ou perdu en fonction des points mensuels de l'adverssaire
     */
    public function getVirtualPoints(string $joueurId) : float{
        $pointCalculator = new PointCalculator();

        try{
            $classement = $this->getClassementJoueurByLicence($joueurId);

            $unvalidatedParties = $this->getUnvalidatedPartiesJoueurByLicence($joueurId);

            usort($unvalidatedParties, function(UnvalidatedPartie $a, UnvalidatedPartie $b)
            {
                return $a->getDate() >= $b->getDate();
            }
            );

            $virtualPointWon = 0;
            $latestMonth = null;
            $monthPoints = $classement->getPoints();

            foreach ($unvalidatedParties as $unvalidatedParty){
                if(!$latestMonth){
                    $latestMonth = $unvalidatedParty->getDate()->format("m");
                }
                else{
                    if($latestMonth != $unvalidatedParty->getDate()->format("m")){
                        $monthPoints = $classement->getPoints() + $virtualPointWon;
                        $latestMonth = $unvalidatedParty->getDate()->format("m");
                    }
                }

                $coeff = $pointCalculator->getCoefficientOfEpreuve($unvalidatedParty->getEpreuve());
                if(!$unvalidatedParty->isForfait()){
                    $adversairePoints = $unvalidatedParty->getAdversaireClassement();

                    /**
                     * TODO Refactoring in method
                     */
                    $availableJoueurs = $this->getJoueursByNom($unvalidatedParty->getAdversaireNom(),$unvalidatedParty->getAdversairePrenom());
                    foreach ($availableJoueurs as $availableJoueur){
                        if(floor($unvalidatedParty->getAdversaireClassement()/100) == $availableJoueur->getPoints()){
                            $classement = $this->getClassementJoueurByLicence($availableJoueur->getLicence());
                            $adversairePoints = $classement->getPoints();
                            break;
                        }
                    }

                    $points = $unvalidatedParty->isVictoire()
                        ? $pointCalculator->getPointVictory($monthPoints, $adversairePoints)
                        : $pointCalculator->getPointDefeat($monthPoints, $adversairePoints);
                    $virtualPointWon += ($points * $coeff);
                }
            }
            return $virtualPointWon;
        }
        catch(JoueurNotFound $e){
            return 0;
        }
    }


    /**
     * @param string $clubId
     * @param string|null $type
     * @return Equipe[]
     */
    public function getEquipesByClub(string $clubId, string $type = null)
    {
        $params =[
            'numclu' => $clubId
        ];
        if($type){
            $params['type'] = $type;
        }

        $data = $this->apiRequest->get('xml_equipe', $params
        )['equipe'];

        $result = [];
        foreach ($data as $dataEquipe){
            $result[] = new Equipe(
                $dataEquipe['libequipe'],
                $dataEquipe['libdivision'],
                $dataEquipe['liendivision']
            );
        }
        return $result;
    }

    /**
     * @param string $lienDivision
     * @return EquipePoule[]
     */
    public function getClassementPouleByLienDivision(string $lienDivision) : array{
        $data = $this->apiRequest->get('xml_result_equ', [ "action" => "classement"] , $lienDivision)['classement'];
        $result=[];
        $lastClassment = 0;
        foreach ($data as $equipePouleData){

            if(!is_string($equipePouleData['equipe'])){
                break;
            }

            $result[] = new EquipePoule(
                $equipePouleData['clt'] === '-' ? $lastClassment : intval($equipePouleData['clt']),
                $equipePouleData['equipe'],
                intval($equipePouleData['joue']),
                intval($equipePouleData['pts']),
                $equipePouleData['numero'],
                intval($equipePouleData['totvic']),
                intval($equipePouleData['totdef']),
                intval($equipePouleData['idequipe']),
                $equipePouleData['idclub']
            );
            $lastClassment = $equipePouleData['clt'] == "-" ? $lastClassment : intval($equipePouleData['clt']);
        }
        return $result;
    }

    /**
     * @param string $lienDivision
     * @return Rencontre[]
     */
    public function getRencontrePouleByLienDivision(string $lienDivision) : array{
        $data = $this->apiRequest->get('xml_result_equ', [] , $lienDivision)['tour'];

        $result=[];
        foreach ($data as $dataRencontre){
            $result[] = new Rencontre(
                $dataRencontre['libelle'],
                $dataRencontre['equa'],
                $dataRencontre['equb'],
                intval($dataRencontre['scorea']),
                intval($dataRencontre['scoreb']),
                $dataRencontre['lien'],
                \DateTime::createFromFormat('d/m/y', $dataRencontre['dateprevue']),
                empty($dataRencontre['datereelle']) ? null : \DateTime::createFromFormat('d/m/y', $dataRencontre['datereelle'])
            );
        }
        return $result;
    }

    /**
     * @param string $lienRencontre
     * @param string $clubEquipeA
     * @param string $clubEquipeB
     * @return RencontreDetails
     * @throws InvalidLienRencontre
     */
    public function getDetailsRencontreByLien(string $lienRencontre, string $clubEquipeA = "", string $clubEquipeB = "") : RencontreDetails {
        $data = $this->apiRequest->get('xml_chp_renc', [] , $lienRencontre);
        if(!(isset($data['resultat']) && isset($data['joueur']) && isset($data['partie']))){
            throw new InvalidLienRencontre($lienRencontre);
        }
        $factory = new RencontreDetailsFactory($this);
        return $factory->createFromArray($data, $clubEquipeA, $clubEquipeB);
    }

    /**
     * @param int $licenceId
     * @return Historique[]
     * @throws JoueurNotFound
     */
    public function getHistoriqueJoueurByLicence(string $licenceId) : array{
        try{
            $classements = $this->apiRequest->get('xml_histo_classement', [
                'numlic' => $licenceId
            ])['histo'];
        }
        catch(NoFFTTResponseException $e){
            throw new JoueurNotFound($licenceId);
        }
        $result = [];
        $classements = $this->wrappedArrayIfUnique($classements);

        foreach ($classements as $classement){
            $explode = explode(' ', $classement['saison']);

            $historique = new Historique($explode[1], $explode[3], intval($classement['phase']), intval($classement['point']));
            $result[] =$historique;
        }

        return $result;
    }

    public function getClubsByName(string $name){
        try{
            $data = $this->apiRequest->get('xml_club_b', [
                'ville' => $name
            ])['club'];

            $data = $this->wrappedArrayIfUnique($data);

            $clubFactory = new ClubFactory();
            return $clubFactory->createFromArray($data);
        }
        catch(\Exception $e){
            return [];
        }
    }

    private function wrappedArrayIfUnique($array) :array{
        if(count($array) == count($array, COUNT_RECURSIVE)){
            return [$array];
        }
        return $array;
    }
}