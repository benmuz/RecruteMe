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
    #division-nonsalarier,#nonSalarierNON,.create-final,.create-two{
        display:none ;
    }
</style>
    <?php include_once '../partial_nav.php';?>
    <div class="container">
        <form name="createProfil" action="../../controller/createProfessionalProfil.php" method="post">
            <div class="row">
            <div class="col-sm-7 create-one" style="padding-top:2rem ">
                <h1 style="font-size: 4em;color: #666;">Salut <?=$_SESSION['pseudo']?> !</h1>
                <h4>Nous allons commencer a creer votre profil professionnel, l'etape indispensable pour permettre aux recruteurs de visualiser votre profil.</h4>
                <p><em>Renseigner les informations correctes qui vous conserne</em></p>
            </div>
            <div class="col-sm-5 create-one" id="col-sm-5">
                <div class="row box-profil_container" style="border: 1px dashed #ccc">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control-input" placeholder="votre nom"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" name="prenom" id="prenom" class="form-control-input" placeholder="votre prenom"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>genre</label>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input checked type="radio" class="genre" name="genre" value="M"/> <label><i class="fa fa-male"></i> Masculin</label>
                                </div>
                                <div class="col-sm-6">
                                    <input  type="radio" name="genre" class="genre" value="F"/> <label><i class="fa fa-female"></i> Feminin</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input name="telephone" id="telephone" type="tel" class="form-control-input">
                        </div>
                        <div class="row">
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
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ville /Region</label>
                                    <select name="ville" id="ville" class="form-control-input">
                                        <option value="">votre ville de residence</option>
                                    </select>
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
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="adresse" id="adresse" class="form-control-input" placeholder="ex.">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input checked type="radio" name="situationProfessionnelle" class="salarier situationProfessionnelle" value="<?=SITUATION_PROFESSIONNELLE_SALARIER?>"/> <label> Salarier</label><br>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="radio" name="situationProfessionnelle" id="non_salarier situationProfessionnelle" class="no_salarier" value="<?=SITUATION_PROFESSIONNELLE_NON_SALARIER?>"/> <label> Non Salarier</label>
                                </div>
                            </div>
                        </div>
                        <label class="form-group">
                            <input class="etatEmploi" id="etatEmploi" type="checkbox" checked name="etatEmploi"> Je suis disponible pour l'emploi
                        </label>
                        <p class="msg_erreur1"></p>
                        <div class="form-group">
                            <button type="submit"  class="btn btn-nav saveProfil btn-sm pull-right" id="saveProfil">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <?php include_once '../footer.php';?>
</body>

