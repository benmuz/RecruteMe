<?php

session_start();
require_once '../globals/database.php';
require_once '../model/Connexion.class.php';

$con=Connexion::getConnexion();

if($_POST) {
    extract($_POST);
    $requete = 'select * from utilisateur u join professionnels p on u.idUtilisateur=p.idUtilisateur join experiences e on e.idProfil=p.idProfil join selection s on p.idProfil=s.idCandidat join projet_recrutement pr on pr.idProjet=s.idProjet where s.idProjet='.$idProjet . ' and s.idRecruteur=' . $_SESSION['id'] . ' and pr.dateCreation=current_date()';
    $stm = $con->prepare($requete);
    $stm->execute();
    $result = $stm->fetchAll();

    $requeteF = 'select * from utilisateur u join professionnels p on u.idUtilisateur=p.idUtilisateur join formations f on f.idProfil=p.idUtilisateur join selection s on p.idProfil=s.idCandidat join projet_recrutement pr on pr.idProjet=s.idProjet where s.idProjet='.$idProjet . ' and s.idRecruteur=' . $_SESSION['id'] . ' and pr.dateCreation=current_date()';
    $stmF = $con->prepare($requeteF);
    $stmF->execute();
    $resultF = $stmF->fetchAll();

    $output = '';
    if (sizeof($result) > 0) {
        foreach ($result as $res) {
            $output .= '
                <div class="col-sm-2" style="height: 25.5vh;">
                     <img src="../../avatar/' . $res['avatar'] . '" class="img-thumbnail" style="height: 25.5vh;width: 100%">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-12">
                            <p align=""><b>' . $res['nom'] . ' ' . $res['prenom'] . '</b></p>
                            <p><small><em>' . $res['titrePost'] . '<br>
                            ' . $res['email'] . '<br>
                            ' . $res['telephone'] . '</b><br>' . $res['ville'] . ' ' . '/' . ' ' . $res['pays'] . '</em></small></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 1rem">
                        <div class="col-12">
                            <a href="#"><button class="btn btn-sm btn-nav"> Mon CV</button> </a>
                            <a href="#"><button class="btn btn-sm btn-success"> Mes Profils</button> </a>
                            <a href="#"><button class="btn btn-sm btn-outline-secondary"> Envoyer Message</button> </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="card"> 
                        <div class="card-header"> 
                        Envoyer Message
                     </div>
                     <div class="card-body"> 
                        message 
                     </div>
                    </div>
                     
                </div>
            ';
        }
    }
    $outputF = '';
    if (sizeof($resultF) > 0) {
        foreach ($resultF as $resF) {
            $outputF .= '
                <div class="col-sm-2" style="height: 25.5vh;">
                     <img src="../../avatar/' . $resF['avatar'] . '" class="img-thumbnail" style="height: 25.5vh;width: 100%">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-12">
                            <p align=""><b>' . $resF['nom'] . ' ' . $resF['prenom'] . '</b></p>
                            <p><small><em>' . $resF['diplome'] . '<br>
                            ' . $resF['email'] . '<br>
                            ' . $resF['telephone'] . '</b><br>' . $resF['ville'] . ' ' . '/' . ' ' . $resF['pays'] . '</em></small></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 1rem">
                        <div class="col-12">
                            <a href="#"><button class="btn btn-sm btn-nav"> Mon CV</button> </a>
                            <a href="#"><button class="btn btn-sm btn-success"> Mes Profils</button> </a>
                            <a href="#"><button class="btn btn-sm btn-outline-secondary"> Envoyer Message</button> </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="card"> 
                        <div class="card-header"> 
                        Envoyer Message
                     </div>
                     <div class="card-body"> 
                        message 
                     </div>
                    </div>
                     
                </div>
            ';
        }
    }
    echo $output;
    echo $outputF;
}
