<?php


    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';
    include_once '../../model/Professionnels.class.php';

    $allExp=Experiences::getAllExperiencesForWhoIsConnected();

    if(sizeof($allExp)>0){
        foreach ($allExp as $exp){
            echo '<p ><i class="fa fa-calendar"></i> '.$exp['dateDebut'].' - '.$exp['dateFin'].'
            <br><small><i class=""></i> '.utf8_encode($exp['nomEntreprise']).'</small></p>';
        }
    }
    else{
        echo '<p class="text-info text-center"> Aucune donnee a afficher</p>';
    }
