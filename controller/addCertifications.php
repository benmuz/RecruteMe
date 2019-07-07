
<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/Certifications.class.php';

if(
    isset($_POST['descriptionCert'],$_POST['titreCert'],$_POST['titreCert'])){
    $idProfil=$_SESSION['idProfil'];
    //insert a new ability
    extract($_POST);
    $certification=new Certifications(0,$idProfil,$titreCert,$lieuCert,$descriptionCert);
    Certifications::addCertification($certification);
    echo "votre enregistrement a été éffectué avec succes";
}
else{
    echo "une erreur inconue s'est produite";
}