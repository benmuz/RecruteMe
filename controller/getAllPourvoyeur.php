<?php
require_once '../../model/Recruteurs.class.php';
require_once '../../model/Connexion.class.php';
require_once '../../globals/database.php';
require_once '../../globals/functions.php';
require_once '../../globals/situationProfessionnel.php';

$getallprofil=Recruteurs::getAllPourvoyeur();

if(!empty($getallprofil) and sizeof($getallprofil)>0){
    foreach ($getallprofil as $res){
        echo '
        <div class="col-sm- box-profil-publication">
            <figure>
                 <img src="../../avatar_pourv/'.$res['avatar'].'" width="100%" class="">
            </figure>
            <div class="text-center">
                <h5>'.$res['nomEntreprise'].'</h5>
                            <p><small>'.$res['email'].' / <i class="fa fa-phone"></i> '.$res['telephone'].'</small><br>
                            <em>'.$res['adresse'].' / '.$res['ville'].' / '.$res['pays'].'</em><br>
                            </p>
            </div>
            <div align="center">
                <a href="'.$res['idProfil'].'" class="btn btn-primary btn-sm">
                    Mon profil <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
        
        ';
    }
}