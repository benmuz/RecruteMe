<?php 
//Vérification du pseudo
/*if(!empty($_POST['pseudo_check'])){
	$pseudo = $_POST['pseudo_check'];
	$pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
	if(strlen($pseudo) < 3 || strlen($pseudo) > 16){
		echo '<br/>3 à 16 caractètres SVP.';
		exit();
	}
	if(is_numeric($pseudo[0])){
		echo '<br/>Le pseudo doit commencer par une lettre.';
		exit();
	}
	
	//Connexion à la base de données
	require "includes/connect_db.php";
	
	$q = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
	$q->execute(array($pseudo));
	
	$numRows = $q->rowCount();
	if($numRows > 0){
		echo '<br/>Pseudo déjà utilisé !';
		exit();
	} else {
		echo 'success';
		exit();
	}
}

//Vérification des mots de passe
if(!empty($_POST['pass1_check']) && !empty($_POST['pass2_check'])){
	if(strlen($_POST['pass1_check']) < 6 || strlen($_POST['pass1_check'])  < 6){
		echo '<br/>Trop court (6 caractères minimum)';
		exit();
	} else if($_POST['pass1_check'] == $_POST['pass2_check']){
		echo 'success';
		exit();
	} else {
		echo '<br/>Les deux mots de passe sont différents';
		exit();
	}

}

//Vérification de l'email
if(!empty($_POST['email_check'])){
	$email = $_POST['email_check'];
	
	//Vérifier l'adresse mail
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  
		echo '<br/>Adresse email invalide !';
		exit();
	}
	//Connexion à la base de données
	require "includes/connect_db.php";
	
	$q = $db->prepare('SELECT id FROM users WHERE email = ?');
	$q->execute(array($email));
	
	$numRows = $q->rowCount();
	if($numRows > 0){
		echo '<br/>Adresse email déjà utilisée !';
		exit();
	} else {
		echo 'success';
		exit();
	}
}

//Traitement de l'inscription
if(isset($_POST['pseudo'])){
	//require "includes/connect_db.php";
	extract($_POST);
	$pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
    $pseudo_check=Users::checkPseudoUser();
    //tester si l'email exite deja
    $email_check=Users::checkEmailUser();
	//$q = Connexion::getConnexion()->prepare('SELECT id FROM users WHERE pseudo = ?');
	//$q->execute(array($pseudo));
	//$pseudo_check = $q->rowCount();
	
	//$q = Connexion::getConnexion()->prepare('SELECT id FROM users WHERE email = ?');
	//$q->execute(array($email));
	//$email_check = $q->rowCount();
	
	if(empty($nom) || empty($prenom) || empty($pseudo)|| empty($pass1) || empty($pass2) || empty($email)){
		echo "Tous les champs n'ont pas été remplis.";
	} else if($pseudo_check > 0) {
		echo "Pseudo déjà utilisé";
	} else if($email_check > 0) {
		echo "Cette adresse mail est déjà utilisée";
	} else if(strlen($pseudo) < 3 || strlen($pseudo) > 16) {
		echo "Pseudo éronné !";
	}  else if(is_numeric($pseudo[0])) {
		echo "Le pseudo doit commencer par une lettre.";
	}  else if($pass1 != $pass2) {
		echo "Les mots de passe ne correspondent pas.";
	} else {
		$hash_pass = sha1($pass1);
		$q = $db->prepare('INSERT INTO users(pseudo, email, password, ip, created)
						   VALUES(:pseudo, :email, :password, :ip, now())');
		$q->execute(array(
			'pseudo' => $pseudo,
			'email' => $email,
			'password' => $hash_pass,
			'ip' => $_SERVER['REMOTE_ADDR']
		));	
		
		$user_id = $db->lastInsertId();

		if(!file_exists( "members/$user_id")){
			mkdir("members/$user_id", 0755);
		}

			echo 'success';

		exit();
	}
	exit();
}*/
?>

<?php

require_once '../globals/database.php';
require_once '../model/Connexion.class.php';
require_once '../model/Users.class.php';
require_once '../model/ProfilProfessionel.class.php';
require_once '../globals/typeCompte.php';

