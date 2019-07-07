<?php
session_start();
//include_once '../header.php';
include_once '../../globals/situationProfessionnel.php';
include_once '../header.php';
include_once '../../globals/getId.php';
include '../partial_nav.php';
?>

<body class="">
<?php if(isset($_SESSION['pseudo'])):?>
    <div class="container">
        <div class="row" style="padding: 9.7rem 0">
            <div class="col-3 text-center">
                <figure>
                    <img src="../static/img/contents/setting.jpg" width="300" class="img-fluid animated wobble">
                </figure>
            </div>
            <div class="col-9">
                <div class="notice">
                    <h1 style="color: #cc0000">Hum, une petite verification <span style="color: #0a0333"><?=$_SESSION['pseudo']?></span></h1>
                </div>
                <div class="featurette-divider"></div>
                <div class="animated rubberBand">

                    <h3>Vous ne pouvez pas acceder dans votre session avant de pouvoir créer votre profil professionnel.</h3>
                    <h4 style="color: #000"><b>Si vous vous etes déjà inscrit et n'arrivez toujours pas à acceder à votre session, voici 3 choses à verifier</b></h4>
                    <h5>- Réessayer ultérieurement</h5>
                    <h5>- Vérifier votre connexion au réseau.</h5>
                    <h5>- Cliquer sur ce lien <a style="color:#052D6D" class="" href="creationProfil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>"> Création de mon profil</a></h5>
                    sinon cliquez <a href="../../">sur ce lien</a>  pour plus tard
                </div>
            </div>
        </div>
    </div>


    <script>window.jQuery || document.write('<script src="../static/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../static/dist/js/jquery3.1.1.js"></script>
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

        choix();
        function choix() {
            $('.chercheur').click(function () {
                $('#chercheurEmplois').slideDown(400);
                $('#salarier').slideUp();
            });
            $('.salarier').click(function () {
                $('#chercheurEmplois').slideUp();
                $('#salarier').slideDown(400);
            });
        }
        <?php $timestamp = time();?>


    });

</script>