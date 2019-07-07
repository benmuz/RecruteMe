<?php
    session_start();
    include_once '../model/Professionnels.class.php';
    include_once '../model/Connexion.class.php';
    include_once '../globals/database.php';
    include_once '../model/Recruteurs.class.php';
    include_once '../globals/getId.php';
    include_once '../model/Experiences.class.php';
    include_once '../globals/situationProfessionnel.php';

    $con=Connexion::getConnexion();
    $id=$_SESSION['id'];

if(!empty($_POST['nom']) and !empty($_POST['prenom'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $nom = preg_replace('#[^a-z0-9]#i', '', $nom);
    $prenom = preg_replace('#[^a-z0-9]#i', '', $prenom);// filter everything but letters and numbers
    if((strlen($nom) > 20 && strlen($nom) <3)|| (strlen($nom) < 3 && strlen($prenom) > 20)){
        echo '3 caracteres au minimum.';
        exit();
    }
    if(is_numeric($nom[0]) and is_numeric($prenom[0])){
        echo 'le nom ou le prenom doit commencer par une lettre.';
        exit();
    }

}
if(!empty($_POST['telephone']) and is_numeric($_POST['telephone'])){
    $telephone=$_POST['telephone'];
    if(strlen($telephone) < 10 || strlen($telephone) > 16){
        echo '10 chiffres au minimum pour le telephone.';
        exit();
    }
    if(!is_numeric($telephone[0])){
        echo 'le numero de telephone doit commencer par une un chiffre.';
        exit();
    }

    $q = Connexion::getConnexion()->prepare('SELECT idProfil FROM professionnels WHERE telephone = ?');
    $q->execute(array($_POST['telephone']));
    $numRows = $q->rowCount();
    if($numRows > 0){
        echo 'ce numero de telephone est déjà utilisé !';
        exit();
    }
}
    if(!empty($_POST['situationProfessionnelle']) and $_POST['situationProfessionnelle']==SITUATION_PROFESSIONNELLE_SALARIER){
            if(!empty($_POST['nom'])
                and !empty($_POST['prenom'])
                and !empty($_POST['genre'])
                and !empty($_POST['telephone'])
                and !empty($_POST['pays'])
                and !empty($_POST['ville'])
                and !empty($_POST['adresse'])
                and !empty($_POST['situationProfessionnelle']))

            {

                extract($_POST);


                if (!empty($etatEmploi)) {
                    $etatEmploi = 1;
                } else {
                    $etatEmploi = 0;
                }

                $professionnel=new Professionnels(0,$id,$nom,$prenom,$genre,$adresse,$ville,$pays,$telephone,$situationProfessionnelle,$etatEmploi,11,12);
                Professionnels::createProfil($professionnel);


                header('Location: ../view/professionnel/moncompte.php?' . ID_USER . '=' . $_SESSION['id'] . '&tsdgjsdvysdjhsgdhsfdy=' . md5($_SESSION['pseudo']));

            }
            else{
                echo 'verifiez que tous vos champs sont bien remplis';
            }
    }
    /*elseif(!empty($_POST['situationProfessionnelle']) and $_POST['situationProfessionnelle']==SITUATION_PROFESSIONNELLE_NON_SALARIER){
        if(!empty($_POST['nom'])
            and !empty($_POST['prenom'])
            and !empty($_POST['genre'])
            and !empty($_POST['telephone'])
            and is_numeric($_POST['telephone'])
            and !empty($_POST['pays'])
            and !empty($_POST['ville'])
            and !empty($_POST['adresse'])
            and !empty($_POST['situationProfessionnelle'])
            and !empty($_POST['dateDebutE'])
            and !empty($_POST['dateFinE'])
            and !empty($_POST['nomPostE'])
            and !empty($_POST['nomEntrepriseE'])
            and !empty($_POST['secteurActiviteE'])
            and !empty($_POST['descriptionE']))
        {

            extract($_POST);

            if (!empty($etatEmploi)) {
                $etatEmploi = 1;
            } else {
                $etatEmploi = 0;
            }

            $stat1 = $con->prepare("INSERT INTO professionnels(idUtilisateur, nom,prenom, genre,adresse,ville,pays,telephone,situationProfessionnelle,etatEmploi,avatar,dateCreation)
                VALUES(?,?,?,?,?,?,?,?,?,?,'avatar_professionel.png',now());
                ");
            $stat1->bindParam(1, $id);
            $stat1->bindParam(2, $nom);
            $stat1->bindParam(3, $prenom);
            $stat1->bindParam(4, $genre);
            $stat1->bindParam(5, $adresse);
            $stat1->bindParam(6, $ville);
            $stat1->bindParam(7, $pays);
            $stat1->bindParam(8, $telephone);
            $stat1->bindParam(9, $situationProfessionnelle);
            $stat1->bindParam(10, $etatEmploi);
            $stat1->execute();


            $stat3 = $con->prepare("insert into experiences(idProfil,dateDebut,dateFin,titrePost,nomEntreprise,description,dateCreation) values(?,?,?,?,?,?,?,now())");
            $stat3->bindParam(1, $id);
            $stat3->bindParam(2, $dateDebutE);
            $stat3->bindParam(3, $dateFinE);
            $stat3->bindParam(4, $nomPostE);
            $stat3->bindParam(5, $nomEntrepriseE);
            $stat3->bindParam(6, $secteurActiviteE);
            $stat3->bindParam(7, $descriptionE);
            $stat3->execute();

            header('Location: ../view/professionnel/moncompte.php?' . ID_USER . '=' . $_SESSION['id'] . '&tsdgjsdvysdjhsgdhsfdy=' . md5($_SESSION['pseudo']));

        }
        else{
            echo 'verifiez que tous vos champs sont bien remplis';
        }
    }*/

?>
