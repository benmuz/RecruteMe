<?php
$title="Annonce d'offre d'emploi";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<div class="container" id="container-publication-annonces" >
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="border-radius: inherit">
                <div class="card-header" style="background-color: #0a0a0a;color: #fff;padding: 0.5rem;border-radius: inherit">
                    <h5><i class="fa fa-building"></i> L'ENVIRONNEMENT DE TRAVAIL</h5>
                </div>
                <div class="card-body">
                    <span id="msg_situationP" class="text-center"></span>
                    <div class="box-text-profilp">
                        <div class="form-group">
                            <label>Entreprise</label>
                            <input type="text" id="nomEntreprise" name="nomEntreprise" class="form-control" value="<?=$_SESSION['nomEntreprise']?>" readonly disabled>
                        </div>
                        <div class="form-group">
                            <label>Description de l'entreprise</label>
                            <textarea class="form-control text-left" id="descriptionEntreprise" name="descriptionEntreprise"><?=$_SESSION['description']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Lieu d'affectation</label>
                            <input type="text" class="form-control" id="lieuAffectation" name="lieuAffectation" value="<?=$_SESSION['ville']?>">
                        </div>
                        <div class="featurette-divider"></div>
                    </div>
                </div>
            </div>

            <div class="featurette-divider"></div>
            <div class="card" style="border-radius: inherit">
                <div class="card-header" style="background-color: #0a0a0a;color: #fff;padding: 0.5rem;border-radius: inherit">
                    <h5><i class="fa fa-file-text-o"></i> LE POST</h5>
                </div>
                <div class="card-body">
                    <div class="box-text-profilp">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="checkbox" class="genre" name="sexe" value="M"/> <label><i class="fa fa-male"></i> Masculin</label>
                                </div>
                                <div class="col-sm-6">
                                    <input  type="checkbox" name="sexe" class="genre" value="F"/> <label><i class="fa fa-female"></i> Feminin</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Intitulé du post</label>
                            <input type="text" name="intitulePost" id="intitulePost" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Type de contrat ou type d'emploi</label>
                            <select class="form-control" name="typeContrat" id="typeContrat">
                                <option>-</option>
                                <option>CDI</option>
                                <optgroup>
                                    <option value="2 semaines">2 semaines</option>
                                    <option value="1 moi">1 mois</option>
                                    <option>2 mois</option>
                                    <option>3 mois</option>
                                    <option>4 mois</option>
                                    <option>5 mois</option>
                                    <option>6 mois</option>
                                    <option>6 mois et plus</option>
                                </optgroup>
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Experience</label>
                            <select class="form-control" name="experienceRequise" id="experienceRequise">
                                <option>-</option>
                                <option class="qualifier">Qualifiée</option>
                                <option>2 ans</option>
                                <option>3 ans</option>
                                <option>4 ans</option>
                                <option>5 ans</option>
                                <option>5 ans et plus</option>
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
                </div>
            </div>

            <div class="featurette-divider"></div>
        </div>
        <!--=====================================================--->
        <div class="col-md-6" id="profil_container">
            <div class="card">
                <div class="card-body">
                    <div class="box-text-profilp">
                        <figure class="text-center">
                            <img src="../../avatar_pourv/<?= $_SESSION['avatar'];?>">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="featurette-divider"></div>
            <div class="card" style="border-radius: inherit">
                <div class="card-header" style="background-color: #0a0a0a;color: #fff;padding: 0.5rem;border-radius: inherit">
                    <h5><i class="fa fa-building"></i> VOTRE MISSION</h5>
                </div>
                <div class="card-body">
                    <span id="msg_situationP" class="text-center"></span>
                    <div class="box-text-profilp">
                        <div class="form-group">
                            <label>Description de votre mission</label>
                            <textarea class="form-control" name="mission" id="mission"><?=$_SESSION['description']?></textarea>
                        </div>
                        <div class="featurette-divider"></div>
                    </div>
                </div>
            </div>
            <div class="featurette-divider"></div>
            <div class="card" style="border-radius: inherit">
                <div class="card-header" style="background-color: #0a0a0a;color: #fff;padding: 0.5rem;border-radius: inherit">
                    <h5><i class="fa fa-file-text-o"></i> AUTRES CHOSES</h5>
                </div>
                <div class="card-body">
                    <span id="msg_situationP" class="text-center"></span>
                    <div class="box-text-profilp">
                        <div class="form-group">
                            <label>Comment les candidats postulent?</label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input checked type="checkbox" name="envoit_cvLocal" id="envoit_cvLocal" disabled>
                                <small>CV et lettre de motivation à partir de <?=WEBSITE_NAME?></small>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="dateLimite">Date limite de depot de candidature</label>
                                <input type="text"  name="dateLimite" id="dateLimite" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="heureLimite">Heure limite de depot de candidature</label>
                                <input type="text"  name="heureLimite" id="heureLimite" class="form-control">
                            </div>
                        </div>
                        <div class="featurette-divider"></div>
                    </div>
                </div>
            </div>
            <div class="featurette-divider"></div>
            <div class="separator"></div>
            <div align="right">
                <button type="button" class="btn btn-success publicationAnnonce" > Publier l'offre d'emploi</button>
            </div>
            <div class="featurette-divider">
                <p class="msg_annonces"></p>
            </div>
        </div>
        <!--=====================================================--->
    </div>
    <div class="separator"></div>
