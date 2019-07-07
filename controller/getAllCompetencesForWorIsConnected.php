<?php

    include "../../model/Competences.class.php";
    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';
    include_once '../../model/Professionnels.class.php';

    $allExp=Competences::getAllCompetencesForWhoIsConnected();

    if(sizeof($allExp)>0){
        foreach ($allExp as $exp){
            echo '<p style="color: #000"><i class="fa fa-dot-circle-o"></i> '.utf8_encode($exp['description']).'</p>';
        }
    }
    else{
        echo '<p class=" text-info text-center"> Aucune donnee a afficher</p>';
    }
