<?php
$title="Mon compte";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<input id="id_user" hidden value="<?=$_GET[ID_USER]?>">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    <div class="col-sm-12" id="profil_container">
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
                    <div class="col-sm-12" id="profil_container">
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
                    <div class="col-sm-12" id="profil_container">
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
                    <div class="col-sm-12" id="profil_container">
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
                    <div class="col-sm-12" id="profil_container">
                        <div class="box-profil_container" style="color: #9d9d9d;!important;">
                            <h5><i class="fa fa-language"></i> &nbsp;Mes Langues</h5>
                            <hr>
                            <span style="color: #002040;font-size: small">vous avez déjà completé cette rubrique à 0%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="featurette-divider"></div>
                    <form action="" method="post">
                        <div id="formations" class="card">
                            <div class="card-header">
                                <h3 class="text-center"><i class="fa fa-university"></i> AJOUTER UNE FORMATION</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dateDebut">Date de debut</label>
                                            <?php
                                            $dateystem=date('Y');$datedebut=$dateystem-80;
                                            //date debut
                                            echo '<select id="dateDebut" class="form-control" name="dateDebut">
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
                                            <select id="dateFin" class="form-control" name="dateFin">
                                            </select>
                                            <script>
                                                //le scripte nous permetant de remplire la date de fin
                                                $(document).ready(function (){
                                                    $('#dateDebut').on('change',function () {
                                                        var s1 = $(this).val();
                                                        var annee, madate, dateD, incr=0;

                                                        madate = new Date();
                                                        annee = madate.getFullYear();
                                                        dateD = parseInt(annee) - parseInt(s1);
                                                        //alert(dateD);
                                                        $('#dateFin').empty();
                                                        if(s1){
                                                            for(i=1 ; i<= dateD ; i++ ){
                                                                incr = parseInt(s1)+i;
                                                                $('#dateFin').append('<option>'+incr+'</option>');
                                                            }
                                                        }
                                                    });

                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titreDiplome">Titre du diplome</label>
                                            <input id="titreDiplome" class="form-control" name="titreDiplome">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ecoleUniversite">Université - Ecole</label>
                                            <input id="ecoleUniversite" class="form-control" name="ecoleUniversite">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descriptionFormat">Description</label>
                                    <textarea name="descriptionFormat" id="descriptionFormat" placeholder="votre description..." class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn-sm btn btn-nav pull-right" id="formationEU">ENREGISTRER</button>
                                </div>
                                <p id="msgFormation"></p>
                            </div>
                        </div>
                    </form>
                    <div class="featurette-divider"></div>
                    <form onsubmit="return false" method="post">
                        <div class="experience card">
                            <div class="card-header" style="background: rgba(0,51,51,0.75)">
                                <h3 class="text-center text-white">AJOUTER UNE EXPERIENCE PROFESSIONNELLE</h3>
                            </div>
                            <div class="card-body" id="experienceEXP">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dateDebuExpt">Date de debut</label>
                                            <?php
                                            $dateystem=date('Y');$datedebut=$dateystem-80;
                                            //date debut
                                            echo '<select id="dateDebutExp" class="form-control dateDebutExp" name="dateDebutExp">
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
                                            <label for="dateFinExp">Date de fin</label>
                                            <select id="dateFinExp" class="form-control dateFin dateFinExp" name="dateFinExp">
                                            </select>
                                            <script>
                                                //le scripte nous permetant de remplire la date de fin
                                                $(document).ready(function (){
                                                    $('.dateDebutExp').on('change',function () {
                                                        var s1 = $(this).val();
                                                        var annee, madate, dateD, incr=0;

                                                        madate = new Date();
                                                        annee = madate.getFullYear();
                                                        dateD = parseInt(annee) - parseInt(s1);
                                                        //alert(dateD);
                                                        $('.dateFinExp').empty();
                                                        if(s1){
                                                            for(i=1 ; i<= dateD ; i++ ){
                                                                incr = parseInt(s1)+i;
                                                                $('.dateFinExp').append('<option>'+incr+'</option>');
                                                            }
                                                        }
                                                    });

                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titrePostExp">Titre du post</label>
                                            <input  id="titrePostExp" class="form-control" name="titrePostExp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomEntrepriseExp">Nom de l'entreprise</label>
                                            <input name="nomEntrepriseExp" id="nomEntrepriseExp" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="secteurActiviteExp">Secteur d'activité</label>
                                    <select  id="secteurActiviteExp" class="form-control" name="secteurActiviteExp">
                                        <option>...</option>
                                        <?php
                                            include_once '../../globals/database.php';
                                            include_once '../../model/Connexion.class.php';

                                            $con=Connexion::getConnexion();
                                            $requete='SELECT * FROM secteurs';
                                            $stm=$con->prepare($requete);
                                            $stm->execute();
                                            $result=$stm->fetchAll();

                                            foreach ($result as $res){
                                                echo '<option value="'.$res['nomSecteur'].'">'.$res['nomSecteur'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="descriptionExp">Description</label>
                                    <textarea name="descriptionExp" id="descriptionExp" placeholder="votre description..." class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-sm btn btn-nav pull-right" id="enregisterExp"> Enregistrer l'Experience</button>
                                </div>
                                <p id="msgE"></p>
                            </div>
                        </div>
                    </form>
                    <div class="featurette-divider"></div>
                    <form onsubmit="return false" method="post">
                        <div id="certifications" class="card">
                            <div class="card-header" style="background: rgba(0,0,0,0.57)">
                                <h3 class="text-center text-white-50"><i class="fa fa-certificate"></i> AJOUTER UNE CERTIFICATION</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12" style="background-color: #fff">
                                        <div class="form-group">
                                            <label for="titreCert">Titre de la certification</label>
                                            <input name="titreCert" id="titreCert" placeholder="ex. certification en micreosoft word..." class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="lieuCert">Lieu de la certification</label>
                                            <input name="lieuCert" id="lieuCert" placeholder="ex. centre de formation..." class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="descriptionCert">Description de la certification</label>
                                            <textarea name="descriptionCert" id="descriptionCert" placeholder="votre description..." class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn-sm btn btn-nav pull-right" value="Enregistrer la certification" id="enregistrerCert" name="enregistrerCert">
                                        </div>
                                        <p id="msgCert"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="featurette-divider"></div>
                    <form onsubmit="return false" method="post">
                        <div id="languages" class="card">
                            <div class="card-header" style="background: rgba(0,0,0,0.57)">
                                <h3 class="text-center text-white-50"><i class="fa fa-certificate"></i> AJOUTER UNE LANGUE</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12" style="background-color: #fff">
                                        <div class="form-group">
                                            <label for="langue">Langue parlée</label>
                                            <input name="langue" id="langue" placeholder="ex. Anglais" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="niveau">Niveau de la langue</label>
                                            <select name="niveau" id="niveau" class="form-control">
                                                <option>...</option>
                                                <option value="Moyenne"> Moyen</option>
                                                <option value="Bon"> Bon</option>
                                                <option value="Tre bon"> Tre bon</option>
                                                <option value="Excelent"> Excelent</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn-sm btn btn-nav pull-right" value="Enregistrer la lsngur" id="enregistrerLangue" name="enregistrerLangue">
                                        </div>
                                        <p id="msgLangue"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="featurette-divider"></div>
                    <form onsubmit="return false"  name="add_competence" id="add_competence">
                        <div id="competences" class="card">
                            <div class="card-header" style="background: rgba(53,95,73,0.77)">
                                <h3 class="text-center card-title text-white-50"><i class="fa fa-dot-circle-o"></i> AJOUTER VOTRE COMPETENCE</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12" style="background-color: #fff">
                                        <table class="table tab-content" id="dynamyc_field">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="descriptionComp">Description</label>
                                                        <input id="descriptionComp" name="descriptionComp[]" placeholder="votre description..." class="form-control name_list">
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" name="add" id="add" class="btn btn-outline-success">+</button>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="form-group">
                                            <button type="submit" class="btn-sm btn btn-nav pull-right" id="competence">Enregistrer votre Competence</button>
                                        </div>
                                        <p id="msgComp"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="separator"></div>
        </div>
    </div>
    <!--=====================================================--->
</div>
<?php include '../footer.php';?>
<script src="../static/dist/js/addExperiencesFormationCompetencesCertifications.js"></script>

<script>
    $(document).ready(function() {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });

    });
</script>
</body>



