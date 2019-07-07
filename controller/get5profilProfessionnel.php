<?php

    require_once '../../model/Professionnels.class.php';
    require_once '../../model/Connexion.class.php';
    require_once '../../globals/database.php';
    require_once '../../globals/functions.php';
    require_once '../../globals/situationProfessionnel.php';
    $getallprofil=Professionnels::get5Profil();


    if(!empty($getallprofil) and sizeof($getallprofil)>0){
        foreach ($getallprofil as $profil) {
            echo '
            <div class="container-fluid">
                <div class="card" style="margin-top: 0.2rem">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                            <figure>
                                <span class="avatar-profil">
                                <img src="../../avatar/'.$profil['avatar'].'" width="50">
                                </span>
                                <a href="monprofil.php?'.ID_USER.'='.$profil['idUtilisateur'].'" class="detail" id="'.$profil['nom'].'" ><i class="fa fa-eye"></i></a>
                            </figure>    
                        </div>
                        <div class="col-8">';
                            if($profil['genre']=="M"){
                            echo '
                                <p class="identite-professionnel"><i class="fa fa-male"></i>&nbsp; '.$profil['nom'].' '.$profil['prenom'].'<br>
                                <em>'.$profil['profil1'].'</em><br><br>
                                </p>
                                ';
                            }
                            else{
                            echo '
                                <p class="identite-professionnel"><i class="fa fa-female"></i>&nbsp; '.$profil['nom'].' '.$profil['prenom'].'<br>
                                <em>'.$profil['profil1'].'</em><br><br>
                                </p>';
                                }
                            echo ' 
                        </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            ';
        }
    }
    else{
        echo '<h5 style="color: darkred;">Aucun professionel à afficher</h5>';
    }