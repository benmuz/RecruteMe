<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/FormationEducation.class.php';

if(
    isset($_POST['dateDebut']) and
    isset($_POST['dateFin']) and
    isset($_POST['titreDiplome']) and
    isset($_POST['ecoleUniversite']) and
    isset($_POST['descriptionFormat'])
)
{
    $idProfil=$_SESSION['idProfil'];
    //insert a new formation
    extract($_POST);
    $formation=new FormationEducation(0,$idProfil,$dateDebut,$dateFin,$titreDiplome,$ecoleUniversite,$descriptionFormat,6);
    FormationEducation::addFormation_education($formation);
    echo 'votre enregistrement a été éffectué avec succes';
}
