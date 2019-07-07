<?php

session_start();
include_once '../model/Utilisateurs.class.php';
include_once '../globals/database.php';
include_once '../model/Connexion.class.php';
include_once '../globals/getId.php';

if(isset($_POST['ancienMotDePasse']) and !empty($_POST['ancienMotDePasse'])){

    $pwd=sha1($_POST['ancienMotDePasse']);
    $q = Connexion::getConnexion()->prepare('SELECT password FROM utilisateur WHERE pseudo = ? and password=?');
    $q->execute(array($_SESSION['pseudo'],$pwd));
    $numRows = $q->rowCount();
    if($numRows > 0){
        if(isset($_POST['nouveauMotDePasse'],$_POST['confimerMotDePasse']) and $_POST['nouveauMotDePasse']!=$_POST['confimerMotDePasse']){
            echo 'les deux mot de passes ne sont pas identique';
        }
        else{
            $pwd_=sha1($_POST['nouveauMotDePasse']);
            $update=new Utilisateurs($_SESSION['id'],1,$pwd_,3,4,5,6);
            Utilisateurs::changeCoordonnees($update);
            echo 'la modification s\'est effectuee avec success';
        }
        exit();
    } else {
        echo 'verifier votre ancien mot de passe';
        exit();
    }
}


