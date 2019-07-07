<?php

    require_once '../../model/ProfilProfessionel.class.php';
    require_once '../../model/Connexion.class.php';
    require_once '../../globals/database.php';
    require_once '../../globals/functions.php';
    require_once '../../globals/situationProfessionnel.php';
    $getallprofil=ProfilProfessionel::get5Profil();
    

    if(!empty($getallprofil) and sizeof($getallprofil)>0){
        foreach ($getallprofil as $profil) {
            echo '<div class="row friend">
                <div class="col-sm-3">
                    <img src="../view/static/img/favicons/favicon-32x32.png" width="50" style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius:50% ;">
                </div>';
            if($profil->getSexe()=="M"){
                echo '<div class="col-sm-6">
                    <p><small><b><i class="fa fa-male"></i> '.$profil->getNom().' '.$profil->getPrenom().'</b></small><br>
                        <small><em>'.$profil->getSituationProfessionel().'</em></small></p>
                </div>';
            }
            else{
                echo '<div class="col-sm-6">
                    <p><small><b><i class="fa fa-female"></i> '.$profil->getNom().' '.$profil->getPrenom().'</b></small><br>
                        <small><em>'.$profil->getSituationProfessionel().'</em></small></p>
                </div>';
            }
            echo '<div class="col-sm-3">
                    
                    <a href="#" class="detail" id="getDetail"><small><i class="fa fa-eye"></i> Detail</small></a>
                </div>
            </div>';
        }
    }
    else{
        echo '<h5 style="color: darkred;">Aucun professionel à afficher</h5>';
    }