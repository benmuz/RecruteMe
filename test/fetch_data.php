<?php
session_start();
include_once '../model/Connexion.class.php';
include_once '../globals/database.php';


if(isset($_POST['action'])){
    $con=Connexion::getConnexion();
    $requet="select * from professionnels p join experiences e on p.idUtilisateur=e.idProfil WHERE etatEmploi=1 and nom LIKE '%$search%' ";
    if(isset($_POST['ville'])){
        $ville_filter=implode("','", $_POST['ville']);
        $requet .=" and p.ville in('".$ville_filter."')";
    }
    if(isset($_POST['experience'])){
        $ville_filter=implode("','", $_POST['experience']);
        $requet .=" and e.nombreAnnee in('".$ville_filter."')";
    }

    $stm=$con->prepare($requet);
    $stm->execute();
    $result=$stm->fetchAll();
    $res_=$stm->rowCount();
    $output='';
    if(sizeof($result)>0){
        echo '<div class="" style="background:#1D5F2A;width: 100%;height: 2.8rem;margin-bottom: 1rem;padding-right: 0.5rem">
                    <h2 style="color: #fff;float: right">'.$res_.' '.' Profil(s)</h2>
                </div>';

        foreach ($result as $res){
            $output .='
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3" style="border:1px solid #ccc;margin-bottom: 1.5rem;height: 150px;">
                            <img src="../avatar/'.$res['avatar'].'"  style="width: 100%" align="center">
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                
                                <div class="col-sm-11">
                                    <p align=""><b>'.$res['nom'].' '.$res['prenom'].'</b></p>
                            <p>
                            <small><b><em>'.$res['titrePost'].'</em></b><br>
                            <em>'.$res['ville'].' '.'/'.' '.$res['pays'].'</em></small></p>
                                </div>
                                <div class="col-sm-1"><label class="text-center">Choisir<input type="checkbox"></label></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            ';
        }
    }
    else{
        $output='<h2 style="padding: 10rem;color: #ccc">donnee introuvable</h2>';
    }
    echo $output;



}