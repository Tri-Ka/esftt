<?php
/**
 * ffttService main class
 *
 * @package    plugins
 * @subpackage ffttService
 */
class Service
{
    private $cache;
    private $logger;
    private $ipsource;
    private $serials;
    private $autoInitialization;
 
    public function __construct(Cache $cache = null, $logger = null, $serials = array(), $ipsource = null)
    {
        $this->cache = $cache;
        $this->logger = $logger; // Must have a method log($url, $data)
        $this->ipsource = $ipsource;
 
        $this->serials = $serials;
 
        // Génération d'un serial par défaut (15 lettres majuscules)
        if (empty($this->serials)) {
            $this->serials = array('');
            for($i=0; $i<15; $i++) {
                $this->serials[0] .= chr(mt_rand(65, 90)); //(A-Z)
            }
        }
 
        $this->autoInitialization = true;
 
        libxml_use_internal_errors(true);
    }
 
    public function setAutoInitialisation($flag)
    {
        $this->autoInitialization = (bool)$flag;
    }
 
    public function initialization()
    {
        $serial = $this->serials[mt_rand(0, count($this->serials) - 1)];
 
        $this->getData('http://www.fftt.com/mobile/xml/xml_initialisation.php', array('serie' => $serial, 'os' => 'Android', 'version' => '007'));
        $event = self::getObject($this->getData('http://www.fftt.com/mobile/xml/evenement/xml_evenement.php'), 'evenement');
        if (!empty($event['logo'])) {
            $this->getData($event['logo']);
        }
    }
 
