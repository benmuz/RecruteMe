<?php
    session_start();
    include_once '../model/Connexion.class.php';
    include_once '../globals/database.php';
    include_once '../model/Recruteurs.class.php';
    include_once '../globals/getId.php';

    $con=Connexion::getConnexion();

    if(isset($_POST['save'])){
        //$id = uniqid();
        $id=$_SESSION['id'];
        $nomEntreprise = $_POST['nomEntreprise'];
        $secteurActivite = $_POST['secteurActivite'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $telephone2 = $_POST['telephone2'];
        $pays = $_POST['pays'];
        $ville = $_POST['ville'];
        $lien1=$_POST['lien1'];
        $description=$_POST['description'];


        $connexion=Connexion::getConnexion();
        $stat1=$connexion->prepare("INSERT INTO recruteurs(idUtilisateur, nomEntreprise,secteurActivite,adresse,ville,pays,telephone,telephone2,lien1,description,avatar,dateCreation)
            VALUES(?,?,?,?,?,?,?,?,?,?,'avatar_pourv.jpg',now());
            ");
        $stat1->bindParam(1, $id);
        $stat1->bindParam(2, $nomEntreprise);
        $stat1->bindParam(3, $secteurActivite);
        $stat1->bindParam(4, $adresse);
        $stat1->bindParam(5, $ville);
        $stat1->bindParam(6, $pays);
        $stat1->bindParam(7, $telephone);
        $stat1->bindParam(8, $telephone2);
        $stat1->bindParam(9, $lien1);
        $stat1->bindParam(10, $description);

        $stat1->execute();

        header('Location: ../view/pourvoyeur/index.php?'.ID_USER.'='.$_SESSION['id'].'&tsdgjsdvysdjhsgdhsfdy='.md5($_SESSION['pseudo']));

}
?>
