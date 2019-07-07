
<?php
$title="Profil du professionnel";
include '../header.php';
?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<?php
if(isset($_GET['employee_search']) and !empty($_GET['employee_search'])){
    $_SESSION['profilp']= $_GET['employee_search'];
}
else{
    $_SESSION['profilp']='';
}
?>
<?php
include_once '../../model/Connexion.class.php';
include_once '../../globals/database.php';

$con=Connexion::getConnexion();
$requete='SELECT * FROM projet_recrutement WHERE idRecruteur=? and dateCreation=current_date() ORDER BY idProjet desc limit 1';
$stm=$con->prepare($requete);
$stm->execute(array(
    $_SESSION['id']
));
$result=$stm->fetchAll();

foreach ($result as $row){
    ?>
    <div class="separator"></div>

    <input type="hidden" name="idProjet" class="idProjet" id="idProjet" value='<?=$row['idProjet']?>' readonly>
    <?php
}
?>

<div class="container" style="margin-bottom: 3rem">
    <?php
    include_once '../../model/Connexion.class.php';
    include_once '../../globals/database.php';

    $con=Connexion::getConnexion();
    $requete='SELECT * FROM projet_recrutement WHERE idRecruteur=? and dateCreation=now() order by dateCreation DESC limit 1';
    $stm=$con->prepare($requete);
    $stm->execute(array(
        $_SESSION['id']
    ));
    $result=$stm->fetchAll();

    foreach ($result as $row){
        ?>
        <div class="separator"></div>
        <label for="idProjet"></label>
        <input type="text" name="idProjet" class="idProjet" id="idProjet" value='<?=$row['idProjet']?>' readonly>
        <?php
    }
    ?>

    <div class="featurette-divider"></div>
    <div class="row">
        <div class="col-sm-3" style="background: #e9e9e9;box-shadow: 1px 1px 6px 1px #f9f9f9;border-right:1px solid #e2e2e2">
            <form method="post" action="cvtheque.php">
                <div class="list-group">
                    <div class="featurette-divider"></div>
                    <h5>Experiences</h5>
                    <div style="overflow-y:auto;overflow-x: hidden;">
                        <?php
                        $req="select DISTINCT(titrePost) from experiences order by titrePost ";
                        $stm=$con->prepare($req);
                        $stm->execute();
                        $result=$stm->fetchAll();

                        foreach ($result as $res){
                            ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" name="experience[]" id="" class="common_selector ville" value="<?=$res['ville']?>">
                                    <?=$res['titrePost']?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="list-group">
                    <div class="featurette-divider"></div>
                    <h5>Formation</h5>
                    <div style="overflow-y:auto;overflow-x: hidden;">
                        <?php
                        $req="select DISTINCT(diplome) from formations order by diplome ";
                        $stm=$con->prepare($req);
                        $stm->execute();
                        $result=$stm->fetchAll();

                        foreach ($result as $res){
                            ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" name="formation[]" id="formation" class="common_selector ville" value="<?=$res['diplome']?>">
                                    <?=$res['diplome']?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="list-group">
                    <div class="featurette-divider"></div>
                    <h5>Certification</h5>
                    <div style="overflow-y:auto;overflow-x: hidden;">
                        <?php
                        $req="select DISTINCT(titreCertification) from certifications order by titreCertification ";
                        $stm=$con->prepare($req);
                        $stm->execute();
                        $result=$stm->fetchAll();

                        foreach ($result as $res){
                            ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" name="certification[]" id="" class="common_selector ville" value="<?=$res['titreCertification']?>">
                                    <?=$res['titreCertification']?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="list-group">
                    <div class="featurette-divider"></div>
                    <h5>Competences</h5>
                    <div style="overflow-y:auto;overflow-x: hidden;">
                        <?php
                        $req="select DISTINCT(description) from competences order by description ";
                        $stm=$con->prepare($req);
                        $stm->execute();
                        $result=$stm->fetchAll();

                        foreach ($result as $res){
                            ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" name="competence[]" id="" class="common_selector ville" value="<?=$res['description']?>">
                                    <?=$res['description']?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>


                    </div>
                    <input type="submit" name="search_b" id=""  value="rechercher">

                </div>
                <div class="separator"></div>
        </div>
        <div class="col-sm-9" style="background:#fff;border: 1px solid rgba(204,204,204,0.36)">
            <div id="cv" class="row " style="padding: 1.5rem">


                <?php



                $req="SELECT `idProfil`, concat(`prenom`,' ',`nom`) as nom FROM `professionnels`";

                if(isset($_POST["search_b"])){
                    $and = 0;
                    $tini="SELECT Distinct p.`idProfil` , concat(p.`prenom`,' ',p.`nom`) as nom
                    FROM `professionnels` p";
                    $req2="";
                    $formation="";
                    $certif = "";
                    $comp ="";
                    $exper="";

                    if(isset($_POST['certification'])) {

                        foreach ($_POST['certification'] as $ele){
                            if($and==0)
                            $req2 = $req2."p.`idProfil` = ce.`idProfil` and ce.titreCertification like '%".$ele."%'";
                            else
                                $req2 = $req2."and p.`idProfil` = ce.`idProfil` and ce.titreCertification like '%".$ele."%'";
                            $and=1;
                        }
                        $certif = " ,certifications ce";
                    }
                    if(isset($_POST['competence'])) {

                        foreach ($_POST['competence'] as $ele){
                            if($and==0)
                                $req2 = $req2."p.`idProfil` = co.`idProfil` and co.description like '%".$ele."%' ";
                            else  $req2 = $req2."and p.`idProfil` = co.`idProfil` and co.description like '%".$ele."%' ";
                            $and=1;
                        }
                        $comp= " ,competences co";
                    }
                    if(isset($_POST['experience'])) {
                        foreach ($_POST['experience'] as $ele){
                            if($and==0)
                            $req2 = $req2."p.`idProfil` = ex.`idProfil` and  ex.titrePost like '%".$ele."%' ";
                            else
                                $req2 = $req2."and p.`idProfil` = ex.`idProfil` and  ex.titrePost like '%".$ele."%' ";
                            $and=1;
                        }
                        $exper = " ,experiences ex";
                    }
                    if(isset($_POST['formation'])) {

                        foreach ($_POST['formation'] as $ele){

                            if($and==0)
                            $req2 = $req2."p.`idProfil` = fo.`idProfil` and fo.diplome like '%".$ele."%' ";
                            else $req2 = $req2."and p.`idProfil` = fo.`idProfil` and fo.diplome like '%".$ele."%' ";
                            $and=1;
                        }
                        $formation=" ,formations fo";
                    }
                    $table= $certif. $comp.$exper. $formation;

                    $stm=$con->prepare($tini.$table." WHERE ".$req2);
                    //echo $tini.$table." WHERE ".$req2;
                }else{

                    $stm=$con->prepare($req);
                }


                $stm->execute();
                $result=$stm->fetchAll();

                foreach ($result as $res){
                    ?>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="../../avatar/photo%20cv.png" width="100%">
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="nomEq" value="<?php echo $res['nom']?>">
                                <input type="hidden" name="telEq" value="<?php echo $res['telephone']?>">
                                <p class="text-center"><small><?=$res['idProfil']?></small><br><b><?=$res['nom']?></b></p>
                            </div>
                        </div>
                    </div>


                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
<?php  include_once '../footer.php';?>
</body>
<!--*****************************************************************************************-->
<div class="modal fade" id="div-projet" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content card" style="border-radius: inherit;">
            <div class="modal-header card-header" style="padding:5px;color:#062c5c;border-radius: inherit">
                <h4 class="card-title">Creation du projet de recrutement</h4>
                <button type="button" class="close" data-dismiss="modal" style="color: red;"><i class="fa fa-close"></i> </button>
            </div>
            <div class="modal-body card-body" style="padding:20px 30px;">
                <div>
                    <p>Ancien(s) projet(s)</p>
                </div>
                <div class="featurette-divider">
                    <a href="#" class="btn-nouveau-projet">Nouveau projet</a>
                </div>
                <div class="nouveau-projet">
                    <div class="form-group">
                        <input type="text" name="descriptionProjet" id="input-descriptionProjet" class="form-control-input descriptionProjet"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Ajouter" id="ajouterProjet" class="btn btn-md btn-nav btn-ajouterProjet">
                    </div>

                    <p id="msg-error"></p><p id="msg-success"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--*********************************************************************************-->
<div class="modal fade" id="div-source" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content card" style="border-radius: inherit;">
            <div class="modal-header card-header" style="padding:5px;color:#fff;border-radius: inherit">
                <h3 class="card-title">Determination des sources de conversations</h3>
                <button type="button" class="close" data-dismiss="modal" style="color: red;"><i class="fa fa-close"></i> </button>
            </div>
            <div class="modal-body card-body" style="padding:40px 30px;">
                <div>
                    dshk
                </div>
            </div>
        </div>
    </div>
</div>
<!--*********************************************************************************-->
<div class="modal fade" id="div_msg" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content card" style="border-radius: inherit;">
            <div class="modal-header card-header" style="padding:5px;color:#fff;border-radius: inherit">
                <button type="button" class="close" data-dismiss="modal" style="color: red;"><i class="fa fa-close"></i> </button>
            </div>
            <div class="modal-body card-body" style="padding:40px 30px;">
                <div>
                    dshk
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #loading{
        text-align: center;
        background: url("../static/img/loading.gif") center;
        height: 105rem;
    }
    .nouveau-projet{
        display: none;
    }
</style>

<script>

    $(document).ready(function () {
        //le script pour le modal projet,source-msg
        $('.btn-msg').click(function () {
            $('#div_msg').modal({backdrop: "static"});
        });

        $('.btn-projet').click(function () {
            $('#div-projet').modal({backdrop: "static"});
        });

        $('.btn-source').click(function () {
            $('#div-source').modal({backdrop: "static"});
        });
        //*******************************
        //script pour l'affichage de la division du nouveau projet
        $('.btn-nouveau-projet').click(function () {
            $('.nouveau-projet').slideToggle(1000);
        });
        $('#input-descriptionProjet').focus(function () {
            $(this).removeClass('input-text-error');
            $('#msg-error').fadeOut(1000);

        });

        //script pour l'enregistrement du nouveau projet pour le recrutement
        function check_projet(){
            var input_descriptionProjet=$('#input_descriptionProjet').val();
            $.ajax({
                url:'../../controller/addNouveauProjet.php',
                type: 'post',
                data: {
                    'input_descriptionProjet' : input_descriptionProjet
                },
                success: function(data){
                    if(data == "success"){
                        $("#msg-success").html('');
                        return true;
                    } else {
                        $("#msg-error").css("color", "red").html(data);
                    }
                }
            });
        }
        $('.btn-ajouterProjet').on('click',function () {

            var input_descriptionProjet=$('#input-descriptionProjet').val();
            if(input_descriptionProjet==""){
                $('#msg-error').html('nommer votre projet').css({'color':'red'}).fadeIn(500);
                $(this).addClass('input-text-error');
            }
            else{
                $.ajax({
                    url:'../../controller/addNouveauProjet.php',
                    type:'post',
                    data:{
                        'input_descriptionProjet':input_descriptionProjet
                    },
                    success:function(data){
                        if(data=='success'){
                            $('#msg-success').html('votre projet est bien creer').css({'color':'green'}).fadeIn(500);
                            window.location='filter.php?employee_search=<?=$_SESSION['profilp']?>&<?=ID_USER?>';
                        }
                        else{
                            $('#msg-success').html(data).css({'color':'red'}).fadeIn(500);
                        }

                    }
                });

            }
        })

    });
    $(document).ready(function () {
        //le script pour trouver le profil d'unprofessionnel
        $('#employee_search').keyup(function () {
            var search=$('#employee_search').val();

            $.ajax({
                url:'../../controller/search_profil.php',
                data:'s='+search,
                success:function (data) {
                    $('#employee_data').html(data);
                }
            })
        });

        filter_data();

        function filter_data() {
            $('.filter_data').html('<div id="loading" style=""></div>');
            var action='fetch_data';
            var ville=get_filter('ville');
            var experience=get_filter('experience');
            var competence=get_filter('competence');

            $.ajax({
                url:"fetch_data.php",
                type:"post",
                data:{"action":action,"ville":ville,"experience":experience,"competence":competence},
                success:function(data){
                    $('.filter_data').html(data);
                }
            })
        }

        function get_filter(class_name) {
            var filter=[];
            $('.'+class_name+':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }

        $('.common_selector').click(function () {
            filter_data();
        });
//===============================================================================================================
        function Afficher_profil_selectionner() {
        }
        //le script pour la selection de profil
        $('.btn-selectAll').on('click',function(){

            //$('.chekbox_Profil').attr('checked');

        });
        $('#btn-selectionne-candidat').click(function () {
            var idProjet=$('#idProjet').val();
            var candidat = [];
            $(':checked:checked').each(function () {
                candidat=$(this).val();
                candidat=candidat.toString();
                if(idProjet == ''){
                    $("#msg-errors").html("Priere de creer d'abord le projet").css({'color':'red'}).fadeIn(500).fadeOut(1500);
                }
                else {
                    for(var i=0; i<candidat.length; i++){
                        $.ajax({
                            url:'../../controller/candidatSelected.php',
                            type:'post',
                            data:{
                                'candidat':candidat,
                                'idProjet':idProjet
                            },
                            success:function(data){
                                if(data=='success'){
                                    setTimeout('window.location.href="CandidatSelectionnees.php?<?=ID_USER?>";');
                                }
                                else{
                                    $("#msg-errors").html("verifier que toutes les operations sont faites en premiere").css({'color':'red'}).fadeIn(500).fadeOut(3500);
                                }

                            }
                        })

                    }
                }

                /**/
            });
        });
    });
</script>
</html>
