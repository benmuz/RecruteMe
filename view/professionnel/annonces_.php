<?php
$title="Elaboration de votre cv";
//include'../include/header.php';
?>
<!doctype html>
<?php
$title="Profil du professionnel";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<?php include_once '../../controller/getDetailAnnonce_professional.php';?>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="card box-profil_container">
                <div class="card-body">
                    <?php
                        if(sizeof($getA)>0){
                            foreach ($getA as $a){?>
                                <div class="box-text-profilp" id="division_offre_emploi">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h3 class="text-success text-capitalize"><b><?=$a['nomEntreprise']?></b></h3>
                                                    <p><em><?=$a['description']?></em></p>
                                                    <h6><br>
                                                        <b>Contact</b><br><br><i class="fa fa-phone"></i> <?=$a['telephone']?><br><i class="fa fa-road"></i> <?=$a['adresse']?> / <i class="fa fa-building-o"></i> <?=$a['ville']?>
                                                        /<i class="fa fa-globe"></i> <?=$a['pays']?></h6>
                                                </div>
                                                <div class="col-sm-3 text-center">
                                                    <a href="">
                                                        <span class="avatar-profil">
                                                            <img src="../../avatar_pourv/<?=$a['avatar']?>" width="100%">
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="text-center"><strong>OFFRE D'EMPLOI</strong></h3>
                                        <div class="featurette-divider">
                                            <h4><?=$a['intitulePost']?> (<?php if($a['sexeProfessionnel']=='M')echo 'H';else{echo 'F';}?>)</h4>
                                            <p>Lieu d'affectation: <?=$a['lieuAffectation']?><br>Duree de contrat: <?=$a['typeContrat']?></p>
                                        </div>
                                        <div class="featurette-divider">
                                            <?=$a['descriptionPost']?>
                                        </div>
                                        <div class="featurette-divider">
                                            <h4>Missions:</h4>
                                            <p> <?=$a['mission']?></p>
                                        </div>
                                        <div class="featurette-divider">
                                            <h4>Qualifications requises:</h4>
                                            <p> <?=$a['competences']?></p>
                                        </div>
                                        <div class="featurette-divider">
                                            <p>Votre candidature est à déposer au plus tard le <b><?=$a['dateLimite']?></b> avant <b><?=$a['heureLimite']?></b><br>
                                                Seuls les candidats sélectionnés seront contactés et invités pour participer à un test d'évaluation. Des connaissances de base en mathématiques contribueront positivement à votre candidature.</p>
                                        </div>
                                        <?php //include_once '../../controller/getMyCV.php';?>
                                    </div>
                                </div>
                           <?php }
                        }
                    ?>

                    <div class="separator"></div>
                </div>
            </div>
            <div class="separator"></div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img src="../static/img/services.jpg" width="100%" class="card-img-top">
                    <div>
                        La chance vous est accordee pour pouvoir profiter de cette annonce
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-outline-primary" disabled> Postuler</button>
                    <button class="btn btn-outline-primary"><i class="fa fa-print"></i> Imprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../footer.php';?>

<script>
    $(document).ready(function () {
        var count=0;

        $('#add').click(function () {
            count=count + 1;
            var html_code="<tr id='row"+count+"'>";
            html_code += "<td contenteditable='true' class='datedebutExperience'></td>";
            html_code += "<td contenteditable='true' class='datefinExperience'></td>";
            html_code += "<td contenteditable='true' class='titreposteExperience'></td>";
            html_code += "<td contenteditable='true' class='nomentrepriseExperience'></td>";
            html_code += "<td contenteditable='true' class='descriptionExperience'></td>";
            html_code += "<td><button type='button' name='remove' id='remove' data-row='row"+count+"' class='btn btn-danger btn-sm remove'>-</button></td>";
            html_code +="</tr>";
            $('#crud-tale').append(html_code);
        });


        $(document).on('click','.remove',function () {
            var delete_row=$(this).data("row");
            $('#'+ delete_row).remove();
        });

        $('#save').click(function(){
            var datedebutExperience=[];
            var datefinExperience=[];
            var titreposteExperience=[];
            var nomentrepriseExperience=[];
            var descriptionExperience=[];

            $('.datedebutExperience').each(function () {
                datedebutExperience.push($(this).text());
            });
            $('.datefinExperience').each(function () {
                datefinExperience.push($(this).text());
            });
            $('.titreposteExperience').each(function () {
                titreposteExperience.push($(this).text());
            });
            $('.nomentrepriseExperience').each(function () {
                nomentrepriseExperience.push($(this).text());
            });
            $('.descriptionExperience').each(function () {
                descriptionExperience.push($(this).text());
            });

            $.ajax({
                url:"../../controller/insert_experience.php",
                method:"POST",
                data:$('#crud-tale').serialize(),
                success:function (data) {
                    alert(data);
                }

            });
        });

    });
</script>

</body>


