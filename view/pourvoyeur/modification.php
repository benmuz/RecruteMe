<?php
$title="Profil du professionnel";
include '../header.php';
?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<style>
    .avatar-profil{
        width: 300px;
        height: 200px;
    }
</style>
<div class="container">
    <?php if($_SESSION['id']==$_GET[ID_USER]):?>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="border-radius: inherit;">
                            <div class="card-header " style="min-height: 12rem">
                            </div>
                            <div class="box-avatar text-center" style="margin-top: -7rem">
                                <a href="#" class="modifier"><span><img class="img-thumbnail avatar-profil  " src="../../avatar_pourv/<?= $_SESSION['avatar'];?>" style="width: 10rem">
                            </span></a>
                            </div>
                            <div class="card-body text-center">
                                <div class="edit-profilp">
                                    <span><a href="#" class="modifier">Modifiez... <i class="fa fa-pencil"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="featurette-divider"></div>
                    <div class="col-md-12" id="profil_container">
                        <div class="card" style="border-radius: inherit">
                            <div class="card-header" style="background-color: rgb(0,51,51);color: #fff;border-radius: inherit">
                                <h5 class="card-title "><i class="fa fa-user"></i> VOS COORDONNEES</h5>
                            </div>
                            <div class="card-body">
                                <span id="msg_coordonnee" class="text-center"></span>
                                <hr class="featurette-heading">
                                <div class="box-text-profilp">
                                    <div class="form-group">
                                        <label><i class="fa fa-key"></i> Ancien Mot De Passe</label>
                                        <input id="ancienMotDePasse" class="form-control-input">
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fa fa-key"></i> Nouveau Mot De Passe</label>
                                        <input id="nouveauMotDePasse" class="form-control-input">
                                    </div>
                                    <div class="form-group">
                                        <label><i class="fa fa-key"></i> Confirmer Mot De Passe</label>
                                        <input id="confimerMotDePasse" class="form-control-input">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm btn_coordonnees pull-right">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="featurette-divider"></div>
                    </div>
                </div>
            </div>
            <!--=====================================================--->
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-md-7 box-profil_container" id="profil_container">
                        <p id="msg_" class="text-center"></p>
                        <div class="form-group">
                            <input name="idProfil" id="idProfil" type="hidden" class="form-control">
                        </div>
                        <div class="container">
                            <div class="form-group">
                                <label for="nom"><i class="fa fa-user"></i> Nom</label>
                                <input name="nom" id="nom" type="text" value="<?=$_SESSION['nomEntreprise']?>" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="telephone1"><i class="fa fa-phone"></i> Telephone 1</label>
                                        <input name="telephone" id="telephone1" value="<?=$_SESSION['telephone']?>" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="telephone1"><i class="fa fa-phone"></i> Telephone 2</label>
                                        <input name="telephone" id="telephone1" value="<?=$_SESSION['telephone']?>" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="titrePost">SEXE</label>
                                <input name="tirePost" id="titrePost" type="text" class="form-control">
                            </div>-->
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
                                        <option value=""><?=$_SESSION['pays']?></option>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adresse"><i class="fa fa-road"></i> Adresse</label>
                                <input name="adresse" id="adresse" value="<?=$_SESSION['adresse']?>" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-sm btn btn-success pull-right" id="modifier">MODIFIER</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5" id="profil_container">
                        <div class="card" style="border-radius: inherit">
                            <div class="card-header" style="background-color: rgba(7,52,92,1);color: #fff;border-radius: inherit">
                                <h5 class="card-title "><i class="fa fa-globe"></i> Liens Externes</h5>
                            </div>
                            <div class="card-body">
                                <span id="msg_coordonnee" class="text-center"></span>
                                <div class="box-text-profilp">
                                    <div class="form-group">
                                        <label for="nomEntreprise"><i class="fa fa-facebook-square"></i> Lien facebook</label>
                                        <input class="form-control-input" name="lien1" id="lien1" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomEntreprise"><i class="fa fa-linkedin-square"></i> Lien LinkedIn</label>
                                        <input class="form-control-input" name="lien2" id="lien2" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomEntreprise"><i class="fa fa-link"></i> site web</label>
                                        <input class="form-control-input" name="lien3" id="lien3" type="text">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm btn_coordonnees pull-right">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="featurette-divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 box-profil_container" id="profil_container">
                        <div>
                            <h5>SECTEUR D'ACTIVITES</h5>
                        </div>
                        <p id="msg_" class="text-center"></p>
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="form-group">
                            <label for="description"><i class="fa fa-"></i> Description</label>
                            <textarea class="form-control-input" name="description" type="text" id="description" style="max-height: 4rem;min-height: 4rem" placeholder="decrivez en peu des mots sur ..."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-sm btn btn-success pull-right" id="modifier">MODIFIER</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif;?>
        </div>

        <!--=========================================modal de modification des informations du professionnel-------------------->
        <div class="modal fade" id="modifier_informations" role="dialog">
            <div class="modal-dialog modal-md">
                <!-- Modal content-->
                <div class="modal-content" style="border-radius: inherit">
                    <div class="modal-header" style="padding:3px 10px;color: #09375f;">
                        <h3 class="modal-title"><i class="fa fa-image"></i> Changer votre avatar</h3>
                        <button type="button" class="close" data-dismiss="modal" style="color:#CC0000;">&times;</button>
                    </div>
                    <div class="modal-body sc">
                        <div class="row">
                            <div class="col-sm-12" style="padding:2rem;">
                                <div class="text-center">
                                    <img src="../../avatar_pourv/<?= $_SESSION['avatar'];?>" alt="avatar profil" class="img-thumbnail" width="150">
                                </div>
                                <div class="separator"></div>
                                <form action="../../controller/changer_avatar_pourv.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group text-center">
                                        <input type="file" name="avatar" class="btn btn-info">
                                    </div>
                                    <div class="form-group text-center">
                                        <input class="btn btn-success btn-sm text-center" type="submit" value="changer l'image" name="img">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include '../footer.php';?>
