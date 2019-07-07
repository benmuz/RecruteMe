<?php

    require_once '../model/Professionnels.class.php';
    require_once '../model/Connexion.class.php';
    require_once '../globals/database.php';
    require_once '../globals/functions.php';
    require_once '../globals/situationProfessionnel.php';
    $getville=Professionnels::getTop10Ville();


    if(!empty($getville) and sizeof($getville)>0){
        $out='';
        foreach ($getville as $v) {
            $out.= '
            <div class="container-fluid">
                <div class="row"> 
                  
                    <div class="col-sm-6"> 
                        <h5 style="color: #f1f1f1"><i class="fa fa-building"></i> '.$v['ville'].'</h5>
                    </div>
                   
                </div>
            </div>
            ';
        }
        echo $out;
    }
    else{
        echo '<h5 style="color: cadetblue;"> pas de region à afficher</h5>';
    }