<?php
session_start();
include_once '../../globals/situationProfessionnel.php';
include_once '../header.php';
?>

<body>
    <style>

    body{
        padding-top: 90px;
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
    <?php include_once '../partial_nav.php';?>
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
                    </fieldset>
                    <fieldset>
                        <div class="row box-profil_container" style="border: 1px dashed #ccc">
                            <div class="col-sm-4">
                                <h2> Salut <?= $_SESSION['pseudo']?> !</h2><hr>
                                <h5>Nous allons commencer a creer votre profil professionnel <span><?=WEBSITE_NAME?></span></h5>
                                <p>priere de fournir les informations correctes et precises sur ce qui vous conserne</p>
                            </div>
                            <div class="col-sm-8" style="border-left: 1px solid #ccc">
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
                    </fieldset>-->
                    <fieldset>
                        <div class="row box-profil_container" style="border: 1px dashed #ccc">
                            <div class="col-sm-4">
                                <h5><span class="fa fa-address-book-o"></span> Votre situation professionnelle</h5>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input checked type="radio" name="situationProfessionnelle" class="salarier" value="<?=SITUATION_PROFESSIONNELLE_SALARIER?>"/> <label> Salarier</label><br>
                                            <input type="radio" name="situationProfessionnelle" class="no_salarier" value="<?=SITUATION_PROFESSIONNELLE_NON_SALARIER?>"/> <label> Non Salarier</label>

                                        </div>
                                        <div class="form-group">
                                            <label for="monProfil" class="annex_non_ "> Votre Profil</label>
                                            <input name="monProfil" class="annex_non_ form-control-input" placeholder="ex. developpeur java">
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" name="etatEmploi"/> <label>Je suis disponible pour l'emploi</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" id="salarier">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateDebut">Date de debut</label>
                                                    <?php
                                                    $dateystem=date('Y');$datedebut=$dateystem-80;
                                                    //date debut
                                                    echo '<select id="dateDebut" class="form-control-input dateDebut" name="dateDebut">
                                            <option>Date de debut</option>';
                                                    for ($datedebut=$dateystem-80; $datedebut<=$dateystem; $datedebut++){
                                                        echo '<option value="'.$datedebut.'">'.$datedebut.'</option>';
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="dateFin">Date de fin</label>
                                                    <select id="dateFin" class="form-control-input dateFin" name="dateFin">
                                                    </select>
                                                    <script>
                                                        //le scripte nous permetant de remplire la date de fin
                                                        $(document).ready(function (){
                                                            $('.dateDebut').on('change',function () {
                                                                var s1 = $(this).val();
                                                                var annee, madate, dateD, incr=0;

                                                                madate = new Date();
                                                                annee = madate.getFullYear();
                                                                dateD = parseInt(annee) - parseInt(s1);
                                                                //alert(dateD);
                                                                $('.dateFin').empty();
                                                                if(s1){
                                                                    for(i=1 ; i<= dateD ; i++ ){
                                                                        incr = parseInt(s1)+i;
                                                                        $('.dateFin').append('<option>'+incr+'</option>');
                                                                    }
                                                                }
                                                            });

                                                        });
                                                    </script>
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
                        <div class="row box-profil_container" style="border: 1px dashed #ccc">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fa fa-facebook-official"></i> Lien facebook</label>
                                    <input  name="lien1" class="form-control-input" placeholder="lien vers facebook"/>
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-linkedin-square"></i> Lien LinkedIn</label>
                                    <input  name="lien2" class="form-control-input" placeholder=" lien vers linkedIn"/>
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-link"></i> Autre lien externe</label>
                                    <input  name="lien3" class="form-control-input" placeholder="lien vers meme votre site Web"/>
                                </div>
                                <div class="wizard-buttons">
                                    <button type="button" class="btn btn-previous"><span class="fa fa-arrow-left"></span> Precedent</button>
                                    <button type="button" class="btn btn-next">Suivant <span class="fa fa-arrow-right"></span> </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="jumbotron text-center" style="border: 1px dashed #ccc">
                            <h1><b><?=$_SESSION['pseudo'];?></b>!  Cliquez sur le bouton 'Enregistrer' pour pouvoir creer votre profil</h1>
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
        $('#nomEntreprise').removeAttr('type','text');
        function cheking_the_radio_for_situationProfessionnelle() {
            $('.salarier').click(function () {
                $('#salarier').show();
                $('#nonsalarier').hide();
                $(".annex_non_salarier").hide();
            });
            $('.no_salarier').click(function () {
                $('#salarier').fadeOut(1500).remo;
                $('#nomPost').removeAttr('type','text');

                $('#description').removeAttr('type','text');
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


