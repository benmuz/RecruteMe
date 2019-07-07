<?php
include '../globals/typeCompte.php';
?>
<form id="register_form" onsubmit="return false" method="get" >
    <div>
        <input type="hidden"  name="typecompte" id="typecompte" value="<?=TYPE_COMPTE_PROFESSIONEL?>">
        <label for="pseudo">Pseudo:</label>
        <input type="text" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" required/><br>
        <small id="output_checkuser"></small><br>
        <label for="email">Adresse électronique:</label>
        <input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/><br>
        <small id="output_email"></small><br>
        <label for="pass1">Mot de passe:</label>
        <input type="password" id="pass1" name="pass1" required/><br>
        <small id="output_pass1"></small><br>
        <label for="pass2">Confirmer votre mot de passe:</label>
        <input type="password" id="pass2" name="pass2" required/>
        <small id="output_pass2"></small><br>
        <br>
        <div id="status">
        Remplir tous les champs
        </div>
        <input type="submit" id="bRegister" name="bRegister" class="btn btn-success" value="Inscription" />
    </div>
</form>
<?php
    include '../include/footer.php';
?>
<script>
    $(document).ready(function () {
        $("#status").fadeOut(8000);

        $("#register_form input").focus(function(){
            $("#status").fadeOut(800);
        });
//--------------------------traitement du pseudo---------------------------------------//
        $("#pseudo").keyup(function(){
        //On vérifie si le pseudo est ok ou n'a pas été déjà pris
            check_pseudo();
        });
        function check_pseudo(){

            $.ajax({
                type: "get",
                url:  "../controller/register.controller.php",
                data: {
                    'pseudo' : $("#pseudo").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_checkuser").html('<img src="../view/static/img/check.png" class="small_image" alt="" width="15" style="margin-top: -35px"/>');
                        return true;
                    } else {
                        $("#output_checkuser").css("color", "#cc0000").html(data);
                    }
                }
            });
        }
//--------------------------fin traitement du pseudo---------------------------------------//
//------------------------------triatement de l'email-------------------------------------//
        $("#email").keyup(function(){
            //On vérifie si les mots de passe coïncident
            check_email();
        });

        function check_email(){

            $.ajax({
                type: "get",
                url:  "../controller/register.controller.php",
                data: {
                    'email' : $("#email").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_email").html('<img src="../view/static/img/check.png" class="small_image" alt="" width="15" style="margin-top: -35px"/>');
                    } else {
                        $("#output_email").css("color", "#cc0000").html(data);
                    }
                }
            });
        }

        //------------------------------traitement du password-------------------------------------//

        $("#pass1").keyup(function(){

            //On vérifie si le mot de passe est ok
            if($(this).val().length < 6){
                $("#output_pass1").css("color", "red").html("Trop court (6 caractères minimum)");
            } else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()){
                $("#output_pass1").html("Les deux mots de passe sont différents");
                $("#output_pass2").html("Les deux mots de passe sont différents <br>");
            } else {
                $("#output_pass1").html('<img src="../view/static/img/check.png" class="small_image" width="15" style="margin-top: -35px" />');

            }

        });

        $("#pass2").keyup(function(){
            //On vérifie si les mots de passe coïncident
            check_password();
        });

        function check_password(){

            $.ajax({
                type: "get",
                url:  "../controller/register.controller.php",
                data: {
                    'pass1_check' : $("#pass1").val(),
                    'pass2_check' : $("#pass2").val()
                },
                success: function(data){
                    if(data == "success"){
                        $("#output_pass2").html('<img src="../view/static/img/check.png" class="small_image" alt="" width="15" style="margin-top: -35px" />');
                        $("#output_pass1").html('<img src="../view/static/img/check.png" class="small_image" alt=""  width="15" style="margin-top: -35px"/>');
                    } else {
                        $("#output_pass2").css("color", "red").html(data);
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
            var typecompte=$("#typecompte").val();

            if(pseudo == "" || pass1 == "" || pass2 == "" || email == "" ){
                status.html("Veuillez remplir tous les champs").fadeIn(400);
            }
            else if(pass1 != pass2) {
                status.html("Les deux mots de passe sont différents").fadeIn(400);
            }
            else {

                $.ajax({
                    method: "get",
                    url:  "../controller/register.controller.php",
                    data: {
                        'pseudo' : pseudo,
                        'pass1' : pass1,
                        'email' : email
                    },
                    success: function(data){
                        if(data=="success"){
                            alert('dhghjfd');
                        } else {
                            status.css("color", "#cc0000").html(data);
                        }
                    }
                });
            }
        });
    });
</script>