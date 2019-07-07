<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/Experiences.class.php';

if(
    isset($_POST['dateDebutExp']) and
    isset($_POST['dateFinExp']) and
    isset($_POST['titrePostExp']) and
    isset($_POST['nomEntrepriseExp']) and
    isset($_POST['secteurActiviteExp']) and
    isset($_POST['descriptionExp'])){
    $idProfil=$_SESSION['idProfil'];

    //insert a new formation
    extract($_POST);
    $experience=new Experiences(0,$idProfil,$dateDebutExp,$dateFinExp,$titrePostExp,$nomEntrepriseExp,$secteurActiviteExp,$descriptionExp,6);
    Experiences::addExperience($experience);
    echo "votre enregistrement a été éffectué avec succes";
}
