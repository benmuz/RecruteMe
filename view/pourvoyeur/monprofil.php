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
        width: 250px;
        height: 250px;
    }
</style>
<div class="container">
    <?php if($_SESSION['id']==$_GET[ID_USER]):?>
    <div class="row">
        <div class="col-md-7">
            <div class="card" style="border-radius: inherit;">
                <div class="card-header " style="min-height: 12rem">
                </div>
                <div class="box-avatar text-center" style="margin-top: -7rem">
                    <a href="#" class="modifier"><span class="avatar-profilp"><img class="img-thumbnail avatar-profil" width="150"  src="../../avatar_pourv/<?= $_SESSION['avatar'];?>" >
                        </span></a><!--<img src="../../avatar/< //$_SESSION['avatar'];?>"  width="250">-->
                </div>
                <div class="card-body text-center">
                    <div class="box-text-profilp">
                        <h3 class="card-title" style="font-family: 'Helvetica Neue';">
                            <b>
                                <?=$_SESSION['nomEntreprise']?>
                            </b>
                        </h3>
                        <p>
                            <small><?=$_SESSION['email']?></small><br>
                            <small><em><?=$_SESSION['ville']?></em></small>
                            <small><em><?=$_SESSION['pays']?></em></small></p>

                    </div>
                    <div class="edit-profilp">
                        <span><a href="modification.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" class="modifiers">Parametres... <i class="fa fa-pencil"></i></a></span>
                    </div>
                </div>
            </div>

            <div class="featurette-divider"></div>

            <div class="card" style="border-radius: inherit;background-color: rgba(6,42,73,0.50);color: #fff;">
                <div class="card-header" style="border-radius: inherit">
                    <h3 class="card-title "><i class="fa fa-dashboard"></i> Votre tableau de bord</h3>
                </div>
                <div class="card-body">
                    <p>vue d'ensemble de vos annonces, vos recrutements</p>
                    <div class="featurette-divider">
                        <div class="row" style="background-color: #fff;color: #000;">
                            <div class="col-12">
                                <p><i class="fa fa-share-square-o"></i> &nbsp;Mes annonces d'offre d'emploi</p>
                            </div>
                        </div>
                        <hr class="featurette-heading">
                        <div class="row" style="background-color: #fff;">
                            <div class="col-12" style="border-right: 1px solid #dbdbdb">
                                <p style="color: rgba(0,0,0,0.80)"><i class="fa fa-users"></i> &nbsp;Recrutements</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-text-profilp">

                    </div>
                </div>
            </div>
            <div class="featurette-divider"></div>
        </div>
        <!--=====================================================--->
        <div class="col-md-5" id="profil_container">
            <div class="box-profil_container">
                <p>les entreprises du meme secteur que vous...</p>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <img src="../../avatar_pourv/default_avatar.jpg" width="100%">
                    </div>
                    <div class="col-9">
                        <small>Nom de l'entreprise<br>
                            Email de l'entreprise<br>
                            Adresse de l'entreprise</small><br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <img src="../../avatar_pourv/default_avatar.jpg" width="100%">
                    </div>
                    <div class="col-9">
                        <small>Nom de l'entreprise<br>
                            Email de l'entreprise<br>
                            Adresse de l'entreprise</small><br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <img src="../../avatar_pourv/default_avatar.jpg" width="100%">
                    </div>
                    <div class="col-9">
                        <small>Nom de l'entreprise<br>
                            Email de l'entreprise<br>
                            Adresse de l'entreprise</small><br>
                    </div>
                </div>
                <hr>
            </div>
            <div class="box-profil_container">
                <p>le candidat ayant travailler ou travaillant dans le meme secteur que vous...</p>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <img src="../../avatar/avatar_professionel.png" width="100%">
                    </div>
                    <div class="col-9">
                        Nom du candidat<br>
                        <small>Email du candidat</small><br>
                        <small>Adresse du candidat</small><br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <img src="../../avatar/avatar_professionel.png" width="100%">
                    </div>
                    <div class="col-9">
                        Nom du candidat<br>
                        <small>Email du candidat</small><br>
                        <small>Adresse du candidat</small><br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <img src="../../avatar/avatar_professionel.png" width="100%">
                    </div>
                    <div class="col-9">
                        Nom du candidat<br>
                        <small>Email du candidat</small><br>
                        <small>Adresse du candidat</small><br>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
        <?php endif;?>
    <!--=========================================modal de modification des informations du professionnel-------------------->
    <div class="modal fade" id="modifier_informations" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius: inherit">
                <div class="modal-header" style="padding:5px 15px;color: #09375f;">
                    <h3 class="modal-title"><i class="fa fa-sticky-note-o"></i> MODIFIER VOS INFORMATIONS</h3>
                    <button type="button" class="close" data-dismiss="modal"style="color:#CC0000;">&times;</button>
                </div>
                <div class="modal-body sc">
                    <div class="row">
                        <div class="col-sm-12" style="background-color: #fff">
                                <form action="../../controller/changer_avatar_pourv.php" method="post" enctype="multipart/form-data">
                                    <div class="text-center" style="margin:-20px -15px 10px;padding:2rem;background-color: #09375f">
                                        <img src="../../avatar_pourv/<?= $_SESSION['avatar'];?>" alt="avatar profil" class="img-thumbnail avatar-profil" width="200" ?>
                                        <input type="file" name="avatar" class="btn btn-success">
                                        <input class="btn btn-danger btn-sm " type="submit" value="changer l'image" name="img">
                                    </div>
                                </form>

                            <form action="" method="get" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <input name="idProfil" id="idProfil" type="hidden" class="form-control">
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nomEntreprise"><i class="fa fa-user"></i> Entreprise</label>
                                                <input name="nomEntreprise" id="nomEntreprise" type="text" value="<?=$_SESSION['nomEntreprise']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="secteurActivite"><i class="fa fa-user"></i> Secteur d'activite</label>
                                                <input name="secteurActivite" id="secteurActivite" value="<?=$_SESSION['secteurActivite']?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telephone"><i class="fa fa-user"></i> Telephone</label>
                                                <input name="telephone" id="telephone" type="text" value="<?=$_SESSION['telephone']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lienWeb"><i class="fa fa-user"></i> Lien reseau social</label>
                                                <input name="lienWeb" id="lienWeb" value="<?=$_SESSION['lienWeb']?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="adresse"><i class="fa fa-road"></i> Adresse</label>
                                                <input name="adresse" id="adresse" value="<?=$_SESSION['adresse']?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ville"><i class="fa fa-building"></i> Ville</label>
                                                <input name="ville" id="ville" type="text" class="form-control" value="<?=$_SESSION['ville']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pays"><i class="fa fa-globe"></i> Pays</label>
                                                <input name="pays" id="pays" type="text" class="form-control" value="<?=$_SESSION['pays']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn-sm btn btn-success pull-right" value="Modifier">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include '../footer.php';?>
</body>

<script>
    $(document).ready(function(){
        //$("span.timeago").timeago();

        $('.modifier').click(function () {
            $('#modifier_informations').modal();
        });
    });
</script>