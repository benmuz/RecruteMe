<?php
    session_start();
    include_once '../globals/database.php';
    include_once '../model/Connexion.class.php';
    include_once '../globals/getId.php';
    include_once '../model/Professionnels.class.php';

    $con=Connexion::getConnexion();
    $etatEmploi=$_POST['etatEmploi'];
    $session_id=$_SESSION['id'];

    $requete="UPDATE professionnels SET etatEmploi=:etatEmploi WHERE idUtilisateur='.$session_id.'";
    $prepar=$con->prepare($requete);
    $prepar->execute(array(
        'etatEmploi'=>$etatEmploi
    ));


    header('location:../view/professionnel/moncompte.php?'.ID_USER.'='.$_SESSION['id'].'&tsdgjsdvysdjhsgdhsfdy');

