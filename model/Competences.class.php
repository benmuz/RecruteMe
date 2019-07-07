<?php


class Competences
{
    private $idCompetence;
    private $idProfil;
    private $description;

   
    public function __construct($idCompetence, $idProfil, $description)
    {
        $this->idCompetence = $idCompetence;
        $this->idProfil = $idProfil;
        $this->description = $description;
    }

    public function getIdCompetence()
    {
        return $this->idCompetence;
    }

    public function getIdProfil()
    {
        return $this->idProfil;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public static function addCompetence(Competences $competence){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("INSERT INTO competences(idProfil,description,dateCreation) VALUES (:idProfil,:description,now())");
        $requete->execute(array(
            'idProfil'=>$competence->getIdProfil(),
            'description'=>$competence->getDescription()
        ));
    }

    public static function countCompetenceForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM competences WHERE idProfil=?');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }

    public static function getAllCompetencesForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM competences WHERE idProfil=? ORDER by dateCreation ASC limit 5');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }

}