
<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/Langues.class.php';

if(
    isset($_POST['langue'],$_POST['niveau'])){
    $idProfil=$_SESSION['idProfil'];
    //insert a new ability
    extract($_POST);
    $langues=new Langues(0,$idProfil,$langue,$niveau,4);
    Langues::addLanguage($langues);
    echo "votre enregistrement a été éffectué avec succes";
}
else{
    echo "une erreur inconue s'est produite";
}