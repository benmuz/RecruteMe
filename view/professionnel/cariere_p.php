<?php
$title="Profil du professionnel";
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
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="box-text-profilp">
                    </div>
                </div>
                <div class="card-footer text-center" id="annonces"></div>
                <div class="card-footer">
                    <p style="color: #003333;">Retrouver l'ensemeble des annonces sur <b><?=WEBSITE_NAME;?></b>, qui vous conserne</p>
                </div>
            </div>
            <div class="featurette-divider"></div>
            <div class="box-profil_container">
                <h3>les offres d'emploi qui vous consernent</h3>
                <div class="featurette-divider"></div>
                <div class="row">
                    <?php include_once '../../controller/getAnnonceSpecifique.php';?>
                </div>
            </div>
            <div class="box-profil_container">
                <h3>les offres d'emploi</h3>
                <div class="featurette-divider"></div>
                    <div class="row">
                <?php include_once '../../controller/getAnnonceNoSpecifique.php';?>
                    </div>
            </div>
        </div>

        <!--=====================================================--->
        <div class="col-md-4" id="profil_container">
            <div>
                <div class="box-profil_container">
                    <h5><i class="fa fa-file-text-o"></i> des offres d'emploi ?</h5>
                    <small><em>grace à la publication des annonces, les recruteurs peuvent publier des offres d'emploi et vous permettre de poster votre
                        candudature selon leurs exigences</em></small><br>
                    <hr>
                </div>
            </div>
            <div>
                <div class="box-profil_container" >
                    <h5><i class="fa fa-commenting-o"></i> &nbsp;Vos Condidatures </h5>
                    consulter vos candidature aux annonces qui vous ont interessé
                    <hr>
                    <button class="btn btn-sm btn-nav">mes candidature</button>
                </div>
            </div>
            <div>
                <div class="box-profil_container" >consulter les annonces selon les differents secteurs d'activité</h5>
                    <hr>
                    <button class="btn btn-sm btn-nav">Consulter les annonces</button>
                </div>
            </div>
        </div>
        <!--=====================================================--->
    </div>
</div>
<?php include '../footer.php';?>
</body>

<script>
    CKEDITOR.replace('descriptionPublication');
    CKEDITOR.editorConfig = function( config ) {
        config.language = 'fr';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = false;
    };
    $(document).ready(function(){
        $("span.timeago").timeago();
    });
</script>

