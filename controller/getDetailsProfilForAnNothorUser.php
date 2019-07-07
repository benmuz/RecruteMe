<?php
require_once '../../model/Professionnels.class.php';
require_once '../../model/Utilisateurs.class.php';
require_once '../../model/Connexion.class.php';
include_once '../../globals/getId.php';
require_once '../../globals/database.php';

$detailsProfil=Utilisateurs::getDetailsProfilForAnNotherUser();
if(isset($_GET[ID_USER])){
    if(!empty($detailsProfil) and sizeof($detailsProfil)>0){
        foreach ($detailsProfil as $details) {
            $details['idProfil'];
            $details['idUtilisateur'];
            $details['nom'];
            $details['prenom'];
            $details['genre'];
            $details['pseudo'];
            $details['email'];
            $details['telephone'];
            $details['ville'];
            $details['adresse'];
            $details['lien1'];
            $details['pays'];
            $details['etatEmploi'];
            $details['avatar'];
        }
    }

}
else
    echo 'error';