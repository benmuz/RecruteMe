<?php

require_once '../../model/Connexion.class.php';
require_once '../../globals/getId.php';
require_once '../../globals/database.php';

$detailsProfil=Utilisateurs::getDetailsProfilUserConnected_();
if(isset($_GET[ID_USER])){
    if(!empty($detailsProfil) and sizeof($detailsProfil)>0){
        foreach ($detailsProfil as $detail) {
            $_SESSION['idProfil']=$detail['idProfil'];
            $_SESSION['idUser']=$detail['idUtilisateur'];
            $_SESSION['pays']=$detail['pays'];
            $_SESSION['telephone']=$detail['telephone'];
            $_SESSION['ville']=$detail['ville'];
            $_SESSION['adresse']=utf8_encode($detail['adresse']);
            $_SESSION['email']=$detail['email'];
            $_SESSION['avatar']=$detail['avatar'];
            $_SESSION['nomEntreprise']=utf8_encode($detail['nomEntreprise']);
            $_SESSION['secteurActivite']=$detail['secteurActivite'];
            $_SESSION['description']=utf8_encode($detail['description']);

        }
    }
}
else
    echo 'error';