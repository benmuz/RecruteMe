
<?php
    session_start();
    require_once '../globals/database.php';
    require_once '../model/Professionnels.class.php';
    require_once '../globals/getId.php';
    require_once '../model/Connexion.class.php';
    Professionnels::imgChange();
    header('location:../view/professionnel/monprofil.php?'.ID_USER.'='.$_SESSION['id'].'');

?>

