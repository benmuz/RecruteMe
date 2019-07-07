<?php

require_once '../model/ProfilPourvoyeur.class.php';
require_once '../globals/database.php';
require_once '../model/Connexion.class.php';
require_once '../globals/getId.php';

if(isset($_GET['nomEntreprise']) and !empty($_GET['nomEntreprise'])){
    $profils=new ProfilPourvoyeur(0,$_GET['idUser'],$_GET['nomEntreprise'],$_GET['secteurActivite'],$_GET['adresse'],$_GET['ville'],$_GET['pays'],$_GET['telephone'],$_GET['siteWeb'],$_GET['lienWeb']);/**/
    ProfilPourvoyeur::createProfil($profils);
    header('Location: ../view/pourvoyeur/index.php?'.ID_USER.'='.$_SESSION['id'].'&tsdgjsdvysdjhsgdhsfdy='.md5($_SESSION['pseudo']));
}