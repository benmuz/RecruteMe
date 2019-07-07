<?php
require_once '../../model/Professionnels.class.php';
require_once '../../model/Utilisateurs.class.php';
require_once '../../model/Connexion.class.php';
require_once '../../globals/getId.php';
require_once '../../globals/situationProfessionnel.php';
require_once '../../globals/database.php';

$detailsProfil=Utilisateurs::getDetailsProfilUserConnected();
$detailsProfil_noSalarier2=Utilisateurs::getDetailsProfilUserConnected_noSalarier2();

if(isset($_GET[ID_USER])){
    if(!empty($detailsProfil) and sizeof($detailsProfil)>0){
        foreach ($detailsProfil as $detail) {
            $_SESSION['idProfil']=$detail['idProfil'];
            $_SESSION['id']=$detail['idUtilisateur'];
            $_SESSION['nom']=$detail['nom'];
            $_SESSION['prenom']=$detail['prenom'];
            $_SESSION['genre']=$detail['genre'];
            $_SESSION['pays']=$detail['pays'];
            $_SESSION['telephone']=$detail['telephone'];
            $_SESSION['ville']=$detail['ville'];
            $_SESSION['adresse']=$detail['adresse'];
            $_SESSION['email']=$detail['email'];
            $_SESSION['statut']=$detail['etatEmploi'];
            $_SESSION['avatar']=$detail['avatar'];
            $_SESSION['situationProfessionnelle']=$detail['situationProfessionnelle'];
        }
    }
    if(!empty($detailsProfil_noSalarier2) and sizeof($detailsProfil_noSalarier2)>0){
        foreach ($detailsProfil_noSalarier2 as $detail) {
            $_SESSION['idProfil']=$detail['idProfil'];
            $_SESSION['id']=$detail['idUtilisateur'];
            $_SESSION['nom']=$detail['nom'];
            $_SESSION['prenom']=$detail['prenom'];
            $_SESSION['genre']=$detail['genre'];
            $_SESSION['pays']=$detail['pays'];
            $_SESSION['telephone']=$detail['telephone'];
            $_SESSION['ville']=$detail['ville'];
            $_SESSION['adresse']=$detail['adresse'];
            $_SESSION['email']=$detail['email'];
            $_SESSION['statut']=$detail['etatEmploi'];
            $_SESSION['avatar']=$detail['avatar'];
            $_SESSION['situationProfessionnelle']=$detail['situationProfessionnelle'];
            $_SESSION['diplome']=$detail['diplome'];
            $_SESSION['ecoleUniversite']=$detail['ecoleUniversite'];
        }
    }

}
else
    echo 'error';