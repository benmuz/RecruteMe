<?php
require_once '../model/Utilisateurs.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/typeCompte.php';
require_once '../globals/database.php';
//Vérification du pseudo
if(!empty($_POST['pseudo_check'])){
    $pseudo = $_POST['pseudo_check'];
    $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
    if(strlen($pseudo) < 3 || strlen($pseudo) > 16){
        echo '<br/>3 à 16 caractètres SVP.';
        exit();
    }
    if(is_numeric($pseudo[0])){
        echo '<br/>Le pseudo doit commencer par une lettre.';
        exit();
    }

    $q = Connexion::getConnexion()->prepare('SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?');
    $q->execute(array($pseudo));
    $numRows = $q->rowCount();
    if($numRows > 0){
        echo '<br/>Pseudo déjà utilisé !';
        exit();
    } else {
        echo 'success';
        exit();
    }
}

//Vérification des mots de passe
if(!empty($_POST['pass1_check']) && !empty($_POST['pass2_check'])){
    if(strlen($_POST['pass1_check']) < 6 || strlen($_POST['pass1_check'])  < 6){
        echo '<br/>Trop court (6 caractères minimum)';
        exit();
    } else if($_POST['pass1_check'] == $_POST['pass2_check']){
        echo 'success';
        exit();
    } else {
        echo '<br/>Les deux mots de passe sont différents';
        exit();
    }

}

//Vérification de l'email
if(!empty($_POST['email_check'])){
    $email = $_POST['email_check'];

    //Vérifier l'adresse mail
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<br/>Adresse email invalide !';
        exit();
    }
    //Connexion à la base de données
    $q = Connexion::getConnexion()->prepare('SELECT idUtilisateur FROM utilisateur WHERE email = ?');
    $q->execute(array($email));

    $numRows = $q->rowCount();
    if($numRows > 0){
        echo '<br/>Adresse email déjà utilisée !';
        exit();
    } else {
        echo 'success';
        exit();
    }
}

//Traitement de l'inscription
if(isset($_POST['pseudo'])){

    extract($_POST);
    $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
    $q = Connexion::getConnexion()->prepare('SELECT idUtilisateur FROM utilisateur WHERE pseudo = ?');
    $q->execute(array($pseudo));
    $pseudo_check = $q->rowCount();

    $q = Connexion::getConnexion()->prepare('SELECT idUtilisateur FROM utilisateur WHERE email = ?');
    $q->execute(array($email));
    $email_check = $q->rowCount();

    if(empty($pseudo)|| empty($pass1) || empty($pass2) || empty($email)){
        echo "Tous les champs n'ont pas été remplis.";
    } else if($pseudo_check > 0) {
        echo "Pseudo déjà utilisé";
    } else if($email_check > 0) {
        echo "Cette adresse mail est déjà utilisée";
    } else if(strlen($pseudo) < 3 || strlen($pseudo) > 16) {
        echo "Pseudo éronné !";
    }  else if(is_numeric($pseudo[0])) {
        echo "Le pseudo doit commencer par une lettre.";
    }  else if($pass1 != $pass2 ) {
        echo "Les mots de passe ne correspondent pas.";
    }else if(strlen($pass1) < 6 || strlen($pass2) < 6) {
        echo "6 caracteres au minimum...";
    }
    else {
       if(!empty($typecompte) and $typecompte=TYPE_COMPTE_POURVOYEUR){
            session_start();
            $hash_pass = sha1($pass1);
           $q = Connexion::getConnexion()->prepare('insert into utilisateur(pseudo,password,email,etat,typecompte,datecreation) VALUES (:pseudo,:password,:email,1,:typecompte,now())');
           $q->execute(array(
               'pseudo' => $pseudo,
               'password' =>$hash_pass,
               'email' => $email,
               'typecompte' => $typecompte
           ));

            $qt =Connexion::getConnexion()->prepare('select * from utilisateur where pseudo=? limit 1');
            $qt->execute(array($pseudo));
            $result = $qt->fetch();

            $_SESSION['id']=$result['idUtilisateur'];
            $_SESSION['pseudo']=$result['pseudo'];
            $_SESSION['typecompte']=$result['typeCompte'];

            echo 'register_success';
        }
        exit();
    }
    exit();
}
?>
