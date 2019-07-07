<?php

include "../../model/Experiences.class.php";
include_once '../../globals/database.php';
include_once '../../model/Connexion.class.php';
include_once '../../model/Professionnels.class.php';

$allExp=Experiences::getAllExperiencesForWhoIsConnected();

if(sizeof($allExp)>0){
    foreach ($allExp as $exp){
        $_SESSION['titrePost']=$exp['titrePost'];
    }
}
else{
    echo '';
}
