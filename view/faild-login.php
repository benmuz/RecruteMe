<?php
include 'partial_header.php';
?>

<body>
<?php include "navindex.php";?>
<div class="container">
    <div class="row" style="padding: 7.7rem 0">
        <div class="col-12 text-center">
            <figure>
                <img src="static/img/contents/setting.jpg" width="150">
            </figure>
        </div>
        <div class="offset-2 col-8 box-profil_container animated wobble">
            <div class="notice text-center">
                <h3 style="color: #cc0000"><i class="fa fa-help"></i> Juste une petite verification <span style="color: #0a0333"></span></h3>
            </div>
            <div class="text-justify animated rubberBand">
                    <h5 style="color: #08345f">Les informations que vous avez fournis pour tenter de se connecter a notre site ne sont pas valides,<br>
                    nous vous suggerons soit: </h5>
                    <ul>
                        <li> de verifier que le username et le password sont correcte</li>
                        <li> de creer votre compte pour le professionel</li>
                        <li> de creer votre compte pour le recruteur</li>
                    </ul>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content card" style="border-radius: inherit;">
            <div class="modal-header card-header" style="padding:5px;color:#fff;border-radius: inherit">
                <button type="button" class="close" data-dismiss="modal" style="color: red;"><i class="fa fa-close"></i> </button>
            </div>
            <div class="modal-body card-body" style="padding:40px 30px;">
                <div>
                    <form  method="post" id="login_form" action="../controller/login.php">
                        <div class="form-group">
                            <label for="pseudo" style="color: #052D6D;"><i class="fa fa-user"></i> PSEUDO</label>
                            <input type="text" name="pseudo" class="form-control-input" id="pseudo" placeholder="Entrez votre Pseudo">
                            <small id="output_checkuser"></small>
                        </div>
                        <div class="form-group">
                            <label for="password" style="color: #052D6D;"><i class="fa fa-key"></i> PASSWORD</label>
                            <input type="password" name="password" class="form-control-input" id="password" placeholder="mot de passe">
                            <small id="output_checkuser"></small>
                        </div>
                        <div class="form-group">
                            <p><a href="#">Mot de passe oublié?</a></p>
                        </div>
                        <div class="error"></div>
                        <div class="form-group">
                            <button type="submit"  id="login" name="login" class="btn btn-nav form-control">CONNEXION</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================================================== -->
<?php include 'footerindex.php';?>

<script>
    $(document).ready(function(){

        $('.btn-sinscrire').click(function () {
            $('.div-sinscrire').toggle(500);
        });

        $('#link_login').click(function () {
            $('#login').modal({backdrop: "static"});
        });
    });
</script>
<!--== fin ==-->
<script>
    $(document).ready(function () {
        fadeimg();
        function fadeimg(){
            var folder="tfc/static/img";
            var count=0;
            var images=["../static/img/recrutement.jpg","../static/img/Recrutement-.jpg","../static/img/recrutement2.png"];
            var image=$('.dd');

            image.css(
                "background-image","url("+images[count]+")"
            )
            setInterval(function () {
                image.fadeOut(800,function () {
                    image.css("background-image","url("+images[count++]+")");
                    image.fadeIn(600);
                });
                if(count==images.length){
                    count=0;
                }
            },6000);
        }

    });
</script>
</body>
</html>