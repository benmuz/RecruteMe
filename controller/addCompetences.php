<?php
session_start();
require_once '../model/Professionnels.class.php';
require_once '../model/Connexion.class.php';
require_once '../globals/database.php';
require_once '../globals/functions.php';
require_once '../globals/getId.php';
require_once '../model/Competences.class.php';

if(
    isset($_POST['descriptionComp']) and !empty($_POST['descriptionComp'])){
    $idProfil=$_SESSION['idProfil'];
    $number=count($_POST['descriptionComp']);

    if($number > 0){
        for($i=0; $i<$number; $i++){
            if(trim($_POST["descriptionComp"][$i])!=''){

                extract($_POST);
                $competence=new Competences(0,$idProfil,$_POST["descriptionComp"][$i]);
                Competences::addCompetence($competence);
            }
            else{
                echo 'all fields required';
            }
        }
        echo "votre enregistrement a été éffectué avec succes";

    }
    else{
        echo 'remplire tous les champs';
    }
}
else{
    echo "une erreur inconue s'est produite";

    //header('location:../../view/professionnel/monprofil.php?'.ID_USER.'='.$_SESSION['id'].'&tsdgjsdvysdjhsgdhsfdy='.md5($_SESSION['pseudo']));

}