<?php

    include_once '../model/Connexion.class.php';
    include_once '../globals/database.php';

    $con=Connexion::getConnexion();

    if(!empty($_POST["monpays"])){
        //Get all state data
        $monpays_id= $_POST['monpays'];

        $query = "SELECT * FROM villes WHERE idPays='$monpays_id' ORDER BY nomVille ASC";
        $stm =$con->prepare($query);
        $stm->execute();
        //Count total number of rows
        $result = $stm->fetchAll();

        if(sizeof($result)> 0){
            echo '<option value="">Selectionner la ville</option>';
            foreach ($result as $res){
                $idVille=$res['idVille'];
                $nomVille=$res['nomVille'];
                echo "<option value='$idVille'>$nomVille</option>";
            }
        }else{
            echo '<option value="">la ville invalide</option>';
        }
    }