//Vérification du pseudo
if(!empty($_GET['pseudo_check'])){
    $pseudo = $_GET['pseudo_check'];
    $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
    if(strlen($pseudo) < 6 || strlen($pseudo) > 15){
        echo '6 à 15 caractètres SVP.';
        exit();
    }
    if(is_numeric($pseudo[0])){
        echo 'Le pseudo doit commencer par une lettre.';
        exit();
    }
    //tester si le pseudo exite deja lorsque on s'inscrit
    $connexion=Connexion::getConnexion();
    $query= $connexion->prepare('SELECT id FROM t_users WHERE pseudo=?');
    $query->execute(array($pseudo));
    $pseudo_check=$query->rowCount();

    if ($pseudo_check >0){
        echo 'ce pseudo est déjà utilisé !';
        exit();
    } else {
        echo 'success';
        exit();
    }
}
//Vérification de l'email
if(!empty($_GET['email_check'])){
    $email = $_GET['email'];

    //Vérifier l'adresse mail
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'Adresse email invalide !';
        exit();
    }
    //Connexion à la base de données
    $connexion=Connexion::getConnexion();
    $query= $connexion->prepare('SELECT id FROM t_users WHERE email=?');
    $query->execute(array($email));
    $email_check=$query->rowCount();

    if($email_check > 0){
        echo 'Adresse email déjà utilisée !';
        exit();
    } else {
        echo 'success';
        exit();
    }
}
//Vérification des mots de passe
if(!empty($_GET['pass1_check']) && !empty($_GET['pass2_check'])){
    if(strlen($_GET['pass1_check']) < 6 || strlen($_GET['pass1_check'])  < 6){
        echo 'Mot de passe trop court (6 caractères minimum)';
        exit();
    } else if($_GET['pass1_check'] == $_GET['pass2_check']){
        echo 'success';
        exit();
    } else {
        echo 'Les deux mots de passe sont différents';
        exit();
    }

}

//Traitement de l'inscription
/*if(isset($_POST['pseudo'])){
    require "includes/connect_db.php";
    extract($_POST);
    $pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); // filter everything but letters and numbers
    $q = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
    $q->execute(array($pseudo));
    $pseudo_check = $q->rowCount();

    $q = $db->prepare('SELECT id FROM users WHERE email = ?');
    $q->execute(array($email));
    $email_check = $q->rowCount();

    if(empty($nom) || empty($prenom) || empty($pseudo)|| empty($pass1) || empty($pass2) || empty($email)){
        echo "Tous les champs n'ont pas été remplis.";
    } else if($pseudo_check > 0) {
        echo "Pseudo déjà utilisé";
    } else if($email_check > 0) {
        echo "Cette adresse mail est déjà utilisée";
    } else if(strlen($pseudo) < 3 || strlen($pseudo) > 16) {
        echo "Pseudo éronné !";
    }  else if(is_numeric($pseudo[0])) {
        echo "Le pseudo doit commencer par une lettre.";
    }  else if($pass1 != $pass2) {
        echo "Les mots de passe ne correspondent pas.";
    } else {
        $hash_pass = sha1($pass1);
        $q = $db->prepare('INSERT INTO users(pseudo, email, password, ip, created)
						   VALUES(:pseudo, :email, :password, :ip, now())');
        $q->execute(array(
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $hash_pass,
            'ip' => $_SERVER['REMOTE_ADDR']
        ));

        $user_id = $db->lastInsertId();

        if(!file_exists( "members/$user_id")){
            mkdir("members/$user_id", 0755);
            echo 'register_success';
        }
        exit();
        /*$to = $email;
        $from = "auto-responder@congorecrutement.com";
        $subject = "CONGO RECRUTEMENT - Activation de votre compte";
        $message = "<!DOCTYPE html>
					<html>
						<head>
							<meta charset=\"UTF-8\" />
						</head>
						<body>
							Hi $pseudo,<br/><br/>

						   <h2>Complétez cette dernière étape pour activer votre compte <strong>TDN SOCIAL NETWORK</strong>!</h2>
						   <p>Pour ce faire, il suffit de cliquez sur le lien suivant:<br/>

						   http://teachersdunet.com/activation.php?id=$user_id&amp;u=$pseudo&amp;e=$email&amp;ssl=$hash_pass<br/>
						   Si l'URL n'apparait pas comme un lien actif, veuillez SVP copier/coller ce
						   dernier dans la barre d'adresse de votre navigateur internet.</p>

						   <h2>Indentifiants de connexion:</h2>
						   <p>
								Adresse e-mail: $email<br/>
								Mot de passe:       $pass1<br/>
						   </p>
						   <p>Rendez-vous sur le site <a href=\"http://teachersdunet.com\">TDN SOCIAL NETWORK</a></p>
						</body>
					</html>";

        $headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";*/
        /*if(mail($to, $subject, $message, $headers)){

            else {
                //On supprime le compte de la bdd vu qu'il ne sert plus à rien
                $q = $db->prepare("DELETE FROM users WHERE id = ?");
                $q->execute(array($user_id));
                echo "Erreur lors de l'envoi du mail.";
        }

    }
    exit();
}*/
?>

