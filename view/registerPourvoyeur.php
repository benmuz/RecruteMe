<?php
    include 'partial_header.php';
?>
<style>

    .an{
        padding-top: 2rem;
        color: #fff;
    }
    .content{
        background-image:url('static/img/recruteur.png');
        background-position: left;
        background-size: 75%;
        background-repeat: no-repeat;
        padding: 8rem;
        margin-top: 3rem;
        background-color: #7f7f7f;
    }

    #status{
        display: none;
    }
</style>
<body>
    <?php include "navindex.php";?>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-8 ph" style="padding-top: 5rem ;color:#fff">
                    <h3 class="an">plus des entreprises ont deja fait leur choix et elles ne regretent pas jusqu'à ce jour</h3>
                </div>
                <!-- Modal content-->
                <div class="col-4 animated slideInDown">
                    <div class="card" style="border-radius: inherit;">
                        <div class="card-body">
                            <div>
                                <form id="register_form" onsubmit="return false;">
                                    <input type="hidden" id="typecompte" name="typecompte" value="<?=TYPE_COMPTE_POURVOYEUR?>" readonly/>
                                    <div class="input-group mb-2">
                                        <label>Votre Pseudo</label>
                                        <input type="text" class="form-control-input" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" required/>
                                        <small id="output_checkuser"></small>
                                    </div>
                                    <div class="input-group mb-2">
                                        <label>Adresse E-mail</label>
                                        <input type="email" class="form-control-input" placeholder="johndoe@exemple.com" id="email" name="email" required/>
                                        <small id="output_email"></small>
                                    </div>
                                    <div class="input-group mb-2">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control-input form-control-input" id="pass1" name="pass1" placeholder="mot de passe" required/>
                                        <small id="output_pass1"></small>
                                    </div>
                                    <div class="input-group mb-2">
                                        <label>Comfirmation Mot de passe</label>
                                        <input type="password" class="form-control-input"  id="pass2" name="pass2" required placeholder="confirmer le mot de pass"/>
                                        <small class="input-prepend" id="output_pass2"></small>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="bRegister" class="btn btn-success form-control" value="INSCRIPTION" />
                                    </div>
                                </form>
                                <div class="featurette-divider"></div>
                                <p id="status"> remplissez tous les champs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'foot.php';?>
    <!--== la division de modal de login==-->
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content card" style="border-radius: inherit;">
                <div class="modal-header card-header" style="padding:5px 10px;color:#fff;border-radius: inherit">
                    <button type="button" class="close" data-dismiss="modal" style="color: red;"><i class="fa fa-close"></i> </button>
                </div>
                <div class="modal-body card-body" style="padding:40px 30px;">
                    <div>
                        <!--"-->
                        <?php
                        if(isset($_GET['msg']) and !empty($_GET['msg'])){
                            if(is_numeric($_GET['msg']) and $_GET['msg']==1)
                            {
                                echo '<p class="alert alert-danger">tous les champs sont obligatoires</p>';
                            }
                        }
                        ?>
                        <form  method="post" id="login_form" action="../controller/login.php">
                            <div class="form-group">
                                <label for="pseudo" style="color: #052D6D;"><i class="fa fa-user"></i> PSEUDO</label>
                                <input type="text" name="pseudo" class="form-control-input" id="pseudo" placeholder="Entrez votre Pseudo">
                                <small id="output_checkuser"></small>
                            </div>
                            <div class="form-group">
                                <label for="password" style="color: #052D6D;"><i class="fa fa-key"></i> PASSWORD</label>
                                <input type="password" name="password" class="form-control-input" id="password" placeholder="mot de passe">
                                <small id="output_checkuser"></small>
                            </div>
                            <div class="form-group">
                                <p><a href="#">Mot de passe oublié?</a></p>
                            </div>
                            <div class="error"></div>
                            <div class="form-group">
                                <button type="submit"  id="login" name="login" class="btn btn-nav form-control">CONNEXION</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================================================== -->
    <?php include 'footerindex.php';?>
    <!--== fin ==-->
    <script>
        $(document).ready(function () {
            fadeimg();
            function fadeimg(){
                var folder="tfc/static/img";
                var count=0;
                var images=["../static/img/recrutement.jpg","../static/img/Recrutement-.jpg","../static/img/recrutement2.png"];
                var image=$('.fader');

                image.css(
                    "background-image","url("+images[count]+")"
                )
                setInterval(function () {
                    image.fadeOut(400,function () {
                        image.css("background-image","url("+images[count++]+")");
                        image.fadeIn(300);
                    });
                    if(count==images.length){
                        count=0;
                    }
                },6000);
            }

            $('#link_login').click(function () {
                $('#login').modal({backdrop: "static"});
            });

        });
    </script>
    <!-- le script de l'inscription de pourvoyeur-->
    <script>
        $(document).ready(function(){

            $(".btn_inscriptionPourvoyeur").focus(function(){
                $("#inscriptionPourvoyeur").modal();
            });
            $("#register_form input").focus(function(){
                $("#status").fadeOut(800);
            });

            $("#pseudo").focusout(function(){
                //On vérifie si le pseudo est ok ou n'a pas été déjà pris
                check_pseudo();
            });

            $("#pass1").keyup(function(){
                //On vérifie si le mot de passe est ok
                if($(this).val().length < 6){
                    $("#output_pass1").css("color", "darkred").html("Trop court (6 caractères minimum)");
                } else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()){
                    $("#output_pass1").html("Les deux mots de passe sont différents");
                    $("#output_pass2").html("Les deux mots de passe sont différents");
                } else {
                    $("#output_pass1").html('');
                }
            });

            $("#pass2").keyup(function(){
                //On vérifie si les mots de passe coïncident
                check_password();
            });

            $("#email").focusout(function(){
                //On vérifie si les mots de passe coïncident
                check_email();
            });

            function check_pseudo(){
                $.ajax({
                    type: "post",
                    url:  "../controller/signup.php",
                    data: {
                        'pseudo_check' : $("#pseudo").val()
                    },
                    success: function(data){
                        if(data == "success"){
                            $("#output_checkuser").html('');
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
                    url:  "../controller/signup.php",
                    data: {
                        'pass1_check' : $("#pass1").val(),
                        'pass2_check' : $("#pass2").val()
                    },
                    success: function(data){
                        if(data == "success"){
                            $("#output_pass2").html('');
                            $("#output_pass1").html('');
                        } else {
                            $("#output_pass2").css("color", "darkred").html(data);
                        }
                    }
                });
            }

            function check_email(){
                $.ajax({
                    type: "post",
                    url:  "../controller/signup.php",
                    data: {
                        'email_check' : $("#email").val()
                    },
                    success: function(data){
                        if(data == "success"){
                            $("#output_email").html('');
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
                        url:  "../controller/signup.php",
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
                                setTimeout('window.location.href="pourvoyeur/create_pourv.php?<?=ID_USER?>";');
                            }
                        }
                    });
                }
            });

        });
    </script>

</body>

</html>