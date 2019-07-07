<?php


class Langues
{
    private $idLangue;
    private $idProfil;
    private $langue;
    private $niveau;
    private $dateCreation;

    /**
     * Langues constructor.
     * @param $idLangue
     * @param $idProfil
     * @param $langue
     * @param $niveau
     * @param $dateCreation
     */
    public function __construct($idLangue, $idProfil, $langue, $niveau, $dateCreation)
    {
        $this->idLangue = $idLangue;
        $this->idProfil = $idProfil;
        $this->langue = $langue;
        $this->niveau = $niveau;
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getIdLangue()
    {
        return $this->idLangue;
    }

    /**
     * @return mixed
     */
    public function getIdProfil()
    {
        return $this->idProfil;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }





    public static function addLanguage(Langues $langues){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("INSERT INTO langues(idProfil,langue,niveau,dateCreation) VALUES (:idProfil,:langue,:niveau,now())");
        $requete->execute(array(
            'idProfil'=>$langues->getIdProfil(),
            'langue'=>$langues->getLangue(),
            'niveau'=>$langues->getNiveau()
        ));
    }

    public static function countLanguageForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM langues WHERE idProfil=?');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }


    public static function getAllLanguageForWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM langues WHERE idProfil=? ORDER by dateCreation ASC limit 5');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }
}