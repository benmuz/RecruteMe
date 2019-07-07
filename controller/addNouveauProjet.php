<?php

    session_start();
    include_once '../globals/database.php';
    include_once '../model/Connexion.class.php';

    $con=Connexion::getConnexion();


    if(isset($_POST['input_descriptionProjet'])){

        $descriptionProjet = $_POST['input_descriptionProjet'];
        $descriptionProjet = preg_replace('#[^a-z0-9]#i', '_', $descriptionProjet); // filter everything but letters and numbers
        if(strlen($descriptionProjet) < 10 || strlen($descriptionProjet) > 30){
            echo '10 à 30 caractètres SVP.';
            exit();
        }
        elseif (is_numeric($descriptionProjet[0])){
            echo 'le nom du projet doit commencer par une lettre.';
            exit();
        }
        else{
            $requtes="SELECT idProjet FROM projet_recrutement WHERE descriptionProjet = ?";
            $stm=$con->prepare($requtes);
            $stm->execute(array(
                $descriptionProjet
            ));
            $numRows=$stm->rowCount();
            if($numRows > 0){
                echo 'ce nom du projet est déjà utilisé !';
                exit();
            } else {
                $requte="INSERT INTO projet_recrutement(idRecruteur,descriptionProjet,dateCreation) VALUES (:idRecruteur,:descriptionProjet,now())";
                $stm=$con->prepare($requte);
                $execution=$stm->execute(array(
                    'idRecruteur'=>$_SESSION['idProfil'],
                    'descriptionProjet'=>$_POST['input_descriptionProjet']
                ));
                echo 'success';
                exit();
            }


        }




    }