<?php


class Certifications
{
    private $idCertification;
    private $idProfil;
    private $titreCert;
    private $lieuCert;
    private $descriptionCert;


    public function __construct($idCertification, $idProfil, $titreCert, $lieuCert, $descriptionCert)
    {
        $this->idCertification = $idCertification;
        $this->idProfil = $idProfil;
        $this->titreCert = $titreCert;
        $this->lieuCert = $lieuCert;
        $this->descriptionCert = $descriptionCert;
    }

    public function getIdCertification()
    {
        return $this->idCertification;
    }

    public function getIdProfil()
    {
        return $this->idProfil;
    }

    public function getTitreCert()
    {
        return $this->titreCert;
    }
    public function getLieuCert()
    {
        return $this->lieuCert;
    }
    public function getDescriptionCert()
    {
        return $this->descriptionCert;
    }



    public static function addCertification(Certifications $certifications){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("INSERT INTO certifications(idProfil,description,lieuCertification,titreCertification,dateCreation) VALUES (:idProfil,:description,:lieuCertification,:titreCertification,now())");
        $requete->execute(array(
            'idProfil'=>$certifications->getIdProfil(),
            'description'=>$certifications->getDescriptionCert(),
            'lieuCertification'=>$certifications->getLieuCert(),
            'titreCertification'=>$certifications->getTitreCert()
        ));
    }

    public static function countCertificationForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM certifications WHERE idProfil=?');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }


    public static function getAllCertificationsForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM certifications WHERE idProfil=? ORDER by dateCreation ASC limit 5');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }
}