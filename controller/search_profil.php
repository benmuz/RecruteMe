<?php

    session_start();
    require_once '../globals/database.php';
    require_once '../model/Connexion.class.php';
    require_once '../model/ProfilProfessionel.class.php';
    require_once '../globals/typeCompte.php';

    $connect=Connexion::getConnexion();
    $search=$_GET['s'];

    if(!empty($search)){
        $req="SELECT * FROM professionnels p join utilisateur u on u.idUtilisateur=p.idUtilisateur join experiences e on e.idProfil=p.idProfil  WHERE p.etatEmploi=1 and e.titrePost LIKE '%$search%'";
        $requet=$connect->prepare($req);
        $requet->execute();

        $reqs="SELECT * FROM professionnels p join utilisateur u on u.idUtilisateur=p.idUtilisateur join formations e on e.idProfil=p.idUtilisateur  WHERE p.etatEmploi=1 and e.diplome LIKE '%$search%'";
        $requets=$connect->prepare($reqs);
        $requets->execute();

        if(sizeof($requet)>0){
            echo '<div class="box-profil_container">';
            foreach ($requet as $res){
                echo '<div class="row">
                        <div class="col-sm-12">
                            <em onclick="javascript:showValueFromSearch(this);" id="result" class="result">'.$res['titrePost'].'</em><br>
                        </div>
                  </div>
                 <br>
        ';
            }
            foreach ($requets as $ress){
                echo '<div class="row">
                        <div class="col-sm-12">
                            <em onclick="javascript:showValueFromSearch(this);" id="result" class="result">'.$ress['diplome'].'</em><br>
                        </div>
                  </div>
                 <br>
        ';
            }
            echo '</div>';
        }
        else{
            echo '';
        }
    }
    else{
        echo '';
    }



