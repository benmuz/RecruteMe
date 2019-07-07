<?php


class Experiences
{
    private $idExperience;
    private $idProfil;
    private $dateDebutEXP;
    private $dateFinEXP;
    private $titrePost;
    private $nomEntreprise;
    private $secteurActivite;
    private $description;
    private $dateCreation;


    public function __construct($idExperience, $idProfil, $dateDebutEXP, $dateFinEXP, $titrePost, $nomEntreprise,$secteurActivite, $description, $dateCreation)
    {
        $this->idExperience = $idExperience;
        $this->idProfil = $idProfil;
        $this->dateDebutEXP = $dateDebutEXP;
        $this->dateFinEXP = $dateFinEXP;
        $this->titrePost = $titrePost;
        $this->nomEntreprise = $nomEntreprise;
        $this->secteurActivite = $secteurActivite;
        $this->description = $description;
        $this->dateCreation = $dateCreation;

    }

    public function getIdExperience()
    {
        return $this->idExperience;
    }public function getIdProfil()
    {
        return $this->idProfil;
    }
    public function getDateDebutEXP(){return $this->dateDebutEXP;}
    public function getDateFinEXP(){return $this->dateFinEXP;}
    public function getTitrePost(){return $this->titrePost;}
    public function getNomEntreprise(){return $this->nomEntreprise;}
    public function getSecteurActivite(){return $this->secteurActivite;}
    public function getDescription(){return $this->description;}
    public function getDateCreation(){return $this->dateCreation;}

    
    public static function addExperience(Experiences $experiences){

        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('INSERT INTO experiences(idProfil,dateDebut,dateFin,titrePost,nomEntreprise,secteurActivite,description,dateCreation)
          VALUES (:idProfil,:dateDebutEXP,:dateFinEXP,:titrePost,:nomEntreprise,:secteurActivite,:description,now())
        ');
        $requete->execute(array(
            'idProfil'=>$experiences->getIdProfil(),
            'dateDebutEXP'=>$experiences->getDateDebutEXP(),
            'dateFinEXP'=>$experiences->getDateFinEXP(),
            'titrePost'=>$experiences->getTitrePost(),
            'nomEntreprise'=>$experiences->getNomEntreprise(),
            'secteurActivite'=>$experiences->getSecteurActivite(),
            'description'=>$experiences->getDescription()
        ));
    }

    public static function getAllExperiencesForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM experiences WHERE idProfil=?');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }

    public static function UpdateExperiencesForWhoIsConnected(Experiences $experiences){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('UPDATE experiences SET dateDebut=?,datefin=?,titrePost=?,nomEntreprise=?,description=? WHERE idProfil=? and idEperience=?');
        $requete->execute(array(
            $experiences->getDateDebutEXP(),
            $experiences->getDateFinEXP(),
            $experiences->getTitrePost(),
            $experiences->getNomEntreprise(),
            $experiences->getDescription(),
            $experiences->getIdExperience(),
            $experiences->getIdProfil()
        ));
    }

    public static function getAllExperiencesForWhoIsNotConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->query('SELECT * FROM experiences WHERE idProfil=? ORDER by dateCreation ASC limit 5');
        $requete->execute(array(
            $_GET['idProfil']
        ));
        return $requete->fetchAll();
    }

    public static function countExperiencesForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM experiences WHERE idProfil=?');
        $requete->execute(array(
            $_SESSION['id']
        ));
        return $requete->fetchAll();
    }
    
    
}