<script type="text/javascript">
    $(document).ready(function () {



        cheking_the_radio_for_situationProfessionnelle();
        function cheking_the_radio_for_situationProfessionnelle() {
            $('.salarier').click(function () {
                $('#division-salarier').show();
                $('#division-nonsalarier').hide();
                $("#nonSalarierOUI").hide();
                $("#nonSalarierNON").hide();
            });
            $('.no_salarier').click(function () {

                $('#division-salarier').hide();
                $('#division-nonsalarier').show();
                $("#nonSalarierOUI").show();
                $("#nonSalarierNON").hide();
            });
            $('#nonSalarier_oui').click(function(){
                $('#division-salarier').hide();
                $('#division-nonsalarier').show();
                $("#nonSalarierOUI").show();
                $("#nonSalarierNON").hide();
            });
            $('#nonSalarier_non').click(function(){
                $('#division-salarier').hide();
                $('#division-nonsalarier').show();
                $("#nonSalarierOUI").hide();
                $("#nonSalarierNON").show();
            });
        }
        btn_suivant();

        function btn_suivant(){
            $('#col-sm-5').find('input[name=nom],input[name=prenom],input[name=telephone],select[name=pays],select[name=ville],input[name=adresse]').each(function () {
               $(this).focus(function () {
                   $(this).removeClass('input-error');
               });
            });
            $('#suivant_').click(function () {
                $('#col-sm-5').find('input[name=nom],input[name=prenom],input[name=telephone],select[name=pays],select[name=ville],input[name=adresse]').each(function () {
                    if($(this).val()==""){
                        $(this).addClass('input-error');
                    }
                    else if($(this).val() !=""){
                        $('.create-one').hide();
                        $('.create-two').show();
                    }
                });
            });

            /*$('#saveProfil').click(function () {
                var nom,prenom,genre,telephone,adresse,pays,ville,situationProfessionnelle,statutProfessionel,etatEmploi,dateDebut,dateFin,nomEntreprise,nomPost,description,dateDebutf,dateFinf,ecole,diplome,descriptionf;

                nom=$('#nom').val();
                prenom=$('#prenom').val();
                genre=$('.genre').val();
                telephone=$('#telephone').val();
                adresse=$('#adresse').val();
                ville=$('#ville').val();
                pays=$('#pays').val();
                dateFin=$('#dateFin').val();
                dateFin=$('#dateDebut').val();
                nomEntreprise=$('#nomEntreprise').val();
                nomPost=$('#nomPost').val();
                description=$('#description').val();
                situationProfessionnelle=$('.situationProfessionnelle').val();
                statutProfessionel=$('.statutProfessionnel').val();
                etatEmploi=$('#etatEmploi').val();

                $.ajax({
                   url:'../../controller/createProfessionalProfil.php',
                   type:'post',
                   data:{
                       'nom':nom,
                       'prenom':prenom,
                       'genre':genre,
                       'telephone':telephone,
                       'pays':pays,
                       'ville':ville,
                       'adresse':adresse,
                       'dateDebut':dateDebut,
                       'situationProfessionnelle':situationProfessionnelle,
                       'statutProfessionel':statutProfessionel,
                       'dateFin':dateFin,
                       'nomEntreprise':nomEntreprise,
                       'nomPost':nomPost,
                       'description':description
                   },
                   success:function (data) {
                       $('.msg_erreur').html(data);
                   }
               })
            });*/
        }
            /*$('#savep').click(function () {
                var nom,prenom,genre,telephone,adresse,pays,ville,situationProfessionnelle,statutProfessionel,etatEmploi,dateDebutf,dateFinf,ecole,diplome,descriptionf;

                nom=$('#nom').val();
                prenom=$('#prenom').val();
                genre=$('.genre').val();
                telephone=$('#telephone').val();
                adresse=$('#adresse').val();
                ville=$('#ville').val();
                pays=$('#pays').val();
                dateFinf=$('#dateFinp').val();
                dateFinf=$('#dateDebutp').val();
                ecole=$('#ecoleUniversite').val();
                diplome=$('#diplome').val();
                descriptionf=$('#descriptionf').val();
                situationProfessionnelle=$('.situationProfessionnelle').val();
                statutProfessionel=$('.statutProfessionnel').val();
                etatEmploi=$('#etatEmploi').val();

                $.ajax({
                    url:'../../controller/createProfessionalProfil.php',
                    type:'post',
                    data:{
                        'nom':nom,
                        'prenom':prenom,
                        'genre':genre,
                        'telephone':telephone,
                        'pays':pays,
                        'ville':ville,
                        'adresse':adresse,
                        'dateDebut':dateDebut,
                        'situationProfessionnelle':situationProfessionnelle,
                        'statutProfessionel':statutProfessionel,
                        'dateFin':dateFin,
                        'nomEntreprise':nomEntreprise,
                        'nomPost':nomPost,
                        'description':description
                    },
                    success:function (data) {
                        return data;
                    }
                })
            });
            $('#savef').click(function () {

                var nom,prenom,genre,telephone,adresse,pays,ville,situationProfessionnelle,statutProfessionel,etatEmploi,dateDebutf,dateFinf,ecoleUniversite,diplome,descriptionf;

                nom=$('#nom').val();
                prenom=$('#prenom').val();
                genre=$('.genre').val();
                telephone=$('#telephone').val();
                adresse=$('#adresse').val();
                ville=$('#ville').val();
                pays=$('#pays').val();
                dateFinf=$('#dateFinf').val();
                dateDebutf=$('#dateDebutf').val();
                ecoleUniversite=$('#ecoleUniversite').val();
                diplome=$('#diplome').val();
                descriptionf=$('#descriptionf').val();
                situationProfessionnelle=$('.situationProfessionnelle').val();
                statutProfessionel=$('.statutProfessionnel').val();
                etatEmploi=$('#etatEmploi').val();

                $.ajax({
                    url:'../../controller/createProfessionalProfil2.php',
                    type:'post',
                    data:{
                        'nom':nom,
                        'prenom':prenom,
                        'genre':genre,
                        'telephone':telephone,
                        'pays':pays,
                        'ville':ville,
                        'adresse':adresse,
                        'dateDebutf':dateDebutf,
                        'situationProfessionnelle':situationProfessionnelle,
                        'statutProfessionel':statutProfessionel,
                        'dateFinf':dateFinf,
                        'ecoleUniversite':ecoleUniversite,
                        'diplome':diplome,
                        'descriptionf':descriptionf
                    },
                    success:function (data) {
                        if( data == 'success'){
                            window.location = "profile.php?";
                        }
                        else{
                            $('.statut_f').html(data).css({'color':'#cc0000'}).fadeOut(5500);
                        }
                    }
                })
            });
        }*/

    });
</script>


