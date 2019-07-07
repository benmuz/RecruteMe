<?php


class FormationEducation
{
    private $idFormation;
    private $idProfil;
    private $dateDebut;
    private $dateFin;
    private $titreDiplome;
    private $ecoleUniversite;
    private $description;
    private $dateCreation;

    /**
     * FormationEducation constructor.
     * @param $idFormation
     * @param $idProfil
     * @param $dateDebut
     * @param $dateFin
     * @param $titreDiplome
     * @param $ecoleUniversite
     * @param $description
     * @param $dateModification
     */
    public function __construct($idFormation, $idProfil, $dateDebut, $dateFin, $titreDiplome, $ecoleUniversite, $description, $dateCreation)
    {
        $this->idFormation = $idFormation;
        $this->idProfil = $idProfil;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->titreDiplome = $titreDiplome;
        $this->ecoleUniversite = $ecoleUniversite;
        $this->description = $description;
        $this->dateCreation = $dateCreation;
    }

    public function getIdFormation()
    {
        return $this->idFormation;
    }
    public function getIdProfil()
    {
        return $this->idProfil;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function getTitreDiplome()
    {
        return $this->titreDiplome;
    }
    public function getEcoleUniversite()
    {
        return $this->ecoleUniversite;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public static function addFormation_education(FormationEducation $formation){

        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('INSERT INTO formations(idProfil,dateDebut,dateFin,diplome,ecoleUniversite,description,dateCreation)
          VALUES (:idProfil,:dateDebut,:dateFin,:titreDiplome,:ecoleUniversite,:description,now())
        ');
        $requete->execute(array(
            'idProfil'=>$formation->getIdProfil(),
            'dateDebut'=>$formation->getDateDebut(),
            'dateFin'=>$formation->getDateFin(),
            'titreDiplome'=>$formation->getTitreDiplome(),
            'ecoleUniversite'=>$formation->getEcoleUniversite(),
            'description'=>$formation->getDescription()
        ));
    }

    public static function countFormationForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM formations WHERE idProfil=?');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }

    public static function getAllFormationEducationForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM formations WHERE idProfil=? ORDER by dateDebut ASC limit 5');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }
}