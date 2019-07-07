<?php
$title="Publiez une annonce d'offre d'emploi";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<style>
    #annonces{
        background: url("../static/img/recrutement.jpg");
        background-position: center;
        -webkit-background-size:cover;
        background-size:cover;
        background-repeat:no-repeat;
        min-height: 15rem;
    }
</style>
<div class="container" id="container-carriere">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="box-text-profilp">
                    </div>
                </div>
                <div class="card-footer text-center" id="annonces"></div>
                <div class="card-footer">
                    <p style="color: #003333;">Grace au systeme de annonces sur <b><?=WEBSITE_NAME;?></b>, atteigner plus des millions de candidats pour votre offre d'emploi</p>
                </div>
            </div>
            <div class="featurette-divider"></div>
            <div class="box-profil_container">
                <?php
                include_once '../../controller/get6AnnoncesForWorIsConnected.php';
                ?>
            </div>

            <div class="box-profil_container">
                <h3>Les annonces des autres du meme secteur d'activite</h3>
                <div class="featurette-divider"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../../avatar_pourv/default_avatar.jpg" width="80%">
                            </div>
                            <div class="col-md-12">
                                competence requis
                                <br>
                                region de ..
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../../avatar_pourv/default_avatar.jpg" width="80%">
                            </div>
                            <div class="col-md-12">
                                competence requis
                                <br>
                                region de ..
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../../avatar_pourv/default_avatar.jpg" width="80%">
                            </div>
                            <div class="col-md-12">
                                competence requis
                                <br>
                                region de ..
                            </div>
                        </div>

                    </div>
                </div>
                <div class="featurette-divider"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../../avatar_pourv/default_avatar.jpg" width="80%">
                            </div>
                            <div class="col-md-12">
                                competence requis
                                <br>
                                region de ..
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../../avatar_pourv/default_avatar.jpg" width="80%">
                            </div>
                            <div class="col-md-12">
                                competence requis
                                <br>
                                region de ..
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="../../avatar_pourv/default_avatar.jpg" width="80%">
                            </div>
                            <div class="col-md-12">
                                competence requis
                                <br>
                                region de ..
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--=====================================================--->
        <div class="col-md-4" id="profil_container">
            <div>
                <div class="box-profil_container">
                    <h5><i class="fa fa-file-text-o"></i> L'offre d'emploi ?</h5>
                    <small><em>est-ce que vous recrutez?</em></small><br>
                    <small>Informez les autres d'un offre d'emplois grace à une annonce sur le site.</small>
                    <hr>
                    <a href="annonces.php?<?=ID_USER?>=<?=$_SESSION['id']?>" class="btn btn-sm btn-success" id="btn_publication_annonce">Publier une annonce</a>
                </div>
            </div>
            <div>
                <div class="box-profil_container">
                    <h5><i class="fa fa-file-text-o"></i> </h5>
                    <small>Informez les autres d'un offre d'emplois grace à une annonce sur le site.</small>
                    <hr>

                </div>
            </div>
        </div>
        <!--=====================================================--->
    </div>
    <div class="separator"></div>
</div>
<!--=============la division pour la publication des annonces ==========-->

<?php include '../footer.php';?>
</body>