    public function getClubsByDepartement($departement)
    {
        return $this->getCachedData("clubs{$departement}", 3600*24*30, function($service) use ($departement) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_club_dep2.php', array('dep' => $departement)), 'club');
        });
    }
 
    public function getClub($numero)
    {
        return $this->getCachedData("club_{$numero}", 3600*24*2, function($service) use ($numero) {
            return Service::getObject($service->getData('http://www.fftt.com/mobile/xml/xml_club_detail.php', array('club' => $numero)), 'club');
        });
    }
 
    public function getJoueur($licence)
    {
        $joueur = $this->getCachedData("joueur_{$licence}", 3600*24*1, function($service) use ($licence) {
            return Service::getObject($service->getData('http://www.fftt.com/mobile/xml/xml_joueur.php', array('licence' => $licence, 'auto' => 1)), 'joueur');
        });
 
        if (!isset($joueur['licence'])) {
            return null;
        }
 
        if (empty($joueur['natio'])) {
            $joueur['natio'] = 'F';
        }
 
        $joueur['photo'] = "http://www.fftt.com/espacelicencie/photolicencie/{$joueur['licence']}_.jpg";
        $joueur['progmois'] = round($joueur['point'] - $joueur['apoint'], 2); // Progression mensuelle
        $joueur['progann'] = round($joueur['point'] - $joueur['valinit'], 2); // Progression annuelle
 
        return $joueur;
    }
 
    public function getJoueurParties($licence)
    {
        return $this->getCachedData("joueur_parties_{$licence}", 3600*24*1, function($service) use ($licence) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_partie_mysql.php', array('licence' => $licence, 'auto' => 1)), 'partie');
        });
    }
 
    public function getJoueurPartiesSpid($licence)
    {
        return $this->getCachedData("joueur_spid_{$licence}", 3600*24*1, function($service) use ($licence) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_partie.php', array('numlic' => $licence)), 'resultat');
        });
    }
 
    public function getJoueursByName($nom, $prenom= '')
    {
        return $this->getCachedData("joueurs_{$nom}_{$prenom}", 3600*24*1, function($service) use ($nom, $prenom) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_liste_joueur.php', array('nom' => $nom, 'prenom' => $prenom)), 'joueur');
        });
    }
 
    public function getJoueursByClub($club)
    {
        return $this->getCachedData("joueursclub{$club}", 3600*24*1, function($service) use ($club) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_liste_joueur.php', array('club' => $club)), 'joueur');
        });
    }
 
    public function getEquipesByClub($club, $type = null)
    {
        if ($type && !in_array($type, array('M', 'F'))) {
            $type = 'M';
        }
 
        $teams = $this->getCachedData("clubequipes_{$club}_{$type}", 3600*24*3, function($service) use ($club, $type) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_equipe.php', array('numclu' => $club, 'type' => $type)), 'equipe');
        });
 
        foreach($teams as &$team) {
            $params = array();
            parse_str($team['liendivision'], $params);
 
            $team['idpoule'] = $params['cx_poule'];
            $team['iddiv'] = $params['D1'];
        }
 
        return $teams;
    }
 
    public function getPoules($division)
    {
        $poules = $this->getCachedData("poules_{$division}", 3600*24*30, function($service) use ($division) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_result_equ.php', array('action' => 'poule', 'D1' => $division)), 'poule');
        });
 
        foreach($poules as &$poule) {
            $params = array();
            parse_str($poule['lien'], $params);
 
            $poule['idpoule'] = $params['cx_poule'];
            $poule['iddiv'] = $params['D1'];
        }
 
        return $poules;
    }
 
    public function getPouleClassement($division, $poule = null)
    {
        return $this->getCachedData("pouleclassement_{$division}_{$poule}", 3600*24*1, function($service) use ($division, $poule) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_result_equ.php', array('auto' => 1, 'action' => 'classement', 'D1' => $division, 'cx_poule' => $poule)), 'classement');
        });
    }
 
    public function getPouleRencontres($division, $poule = null)
    {
        return $this->getCachedData("poulerencontres_{$division}_{$poule}", 3600*24*1, function($service) use ($division, $poule) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_result_equ.php', array('auto' => 1, 'D1' => $division, 'cx_poule' => $poule)), 'tour');
        });
    }
 
    public function getOrganismes($type)
    {
        // Zone / Ligue / Departement
        if (!in_array($type, array('Z', 'L', 'D'))) {
            $type = 'L';
        }
 
        return $this->getCachedData("organismes_{$type}", 3600*24*30, function($service) use ($type) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_organisme.php', array('type' => $type)), 'organisme');
        });
    }
 
    public function getEpreuves($organisme, $type)
    {
        // Equipe / Individuelle
        if (!in_array($type, array('E', 'I'))) {
            $type = 'E';
        }
 
        return $this->getCachedData("epreuves_{$organisme}_{$type}", 3600*24*30, function($service) use ($organisme, $type) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_epreuve.php', array('type' => $type, 'organisme' => $organisme)), 'epreuve');
        });
    }
 
    public function getDivisions($organisme, $epreuve)
    {
        return $this->getCachedData("divisions_{$organisme}_{$epreuve}", 3600*24*30, function($service) use ($organisme, $epreuve) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_division.php', array('organisme' => $organisme, 'epreuve' => $epreuve, )), 'division');
        });
    }
 
    public function getRencontre($link)
    {
        $params = array();
        parse_str($link, $params);
 
        return $this->getCachedData("rencontre_".sha1($link), 3600*24*1, function($service) use ($params) {
            return Service::getObject($service->getData('http://www.fftt.com/mobile/xml/xml_chp_renc.php', $params), null);
        });
    }
 
    public function getLicencesByName($nom, $prenom= '')
    {
        return $this->getCachedData("licences_{$nom}_{$prenom}", 3600*24*2, function($service) use ($nom, $prenom) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_liste_joueur_o.php', array('nom' => strtoupper($nom), 'prenom' => ucfirst($prenom))), 'joueur');
        });
    }
 
    public function getLicencesByClub($club)
    {
        return $this->getCachedData("licencesclub_{$club}", 3600*24*2, function($service) use ($club) {
            return Service::getCollection($service->getData('http://www.fftt.com/mobile/xml/xml_liste_joueur_o.php', array('club' => $club)), 'joueur');
        });
    }
 
    public function getLicence($licence)
    {
        return $this->getCachedData("licence_{$licence}", 3600*24*1, function($service) use ($licence) {
            return Service::getObject($service->getData('http://www.fftt.com/mobile/xml/xml_licence.php', array('licence' => $licence)), 'licence');
        });
    }
 
    private function getCachedData($key, $lifeTime, $callback)
    {
        if (!$this->cache) {
            return $callback($this);
        }
 
        if (false === ($data = $this->cache->fetch($key))) {
            if ($this->autoInitialization && false == $this->cache->fetch($initKey = 'xml_initialisation')) {
                $this->initialization();
                $this->cache->save($initKey, 'init', 3600*4 + mt_rand(0, 3600*4)); // Entre 4 et 8h
            }
 
            $data = $callback($this);
            $this->cache->save($key, $data, $lifeTime);
        }
 
        return $data;
    }
 
    public function getData($url, $params = null)
    {
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
 
        /*$context = stream_context_create(array(
            'socket' => array('bindto' => ($this->ipsource ?: '0').':0'),
            'http' => array(
                'protocol_version' => 1.1,
                'header' => array("User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Win32)",
                    "Content-Type: application/x-www-form-urlencoded",
                    "Accept-Encoding: gzip",
                    "Connection: Close",
                ),
            )
        ));
 
        //$data = file_get_contents($url, false, $context);
        $stream = fopen($url, 'r', false, $context);
        $data = stream_get_contents($stream);
        fclose($stream);*/
 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($this->ipsource) {
            curl_setopt($curl, CURLOPT_INTERFACE, $this->ipsource);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER , true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Accept:", // Suprime le header par default de cUrl (Accept: */*)
            "User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Win32)",
            "Content-Type: application/x-www-form-urlencoded",
            "Accept-Encoding: gzip",
            "Connection: Keep-Alive",
        ));
        $data = curl_exec($curl);
        curl_close($curl);
 
        if ($this->logger) {
            $this->logger->log($url, $data);
        }
 
        $xml = simplexml_load_string($data);
 
        if (!$xml) {
            return false;
        }
 
        // Petite astuce pour transformer simplement le XML en tableau
        return json_decode(json_encode($xml), true);
    }
 
    public static function getCollection($data, $key = null)
    {
        if (empty($data)) {
            return array();
        }
 
        if ($key) {
            if (!array_key_exists($key, $data)) {
                return array();
            }
            $data = $data[$key];
        }
 
        return isset($data[0]) ? $data : array($data);
    }
 
    public static function getObject($data, $key = null)
    {
        if ($key && $data) {
            return array_key_exists($key, $data) ? $data[$key] : null;
        } else {
            return empty($data) ? null : $data;
        }
    }
 
}