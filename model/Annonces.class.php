<?php


class Annonces
{
    private $idAnnonce;
    private $idProfilRec;
    private $lieuAffectation;
    private $sexeCandidat;
    private $intitulePost;
    private $typeContrat;
    private $experienceRequise;
    private $descriptionPost;
    private $competenceRequise;
    private $mission;
    private $envoit_cvLocal;
    private $heureLimite;
    private $dateLimite;
    private $dateCreation;

    /**
     * Annonces constructor.
     * @param $idAnnonce
     * @param $idProfilRec
     * @param $lieuAffectation
     * @param $sexeCandidat
     * @param $intitulePost
     * @param $typeContrat
     * @param $experienceRequise
     * @param $descriptionPost
     * @param $competenceRequise
     * @param $mission
     * @param $dateCreation
     */
    public function __construct($idAnnonce, $idProfilRec, $lieuAffectation, $sexeCandidat, $intitulePost, $typeContrat, $experienceRequise, $descriptionPost, $competenceRequise, $mission,$envoit_cvLocal,$dateLimite,$heureLimite, $dateCreation)
    {
        $this->idAnnonce = $idAnnonce;
        $this->idProfilRec = $idProfilRec;
        $this->lieuAffectation = $lieuAffectation;
        $this->sexeCandidat = $sexeCandidat;
        $this->intitulePost = $intitulePost;
        $this->typeContrat = $typeContrat;
        $this->experienceRequise = $experienceRequise;
        $this->descriptionPost = $descriptionPost;
        $this->competenceRequise = $competenceRequise;
        $this->mission = $mission;
        $this->envoit_cvLocal = $envoit_cvLocal;
        $this->dateLimite = $dateLimite;
        $this->heureLimite = $heureLimite;
        $this->dateCreation = $dateCreation;
    }
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }
    public function getEnvoitCvLocal()
    {
        return $this->envoit_cvLocal;
    }
    public function getIdProfilRec()
    {
        return $this->idProfilRec;
    }
    public function getLieuAffectation()
    {
        return $this->lieuAffectation;
    }
    public function getSexeCandidat()
    {
        return $this->sexeCandidat;
    }
    public function getIntitulePost()
    {
        return $this->intitulePost;
    }
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }
    public function getExperienceRequise()
    {
        return $this->experienceRequise;
    }
    public function getDescriptionPost()
    {
        return $this->descriptionPost;
    }
    public function getCompetenceRequise()
    {
        return $this->competenceRequise;
    }
    public function getMission()
    {
        return $this->mission;
    }
    public function getHeureLimite()
    {
        return $this->heureLimite;
    }
    public function getDateLimite()
    {
        return $this->dateLimite;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
    }
    
    public static function addAnnonce(Annonces $annonces){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("INSERT INTO annonces(idRecruteur,intitulePost,typeContrat,descriptionPost,experienceRequise,competences,mission,sexeProfessionnel,lieuAffectation,envoit_cvLocal,heureLimite,dateLimite,dateCreation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,now())");
        $requete->execute(array(
            $annonces->getIdProfilRec(),
            $annonces->getIntitulePost(),
            $annonces->getTypeContrat(),
            $annonces->getDescriptionPost(),
            $annonces->getExperienceRequise(),
            $annonces->getCompetenceRequise(),
            $annonces->getMission(),
            $annonces->getSexeCandidat(),
            $annonces->getLieuAffectation(),
            $annonces->getEnvoitCvLocal(),
            $annonces->getHeureLimite(),
            $annonces->getDateLimite()
        ));
    }

    public static function getAnnonceSpecifique(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM annonces a join recruteurs r on r.idProfil=a.idRecruteur WHERE a.intitulePost like ? order by a.dateCreation limit 6');
        $requete->execute(array(
            $_SESSION['titrePost']
        ));
        return $requete->fetchAll();
    }

    public static function getDetailAnnonce_professional(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM annonces a join recruteurs r on r.idProfil=a.idRecruteur WHERE a.idAnnonce=?');
        $requete->execute(array(
            $_GET['annonce']
        ));
        return $requete->fetchAll();
    }


    public static function getAnnonNotSpecifique(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM annonces a join recruteurs r on r.idProfil=a.idRecruteur WHERE a.intitulePost NOT like ? order by a.dateCreation limit 6');
        $requete->execute(array(
            $_SESSION['titrePost']
        ));
        return $requete->fetchAll();
    }

    public static function getMyAnnonce(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM annonces a join recruteurs r on r.idProfil=a.idRecruteur WHERE idRecruteur=? order by a.dateCreation limit 6');
        $requete->execute(array(
            $_SESSION['idProfil']
        ));
        return $requete->fetchAll();
    }

    public static function getAnnonceForOther(){

    }

}