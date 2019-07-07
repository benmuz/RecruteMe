<?php


class Users
{
    private $idUser;
    private $pseudo;
    private $pwdUser;
    private $emailUser;
    private $createdAtUser;
    private $typeCompte;


    public function __construct($idUser, $pseudo, $pwdUser, $emailUser, $createdAtUser, $typeCompte)
    {
        $this->idUser = $idUser;
        $this->pseudo = $pseudo;
        $this->pwdUser = $pwdUser;
        $this->emailUser = $emailUser;
        $this->createdAtUser = $createdAtUser;
        $this->typeCompte = $typeCompte;

    }


    //Users constructor.

    public function getIdUser(){return $this->idUser;}
    public function getPseudo(){return $this->pseudo;}
    public function getEmailUser(){return $this->emailUser;}
    public function getPwdUser(){return $this->pwdUser;}
    public function getCreatedAtUser(){return $this->createdAtUser;}
    public function getTypeCompte(){return $this->typeCompte;}


    //customizing difference methodes

    public static function createCompte(Users $user)
    {
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('insert into t_users(pseudo,password,email,datecreation,typecompte) VALUES (:pseudo,:password,:email,now(),:typecompte)');
        $requete->execute(array(
            'pseudo' => $user->getPseudo(),
            'password' =>$user->getPwdUser(),
            'email' => $user->getEmailUser(),
            'typecompte' => $user->getTypeCompte()
        ));
        echo 'reussite';
    }

    public static function login($user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM t_users WHERE pseudo=:pseudo AND password=:password");
        $query->execute(array(
            'pseudo'=>$user->getPseudo(),
            'password'=>$user->getPwdUser()
        ));
        return $resultat = $query->fetch();
    }

    public static function checkPseudoUser(){
        $connexion=Connexion::getConnexion();
        $query= $connexion->prepare('SELECT id FROM t_users WHERE pseudo=?');
        $query->execute(array($_GET['pseudo']));
        return $pseudo_check=$query->rowCount();
    }

    public static function checkEmailUser(){
        $connexion=Connexion::getConnexion();
        $query= $connexion->prepare('SELECT id FROM t_users WHERE email=?');
        $query->execute(array($_GET['email']));
        return $email_check=$query->rowCount();
    }

    public static function checkPassword(){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT pseudo,password FROM t_users WHERE password=?");
        $query->execute(array(
            $_POST['passwordUser']
        ));
        return $resultat = $query->fetch();
    }

    public static function getUserWhoSignUp($user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM t_users WHERE pseudo=? limit 1");
        $query->execute(array(
            $user->getPseudo()
        ));
        return $resultat = $query->fetch();
    }

    public static function checkIfProfileIsNotCreated($user){
        $connexion=Connexion::getConnexion();
        $query = $connexion->prepare("SELECT * FROM t_users WHERE pseudo=:pseudo AND password=:password AND id not in(select idUser from t_profil)");
        $query->execute(array(
            'pseudo'=>$user->getPseudo(),
            'password'=>$user->getPwdUser()
        ));
        return $resultat = $query->fetchAll();
    }
    public static function getUserWhoIsConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from t_users u where u.id=? and u.pseudo=?');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilForAnNotherUser(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from t_users u join t_profil p on u.id=p.idUser where u.id=?');
        $requete->execute(array(
            $_GET[ID_USER]

        ));
        return $resultat = $requete->fetchAll();
    }

    public static function getDetailsProfilUserConnected(){
        $connexion=Connexion::getConnexion();
        $requete=$connexion->prepare('select * from t_users u join t_profil p on u.id=p.idUser where u.id=? and u.pseudo=?');
        $requete->execute(array(
            $_SESSION['id'],
            $_SESSION['pseudo']
        ));
        return $resultat = $requete->fetchAll();
    }
}