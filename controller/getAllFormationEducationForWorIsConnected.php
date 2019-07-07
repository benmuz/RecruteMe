<?php

    include_once "../../model/FormationEducation.class.php";
    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';
    include_once '../../model/Professionnels.class.php';

    $allExp=FormationEducation::getAllFormationEducationForWhoIsConnected();

    if(sizeof($allExp)>0){
        foreach ($allExp as $exp){
            echo '<p><i class="fa fa-calendar"></i> '.$exp['dateDebut'].' - '.$exp['dateFin'].'
                <br><small><i class="fa fa-university"></i>'.utf8_encode($exp['ecoleUniversite']).'</small></p>';
        }
    }
    else{
        echo '<p class="text-center text-info">aucune donnee a afficher</p>';
    }
