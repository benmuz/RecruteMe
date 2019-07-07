<?php
$title="Mon compte";
include '../header.php';

?>
<body class="body-professionnel">
<?php
    include '../nav.php';
?>

<div class="container">
    <input id="id_user" hidden value="<?=$_GET[ID_USER]?>">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="box-text-profilp">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="">
                                        <span class="avatar-profil">
                                            <img class="img-thumbnail" src="../../avatar/<?= $_SESSION['avatar'];?>" style="width: 100%">
                                        </span>
                                        </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5><b><?=$_SESSION['nom'].'  '.$_SESSION['prenom']?></b></h5>
                                        <p>
                                            <small><strong>&commat;</strong> <?=$_SESSION['email']?></small><br>
                                            <small><i class="fa fa-building"></i> <?=$_SESSION['ville']?></small><br>
                                            <small><i class="fa fa-globe"></i> <?=$_SESSION['pays']?></small>
                                        </p>
                                        <?php
                                            if(isset($_SESSION['statut']) and !empty($_SESSION['statut']) and $_SESSION['statut']==1){
                                                if($_SESSION['genre']=='M'){
                                                    echo '<p><i class="fa fa-male"></i> Disponible pour l\'emploi</p>';
                                                }
                                                else{
                                                    echo '<p><i class="fa fa-female"></i> Disponible pour l\'emploi</p>';
                                                }
                                            }
                                            else{
                                                if($_SESSION['genre']=='M'){
                                                    echo '<p><i class="fa fa-male"></i> Non disponible pour l\'emploi</p>';
                                                }
                                                else{
                                                    echo '<p><i class="fa fa-female"></i> Non disponible pour l\'emploi</p>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-2">
                                                <a href="cv.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" class="btn btn-info btn-sm"><i class="fa fa-address-book-o"></i> MON CV</a>&nbsp;
                                            </div>
                                            <div class="col-sm-3">
                                                <div id="statut_professionnel" style="z-index: 10;position: relative">
                                                    <form action="../../controller/updateStatusProfessionnal.php" method="post">
                                                    </form>
                                                </div>
                                                <a href="" class="btn btn-success btn-sm btn-updateStatut"><i class="fa fa-user"></i> MON STATUS</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="featurette-divider">
                <a href="amelioration.php?<?=ID_USER?>=<?=$_SESSION['id']?>&tsdgjsdvysdjhsgdhsfdy=<?=md5($_SESSION['pseudo'])?>" class="btn btn-nav btn-sm pull-right">COMPLETER MON CV</a>
            </div>
            <div class="separator"></div>

            <div class="featurette-divider"></div>

            <div class="card" style="border-radius: inherit;background-color: rgba(6,42,73,0.50);color: #fff;">
                <div class="card-header" style="border-radius: inherit">
                    <h3 class="card-title "><i class="fa fa-dashboard"></i> Votre tableau de bord</h3>
                </div>
                <div class="card-body">
                    <p>vue d'ensemble de vos formations, experiences, competences,..</p>
                    <div class="featurette-divider">
                        <div class="row" style="background-color: #fff;color: #000;">
                            <div class="col-6" style="border-right: 1px solid #dbdbdb">
                                <h5 style="color: rgb(7,52,92)" class="text-center"><i class="fa fa-connectdevelop"></i> &nbsp;Experiences</h5>
                                <hr>
                                <?php
                                    include_once '../../controller/getAllExperiencesForWorIsConnected.php';
                                ?>
                            </div>
                            <div class="col-6">
                                <h5 style="color: rgb(7,52,92)" class="text-center"><i class="fa fa-university"></i> &nbsp;Formations</h5>
                                <hr>
                                <?php
                                    include_once '../../controller/getAllFormationEducationForWorIsConnected.php';
                                ?>
                            </div>
                        </div>
                        <hr class="featurette-heading">
                        <div class="row" style="background-color: #f1f1f1;">
                            <div class="col-6" style="border-right: 1px solid #dbdbdb">
                                <h5 style="color: rgb(7,52,92)" class="text-center"><i class="fa fa-bullseye"></i> &nbsp;Commpetences</h5>
                                <hr>
                                <?php
                                    include_once '../../controller/getAllCompetencesForWorIsConnected.php';
                                ?>
                            </div>
                            <div class="col-6">
                                <h5 style="color: rgb(7,52,92)" class="text-center"><i class="fa fa-certificate"></i> &nbsp;Certifications</h5>
                                <hr>
                                <?php
                                    include_once '../../controller/getAllCertificationsForWorIsConnected.php';
                                ?>
                            </div>
                        </div>
                        <hr class="featurette-heading">
                        <div class="row" style="background-color: #fff;color: #000">
                            <div class="col-6" style="border-right: 1px solid #dbdbdb">
                                <h5 style="color: rgb(7,52,92)" class="text-center"><i class="fa fa-address-book"></i> &nbsp;Contacts</h5>
                                <hr>
                                <?php
                                if(isset($_SESSION)){
                                    echo "<p>&commat; ".$_SESSION['email']."<br>";
                                    echo "<i class='fa fa-phone'></i> ".$_SESSION['telephone']."<br>";
                                    echo "<i class='fa fa-globe'></i> ".$_SESSION['pays']."<br>";
                                    echo "<i class='fa fa-building-o'></i> ".$_SESSION['ville']."<br>";
                                    echo "<i class='fa fa-address-card'></i> ".$_SESSION['adresse']."</p>";
                                }
                                ?>
                            </div>
                            <div class="col-6">
                                <h5 style="color: rgb(7,52,92)" class="text-center"><i class="fa fa-language"></i> &nbsp;Langues</h5>
                                <hr>
                                <?php
                                    include_once '../../controller/getAllLanguageForWorIsConnected.php';
                                ?>
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
        <div class="col-md-4" id="profil_container">
            <div>
                <div class="box-profil_container" style="color: #9d9d9d;!important;">
                    <h5><i class="fa fa-university"></i> &nbsp;Mes Formations</h5>
                    <hr>
                    <script>
                        $('document').ready(function () {
                            var formation=$('#id_user').val();
                            $.ajax({
                                url:"../../controller/countEFCC.php",
                                data:{"formation":formation},
                                success:function (data) {
                                    $('#formation_').html(data);
                                }
                            })
                        })
                    </script>
                    <span id='formation_' style="color: #002040;font-size: small"></span>
                </div>
            </div>
            <div>
                <div class="box-profil_container" style="color: #9d9d9d;!important;">
                    <h5><i class="fa fa-connectdevelop"></i> &nbsp;Mes Experiences </h5>
                    <hr>
                    <script>
                        $('document').ready(function () {
                            var id_user=$('#id_user').val();
                            $.ajax({
                                url:"../../controller/countEFCC.php",
                                data:{"id_user":id_user},
                                success:function (data) {
                                    $('#experience_').html(data);
                                }
                            })
                        })
                    </script>
                    <span style="color: #002040;font-size: small" id="experience_"></span>
                </div>
            </div>
            <div>
                <div class="box-profil_container" style="color: #9d9d9d;!important;">
                    <h5><i class="fa fa-bullseye"></i> &nbsp;Mes Competences</h5>
                    <hr>
                    <script>
                        $('document').ready(function () {
                            var competence=$('#id_user').val();
                            $.ajax({
                                url:"../../controller/countEFCC.php",
                                data:{"competence":competence},
                                success:function (data) {
                                    $('#competence_').html(data);
                                }
                            })
                        })
                    </script>
                    <span id="competence_" style="color: #002040;font-size: small"></span>
                </div>
            </div>
            <div>
                <div class="box-profil_container" style="color: #9d9d9d;!important;">
                    <h5><i class="fa fa-certificate"></i> &nbsp;Mes Certifications</h5>
                    <hr>
                    <script>
                        $('document').ready(function () {
                            var certificat=$('#id_user').val();
                            $.ajax({
                                url:"../../controller/countEFCC.php",
                                data:{"certificat":certificat},
                                success:function (data) {
                                    $('#certificat_').html(data);
                                }
                            })
                        })
                    </script>
                    <span id="certificat_" style="color: #002040;font-size: small"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../footer.php';?>
</body>

<script>
    /*CKEDITOR.replace('descriptionPublication');
    CKEDITOR.editorConfig = function( config ) {
        config.language = 'fr';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = false;
    };*/
    $(document).ready(function(){

        myPublication();
        function myPublication(){
            var id_user=$('#id_user').val();
            $.ajax({
              url:"../../controller/getAllPublicationForWhoIsConnected.php",
              data:{'id':id_user},
              success:function(data){
                  $('.myPublication').html(data);
              }
            });
        }

        $("span.timeago").timeago();

        $('.sup_pub').click(function () {
           $('#sup_pub').modal();
        });
    });
</script>

