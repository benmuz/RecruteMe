<?php
require_once '../../model/ProfilProfessionel.class.php';
require_once '../../model/Users.class.php';
require_once '../../model/Connexion.class.php';
require_once '../../globals/getId.php';
require_once '../../globals/database.php';

$detailsProfil=Users::getUserWhoIsConnected();
if(isset($_GET[ID_USER])){
    if(!empty($detailsProfil) and sizeof($detailsProfil)>0){
        foreach ($detailsProfil as $details) {
            $_SESSION['idUser']=$details['idUser'];
            $_SESSION['pseudo']=$details['pseudo'];
            $_SESSION['typecompte']=$details['typecompte'];
            $_SESSION['email']=$details['email'];
        }
    }

}
else
    echo 'error';