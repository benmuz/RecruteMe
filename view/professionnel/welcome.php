<?php
session_start();
//include_once '../header.php';
include_once '../../globals/situationProfessionnel.php';
include_once '../header.php';
include '../../globals/getId.php';
include_once '../partial_nav.php';
?>
<style>
    body{
        padding-top: 5rem;
    }
    .menu1,.menu2,.menu3,.menu4{
        display: none;
        height: 20rem;
    }
    .menu{
        height: 20rem;
    }
    .box-profil_container{
        min-height: 33rem;
    }
    .home,.profil,.compte{
        background-color: #052D6D;!important;
        color: #fff;!important;
        border-radius: 50%;
        text-align: center;
    }
</style>
<body>
<?php if(isset($_SESSION['id'])):?>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3> <?=$_SESSION['nom'].' '.$_SESSION['prenom']?>,<br>juste une deriere étape</h3>
                <div class="featurette-divider"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="btn-group-vertical btn-group-md">
                            <a class="btn" href="#">
                            <i class="fa fa-home" style="font-size: 100px"></i>
                                <h3>ACCUEIL</h3>
                            </a>
                            <a class="btn" href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">
                                <i class="fa fa-user" style="font-size: 100px"></i>
                                <h3>MON PROFIL</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="featurette-heading">
            </div>
            <div class="col-7 box-profil_container animated bounceInDown">
                <h3>Le recruteurs aiment ...</h3>
                <div class="featurette-divider"></div>
                <div class="menu">
                    <h4><b>1. Un profil complété</b></h4>
                    <div class="featurette-divider"></div>
                    <p>C’est simple : plus votre profil est rempli, plus facilement vous serez trouvé par les recruteurs.
                        En plus, si celui-ci arrive sur un profil incomplet, il fera simplement demi-tour! Les
                        recruteurs veulent trouver sur votre profil les détails de votre carrière professionnelle,
                        . Ne soyez donc pas paresseux et prenez le temps de
                        remplir les champs laissés vide : vos compétences, votre expérience, votre éducation etc.
                        </p>
                </div>
                <div class="menu1" >
                    <div class="featurette-divider"></div>
                    <p><b>2. Votre photo</b><br>
                        Même si cela peut sembler futile, ajouter une à votre profil Rec-congo est important pour
                        deux raisons.<br>
                        <b>&dbkarow;&nbsp;photo</b><br>
                        Tout d’abord, car c'est plus . Par exemple pour vérifier que vous connaissez bien les
                        gens qui veulent vous ajouter ou pour retrouver des personnes
                        vous êtes ainsi sûr de vous adresser à la bonne personne.<br>
                        <b>&dbkarow;&nbsp;pratique homonymes</b><br>
                        Ensuite, parce que <?=WEBSITE_NAME?> est un site de contact professionel et que c'est plus facile de se lier aux
                        personnes quand on peut : cela rend les contacts plus
                        humains. Choisissez donc une photo mais pour illustrer votre
                        profil.
                    </p>
                </div>
                <div class="menu2" >
                    <div class="featurette-divider"></div>
                    <p><b>3. Votre réseau</b><br>
                        Si vous avez moins de 50 relations sur votre profil Rec-Congo, le recruteur peut s’imaginer trois
                        choses.<br>
                        &dbkarow;&nbsp;Vous êtes peu sociable et vous connaissez très peu de monde.<br>
                        &dbkarow;&nbsp;Vous n’aimez pas vous connecter aux autres, vous êtes un peu paranoïaque.<br>
                        &dbkarow;&nbsp;La technologie et les médias sociaux vous effraient.<br>
                        Dans les trois cas, cela peut vous porter préjudice. Il n’est pas pour autant question de
                        collectionner les relations sans importance pour gonfler votre réseau, mais essayez d’avoir au
                        moins une centaine de contacts pertinents pour commencer.
                    </p>
                </div>
                <div class="menu3" >
                    <div class="featurette-divider"></div>
                    <p>
                        <b>4. Votre passion et votre enthousiasme</b><br>
                        Les employeurs veulent engager des gens qui sont passionnés par ce qu’ils font. Pour
                        communiquer votre enthousiasme, rejoignez des groupes liés à votre champ d’expertise,
                        annoncez vos missions actuelles dans votre statut, partagez articles des intéressants,...
                    </p>
                </div>
                <div class="menu4">
                    <div class="featurette-divider"></div>
                    <p><b>5. Des recommandations</b><br>
                        Les témoignages de personnes tierces ont beaucoup de poids sur votre profil LinkedIn (si ils
                        sont positifs, bien sûr). Sollicitez quelques personnes-clés en étant assez précis sur le type de
                        recommandation que vous souhaiteriez (compétences, enthousiasme, relater une mission
                        précise,...) sans pour autant lui dicter quoi écrire, bien évidemment.
                        témoignages de personnes tierces
                        personnes-clés
                    </p>
                </div>
                <hr class="featurette-heading">
                <div class="offset-4 col-4">
                    <div class="btn-group text-center">
                        <a class="btn btn-danger btn-custom " href="#" id="menu"><i class="fa fa-user"></i></a>
                        <a class="btn btn-info" href="#" id="menu1"><i class="fa fa-image"></i></a>
                        <a class="btn btn-success" href="#" id="menu2">3</a>
                        <a class="btn btn-primary" href="#" id="menu3">4</a>
                        <a class="btn btn-warning" href="#" id="menu4">5 </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>window.jQuery || document.write('<script src="../static/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../static/dist/js/jquery3.1.1.js"></script>
    <!--<script src="../libraries/uploadify/jquery.uploadify.js"></script>-->
    <script src="../static/assets/js/vendor/popper.min.js"></script>
    <script src="../static/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../static/assets/js/vendor/holder.min.js"></script>
    <?php else:header('Location:../index.php')?>
    <?php endif;?>
</body>
</html>
<script>
    $(document).ready(function () {

        $('#menu').click(function () {
            $('.menu').fadeIn(1500);
            $('.menu1, .menu2, .menu3, .menu4').hide();
        });
        $('#menu1').click(function () {
            $('.menu, .menu2, .menu3, .menu4').hide();
            $('.menu1').fadeIn(1500);
        });
        $('#menu2').click(function () {
            $('.menu1, .menu, .menu3, .menu4').hide();
            $('.menu2').fadeIn(1500);
        });
        $('#menu3').click(function () {
            $('.menu1, .menu2, .menu, .menu4').hide();
            $('.menu3').fadeIn(1500);
        });
        $('#menu4').click(function () {
            $('.menu1, .menu2, .menu3, .menu').hide();
            $('.menu4').fadeIn(1500);
        });


    });

</script>