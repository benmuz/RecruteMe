<?php
$title="Liste de tous les professionnels ";
include '../header.php';

?>
<style>
    .d{
        z-index: 1029;
        position: fixed;

    }

</style>
<?php include '../nav.php';?>
<?php require_once '../../globals/typeCompte.php';?>
<body class="body-professionnel">
<?php if(isset($_SESSION['pseudo'])):?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 d">
                <div class="card">
                    <div class="card-body text-center">
                        <div>
                            <figure>
                                <img src="../../avatar_pourv/<?=$_SESSION['avatar']?>" width="100%">
                            </figure>
                        </div>
                        <h5><?=$_SESSION['nomEntreprise']?>, <?=$_SESSION['pseudo']?></h5>
                        <br>
                        <p><?=$_SESSION['secteurActivite']?><br><?=$_SESSION['email']?> / <?=$_SESSION['telephone']?>
                        <br><em><?=$_SESSION['adresse']?></em>
                            <br><em><?=$_SESSION['ville']?> / <?=$_SESSION['pays']?></em>

                        </p>
                    </div>
                    <div class="card-footer">
                        <input type="search" name="search" class="form-control">
                    </div>
                </div>
            </div>
            <!--=====================================================--->
            <!--=====================================================--->
            <div class="offset-4 col-md-8 t" id="profil_container">
                <?php include '../../controller/getAllProfesionnel.php';?>
            </div>
        </div>
    </div>

    <!--modal div for geting detail profil-->
    <div class="modal fade" id="pub_annonce" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:5px 10px;">
                    <h4>Publication de l'annonce</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" action="../../controller/pub_annonce.php" method="get">
                        <input type="hidden"  name="idProfil" value="<?=$_SESSION['idProfile']?>">
                        <input type="hidden"  name="typePublication" value="<?=PUBLICATION_ANNONCE;?>">
                        <div class="form-group">
                            <textarea class="form-control" name="descriptionPublication" placeholder="votre description de l'annonce..."></textarea>
                        </div>
                        <div class="form-group ">
                            <input type="submit" value="Publiez" class="btn btn-success btn-sm pull-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pub_commentaire" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:5px 10px;">
                    <h4>Publication de l'annonce</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" action="../../controller/pub_annonce.php" method="get">
                        <input type="text"  name="idProfil" value="<?=$_SESSION['idProfile']?>">
                        <input type="hidden"  name="typePublication" value="<?=PUBLICATION_COMMENTAIRE;?>">
                        <input type="text"  name="titrePublication" placeholder="Saisissez votre titre pour l'annonce">
                        <textarea name="descriptionPublication" placeholder="votre description de l'annonce..."></textarea>
                        <input name="imagePublication" type="file">
                        <input type="submit" value="Publiez l'Annonce">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal-header, h4, .close {
            background-color: #0c5460;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-body{
            width:100%;
            background-color: #0c5464;
        }
        .modal-body form input[type:'text']{
            width:100%;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
<?php include '../footer.php';?>
    <script>

        CKEDITOR.replace('descriptionPublication');
        $(document).ready(function(){
            $("span.timeago").timeago();

            $("#getDetail").click(function(){
                $("#pub_annonce").modal();
            });

            $("#getarticle").click(function(){
                $("#pub_article").modal();
            });

            $("#getidee").click(function(){
                $("#pub_idee").modal();
            });

            $('.showing-detail').click(function(){
                $('#').slideToggle(400);
            });

            $('.dropdown').click(function () {
                $('.dropdown-menu').show();
            });

            $('.comentaire').popover({
                title:fetchData,
                html:true,
                placement:'right',
            });

            function fetchData(){
                var fetch_data='';
                var element=$(this);
                var id=element.attr("id");

                $.ajax({
                    url:"../../controller/t.php",
                    method:"POST",
                    async:false,
                    data:{id:id},
                    success:function(data){
                        fetch_data=data;
                    }
                });
                return fetch_data;
            }
        });
    </script>
<?php else: header('location:index.php');?>
<?php endif;?>

</body>
</html>
