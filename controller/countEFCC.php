<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/Experiences.class.php';
include_once '../model/Competences.class.php';
include_once '../model/FormationEducation.class.php';
include_once '../model/Certifications.class.php';

if(isset($_GET['id_user'])){
    $experience=Experiences::countExperiencesForWhoIsConnected();
    $pourcentage=0;
    foreach($experience as $ex){
        $pourcentage+=25;

    }
    if($pourcentage==0){
        echo 'vous n\'avez pas encore completé cette rubrique c\'est à '.$pourcentage.'%';
    }
    else{
        echo 'vous avez completé cette rubrique à '.$pourcentage.'%';
    }
}

if(isset($_GET['competence'])){
    $competence=Competences::countCompetenceForWhoIsConnected();
    $pourcentageCompetence=0;
    foreach($competence as $comp){
        $pourcentageCompetence+=25;
    }
    if($pourcentageCompetence==0){
        echo 'vous n\'avez pas encore completé cette rubrique c\'est à '.$pourcentageCompetence.'%';
    }
    else{
        echo 'vous avez completé cette rubrique à '.$pourcentageCompetence.'%';
    }
}

if(isset($_GET['formation'])){
    $formation=FormationEducation::countFormationForWhoIsConnected();
    $pourcentageFormation=0;
    foreach($formation as $comp){
        $pourcentageFormation+=25;
    }
    if($pourcentageFormation==0){
        echo 'vous n\'avez pas encore completé cette rubrique c\'est à '.$pourcentageFormation.'%';
    }
    else{
        echo 'vous avez completé cette rubrique à '.$pourcentageFormation.'%';
    }

}

if(isset($_GET['certificat'])){
    $certificat=Certifications::countCertificationForWhoIsConnected();
    $pourcentageCertificat=0;
    foreach($certificat as $comp){
        $pourcentageCertificat+=25;
    }
    if($pourcentageCertificat==0){
        echo 'vous n\'avez pas encore completé cette rubrique c\'est à '.$pourcentageCertificat.'%';
    }
    else{
        echo 'vous avez completé cette rubrique à '.$pourcentageCertificat.'%';
    }
}
