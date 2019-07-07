<?php

    include "../../model/Annonces.class.php";
    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';
    include_once '../../model/Professionnels.class.php';

    $allExp=Annonces::getMyAnnonce();
$out='';
    if(sizeof($allExp)>0){
        echo '<h3>Vos annonces d\'offres d\'emploi</h3>
                <div class="featurette-divider"></div><div class="row">';
        foreach ($allExp as $exp){
            $out.= '<div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="../../avatar_pourv/'.$exp['avatar'].'" width="80%">
                            </div>
                            <div class="col-md-12">
                                <p style="color:#000" class="text-center"><a href="#">'.utf8_encode($exp['intitulePost']).'</a><br>
                                <small>region :'.utf8_encode($exp['ville']).'</small></p>
                             </div>
                        </div>
                    </div>
            ';
        }
    }
    else{
        echo '<p class="text-info text-center"> Aucune annonce à afficher</p>';
    }
    echo $out;
echo '</div><div class="featurette-divider"></div>';


