<?php

/**
 * Created by PhpStorm.
 * User: RACHEL MINGA
 * Date: 10/08/2018
 * Time: 12:50
 */
class Utilisateurs
{
    private $idUtilisateur;
    private $pseudo;
    private $password;
    private $email;
    private $etat;
    private $typeCompte;
    private $typeProfil;
    private $dateCreation;

    /**
     * Utilisateurs constructor.
     * @param $idUtilisateur
     * @param $pseudo
     * @param $password
     * @param $email
     * @param $etat
     * @param $typeCompte
     * @param $typeProfil
     * @param $dateCreation
     */
    public function __construct($idUtilisateur, $pseudo, $password, $email, $typeCompte, $typeProfil, $dateCreation)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;

        $this->typeCompte = $typeCompte;
        $this->typeProfil = $typeProfil;
        $this->dateCreation = $dateCreation;
    }


    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }


    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getTypeCompte()
    {
        return $this->typeCompte;
    }
    public function getTypeProfil()
    {
        return $this->typeProfil;
    }
    public function getDateCreation()
    {
        return $this->dateCreation;
    }


    //customizing difference methodes

    public static function createCompte(Utilisateurs $user)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('insert into utilisateur(pseudo,password,email,etat,typecompte,datecreation) VALUES (:pseudo,:password,:email,1,:typecompte,now())');
        $requete->execute(array(
            'pseudo' => $user->getPseudo(),
            'password' =>$user->getPassword(),
            'email' => $user->getEmail(),
            'typecompte' => $user->getTypeCompte()
        ));
        echo 'reussite';
    }

    public static function login($user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM utilisateur WHERE pseudo=:pseudo AND password=:password");
        $query->execute(array(
            'pseudo'=>$user->getPseudo(),
            'password'=>$user->getPassword()
        ));
        return $resultat = $query->fetch();
    }

    public static function checkPseudoUser(){
        $connexion=Connexion::getConnexion();
        $query= $connexion->prepare('SELECT idUtilisateur FROM utilisateur WHERE pseudo=?');
        $query->execute(array($_GET['pseudo']));
        return $pseudo_check=$query->rowCount();
    }

    public static function checkEmailUser(){
        $connexion=Connexion::getConnexion();
        $query= $connexion->prepare('SELECT idUtilisateur FROM utilisateur WHERE email=?');
        $query->execute(array($_GET['email']));
        return $email_check=$query->rowCount();
    }

    public static function checkPassword(){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT pseudo,password FROM utilisateur WHERE password=?");
        $query->execute(array(
            $_POST['passwordUser']
        ));
        return $resultat = $query->fetch();
    }

    public static function getUserWhoSignUp($user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM utilisateur WHERE pseudo=? limit 1");
        $query->execute(array(
            $user->getPseudo()
        ));
        return $resultat = $query->fetch();
    }

    public static function checkIfProfileIsNotCreated(Utilisateurs $user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM utilisateur WHERE pseudo=:pseudo and password=:password AND idUtilisateur not in(select idUtilisateur from professionnels)");
        $query->execute(array(
            'pseudo'=>$user->getPseudo(),
            'password'=>$user->getPassword()
        ));
        return $resultat = $query->fetchAll();
    }
    public static function checkIfProfileIsNotCreated_(Utilisateurs $user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM utilisateur WHERE pseudo=:pseudo and password=:password AND idUtilisateur not in(select idUtilisateur from recruteurs)");
        $query->execute(array(
            'pseudo'=>$user->getPseudo(),
            'password'=>$user->getPassword()
        ));
        return $resultat = $query->fetchAll();
    }
    public static function getUserWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from utilisateur u where u.idUtilisateur=? and u.pseudo=?');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilForAnNotherUser(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from utilisateur u join professionnels p on u.idUtilisateur=p.idUtilisateur where u.idUtilisateur=?');
        $requete->execute(array(
            $_GET[ID_USER]

        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilUserConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from utilisateur u join professionnels p on u.idUtilisateur=p.idUtilisateur where u.idUtilisateur=? and u.pseudo=? ');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilUserConnected_noSalarier1(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from utilisateur u join professionnels p on u.idUtilisateur=p.idUtilisateur join experiences e on e.idProfil=p.idUtilisateur join recherche r on r.idProfil=p.idUtilisateur where u.idUtilisateur=? and u.pseudo=?');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilUserConnected_noSalarier2(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from utilisateur u join professionnels p on u.idUtilisateur=p.idUtilisateur join formations f on f.idProfil=p.idUtilisateur  where u.idUtilisateur=? and u.pseudo=?');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilUserConnected_(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from utilisateur u join recruteurs p on u.idUtilisateur=p.idUtilisateur where u.idUtilisateur=? and u.pseudo=?');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }

    public static function changeCoordonnees(Utilisateurs $utilisateurs){
        $idUtilisateur=$_SESSION['id'];
        $connexion=Connexion::getConnexion();
        $req = $connexion->prepare('UPDATE utilisateur SET password = :password WHERE idUtilisateur = :idUtilisateur ');
        $req->execute(array(
            'password' => $utilisateurs->getPassword(),
            'idUtilisateur' => $idUtilisateur
        ));
    }

}