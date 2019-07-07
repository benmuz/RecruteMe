<?php
$title="Profil du professionnel";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<div class="container">
    <div class="row">
        <div class="card col-md-7" style="border-radius: inherit">
            <div class="card-body ">
                <div class="box-avatar offset-3" style="width:50%;">
                    <a href="monprofil.php?<?=ID_USER?>=<?=$_SESSION['id']?>dfgjdgjhgdjgj" class="<?php //set_active('profilp')?>"><figure><img width="100%" class="avatar-profil" src="../../avatar_pourv/<?= $_SESSION['avatar'];?> "></figure></a>
                </div>
                <div class="col-12">
                    <h3 class="text-center"><b><?=$_SESSION['nomEntreprise']?></b></h3>
                    <h6 class="text-center"><?=$_SESSION['secteurActivite']?></h6>
                    <p>
                        <small><i class="fa fa-envelope-o"></i> <?=$_SESSION['email']?><br>
                            <i class="fa fa-phone"></i> <?=$_SESSION['telephone']?></small><br>
                        <i class="fa fa-building"></i> <?=$_SESSION['ville']?></small><br>
                        <i class="fa fa-globe"></i> <?=$_SESSION['pays']?></small><br>
                        <i class="fa fa-road"></i> <?=$_SESSION['adresse']?></small><br>

                    </p>
                </div>
            </div>
        </div>
        <!--=====================================================--->
        <div class="col-md-5" id="profil_container">
            <div class="box-profil_container">
                <div align="right">
                    <h3 style="border-radius: 75%;width: 20%;height:10%;text-align:center;color: #fff;background: #08345f">NBR</h3>
                </div>
                <hr>
                total de entreprise de meme secteur d'activite
            </div>
            <div class="box-profil_container" style="background-color: #003333;color: #fff;!important;">
                total de recrutement deja faite
            </div>
            <div class="box-profil_container">
                <div align="right">
                    <h3 style="border-radius: 75%;width: 20%;height:10%;text-align:center;color: #fff;background: #08345f">NBR</h3>
                </div>
                <hr>
                total de secteurs d'activites
            </div>
            <div class="box-profil_container" style="background-color: #003333;color: #fff;!important;">
                <h6>Total des Publications des annonces (Offre d'emploi)</h6>
            </div>
        </div>
        <!--=====================================================--->
    </div>
    <div class="featurette-divider"></div>
    <div class="row">
        <div class="col-sm-7 box-profil-publication">
            top 10 des entreprise de meme secteur
        </div>
        <div class="col-sm-5 card-body">
            <?php

                include_once '../../globals/database.php';
                include_once '../../model/Connexion.class.php';

                $con=Connexion::getConnexion();
                $req="SELECT * FROM secteurs ORDER by nomSecteur asc limit 10";
                $stm=$con->prepare($req);
                $stm->execute();
                $result=$stm->fetchAll();

                if(sizeof($result)>0){
                    $output="";
                    echo '<h5>Top 10 de differents secteurs d\'activite</h5>
                <hr class="featurette-heading"> ';
                    foreach ($result as $res){
                        $output.="<div class='row' style='padding-left: 3rem;'>
                            <p>".utf8_encode($res['nomSecteur'])."</p>
                        </div>";
                    }
                }
                echo $output;
            ?>
        </div>
    </div>
    <div class="featurette-divider"></div>
    <div class="row">
        <div class="col-sm-6">
            <h6><b>les entreprises du meme secteur que vous</b></h6>
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
        <div class=" col-sm-6 ">
            <p>les candidats ayant travaillés ou travaillant dans le meme secteur que vous...</p>
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
    <div class="separator"></div>
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



        $("span.timeago").timeago();
    });
</script>

