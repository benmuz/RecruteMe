<?php
require_once '../../model/Professionnels.class.php';
require_once '../../model/Connexion.class.php';
require_once '../../globals/database.php';
require_once '../../globals/functions.php';
require_once '../../globals/situationProfessionnel.php';
$getallprofil=Professionnels::getAllProfesionnel();


if(!empty($getallprofil) and sizeof($getallprofil)>0){
    foreach ($getallprofil as $res){
        echo '
        <div class="col-12 box-profil-publication">
            
             <div class="card" style="border-radius: inherit;margin-bottom: 0.5rem">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-4" style="height: 50%">
                            <figure>
                                <img src="../../avatar/'.$res['avatar'].'" width="100%" class="">
                            </figure>
                        </div>
                        <div class="col-8">
                            <h5>'.$res['nom'].' '.$res['prenom'].' &nbsp;'.$res['pseudo'].'</h5>
                            <p><em>'.$res['profil1'].'</em><br><small>'.$res['email'].' / <i class="fa fa-phone"></i> '.$res['telephone'].'</small><br>
                            <em>'.$res['adresse'].' / '.$res['ville'].' / '.$res['pays'].'</em><br>
                            ';
        if($res['genre']=='M' or $res['genre']=='m'){
            echo '<i class="fa fa-male"></i> Homme';
        }
        if($res['genre']=='F' or $res['genre']=='f'){
            echo '<i class="fa fa-female"></i> Femme';
        }
        echo '
                            </p>
                            
                            <div align="right">
                                <a href="'.$res['idProfil'].'" class="btn btn-primary btn-sm">
                                    Mon profil <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top:0.8rem">autres informations comme ses competences, experiences...</div>
                    </div>
                </div>
             </div>
        </div>
        ';

    }
}