<?php
include '../include/partial_header.php';
?>
<style>
    #login-box{
        margin:3.5em 0;
            }
    .card-header{
        background-color: #062a49;
    }

    input{
        width: 100%;
    }
</style>
<body id="body">
<div class="container">
    <div id="login-box">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-sm-8">
                <div class="card" style="border-radius: inherit;">
                    <div class="card-header text-center">
                        <div class="bg-profil" style="min-height: 7rem">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="box-avatar">
                            <a href="index.php"><span class="avatar-profilp animated jackInTheBox"><img src="static/img/favicons/mstile-144x144.png" style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius:50% ;"></span></a>
                        </div>
                        <div style="padding: 0.5rem"></div>
                        <div class="box-text-profilp">
                            <form action="../controller/login.php" method="post">
                                <div class="form-group">
                                    <div class="form-group mb-3 m-md-1">
                                        <input type="text" name="pseudo" class="form-control-input" id="pseudo" placeholder="Entrez votre Pseudo">
                                        <small id="output_checkuser"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3 m-md-0">
                                        <input type="password" name="password" class="form-control-input" id="password" placeholder="mot de passe">
                                        <small id="output_checkuser"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p><a href="#">Mot de passe oublié?</a></p>
                                </div>
                                <div class="form-group">
                                    <button type="submit"  id="login" name="login" class="btn btn-danger form-control-input">Connexion</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="creation text-center animated jackInTheBox">
                        <p>je n'ai pas un compte</p>
                        <div class="compte">
                            <a href="professionnel/register.php" id="professionnel">Pour Professionnel</a> |
                            <a href="pourvoyeur/register_.php" id="entreprise">Pour Entreprise</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    <!--<div id="log"></div>-->
<?php include '../include/footer.php';?>

<script>
    $(document).ready(function () {
       $('.creation p').click(function () {
           $('.compte').slideToggle();
           $('.creation').css('backgroundColor','rgba(0, 0, 0, 0.5)');
       });

       /*$('#login').click(function () {
           var pseudo= $('#pseudo').val();
           var password= $('#password').val();

           if($.trim(pseudo).length >0 && $.trim(password).length>0){

                $.ajax({
                    url:"../controller/login.php",
                    method:"post",
                    data:{
                        pseudo:pseudo,
                        password:password
                    },
                    beforeSend:function () {
                        $('#login').val("connecting...");
                    },
                    success:function (data) {
                        if(data){
                            $("body").load("profil.php").hide().fadeIn(1500);
                        }else {
                            $('#login').val("Connexion");
                            $('#error').html("<span class='text-danger'>pseudo ou mot de passe incorrect</span>");
                        }
                    }
                });
            }else {
                return false;
            }
       });*/
       /*
       traitement de
        */

    });


</script>