<?php
    include 'partial_header.php';
?>
<style>
    .ul-footer li{
        display: -ms-flexbox;
        flex-wrap: wrap;
        align-items: center;
        display: flex;
        text-align: left;
        padding-top: 1rem;


    }
    .ul-footer li a{
        font-size: 1.5em;
    }
    a.a-footer{
        text-decoration: none;
    }
    a.a-footer:hover{
        text-decoration: none;
        color:#dcdcdc
    }
    .service{
        background:url('../view/static/img/grid-pic2h.jpg') no-repeat;
        background-position: center;
        background-size: cover;
    }
</style>
<body>
    <?php include "navindex.php";?>
    <div class="container">
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <div class="div-sinscrire">
                    <a href="registerProfessionel.php" class="btn btn-nav btn-sm">
                        ENTANT QUE PROFESSIONNEL
                    </a><br><br>
                    <a href="registerPourvoyeur.php" class="btn btn-success btn-sm">
                        ENTANT QUE RECRUTEUR
                    </a>
                </div>
                <div class="btn-group btn-group-md sinscrire">
                    <a class="btn btn-success btn-sinscrire" href="#">S'INSCRIRE</a>
                </div>
            </div>
        </div>
    </div>
    <div role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <div class="col-sm-10">
                            <h1 class="animated bounceInRight">UN CHERCHEUR D'EMPLOI ?</h1>
                            <p class="animated rotateInUpRight">
                                Point question de se depasser et se deplacer pour trouver de l'emploi,
                                commencer des maintenant a creer votre profil professionnel et concevoir votre cv
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <div class="col-sm-12">
                            <h1 class="animated bounceInDown">VOUS ETES UN RECRUTEUR ?</h1>
                            <p class="animated bounceInUp">
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id
                                elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption text-left row">
                        <div class="col-sm-12">
                            <h1 class="animated bounceInDown">VOUS ETES ENFIN TOUS EN CONTACT</h1>
                            <p class="animated bounceInRight">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>-->
    </div>
    </div>
    <div class="welcom text-center">
        <h1>Bienvenue</h1>
        <div class="container">
            <div class="row">
                <div class="offset-2 col-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet aspernatur corporis culpa deleniti dolores eligendi esse excepturi explicabo, illo libero, minus mollitia numquam quaerat quisquam rerum sequi sit ut.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="emploi">
        <h1 class="text-center">Nos services</h1>
        <div class="container">
            <div class="row" style="padding-top: 5rem">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h3 class="text-center">Search Profil</h3>
                                    <p class="text-center" style="padding-top: 1.5rem"><em><?=WEBSITE_NAME?> met a votre disposition vous etant recruteur la fonctionnalite vous permettant de trouver facile et rapidement un profil dont vous avez besoin dans votre processus de recrutement</em>
                                    </p>
                                </div>
                                <div class="col-sm-3" id="service1" style="border: 1px solid #000;">
                                    <span><i class="fa fa-users" id="fa-users"></i></span>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 1rem"></div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-3" id="service2" style="border: 1px solid #cce;">
                                    <span><i class="fa fa-address-book" id="fa-address-book"></i> </span>
                                </div>
                                <div class="col-sm-9">
                                    <h3 class="text-center">CVTheques</h3>
                                    <p class="text-center"><em>Avec <?=WEBSITE_NAME?> point question de recolter de CV qui ne satisfont pas au besoin de recrutement. recruteur, la fonctionnalite vous permettra de trouver de façon facile et rapide un CV d'un professionnel que vous avez besoin dans votre processus de recrutement</em>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'foot.php';?>
    <!--
    ===================
    les diferrent modal
    -->
    <!--== la division de modal de login==-->
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content card" style="border-radius: inherit;">
                <div class="modal-header card-header" style="padding:5px;color:#fff;border-radius: inherit">
                    <button type="button" class="close" data-dismiss="modal" style="color: red;"><i class="fa fa-close"></i> </button>
                </div>
                <div class="modal-body card-body" style="padding:40px 30px;">
                    <div>
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

    <script>
    $(document).ready(function(){

        $('.btn-sinscrire').click(function () {
            $('.div-sinscrire').toggle(500);
        });

        $('#link_login').click(function () {
            $('#login').modal({backdrop: "static"});
        });
    });
    </script>
    <!--== fin ==-->
    <script>
        $(document).ready(function () {
            fadeimg();
            function fadeimg(){
                var folder="tfc/static/img";
                var count=0;
                var images=["../static/img/recrutement.jpg","../static/img/Recrutement-.jpg","../static/img/recrutement2.png"];
                var image=$('.dd');

                image.css(
                    "background-image","url("+images[count]+")"
                )
                setInterval(function () {
                    image.fadeOut(800,function () {
                        image.css("background-image","url("+images[count++]+")");
                        image.fadeIn(600);
                    });
                    if(count==images.length){
                        count=0;
                    }
                },6000);
            }

        });
    </script>
    <!-- le script de l'inscription de pourvoyeur-->
    <script>
        $(document).ready(function(){

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

</body>

</html>