<?php
/**
 * Created by Antoine Lamirault.
 */

namespace FFTTApi\Model;


class ClubDetails
{
    private $numero;
    private $nom;
    private $nomSalle;
    private $adresseSalle1;
    private $adresseSalle2;
    private $adresseSalle3;
    private $codePostaleSalle;
    private $villeSalle;
    private $siteWeb;
    private $nomCoordo;
    private $prenomCoordo;
    private $mailCoordo;
    private $telCoordo;
    private $latitude;
    private $longitude;

    public function __construct(
        int $numero,
        string $nom,
        ?string $nomSalle,
        ?string $adresseSalle1,
        ?string $adresseSalle2,
        ?string $adresseSalle3,
        ?string $codePostaleSalle,
        ?string $villeSalle,
        ?string $siteWeb,
        ?string $nomCoordo,
        ?string $prenomCoordo,
        ?string $mailCoordo,
        ?string $telCoordo,
        ?float $latitude,
        ?float $longitude
    )
    {
        $this->numero = $numero;
        $this->nom = $nom;
        $this->nomSalle = $nomSalle;
        $this->adresseSalle1 = $adresseSalle1;
        $this->adresseSalle2 = $adresseSalle2;
        $this->adresseSalle3 = $adresseSalle3;
        $this->codePostaleSalle = $codePostaleSalle;
        $this->villeSalle = $villeSalle;
        $this->siteWeb = $siteWeb;
        $this->nomCoordo = $nomCoordo;
        $this->prenomCoordo = $prenomCoordo;
        $this->mailCoordo = $mailCoordo;
        $this->telCoordo = $telCoordo;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getNomSalle()
    {
        return $this->nomSalle;
    }

    public function setNomSalle($nomSalle)
    {
        $this->nomSalle = $nomSalle;
    }

    public function getAdresseSalle1()
    {
        return $this->adresseSalle1;
    }

    public function setAdresseSalle1($adresseSalle1)
    {
        $this->adresseSalle1 = $adresseSalle1;
    }

    public function getAdresseSalle2()
    {
        return $this->adresseSalle2;
    }

    public function setAdresseSalle2($adresseSalle2)
    {
        $this->adresseSalle2 = $adresseSalle2;
    }

    public function getAdresseSalle3()
    {
        return $this->adresseSalle3;
    }

    public function setAdresseSalle3($adresseSalle3)
    {
        $this->adresseSalle3 = $adresseSalle3;
    }

    public function getCodePostaleSalle()
    {
        return $this->codePostaleSalle;
    }

    public function setCodePostaleSalle($codePostaleSalle)
    {
        $this->codePostaleSalle = $codePostaleSalle;
    }

    public function getVilleSalle()
    {
        return $this->villeSalle;
    }

    public function setVilleSalle($villeSalle)
    {
        $this->villeSalle = $villeSalle;
    }

    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;
    }

    public function getNomCoordo()
    {
        return $this->nomCoordo;
    }

    public function setNomCoordo($nomCoordo)
    {
        $this->nomCoordo = $nomCoordo;
    }

    public function getPrenomCoordo()
    {
        return $this->prenomCoordo;
    }

    public function setPrenomCoordo($prenomCoordo)
    {
        $this->prenomCoordo = $prenomCoordo;
    }

    public function getMailCoordo()
    {
        return $this->mailCoordo;
    }

    public function setMailCoordo($mailCoordo)
    {
        $this->mailCoordo = $mailCoordo;
    }

    public function getTelCoordo()
    {
        return $this->telCoordo;
    }

    public function setTelCoordo($telCoordo)
    {
        $this->telCoordo = $telCoordo;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

}