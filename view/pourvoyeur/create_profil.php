<?php
session_start();
include_once '../../globals/situationProfessionnel.php';
include_once '../header.php';
include_once '../partial_nav.php';
?>
<style>

    body{
        padding-top: 90px;
        background-color:#f1f1f1;
    }

    .actives{
        background-color: #28A745;
        color: #fff;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }
    .no-active{

        border:1px ridge #08345f;
        color: #08345f;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }
    .passed{
        border:1px ridge #08345f;
        background:#08345f;
        width: 15px;
        height: 15px;
        border-radius: 50%;
    }
    ul li{
        margin-right:0.2rem ;
        display: inline-block;
    }
    #nonsalarier,.annex_non_salarier,#slide_creating_two{
        display:none ;
    }
</style>
<body>
    <div class="content">
        <div class="container">
            <div class="container">
                <form action="../../controller/createProfessionalProfil.php" method="post">
                    <div class="wizards">
                        <div class="progressbar">
                            <div class="progress-line" data-now-value="12.11" data-number-of-steps="4" style="width: 12.11%;"></div> <!-- 19.66% -->
                        </div>
                        <div class="form-wizard active">
                            <div class="wizard-icon"><i class="fa fa-user"></i></div>
                            <p>A propos de vous</p>
                        </div>
                        <div class="form-wizard">
                            <div class="wizard-icon"><i class="fa fa-book"></i></div>
                            <p>Situation professionnelle</p>
                        </div>
                        <div class="form-wizard">
                            <div class="wizard-icon"><i class="fa fa-globe"></i></div>
                            <p>Liens externe</p>
                        </div>
                        <div class="form-wizard">
                            <div class="wizard-icon"><i class="fa fa-check-circle"></i></div>
                            <p>Fin</p>
                        </div>
                    </div>
                    <!--<fieldset>
                        <iframe src="license.txt"></iframe>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="yes"> I agree with this license
                        </label>
                        <div class="wizard-buttons">
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </fieldset>-->
                    <fieldset>
                        <div class="row box-profil_container">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="nom" class="form-control-input" placeholder="votre nom"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" name="prenom" class="form-control-input" placeholder="votre prenom"/>
                                        </div>
                                        <div class="form-group">
                                            <label>genre</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input checked type="radio" name="genre" value="M"/> <label><i class="fa fa-male"></i> Masculin</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input  type="radio" name="genre" value="F"/> <label><i class="fa fa-female"></i> Feminin</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input name="telephone" type="tel" class="form-control-input">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pays</label>
                                            <input type="text" name="pays" class="form-control-input"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Province /Etat</label>
                                            <input type="text" class="form-control-input" />
                                        </div>
                                        <div class="form-group">
                                            <label>Ville /Region</label>
                                            <input type="text" name="ville" class="form-control-input" />
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="adresse" class="form-control-input" placeholder="ex.">
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-buttons">
                                    <button type="button" class="btn btn-next">Suivant <span class="fa fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row box-profil_container">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><span class="fa fa-address-book-o"></span> Situation Professionnel</label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input checked type="radio" name="situationProfessionnelle" class="salarier" value="<?=SITUATION_PROFESSIONNELLE_SALARIER?>"/> <label> Salarier</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="radio" name="situationProfessionnelle" class="no_salarier" value="<?=SITUATION_PROFESSIONNELLE_NON_SALARIER?>"/> <label> Non Salarier</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input checked type="checkbox" name="activites" class="annex_non_salarier" value="je suis dans les activites liberales">
                                            <label for="annex_non_salarier" class="annex_non_salarier"> Je suis dans mes activites liberales</label>
                                        </div>
                                        <div class="form-group">
                                            <label><span class="fa fa-building"></span> Statut Professionnel</label><br>
                                            <input type="checkbox" name="etatEmploi" value="1"/> <label>Je suis disponible pour l'emploi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="salarier">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="dateDebut"><i class="fa fa-calendar"></i> Date de debut</label>
                                                    <input class="form-control-input" name="dateDebut" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="dateFin"><i class="fa fa-calendar"></i> Date de fin</label>
                                                    <input class="form-control-input" name="dateFin" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nomPost"><i class="fa fa-building"></i> Post occupe</label>
                                            <input class="form-control-input" name="nomPost" id="nomPost" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="nomEntreprise"><i class="fa fa-road"></i> Nom de l'Entrprise</label>
                                            <input class="form-control-input" name="nomEntreprise" id="nomEntreprise" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="description"><i class="fa fa-"></i> Description</label>
                                            <textarea class="form-control-input" name="description" type="text" id="description" style="max-height: 4rem;min-height: 4rem" placeholder="decrivez en peu des mots sur ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-buttons">
                                    <button type="button" class="btn btn-previous"><span class="fa fa-arrow-left"></span> Precedent</button>
                                    <button type="button" class="btn btn-next">Suivant <span class="fa fa-arrow-right"></span></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row box-profil_container">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" name="noms" class="form-control-input" placeholder="votre nom"/>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pays</label>
                                            <input type="text" name="name" class="form-control-input"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="wizard-buttons">
                                    <button type="button" class="btn btn-previous"><span class="fa fa-arrow-left"></span> Precedent</button>
                                    <button type="button" class="btn btn-next">Suivant <span class="fa fa-arrow-right"></span> </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="jumbotron text-center">
                            <h1><b><?=$_SESSION['pseudo'];?></b>! Veillez cliquer sur le bouton 'Enregistrer' pour pouvoir creer votre profil</h1>
                            <p>ou</p>
                            <h3>vous pouvez verifier toutes vos informations avant de valider</h3>
                        </div>
                        <div class="wizard-buttons">
                            <button type="button" class="btn btn-previous"> <span class="fa fa-arrow-left"></span> Precedent</button>
                            <button type="submit" name="save" class="btn btn-nav btn-submit">Enregistrer</button>
                        </div>
                    </fieldset>
                </form>
            </div>
    </div>
</body>

<script>
    $(document).ready(function () {

        cheking_the_radio_for_situationProfessionnelle();
        //creating_professional_profil();

        function cheking_the_radio_for_situationProfessionnelle() {
            $('.salarier').click(function () {
                $('#salarier').show();
                $('#nonsalarier').hide();
                $(".annex_non_salarier").hide();
            });
            $('.no_salarier').click(function () {
                $('#salarier').show();
                $(".annex_non_salarier").fadeIn(400);
            });
        }

        function creating_professional_profil(){
            $('#one_creation').submit(function () {
                var statut=$('.statut_msg');
                var nom=$('#nom').val();
                var prenom=$('#prenom').val();
                var genre=$('.genre').val();
                var telephone=$('#telephone').val();
                var pays=$('#pays').val();
                var ville=$('#ville').val();
                var adresse=$('#adresse').val();
                var idUser=$('#idUser').val();

                if(nom=="" || prenom =="" /*|| genre=="" || telephone=="" || pays=="" || ville=="" || adresse==""*/){
                    statut.html('verifiez que tous les champs sont remplis');
                }
                else{
                    $.ajax({
                        url:"../../controller/createProfilProfessionnelOne.php",
                        method:"POST",
                        data:{
                            'nom':nom,
                            'prenom':prenom,
                            'genre':genre,
                            'telephone':telephone,
                            'pays':pays,
                            'ville':ville,
                            'adresse':adresse,
                            'idUser':idUser
                        },
                        success:function (data) {
                            if(data != "success"){
                                statut.html(data).show();
                            }
                            else {
                                statut.hide();
                                $("#slide_creating_one").fadeOut(500);
                                $("#slide_creating_two").fadeIn(1000);
                                $('#a1').removeClass('actives').addClass('passed');
                                $('#a2').addClass('actives').removeClass('no-active');
                            }
                        }
                    });

                }

            });
        }



        $('.suivant_two').click(function () {
            var statut=$('.statut_msg2');
            var etatEploi=$('#etatEploi').val();
            var dateDebut=$('#dateDebut').val();
            var dateFin=$('#dateFin').val();
            var nomEntreprise=$('#nomEntreprise').val();
            var nompost=$('#nomPost').val();
            var description=$('#description').val();
            var idUser=$('#idUser');

            if(etatEploi=="" || dateDebut=="" || dateFin=="" || nomEntreprise=="" || nompost=="" || description==""){
                statut.html('verifiez que tous les champs sont remplis');
            }
            else{

            }

        });
    });
</script>