</body>

<script>
    $(document).ready(function(){
        //$("span.timeago").timeago();
        $('.modifier').click(function () {
            $('#modifier_informations').modal();
        });
        modifier_informations();
        modifier_coordonnees();
        function modifier_informations() {
            $('#modification_des_information #modifier').on('click',function () {
                var nom, prenom, telephone, pays, ville, adresse;

                nom = $('#nom').val();
                prenom = $('#prenom').val();
                telephone = $('#telephone1').val();
                ville = $('#ville').val();
                pays = $('#pays').val();
                adresse = $('#adresse').val();

                if(nom=="" || prenom=="" || telephone=="" || ville=="" || pays=="" || adresse==""){
                    $(this).addClass('input-error');
                    $('#msg_').fadeIn(500).css('color','red').html('Remplissez tous les champs');
                }
                else {
                    $.ajax({
                        url:"../../controller/updateInformationProfessional.php",
                        type:"POST",
                        data:{
                            "nom":nom,
                            "prenom":prenom,
                            "telephone":telephone,
                            "ville":ville,
                            "pays":pays,
                            "adresse":adresse
                        },
                        success:function (donne) {
                            $('#msg_').fadeIn(500).addClass('text-info').html(donne)
                        }
                    })
                }

            });
        }

        function modifier_coordonnees() {
            $('.btn_coordonnees').on('click',function () {
                var ancienMotDePasse, nouveauMotDePasse, confimerMotDePasse;

                ancienMotDePasse = $('#ancienMotDePasse').val();
                nouveauMotDePasse = $('#nouveauMotDePasse').val();
                confimerMotDePasse = $('#confimerMotDePasse').val();

                if(ancienMotDePasse=="" || nouveauMotDePasse=="" || confimerMotDePasse==""){
                    $('#msg_coordonnee').fadeIn(500).css('color','darkred').html('Remplissez tous les champs').fadeOut(5500);
                }
                else {
                    if(nouveauMotDePasse!=confimerMotDePasse){
                        $('#msg_coordonnee').fadeIn(500).css('color','darkred').html('les deux mot de passes ne sont pas identique').fadeOut(5500);
                    }
                    else{
                        //check_password();
                        $.ajax({
                            url:"../../controller/updateCoordonneeProfessional.php",
                            type:"post",
                            data:{
                                "ancienMotDePasse":ancienMotDePasse,
                                "nouveauMotDePasse":nouveauMotDePasse,
                                "confimerMotDePasse":confimerMotDePasse
                            },
                            success:function (data) {
                                $('#msg_coordonnee').fadeIn(500).css('color','blue').html(data).fadeOut(5500);
                            }
                        })
                    }

                }

            });
        }
        /*function check_password() {
            $.ajax({
                type: "post",
                url:  "../../controller/updateCoordonneeProfessional.php",
                data: {
                    'password_ancien' : $("#ancienMotDePasse").val()
                },
                success: function(data){
                    if(data == "success"){
                        return true;
                    } else {
                        $("#msg_coordonnee").css("color", "darkred").html(data);
                    }
                }
            });
        }*/




    });
</script>