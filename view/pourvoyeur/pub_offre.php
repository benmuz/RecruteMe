<?php
$title="Profil du professionnel";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>

<div class="container" id="container-carriere">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="box-text-profilp">

                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
            <div class="featurette-divider"></div>
            <div class="box-profil_container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                logo entreprise
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
                                logo entreprise
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
                                logo entreprise
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
                                logo entreprise
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
                                logo entreprise
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
                                logo entreprise
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
                    <button class="btn btn-sm btn-primary" id="btn_publication_annonce">Publier une annonce</button>
                </div>
            </div>
            <div>
                <div class="box-profil_container" >
                    <h5><i class="fa fa-commenting-o"></i> &nbsp;Mes Commentaires </h5>
                    <hr>
                    total de commentaires à vos publications
                </div>
            </div>
            <div>
                <div class="box-profil_container" >
                    <h5><i class="fa fa-comment"></i> &nbsp;Autres Commentaires</h5>
                    <hr>

                </div>
            </div>
            <div>
                <div class="box-profil_container" >
                    <h5><i class="fa fa-share-alt"></i> &nbsp;Mes Publications</h5>
                    <hr>
                </div>

            </div>

        </div>
        <!--=====================================================--->
    </div>
</div>
<!--=============la division pour la publication des annonces ==========-->
<div class="container" id="container-publication-annonce" >
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="box-text-profilp">

                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
            <div class="featurette-divider"></div>
            <div class="box-profil_container">
                <div class="featurette-divider" STYLE="background-color: #0a0a0a;color: #fff;padding: 0.5rem;">
                    <h5><i class="fa fa-building"></i> L'ENVIRONNEMENT DE TRAVAIL</h5>
                </div>
                <div class="form-group">
                    <label>Entreprise</label>
                    <input type="text" name="nomEntreprise" class="form-control">
                </div>
                <div class="form-group">
                    <label>Secteur d'activite</label>
                    <select class="form-control" name="secteurActivite">
                        <option></option>
                    </select>
                    <div align="right">
                        <p><i class="fa fa-plus-circle fa-1x"></i> Ajouter un secteur</p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description de l'entreprise</label>
                    <textarea class="form-control" name="descriptionEntreprise" id="descriptionEntreprise"></textarea>
                </div>
                <div class="featurette-divider"></div>
            </div>
            <div class="featurette-divider"></div>
            <div class="box-profil_container">
                <div class="featurette-divider" STYLE="background-color: #0a0a0a;color: #fff;padding: 0.5rem;">
                    <h5><i class="fa fa-file-text-o"></i> LE POST</h5>
                </div>
                <div class="form-group">
                    <label>Intitulé du post</label>
                    <input type="text" name="intitulePost" class="form-control">
                </div>
                <div class="form-group">
                    <label>Experience</label>
                    <select class="form-control" name="secteurActivite">
                        <option></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Post</label>
                    <select class="form-control" name="secteurActivite">
                        <option></option>
                    </select>
                    <div align="right">
                        <p><i class="fa fa-plus-circle fa-1x"></i> Ajouter un post</p>
                    </div>
                </div>
                <div class="form-group">
                    <label>Type de contrat ou type d'emploi</label>
                    <select class="form-control" name="secteurActivite">
                        <option></option>
                    </select>
                </div>
                <div class="featurette-divider"></div>
                <div class="form-group">
                    <label>Description du post</label>
                    <textarea class="form-control" name="descriptionPost" id="descriptionPost"></textarea>
                </div>
                <div class="form-group">
                    <label>Qualifications requises Ou Competences requises</label>
                    <textarea class="form-control" name="competenceRequise" id="competenceRequise"></textarea>
                </div>
                <div class="featurette-divider"></div>
            </div>
            <div class="featurette-divider"></div>
            <div class="box-profil_container">
                <div class="featurette-divider" STYLE="background-color: #0a0a0a;color: #fff;padding: 0.5rem;">
                    <h5><i class="fa fa-file-text-o"></i> AUTRES CHOSES</h5>
                </div>
                <div class="form-group">
                    <label>Comment les candidats postulent?</label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="" value="">
                        envoit de CV et lettre de motivation à l’adresse
                    </label>
                    <div>
                        <input type="text" name="contact_email" class="form-control">
                    </div>
                    <label>
                        <input type="checkbox" name="" value="">
                        Date limite de depot de candidature
                    </label>
                    <div>
                        <input type="text" name="datelimite" class="form-control">
                    </div>
                </div>
                <div class="featurette-divider"></div>
            </div>
            <div class="card">
                <div class="card-footer">
                    <div align="right">
                        <input type="reset" class="btn btn-danger btn-sm" value="Annuler">
                        <input type="button" class="btn btn-success btn-sm" value="Apercus">
                        <input type="submit" class="btn btn-primary btn-sm" value="Publier">
                    </div>
                </div>
            </div>
        </div>

        <!--=====================================================--->
        <div class="col-md-5" id="profil_container">

        </div>
        <!--=====================================================--->
    </div>
</div>
<?php include '../footer.php';?>
</body>

<script>
    CKEDITOR.replace('descriptionEntreprise');
    CKEDITOR.replace('descriptionPost');
    CKEDITOR.replace('competenceRequise');
    CKEDITOR.replace('exigence');

    CKEDITOR.replace('descriptionPublication');
    CKEDITOR.editorConfig = function( config ) {
        config.language = 'fr';
        config.uiColor = '#F7B42C';
        config.height = 200;
        config.toolbarCanCollapse = false;
    };
</script>
<script>
    $(document).ready(function(){
        $('#container-publication-annonce').css("display","none");
        //$("span.timeago").timeago();

        $("#btn_publication_annonce").click(function () {
            $('#container-publication-annonce').show();
            $('#container-carriere').hide();
        });
    });
</script>

