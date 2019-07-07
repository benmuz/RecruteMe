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
                $("#output_pass1").css("color", "red").html("<br/>Trop court (6 caractères minimum)");
            } else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()){
                $("#output_pass1").html("<br/>Les deux mots de passe sont différents");
                $("#output_pass2").html("<br/>Les deux mots de passe sont différents");
            } else {
                $("#output_pass1").html('<img src="../../img/check.png" class="small_image" alt="" />');
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
                method: "get",
                url:  "../conttroller/register.php",
                data: {
                    'pseudo_check' : $("#pseudo").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_checkuser").html('<img src="../../img/check.png" class="small_image" alt="" />');
                        return true;
                    } else {
                        $("#output_checkuser").css("color", "red").html(data);
                    }
                }
            });
        }

        function check_password(){
            $.ajax({
                type: "get",
                url:  "../conttroller/register.php",
                data: {
                    'pass1_check' : $("#pass1").val(),
                    'pass2_check' : $("#pass2").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_pass2").html('<img src="../../img/check.png" class="small_image" alt="" />');
                        $("#output_pass1").html('<img src="../../img/check.png" class="small_image" alt="" />');
                    } else {
                        $("#output_pass2").css("color", "red").html(data);
                    }
                }
            });
        }

        function check_email(){
            $.ajax({
                type: "get",
                url:  "../../../conttroller/register.php",
                data: {
                    'email_check' : $("#email").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_email").html('<img src="../../img/check.png" class="small_image" alt="" />');
                    } else {
                        $("#output_email").css("color", "red").html(data);
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

            if(pseudo == "" || pass1 == "" || pass2 == "" || email == "" ){
                status.html("Veuillez remplir tous les champs").fadeIn(400);
            } else if(pass1 != pass2) {
                status.html("Les deux mots de passe sont différents").fadeIn(400);
            } else {
                $.ajax({
                    type: "get",
                    url:  "../conttroller/register.php",
                    data: {
                        'pseudo' : pseudo,
                        'pass1' : pass1,
                        'pass2' : pass2,
                        'email' : email,
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
                            alert('good');
                        }
                    }
                });
            }
        });


       /* $("#login_form").submit(function(){
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
        });*/
    });

