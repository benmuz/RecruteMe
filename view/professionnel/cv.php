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

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">

                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-outline-primary"><i class="fa fa-file-word-o"></i> CV en word</button>
                    <hr class="featurette-heading">
                    <button class="btn btn-outline-danger"><i class="fa fa-file-pdf-o"></i> CV en pdf</button>
                    <hr class="featurette-heading">
                    <button class="btn btn-outline-success">Placer dans le CVTheque</button>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card box-profil_container">
                <div class="card-body">
                    <div class="box-text-profilp">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-9" style="padding-top:1rem">
                                        <h5 class="text-success text-capitalize"><b><?=$_SESSION['nom'].' '.$_SESSION['prenom']?></b></h5>
                                        <h6>Genre:  <?=$_SESSION['genre'];?><br>
                                            Pays:  <?=$_SESSION['pays']?><br>
                                            Ville:  <?=$_SESSION['ville']?><br>
                                            Adresse:  <?=$_SESSION['adresse']?><br><br>
                                            <b>Contact</b><br><?=$_SESSION['email']?><br><?=$_SESSION['telephone']?></h6>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <a href="">
                                            <span class="avatar-profil">
                                                <img class="img-thumbnail" src="../../avatar/<?=$_SESSION['avatar']?>" width="100%">
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
                            <?php include_once '../../controller/getMyCV.php';?>
                        </div>
                    </div>
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


