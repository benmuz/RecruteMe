<?php

    include_once '../model/Connexion.class.php';
    include_once '../globals/database.php';

    $con=Connexion::getConnexion();

    if(!empty($_POST["monpays"])){
        //Get all state data
        $monpays_id= $_POST['monpays'];

        $query = "SELECT * FROM villes WHERE idPays in(select idPays from pays WHERE nomPays='$monpays_id') ORDER BY nomVille ASC";
        $stm =$con->prepare($query);
        $stm->execute();
        //Count total number of rows
        $result = $stm->fetchAll();

        if(sizeof($result)> 0){
            echo '<option value="">Selectionner la ville</option>';
            foreach ($result as $res){
                $nomVille=$res['nomVille'];
                echo "<option value='$nomVille'>$nomVille</option>";
            }
        }else{
            echo '<option value="">la ville invalide</option>';
        }
    }