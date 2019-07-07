<?php
require_once '../globals/typeCompte.php';
include '../include/header.php';
//include"../controller/inscription.php";
?>
<!--<body id="body-login">

<div class="login-box">
    <a href="index.php"><img src="../static/img/favicons/android-chrome-192x192.png" class="avatar animated hinge jackInTheBox"></a>
    <h3 class="<!--animated bounceInLeft-->">Creation du compte Professionnel</h3>
    <!--<div class="form">
        <form data-parsley-validate autocomplete="off" id="register_form"  name="inscription" onsubmit="return false;">
            <input type="text"  name="pseudo" id="pseudo" class="register" placeholder="pseudo" autocomplete="false" required="required">
            <small id="output_checkuser"></small>
            <input type="email" data-parsley-trigger="change" name="email" id="email" class="register" placeholder="e-mail" autocomplete="false" required="required">
            <small id="output_email"></small>
            <input type="password" data-parsley-trigger="keypress" name="pass1" id="pass1" class="register" placeholder="mot de passe" required="required">
            <small id="output_pass1"></small>
            <input type="password" name="pass2" id="pass2" class="register" placeholder="confirmation mot de passe" required="required">
            <small id="output_pass2"></small>
            <input type="hidden"  data-parsley-trigger="keypress" name="typecompte" id="typecompte" value="<?/*/*=TYPE_COMPTE_PROFESSIONEL*/?>">
            <br>
            <input type="checkbox" name="acceptation" class="register acceptation" id="acceptation" value="oui" checked="checked">
                <label class="acceptation" style="color: #dadada;" for="acceptation"> j'accepte les regles de confidentialité</label>
            <small id="output_check"></small>
            <input type="submit" id="bRegister" name="bRegister" value="inscription" class="btn">
        </form>
    </div>

</div>
<div id="status" class="text-center animated slideInLeft" style="z-index:100;color: #fff;">
    <p>tous les champs sont obligatoire</p>
</div>-->

<form id="register_form" onsubmit="return false;">
    <p>
        <label for="pseudo">Pseudo:</label>
        <input type="text" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" required/><br>
        <small id="output_checkuser"></small>
        <label for="email">Adresse électronique:</label>
        <input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/><br>
        <small id="output_email"></small>
        <label for="pass1">Mot de passe:</label>
        <input type="password" id="pass1" name="pass1" required/><br>
        <small id="output_pass1"></small>
        <label for="pass2">Confirmer votre mot de passe:</label>
        <input type="password" id="pass2" name="pass2" required/>
        <small id="output_pass2"></small>

    <div id="status">
        Remplir tous les champs
    </div>
        <input type="submit" id="bRegister" class="btn btn-success" value="Inscription" />
    </p>
</form>
<?php include '../include/footer.php';?>
<script src="../view/static/dist/js/validation.js"></script>
