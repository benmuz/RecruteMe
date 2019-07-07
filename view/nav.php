<style>
    .dropdown-menu{
        margin-left: -5rem;
    }
</style>
<?php session_start()?>
<?php
    include_once '../../globals/functions.php';
    include_once '../../globals/getId.php';
    include_once '../../globals/constantes.php';
    include '../../globals/typeCompte.php';
    include '../../controller/getDetailsForProfessionnalConnected.php';
    include '../../controller/getDetailsForRecruteurConnected.php';
    include '../../controller/getAllExperiencesForWhoIsConnected_.php';
    include '../../globals/situationProfessionnel.php';
    ?>

<?php if(isset($_SESSION['id']) && isset($_SESSION['pseudo']) && isset($_SESSION['typecompte'])):?>
    <?php if($_SESSION['typecompte']==TYPE_COMPTE_PROFESSIONEL):?>
        <header>
            <nav class="navbar navbar-expand-md fixed-top navbar-dark" id="navbar-expand-md">
                <div class="container">
                    <div class="navbar-brand-">
                        <a class="navbar-brand animated slideInLeft" href="#"><?=WEBSITE_NAME?></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapsecompte" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapsecompte">
                        <ul class="navbar-nav mr-0">
                            <li class="nav-item <?php //set_active("moncompte")?>">
                                <a class="nav-link" href="moncompte.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" ><i class="fa fa-home"> Mon Compte</i></a>
                            </li>
                            <li class="nav-item <?php //set_active("cariere_p")?>">
                                <a class="nav-link" href="cariere_p.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" ><i class="fa fa-archive"> Annonces</i></a>
                            </li>
                            <!--<li class="nav-item <?php //set_active("entreprise")?>">
                                <a class="nav-link" href="entreprise.php?" ><i class="fa fa-building-o"> Entreprises</i></a>
                            </li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" href="moncompte.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>"><i class="fa fa-user-circle"> <?=$_SESSION['pseudo']?></i></a>
                                <div class="dropdown-menu " aria-labelledby="dropdown01">
                                    <div class="card-body text-center">
                                        <a class="nav-link " href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">
                                            <img src="../../avatar/<?= $_SESSION['avatar'];?>" width="50" style="border-radius: 75%;border: 1px solid #cecece"></a>
                                        <a class="dropdown-item" href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>"><?=$_SESSION['nom'].' '.$_SESSION['prenom']?></a>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="dropdown-item" href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">Mon Profil</a>
                                        <a class="dropdown-item" href="modification.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">Parametres</a>
                                        <a class="dropdown-item" href="../logout.php">deconnection</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?php elseif ($_SESSION['typecompte']==TYPE_COMPTE_POURVOYEUR):?>
            <header>
                <nav class="navbar navbar-expand-md fixed-top navbar-dark" id="navbar-expand-md">
                    <div class="container">
                        <div class="navbar-brand-">
                            <a class="navbar-brand animated slideInLeft" href="#"><?=WEBSITE_NAME?></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapsecompte" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapsecompte">
                            <ul class="navbar-nav mr-0">
                                <li class="nav-item <?php //set_active("index")?>">
                                    <a class="nav-link" href="index.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" ><i class="fa fa-home"> Acceuil</i></a>
                                </li>
                                <li class="nav-item <?php //set_active("cariere")?>">
                                    <a class="nav-link" href="cariere.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" ><i class="fa fa-archive"> Cariere</i></a>
                                </li>
                                <li class="nav-item <?php //set_active("recrutement")?>">
                                    <a class="nav-link" href="recrutement.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" ><i class="fa fa-recycle"> Recrutement</i></a>
                                </li>
                                <li class="nav-item <?php //set_active("recrutement")?>">
                                    <a class="nav-link" href="cvtheque.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" ><i class="fa fa-address-book"> CVTheque</i></a>
                                </li>
                                <li class="nav-item <?php //set_active('moncompte')?> dropdown">
                                    <a class="nav-link" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>"><i class="fa fa-user-circle"> <?=$_SESSION['pseudo']?></i></a>
                                    <div class="dropdown-menu animated slideInRight" aria-labelledby="dropdown01">
                                        <div class="card-body text-center">
                                            <a class="nav-link " href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">
                                                <img src="../../avatar_pourv/<?= $_SESSION['avatar'];?>" width="50" style="border-radius: 75%;border: 1px solid #cecece"></a>
                                            <a class="dropdown-item" href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>"><?=$_SESSION['nomEntreprise']?></a>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="dropdown-item" href="moncompte.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">Mon Compte</a>
                                            <a class="dropdown-item" href="#">Parametre</a>
                                            <a class="dropdown-item" href="../logout.php">deconnection</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
    <?php endif;?>
<?php else: ?>
    <?php header("location:index.php")?>
<?php endif;?>
<script>
    $(document).ready(function () {

        $('#search').keyup(function () {
            var searchval=$('#search').val();

            $.ajax({
                url:"../../controller/searcheProfessionnel.php",
                data:'s='+searchval,
                success:function (data) {
                    $('#contente_resultat_recherche').html(data)
                }
            });
        });
    });
</script>
