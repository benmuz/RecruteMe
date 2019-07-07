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
            <div class="col-md-6">
                <div class="card" style="border-radius: inherit;">
                    <div class="card-header " style="min-height: 12rem">
                    </div>
                    <div class="box-avatar text-center" style="margin-top: -7rem">
                        <a href="#" class="modifier"><span><img class="img-thumbnail avatar-profil  " src="../../avatar/<?= $_SESSION['avatar'];?>" style="width: 30%">
                            </span></a>
                    </div>
                    <div class="card-body text-center">
                        <div class="edit-profilp">
                            <span><a href="#" class="modifier">Modifiez... <i class="fa fa-pencil"></i></a></span>
                        </div>
                    </div>
                </div>
                <div class="featurette-divider"></div>
                <div class="card" style="border-radius: inherit">
                    <div class="card-header" style="background-color: rgba(7,52,92,1);color: #fff;border-radius: inherit">
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
                                <button class="btn btn-success btn-sm btn_coordonnees">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featurette-divider"></div>
            </div>
            <!--=====================================================--->
            <div class="col-md-6" id="profil_container">
                <div class="box-profil_container">
                    <p>Mettre a jour mon CV</p>
                    <div class="row">
                        <div class="col-sm-6">
                            generer le ficher word
                        </div>
                        <div class="col-sm-6">
                            generer le ficher pdf
                        </div>
                    </div>
                </div>
                <div class="featurette-divider"></div>
                <div class="card" style="border-radius: inherit">
                    <div class="card-header" style="background-color: rgb(53,95,73);color: #fff;border-radius: inherit">
                        <h5 class="card-title "><i class="fa fa-user"></i> Votre situation Professionnelle / Statut</h5>
                    </div>
                    <div class="card-body">
                        <span id="msg_situationP" class="text-center"></span>
                        <div class="box-text-profilp">
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> S. Professionnelle</label>
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Statut professionnel</label>
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-user"></i> Activites</label>
                                <select name="" id="" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm btn_situationP pull-right">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featurette-divider"></div>
                <div class="card" style="border-radius: inherit">
                    <div class="card-header" style="background-color: rgb(0,51,51);color: #fff;border-radius: inherit">
                        <h5 class="card-title "><i class="fa fa-university"></i> Modifier vos formations</h5>
                    </div>
                    <div class="card-body">
                        <span id="msg_situationP" class="text-center"></span>
                        <div class="box-text-profilp">
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">la deteDebut-dateFin</option>
                                </select>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm btn_modif_formation pull-right">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featurette-divider"></div>
                <div class="featurette-divider"></div>
                <div class="card" style="border-radius: inherit">
                    <div class="card-header" style="background-color: rgb(0,32,64);color: #fff;border-radius: inherit">
                        <h5 class="card-title "><i class="fa fa-university"></i> Modifier vos Experiences</h5>
                    </div>
                    <div class="card-body">
                        <span id="msg_situationP" class="text-center"></span>
                        <div class="box-text-profilp">
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">la deteDebut-dateFin</option>
                                </select>
                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">

                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-sm btn_modif_formation pull-right">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="featurette-divider"></div>

                <div class="box-profil_container" id="pub" style="background-color: rgba(7,52,92,0.67)"></div>
                <div class="box-profil_container">
                    <p>Modifier Vos Competences</p>
                    <hr>
                </div>
                <div class="box-profil_container">
                    <p>Modifier Vos Certification</p>
                    <hr>
                </div>
                <div class="box-profil_container">
                    <p>Modifier Vos Contacts</p>
                    <hr>
                </div>
            </div>
    <?php endif;?>
        </div>

        <!--=========================================modal de modification des informations du professionnel-------------------->
        <div class="modal fade" id="modifier_informations" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content" style="border-radius: inherit">
                    <div class="modal-header" style="padding:3px 10px;color: #09375f;">
                        <h3 class="modal-title"><i class="fa fa-sticky-note-o"></i> MODIFICATION DE VOS INFORMATIONS</h3>
                        <button type="button" class="close" data-dismiss="modal" style="color:#CC0000;">&times;</button>
                    </div>
                    <div class="modal-body sc">
                        <div class="row">
                            <div class="col-sm-6" style="padding:2rem;background-color: #09375f">
                                <div class="text-center">
                                    <img src="../../avatar/<?= $_SESSION['avatar'];?>" alt="avatar profil" class="img-thumbnail" width="150">
                                </div>
                                <div class="separator"></div>
                                <form action="../../controller/changer_avatar.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" name="avatar" class="btn btn-info">
                                    </div>
                                    <div class="form-group text-center">
                                        <input class="btn btn-success btn-sm text-center" type="submit" value="changer l'image" name="img">
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6" id="modification_des_information">
                                <p id="msg_" class="text-center"></p>
                                <div class="form-group">
                                    <input name="idProfil" id="idProfil" type="hidden" class="form-control">
                                </div>
                                <div class="container">
                                    <div class="form-group">
                                        <label for="nom"><i class="fa fa-user"></i> Nom</label>
                                        <input name="nom" id="nom" type="text" value="<?=$_SESSION['nom']?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom"><i class="fa fa-user"></i> Prenom</label>
                                        <input name="prenom" id="prenom" value="<?=$_SESSION['prenom']?>" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone1"><i class="fa fa-phone"></i> Telephone</label>
                                        <input name="telephone" id="telephone1" value="<?=$_SESSION['telephone']?>" type="text" class="form-control">
                                    </div>
                                    <!--<div class="form-group">
                                        <label for="titrePost">SEXE</label>
                                        <input name="tirePost" id="titrePost" type="text" class="form-control">
                                    </div>-->
                                    <div class="form-group">
                                        <label for="pays"><i class="fa fa-globe"></i> Pays</label>
                                        <input name="pays" id="pays" value="<?=$_SESSION['ville']?>" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ville"><i class="fa fa-building"></i> Ville</label>
                                        <input name="ville" id="ville" value="<?=$_SESSION['pays']?>" type="text" class="form-control">
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