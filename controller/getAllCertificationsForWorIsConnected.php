<?php

    include "../../model/Certifications.class.php";
    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';
    include_once '../../model/Professionnels.class.php';

    $allExp=Certifications::getAllCertificationsForWhoIsConnected();

    if(sizeof($allExp)>0){
        foreach ($allExp as $exp){
            echo '<p style="color:#000"><i class="fa fa-certificate"></i> '.utf8_encode($exp['titreCertification']).'</p>';
        }
    }
    else{
        echo '<p class="text-info text-center"> Aucune donnee a afficher</p>';
    }


