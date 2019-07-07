
<?php
    session_start();
    require_once '../globals/database.php';
    require_once '../model/Recruteurs.class.php';
    require_once '../globals/getId.php';
    require_once '../model/Connexion.class.php';
    Recruteurs::imgChange();
    header('location:../view/pourvoyeur/modification.php?'.ID_USER.'='.$_SESSION['id'].'');

?>

