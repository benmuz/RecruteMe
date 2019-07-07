<?php $title = "Bienvenue"; ?>
<?php include "../../include/header.php"; include '../../globals/typeCompte.php'; include '../../globals/getId.php';?>

<div class="container" >
    <div class="row">
        <div class="offset-3 col-md-4">
            <div class="header-register">
                <h3><a href="../index.php">logo</a></h3>
                <small>Enregistrement</small>
            </div>
            <section id="inscription" class="">
                <div class="form">
                    <form id="register_form" onsubmit="return false;">
                        <input type="hidden" id="typecompte" name="typecompte" value="<?=TYPE_COMPTE_POURVOYEUR?>"/>
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle"></i> </span>
                                <input type="text" class="form-control-input" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" required/>
                            <small id="output_checkuser"></small>
                        </div>
                        <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-square"></i> </span>
                               <input type="email" class="form-control-input" placeholder="johndoe@exemple.com" id="email" name="email" required/>
                            <small class="input-group-addon" id="output_email"></small>
                        </div>
                        <div class="input-group">
                            <span class="input-group-append"><i class="fa fa-key"></i> </span>
                            <input type="password" class="form-control-input form-control-input" id="pass1" name="pass1" required/>
                            <small class="input-group-addon" id="output_pass1"></small>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control-input"  id="pass2" name="pass2" required/>
                            <small class="input-group-addon" id="output_pass2"></small>
                        </div>
                        <hr class="featurette-heading">
                        <div class="form-group">
                            <input type="submit" id="bRegister" class="btn btn-success" value="Inscription" />
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <div id="status">
        Remplir tous les champs
    </div>
</div>


<section id="connexion" hidden>
    <h1>Restez scotché...</h1>
    <form id="login_form" method="post" onsubmit="return false;">
        <p>
            <label for="login">Pseudo:</label>
            <input type="text" placeholder="Entrez votre pseudo" id="login" name="login" required/>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp" required/>
            <label for="cnx_persistent">
                <input type="checkbox" id="cnx_persistent" style="vertical-align: top;"/> Garder ma session active
            </label>
            <a href="#">Mot de passe oublié ?</a> <br/>
            <input type="submit" class="btn btn-primary" value="Connexion" />
        </p>
        <div id="status2">
            Remplir tous les champs
        </div>
    </form>
</section>

<script type="text/javascript" src="../static/dist/js/jquery3.1.1.js"></script>
<script>
    $(document).ready(function(){

        $("#register_form input").focus(function(){
            $("#status").fadeOut(800);
        });

        $("#pseudo").keyup(function(){
            //On vérifie si le pseudo est ok ou n'a pas été déjà pris
            check_pseudo();
        });

        $("#pass1").keyup(function(){
            //On vérifie si le mot de passe est ok
            if($(this).val().length < 6){
                $("#output_pass1").css("color", "darkred").html("<br/>Trop court (6 caractères minimum)");
            } else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()){
                $("#output_pass1").html("<br/>Les deux mots de passe sont différents");
                $("#output_pass2").html("<br/>Les deux mots de passe sont différents");
            } else {
                $("#output_pass1").html('<img src="../static/img/check.png" class="small_image" alt="" />');
            }
        });

        $("#pass2").keyup(function(){
            //On vérifie si les mots de passe coïncident
            check_password();
        });

        $("#email").keyup(function(){
            //On vérifie si les mots de passe coïncident
            check_email();
        });

        function check_pseudo(){
            $.ajax({
                type: "post",
                url:  "../../controller/signup.php",
                data: {
                    'pseudo_check' : $("#pseudo").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_checkuser").html('<img src="../static/img/check.png" class="small_image" alt="" />');
                        return true;
                    } else {
                        $("#output_checkuser").css("color", "darkred").html(data);
                    }
                }
            });
        }

        function check_password(){
            $.ajax({
                type: "post",
                url:  "../../controller/signup.php",
                data: {
                    'pass1_check' : $("#pass1").val(),
                    'pass2_check' : $("#pass2").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_pass2").html('<img src="../static/img/check.png" class="small_image" alt="" />');
                        $("#output_pass1").html('<img src="../static/img/check.png" class="small_image" alt="" />');
                    } else {
                        $("#output_pass2").css("color", "darkred").html(data);
                    }
                }
            });
        }

        function check_email(){
            $.ajax({
                type: "post",
                url:  "../../controller/signup.php",
                data: {
                    'email_check' : $("#email").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_email").html('<img src="../static/img/check.png" class="small_image" alt="" />');
                    } else {
                        $("#output_email").css("color", "darkred").html(data);
                    }
                }
            });
        }


        //Traitement du formulaire d'inscription
        $("#register_form").submit(function(){
            var status = $("#status");
            var pseudo = $("#pseudo").val();
            var pass1 = $("#pass1").val();
            var pass2 = $("#pass2").val();
            var email = $("#email").val();
            var typecompte = $("#typecompte").val();

            if(pseudo == "" || pass1 == "" || pass2 == "" || email == "" || typecompte == ""){
                status.html("Veuillez remplir tous les champs").fadeIn(400);
            } else if(pass1 != pass2) {
                status.html("Les deux mots de passe sont différents").fadeIn(400);
            } else {
                $.ajax({
                    type: "post",
                    url:  "../../controller/signup.php",
                    data: {
                        'pseudo' : pseudo,
                        'pass1' : pass1,
                        'pass2' : pass2,
                        'email' : email,
                        'typecompte' : typecompte,
                    },
                    beforeSend: function(){
                        $("#bRegister").attr("value", "Traitement en cours...");
                    },
                    success: function(data){
                        if(data != "register_success"){
                            status.html(data).fadeIn(400);
                            $("#bRegister").attr("value", "Inscription");
                            $("#bRegister").addClass("btn-primary").css("color", "white");
                        } else {
                            setTimeout('window.location.href="createPpr.php?<?=ID_USER?>";');
                        }
                    }
                });
            }
        });


        $("#login_form").submit(function(){
            var pseudo = $("#login").val();
            var pass   = $("#mdp").val();
            var status = $("#status2");

            if(pseudo == "" || pass == ""){
                status.html("Veuillez remplir tous les champs.").fadeIn(400);
            } else {
                $.ajax({
                    type: 'post',
                    url: "login.php",
                    data: {
                        'pseudo' : pseudo,
                        'pass' : pass
                    },
                    beforeSend: function(){
                        status.html("Connexion en cours...").fadeIn(400);
                    },
                    success: function(data){
                        if(data == "login_failed"){
                            status.html("Pseudo/mot de passe invalide !").fadeIn(400);
                        } else {
                            window.location = "profile.php";
                        }
                    }
                });
            }
        });
    });
</script>
<?php require "../../include/footer.php"; ?>


