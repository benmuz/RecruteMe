<?php

session_start();
include_once '../model/Professionnels.class.php';
include_once '../globals/database.php';
include_once '../model/Connexion.class.php';
include_once '../globals/getId.php';

if(isset($_POST['nom'])){

    $id=$_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    //$genre = $_POST['genre'];
    $telephone = $_POST['telephone'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    $update=new Professionnels(0,$id,$nom,$prenom,4,$adresse,$ville,$pays,$telephone,9,10,11,12,13,14,15,16,17,18);
    Professionnels::updateProfessional($update);

    echo 'la modification s\'est effectuee avec success';
}

else{
    echo 'une erreur s\'est produite';
}
