<?php

session_start();
require_once '../globals/database.php';
require_once '../model/Connexion.class.php';
require_once '../model/ProfilProfessionel.class.php';
require_once '../globals/typeCompte.php';

$connect=Connexion::getConnexion();
$search=$_GET['s'];

$req="SELECT * FROM t_profil p WHERE p.ville='$search' OR p.pays='$search'";
$requet=$connect->prepare($req);
$requet->execute();

$i=0;
foreach ($requet as $res){
    $i++;
}
