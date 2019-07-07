=<?php

    require_once '../model/Users.class.php';
    require_once '../model/Connexion.class.php';
    require_once '../globals/typeCompte.php';
    require_once '../globals/database.php';

    if(!empty($_GET['pseudo'])){
        $pseudo = $_GET['pseudo'];
        $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
        if(strlen($pseudo) < 6 || strlen($pseudo) > 15){
            echo '6 à 15 caractètres SVP.';
            exit();
        }
        if(is_numeric($pseudo[0])){
            echo 'Le pseudo doit commencer par une lettre.';
            exit();
        }
        //tester si le pseudo exite deja lorsque on s'inscrit
        $connexion=Connexion::getConnexion();
        $query= $connexion->prepare('SELECT id FROM t_users WHERE pseudo=?');
        $query->execute(array($pseudo));
        $pseudo_check=$query->rowCount();

        if ($pseudo_check >0){
            echo 'ce pseudo est déjà utilisé !';
            exit();
        } else {
            echo 'success';
            exit();
        }
    }
    //Vérification de l'email
    if(!empty($_GET['email'])){
        $email = $_GET['email'];
        //Vérifier l'adresse mail
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Adresse email invalide !';
            exit();
        }
        //Connexion à la base de données
        $connexion=Connexion::getConnexion();
        $query= $connexion->prepare('SELECT id FROM t_users WHERE email=?');
        $query->execute(array($email));
        $email_check=$query->rowCount();
        if($email_check > 0){
            echo 'Adresse email déjà utilisée !';
            exit();
        } else {
            echo 'success';
            exit();
        }
    }
    //Vérification des mots de passe
    if(!empty($_GET['pass1_check']) && !empty($_GET['pass2_check'])){
        if(strlen($_GET['pass1_check']) < 6 || strlen($_GET['pass1_check'])  < 6){
            echo 'Mot de passe trop court (6 caractères minimum)';
            exit();
        } else if($_GET['pass1_check'] == $_GET['pass2_check']){
            echo 'success';
            exit();
        } else {
            echo 'Les deux mots de passe sont différents';
            exit();
        }

    }

    if($_GET['bRegister']){
        $hash_pass = sha1($pass1); //on hash d'abord le mot de passe
        $user=new Users(0,$pseudo,$hash_pass,$email,4,$typecompte);
        $result=Users::createCompte($user);
    }
