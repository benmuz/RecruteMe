<?php
$title="Profil du professionnel";
include '../header.php';
?>
<body class="body-professionnel">
<?php
    include '../nav.php';
?>
<style>
    .avatar-profil{
        width: 300px;
        height: 200px;
    }
</style>
<div class="container">
    <?php if($_SESSION['id']==$_GET[ID_USER]):?>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="border-radius: inherit;">
                <div class="card-header " style="min-height: 12rem">
                </div>
                <div class="box-avatar text-center" style="margin-top: -7rem">
                    <a href="#" class="modifier"><span><img class="img-thumbnail avatar-profil  " src="../../avatar/<?= $_SESSION['avatar'];?>" style="width: 11rem;">
                        </span></a><!--<img src="../../avatar/< //$_SESSION['avatar'];?>"  width="250">-->
                </div>
                <div class="card-body text-center">
                    <div class="box-text-profilp">
                        <h3 class="card-title" style="font-family: 'Helvetica Neue';">
                            <b>
                                <?=$_SESSION['nom'].' '.$_SESSION['prenom']?>
                            </b>
                        </h3>
                        <p>
                            <small><?=$_SESSION['email']?></small><br>
                            <small><em><?=$_SESSION['pays']?></em></small>/
                            <small><em><?=$_SESSION['ville']?></em></small>/
                            <small><em><?=$_SESSION['adresse']?></em></small>
                        </p>
                    </div>
                    <div class="edit-profilp">
                        <span><a href="modification.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" class="modifiers">Parametres... <i class="fa fa-pencil"></i></a></span>
                    </div>
                </div>
            </div>
            <div class="featurette-divider"></div>
        </div>
        <!--=====================================================--->
        <div class="col-md-6" id="profil_container">
                <div class="box-profil_container">
                    Mettez en avant vos competences, vos experiences pour permettre aux autres de vous reperer facilement et s'interresser à vous
                    <hr>
                    <div align="left">
                        <a class="btn btn-nav btn-sm" href="amelioration.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">Ameliorer votre CV</a>
                    </div>
                </div>

            <div class="box-profil_container" id="pub" style="background-color: #ccd">

            </div>

            <div class="box-profil_container">
                <p> Ayez l'aperçu général de votre cv, à chaque enregistrement, d'une rubrique de votre cv vous pouvez visualiser ces détails</p>
                <hr>
                <div align="left">
                    <a class="btn btn-info btn-sm" href="cv.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>"><i class="fa fa-eye"></i> Detail</a>
                </div>
            </div>

            <div class="box-profil_container">
                <p>Modification de votre CV</p>
                <hr>
                <div align="left">
                    <a class="btn btn-warning btn-sm" href="cv.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['id'])?>">Modification</a>
                </div>
            </div>

        </div>
        <!--=====================================================--->

        <?php endif;?>

    </div>
</div>
<?php include '../footer.php';?>
</body>

<script>
    $(document).ready(function(){
        //$("span.timeago").timeago();
    });
</script>