<?php
include "../../model/Langues.class.php";
include_once '../../globals/database.php';
include_once '../../model/Connexion.class.php';
include_once '../../model/Professionnels.class.php';

$allExp=Langues::getAllLanguageForWhoIsConnected();

if(sizeof($allExp)>0){
    foreach ($allExp as $exp){
        echo '<p style="color:#000"><i class="fa fa-language"></i> '.$exp['langue'].'&nbsp;&nbsp;,&nbsp;&nbsp;Niveau: '.utf8_encode($exp['niveau']).'</p>';
    }
}
else{
    echo '<p class="text-info text-center"> Aucune donnee a afficher</p>';
}