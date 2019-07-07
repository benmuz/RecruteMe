<?php
$title="Liste de tous les professionnels ";
include '../header.php';

?>

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
            <div class="col-md-8" id="profil_container">
                <?php include '../../controller/getAllPourvoyeur.php';?>
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


<?php include '../footer.php';?>
    <script>

        $(document).ready(function(){

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