</div>
<?php include '../footer.php';?>
<script src="../../libraries/ckeditor/ckeditor.js"></script>
</body>

<script>
    CKEDITOR.editorConfig = function(config) {
        config.language = 'fr';
        config.uiColor = '#F7B42C';
        config.height = 150;
        config.toolbarCanCollapse = false;
    };

    CKEDITOR.replace('mission_professionnelle');
    CKEDITOR.replace('descriptionEntreprise');
    CKEDITOR.replace('descriptionPost');
    CKEDITOR.replace('competenceRequise');
    CKEDITOR.replace('exigence');
    CKEDITOR.replace('descriptionPublication');

</script>

<script>
    $(document).ready(function(){
        //si on faisant le focus sur un input,textarea,select qu'on enleve la classe input-error
        $('#container-publication-annonces').find('input,textarea,select').focus(function () {
            $(this).removeClass('input-error').addClass('input-success');
        });

        //declaration de variables
        $('.publicationAnnonce').on('click',function(){
            var intitulePost,typeContrat,experienceRequise,descriptionPost,competences,mission,sexeP,lieuAffectation,envoit_cv,dateLimite,heureLimite;

            intitulePost=$('#intitulePost').val();
            typeContrat=$('#typeContrat').val();
            experienceRequise=$('#experienceRequise').val();
            descriptionPost=$('#descriptionPost').val();
            competences=$('#competenceRequise').val();
            mission=$('#mission').val();
            sexeP=$('.genre').val();
            lieuAffectation=$('#lieuAffectation').val();
            envoit_cv=$('#envoit_cvLocal').val();
            dateLimite=$('#dateLimite').val();
            heureLimite=$('#heureLimite').val();
            var msg_annonces=$('.msg_annonces');


            if(intitulePost=='' || typeContrat=='' || experienceRequise=='' ||descriptionPost=='' || competences=='' || mission=='' || lieuAffectation=='' || dateLimite=='' || heureLimite==''){
                $('#container-publication-annonces').find('input,textarea,select').each(function () {
                    $(this).addClass('input-error');
                });
            }
            else {
                $.ajax({
                    url:"../../controller/addAnnonces.php",
                    type:"post",
                    data:{
                        'intitulePost':intitulePost,
                        'typeContrat':typeContrat,
                        'experienceRequise':experienceRequise,
                        'descriptionPost':descriptionPost,
                        'competences':competences,
                        'mission':mission,
                        'sexeP':sexeP,
                        'lieuAffectation':lieuAffectation,
                        'envoit_cv':envoit_cv,
                        'dateLimite':dateLimite,
                        'heureLimite':heureLimite
                    },
                    success:function(data){
                        msg_annonces.html(data);
                    }
                });
            }
        });
        $('.apercusAnnonce').on('click',function(){
            var intitulePost,typeContrat,experienceRequise,descriptionPost,competences,mission,lieuAffectation,msg_errors;

            intitulePost=$('#intitulePost').val();
            typeContrat=$('#typeContrat').val();
            experienceRequise=$('#experienceRequise').val();
            descriptionPost=$('#descriptionPost').val();
            competences=$('#competenceRequise').val();
            mission=$('#mission').val();
            lieuAffectation=$('#lieuAffectation').val();
            msg_errors=$('.msg_errors');


            if(intitulePost=='' /*|| typeContrat=='' || experienceRequise=='' ||descriptionPost=='' || competences=='' || mission=='' || lieuAffectation==''*/){
                msg_errors.html('veuillez remplire tous les champs');
            }
            else {
                $('.apercus_annonces').slideDown().html(intitulePost);
            }
        });

        $('#container-publication-annonce').css("display","none");
        //$("span.timeago").timeago();

        $("#btn_publication_annonce").click(function () {
            $('#container-publication-annonce').show();
            $('#container-carriere').hide();
        });
    });
</script>
