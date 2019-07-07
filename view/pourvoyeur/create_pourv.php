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
        <form action="../../controller/createRecruteurProfil.php" method="post">
                <div class="wizards" align="right">
                    <div class="progressbar">
                        <div class="progress-line" data-now-value="12.11" data-number-of-steps="3" style="width: 12.11%;"></div> <!-- 19.66% -->
                    </div>
                    <div class="form-wizard active">
                        <div class="wizard-icon"><i class="fa fa-building"></i></div>
                        <p>Entreprise</p>
                    </div>

                    <div class="form-wizard">
                        <div class="wizard-icon"><i class="fa fa-user"></i></div>
                        <p>Autres</p>
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
                    <div class="row box-profil_container" style="border: 1px dashed #ccc">
                        <div class="col-sm-7">
                        </div>
                        <div style="border-left: 1px solid #f7f7f7" class="col-sm-5">
                            <div class="form-group">
                                <label for="nomEntreprise"><i class="fa fa-road"></i> Nom de l'Entrprise</label>
                                <input class="form-control-input" name="nomEntreprise" id="nomEntreprise" type="text">
                            </div>
                            <div class="form-group">
                                <label for="secteurActivite"><i class="fa fa-link"></i> Secteur d'activité</label>
                                <select class="form-control-input" name="secteurActivite" id="secteurActivite" type="text">
                                    <option>selectionnez...</option>
                                    <?php
                                    include_once '../../globals/database.php';
                                    include_once '../../model/Connexion.class.php';

                                    $con=Connexion::getConnexion();
                                    $requete="select * from secteurs ORDER by nomSecteur ASC";
                                    $stm=$con->prepare($requete);
                                    $stm->execute();
                                    $result=$stm->fetchAll();

                                    $output='';
                                    if(sizeof($result)>0){
                                        foreach ($result as $row){
                                            $output .="<option value='".$row['nomSecteur']."'>".$row['nomSecteur']."</option>";
                                        }
                                    }
                                    else{
                                        echo '';
                                    }
                                    echo $output;
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomEntreprise"><i class="fa fa-road"></i> Adresse</label>
                                <input class="form-control-input" name="adresse" id="adresse" type="text">
                            </div>
                            <div class="form-group">
                                <?php
                                //Include database configuration file
                                include_once '../../globals/database.php';
                                include_once '../../model/Connexion.class.php';

                                $con=Connexion::getConnexion();

                                //Get all country data
                                $query = "SELECT * FROM pays  ORDER BY nomPays ASC";
                                $stm =$con->prepare($query);
                                $stm->execute();
                                //Count total number of rows
                                $count = $stm->fetchAll();
                                ?>
                                <label>Pays</label>
                                <select name="pays" id="pays" class="form-control-input">
                                    <option value="">Votre pays</option>
                                    <?php
                                    if(sizeof($count) > 0){
                                        foreach($count as $row){
                                            $idPays=$row['idPays'];
                                            $nomPays=$row['nomPays'];
                                            echo "<option value='$nomPays'>$nomPays</option>";
                                        }
                                    }else{
                                        echo '<option value="">ce pays est invalide</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <script>
                                    $(document).ready(function (){
                                        $('#pays').on('change',function () {
                                            var monpays = $(this).val();
                                            if(monpays){

                                                $.ajax({
                                                    type:'POST',
                                                    url:'../../controller/localisation.php',
                                                    data:{'monpays':monpays},
                                                    success:function(data){
                                                        $('#ville').html(data);
                                                    }
                                                });
                                            }else{
                                                $('#ville').html('<option value="">Selection d\'abord le pays</option>');
                                            }
                                        })
                                    });
                                </script>
                                <label>Ville /Region</label>
                                <select name="ville" id="ville" class="form-control-input">
                                    <option value="">votre ville de residence</option>
                                </select>
                            </div>
                            <div class="wizard-buttons" align="right">
                                <button type="button" class="btn btn-next pull-right">Suivant <span class="fa fa-arrow-right"></span></button>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="row box-profil_container">
                        <div class="col-sm-6">


                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lien1"><i class="fa fa-link"></i> site web</label>
                                <input class="form-control-input" name="lien1" id="lien1" type="text">
                            </div>
                            <div class="form-group">
                                <label for="description"><i class="fa fa-"></i> Description</label>
                                <textarea class="form-control-input" name="description" type="text" id="description" style="max-height: 4rem;min-height: 4rem" placeholder="decrivez en peu des mots sur ..."></textarea>
                            </div>
                            <small style="color: #062c5c;font-size: small">Pour le champ 'site web' si vous n'avez pas d'information, veuillez y mettre un tiré (-) </small>

                            <div class="form-group">
                                <label for="telephone"><i class="fa fa-link"></i> telephone 1</label>
                                <input class="form-control-input" name="telephone" id="telephone" type="text">
                            </div>
                            <div class="form-group">
                                <label for="telephone2"><i class="fa fa-link"></i> telephone 2</label>
                                <input class="form-control-input" name="telephone2" id="telephone2" type="text">
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
                        <h1>Veillez cliquer sur le bouton 'Enregistrer' pour pouvoir creer votre profil</h1>
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
</body>
<script src="../static/dist/js/script.js"></script>
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


