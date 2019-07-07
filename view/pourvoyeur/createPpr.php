<?php
session_start();
//include_once '../header.php';
include_once '../../globals/situationProfessionnel.php';
include_once '../../include/header.php';
include_once '../../include/partial_nav.php';
?>
<style>
    .create{
        width: 100%;
        padding:1em;
        z-index: 1030;
        color:#fff;
        background: #0c5460;
        text-align: center;
    }
</style>
<body id="body">
<?php if(isset($_SESSION['pseudo'])):?>
    <div class="container create-profil">
        <div class="container">
            <h3 class="featurette-divider header"><?=$_SESSION['pseudo'];echo "! Ajouter vos information"?></h3>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="../../controller/profilPourvoyeur.php" method="get" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="idUser" value="<?=$_SESSION['id']?>">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="nomEntreprise" class="form-control-input" placeholder="entreprise">
                                </div>
                                <div class="form-group">
                                    <label class="">secteur Activite de l'Entreprise :</label>
                                    <select name="secteurActiviteEntreprise" class="form-control-input">
                                        <option></option>
                                        <option value="Mining">Mining</option>
                                        <option value="media et publicite">Media et publicite</option>
                                        <option value="management et logistic">management et logistic</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="adressePhysiqueEntreprise"  class="form-control-input" placeholder="Adresse physique">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="paysResidence"  class="form-control-input" placeholder="paysResidence">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telephone"  class="form-control-input" placeholder="telephone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group text-right">
                                    <input type="submit" name="creationProfile" value="Creer mon profile" class="btn btn-success btn-sm">
                                    <a href="../logout.php"><button  href="" type="button" name="creationProfile" class="btn btn-danger btn-sm">Plus tard</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../include/footer.php';?>

    <script>

        $('#dateNaissance').datetimepicker();
        $(document).ready(function () {
            $('#chercheurEmplois').hide();
            choix();
            function choix() {
                $('.chercheur').click(function () {
                    $('#chercheurEmplois').slideDown(400);
                    $('#salarier').slideUp();
                });
                $('.salarier').click(function () {
                    $('#chercheurEmplois').slideUp();
                    $('#salarier').slideDown(400);
                });
            }
        });
    </script>

    <?php else:header('Location:../index.php')?>
    <?php endif;?>
</body>
</html>
