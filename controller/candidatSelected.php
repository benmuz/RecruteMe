<?php

    session_start();
    require_once '../model/Professionnels.class.php';
    require_once '../model/Connexion.class.php';
    require_once '../globals/database.php';
    require_once '../globals/functions.php';
    include_once '../globals/tokenSelection.php';
    require_once '../globals/situationProfessionnel.php';

    $con=Connexion::getConnexion();

    if(isset($_POST['candidat'],$_POST['idProjet']) and !empty($_POST['candidat']) or !empty($_POST['idProjet'])){
        $idProjet=$_POST['idProjet'];
        $session_rec=$_SESSION['id'];
        extract($_POST);
        $requete="INSERT INTO selection (idRecruteur,idCandidat,idProjet,dateCreation) VALUES ($session_rec,'".$candidat."','".$idProjet."',now())";
        $stm=$con->prepare($requete);
        $stm->execute();
        echo 'success';

    }
    ?>
