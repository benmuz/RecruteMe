<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/Annonces.class.php';

if(isset($_POST['intitulePost'],
$_POST['typeContrat'],
$_POST['descriptionPost'],
    $_POST['experienceRequise'],
    $_POST['competences'],
    $_POST['mission'],
    $_POST['sexeP'],
    $_POST['lieuAffectation'],
    $_POST['envoit_cv'],
    $_POST['heureLimite'],
    $_POST['dateLimite'])){

    $idProfil=$_SESSION['idProfil'];
    //insert a new ability
    extract($_POST);
    $annonce=new Annonces(0,$idProfil,$lieuAffectation,$sexeP,$intitulePost,$typeContrat,$experienceRequise,$descriptionPost,$competences,$mission,$envoit_cv,$dateLimite,$heureLimite,13);
    Annonces::addAnnonce($annonce);
    echo "votre enregistrement a été éffectué avec succes";
}
else{
    echo "une erreur inconue s'est produite";
}
