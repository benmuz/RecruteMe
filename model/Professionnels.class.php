<?php

class Professionnels
{
    private $idProfil;
    private $idUtilisateur;
    private $nom;
    private $prenom;
    private $genre;
    private $adresse;
    private $ville;
    private $pays;
    private $telephone;
    private $situationProfessionnelle;
    private $etatEmploi;
    private $avatar;
    private $dateCreation;


    public function __construct($idProfil, $idUtilisateur, $nom, $prenom, $genre, $adresse, $ville, $pays, $telephone, $situationProfessionnelle, $etatEmploi, $avatar, $dateCreation)
    {
        $this->idProfil = $idProfil;
        $this->idUtilisateur = $idUtilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->pays = $pays;
        $this->telephone = $telephone;
        $this->situationProfessionnelle = $situationProfessionnelle;
        $this->etatEmploi = $etatEmploi;
        $this->avatar = $avatar;
        $this->dateCreation = $dateCreation;
    }


    public function getIdProfil()
    {
        return $this->idProfil;
    }
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getPays()
    {
        return $this->pays;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getSituationProfessionnelle()
    {
        return $this->situationProfessionnelle;
    }
    public function getEtatEmploi()
    {
        return $this->etatEmploi;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
    }



    public static function createProfil(Professionnels $profil)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("INSERT INTO professionnels(idUtilisateur, nom,prenom, genre,adresse,ville,pays,telephone,situationProfessionnelle,etatEmploi,avatar,dateCreation)
            VALUES(:idUser, :nom,:prenom, :genre,:adresse,:ville,:pays, :telephone,:situationProfessionnelle,:etatEmploi,'avatar_professionel.png',now());
            ");
        $requete->execute(array(
            "idUser"=>$profil->getIdUtilisateur(),
            "nom" =>$profil->getNom(),
            "prenom"=>$profil->getPrenom(),
            "genre" =>$profil->getGenre(),
            "adresse"=>$profil->getAdresse(),
            "ville"=>$profil->getVille(),
            "pays" =>$profil->getPays(),
            "telephone" =>$profil-> getTelephone(),
            "situationProfessionnelle"=>$profil->getSituationProfessionnelle(),
            "etatEmploi"=>$profil->getEtatEmploi()
        ));
    }

    public static function createProfil2(Professionnels $profil)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("UPDATE professionnels SET situationProfessionnelle=:situationProfessionnelle,etatEmploi=:etatEmploi
            WHERE idUtilisateur=:idUtilisateur");
        $requete->execute(array(
            "idUtilisateur"=>$_SESSION['id'],
            "situationProfessionnelle" =>$profil->getSituationProfessionnelle(),
            "etatEmploi"=>$profil->getEtatEmploi()
        ));
    }

    public static function createProfil3(Professionnels $profil)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("UPDATE professionnels SET etatEmploi=:etatEmploi, profil1=:profil1,dateCreation=:now()
            WHERE idUtilisateur=:idUtilisateur");
        $requete->execute(array(
            "idUtilisateur"=>$_SESSION['id'],
            "etatEmploi" =>$profil->getEtatEmploi(),
            "profil1"=>$profil->getProfil1()
        ));
    }

    public static function updateProfessional(Professionnels $profil)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare("UPDATE professionnels SET nom=:nom, prenom=:prenom,telephone=:telephone,ville=:ville,pays=:pays,adresse=:adresse WHERE idUtilisateur=:idUtilisateur");
        $requete->execute(array(
            "nom" =>$profil->getNom(),
            "prenom"=>$profil->getPrenom(),
            "telephone"=>$profil->getTelephone(),
            "ville"=>$profil->getVille(),
            "pays"=>$profil->getPays(),
            "adresse"=>$profil->getAdresse(),
            "idUtilisateur"=>$_SESSION['id']
        ));
    }

    //recuperation de 5 premiers profils de professionnel
    public static function get5Profil(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM professionnels p join utilisateur u on u.idUtilisateur=p.idUtilisateur WHERE u.typeCompte=? and p.idUtilisateur!=? ORDER BY p.dateCreation DESC LIMIT 0,5');
        $requete->execute(array(TYPE_COMPTE_PROFESSIONEL,$_SESSION['id']));
        return $requete->fetchAll();
    }

    public static function getAllProfesionnel(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM professionnels p join utilisateur u on u.idUtilisateur=p.idUtilisateur WHERE u.typeCompte=? and p.idUtilisateur!=? ORDER BY p.dateCreation DESC LIMIT 0,5');
        $requete->execute(array(TYPE_COMPTE_PROFESSIONEL,$_SESSION['id']));
        return $requete->fetchAll();
    }


    public static function getAllProfil(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM professionnels WHERE idProfil=?');
        $requete->execute(array(
            $_POST['idProfil']
        ));
        return $requete->fetchAll();
    }

    public static function getTop10Ville(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT DISTINCT (ville)FROM professionnels ORDER BY ville ASC limit 30');
        $requete->execute();
        return $requete->fetchAll();
    }

    public static function getThisProfilForRecrutement($item){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM professionnels p join utilisateur u on p.idUtilisateur=u.idUtilisateur WHERE p.profil1=:profil');
        $requete->execute(array(
            'profil'=>$item
        ));
        return $requete->fetchAll();
    }

    public static function imgChange(){
        if (!empty($_POST['img'])) {
            $avatar = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];

            if (!empty($avatar)) {
                $image_ext = strtolower(end(explode('.', $avatar)));
                if (in_array($image_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                    //deplacement du fichier dans notre dossier
                    move_uploaded_file($avatar_tmp, '../avatar/' . $avatar);
                    $idUser = $_SESSION['id'];
                    $bdd = Connexion::getConnexion();
                    $req = $bdd->prepare('UPDATE professionnels SET avatar = :avatar WHERE idUtilisateur = :idUtilisateur ');
                    $req->execute(array(
                        'avatar' => $avatar,
                        'idUtilisateur' => $idUser
                    ));

                } else {

                }
            }
        }
    }


    public static function checkIfPasswordIsAvalable(Utilisateurs $utilisateurs){
        $idUtilisateur=$_SESSION['id'];
        $connexion=Connexion::getConnexion();
        $req = $connexion->prepare('UPDATE Utilisateur SET password = :password WHERE idUtilisateur = :idUtilisateur ');
        $req->execute(array(
            'avatar' => $utilisateurs->getPassword(),
            'idUtilisateur' => $idUtilisateur
        ));
        return $req->rowCount();
    }


    public static function filterThisProfilForRecrutement($item){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('SELECT * FROM t_profil p join t_users u on p.idUser=u.id WHERE p.ville=? or p.pays=?');
        $requete->execute(array(
            'profil'=>$item
        ));
        return $requete->fetchAll();
    }


}