<?php

session_start();
require_once '../model/Utilisateurs.class.php';
require_once '../globals/database.php';
require_once '../model/Connexion.class.php';
require_once '../globals/typeCompte.php';
require_once '../model/ProfilProfessionel.class.php';
require_once '../globals/getId.php';


        $pseudo=$_POST['pseudo'];
        $hash_pass = sha1($_POST['password']);//on hash d'abord le mot de passe
        $user = new Utilisateurs(0, $pseudo, $hash_pass, 3, 4,5,6,7);
        $resultat = Utilisateurs::login($user);

        $check_profile=Utilisateurs::checkIfProfileIsNotCreated($user);
        $check_profiles=Utilisateurs::checkIfProfileIsNotCreated_($user);

        $_SESSION['pseudo']=$resultat['pseudo'];
        $_SESSION['id']=$resultat['idUtilisateur'];
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['typecompte']=$resultat['typeCompte'];

        if($check_profile and $resultat['typeCompte'] == TYPE_COMPTE_PROFESSIONEL){
            header('Location: ../view/professionnel/notice.php');
        }
        elseif ($check_profiles and $resultat['typeCompte'] == TYPE_COMPTE_POURVOYEUR){
            header('Location: ../view/pourvoyeur/notice.php');
        }
        elseif (!$check_profile or !$check_profiles){
            if($resultat){
                if ($resultat['typeCompte'] == TYPE_COMPTE_PROFESSIONEL) {
                    $_SESSION['id'] = $resultat['idUtilisateur'];
                    $_SESSION['email'] = $resultat['email'];
                    $_SESSION['pseudo'] = $resultat['pseudo'];
                    $_SESSION['typecompte'] = $resultat['typeCompte'];
                    header('Location:../view/professionnel/moncompte.php?'.ID_USER.'='.$_SESSION["id"].'');
                }
                else if ($resultat['typeCompte'] == TYPE_COMPTE_POURVOYEUR){
                    $_SESSION['id'] = $resultat['idUtilisateur'];
                    $_SESSION['pseudo'] = $resultat['pseudo'];
                    $_SESSION['email'] = $resultat['email'];
                    $_SESSION['typecompte'] = $resultat['typeCompte'];
                    header('Location: ../view/pourvoyeur/index.php?'.ID_USER.'='.$_SESSION["id"].'');
                }
                else if ($resultat['typeCompte'] == TYPE_COMPTE_ADMINISTRATEUR){
                    $_SESSION['id'] = $resultat['idUtilisateur'];
                    $_SESSION['pseudo'] = $resultat['pseudo'];
                    $_SESSION['email'] = $resultat['email'];
                    $_SESSION['typecompte'] = $resultat['typeCompte'];
                    header('Location: ../view/ADM/index.php?'.ID_USER.'='.$_SESSION["id"].'');
                }
            }
            else{
                header('Location: ../view/faild-login.php');
                }
        }
        else{
            header('Location: ../view/faild-login.php');
        }

