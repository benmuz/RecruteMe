<?php
session_start();
//include_once '../header.php';
include_once '../../globals/situationProfessionnel.php';
include_once '../header.php';
include_once '../../globals/getId.php';
include '../partial_nav.php';
?>
<style>

</style>
<body>
    <?php if(isset($_SESSION['pseudo'])):?>
        <div class="container">
            <div class="row" style="padding: 9.7rem 0">
                <div class="col-4 text-center">
                    <figure>
                        <img src="../static/img/contents/setting.jpg" width="300">
                    </figure>
                </div>
                <div class="col-8 box-profil_container animated slideInLeft">
                    <div class="notice">
                        <h3 style="color: #cc0000"><i class="fa fa-help"></i> Juste une petite verification ...</h3>
                    </div>
                    <div class="featurette-divider"></div>
                    <div class="text-center">
                        <img src="../static/img/icons/quot1.png" width="15" style="margin-top: -15px">
                        Parmi les regles de confidentialité <?=WEBSITE_NAME;?>, vous etes prié de fournire vos informations pour nous permettre de creer profil de votre <b>Entreprise</b>
                        afin de beneficier pleinement des avantages de notre site ansi si vous le voulez bien cliquer sur ce lien <a style="color:#052D6D" class="" href="create_pourv.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>">
                            <b>Creation de mon profil</b></a>
                        pour commencer à ajouter vos informations d'identification,
                        sinon cliquez <a href="../../">sur ce lien</a>  pour plus tard <img src="../static/img/icons/quot2.png" width="15" style="margin-top: -15px">


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

    });

</script>