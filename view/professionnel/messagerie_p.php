<?php
include '../include/header.php';
?>
<body style="padding-top:85px;background-color: #dbdbdb">
<?php include '../include/nav.php' ?>
    <!--<div class="container-fluid">
        <div class="row">
            <div class="col-md-3 card" id="box-card">
                <div class="row animated bounceInLeft text-center">
                    <div class="col-md-12 profil">
                        <img src="../static/img/favicons/mstile-70x70.png" alt="" class="img-thumbnail">
                    </div>
                    <div class="col-md-12 identite">
                        <p>
                            Nom Postnom Prenom<br>
                            email<br>
                            statu
                        </p>
                    </div>
                    <div class="featurette-divider">
                        <p>link</p>
                    </div>
                </div>
            </div>
            <div class="offset-3 col-6" id="profil_container">
                <div class="box-profil_container">
                    publication
                </div>
                <div class="box-profil_container">
                    publication
                </div>
                <div class="box-profil_container">
                    publication
                </div>
                <div class="box-profil_container">
                    publication
                </div>
                <div class="box-profil_container">
                    publication
                </div>
                <div class="box-profil_container">
                    publication
                </div>
            </div>
            <div class="col-3" id="">
                <div class="fa-search-frinds" style="background-color: #cc3300">
                    <form action="" method="get">
                        <input type="text" name="search_friends">
                    </form>
                </div>

                <div class="col-12 list-friends">
                    <div class="text-right" style="border-bottom:1px solid #dcdcdc;padding-top: 15px ">
                        <H5>200 Amis</H5>
                    </div>
                    <div class="row friend">
                        <div class="img-friend col-4 text-center" >
                            <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                        </div>
                        <div class="identity-friend col-8">
                            <p>nom postnom prenom<br>statut<br>
                        </div>
                    </div>

                    <div class="row friend">
                        <div class="img-friend col-4 text-center" >
                            <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                        </div>
                        <div class="identity-friend col-8">
                            <p>nom postnom prenom<br>statut<br>
                        </div>
                    </div>

                    <div class="row friend">
                        <div class="img-friend col-4 text-center" >
                            <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                        </div>
                        <div class="identity-friend col-8">
                            <p>nom postnom prenom<br>statut<br>
                        </div>
                    </div>

                    <div class="row friend">
                        <div class="img-friend col-4 text-center" >
                            <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                        </div>
                        <div class="identity-friend col-8">
                            <p>nom postnom prenom<br>statut<br>
                        </div>
                    </div>

                    <div class="row friend">
                        <div class="img-friend col-4 text-center" >
                            <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                        </div>
                        <div class="identity-friend col-md-8">
                            <p>nom postnom prenom<br>statut<br>
                        </div>
                    </div>

                    <div class="pagination">
                        pagination
                    </div>
                </div>

                <div class="col-12 list_connected">
                    nombre total de ceux qui sont connectes
                </div>

                <div class="col-12 list_connected">
                    nombre total de ceux qui sont connectes
                </div>

                <div class="col-12 list_connected">
                    nombre total de ceux qui sont connectes
                </div>

                <div class="col-12 list_connected">
                    nombre total de ceux qui sont connectes
                </div>
            </div>
        </div>
    </div>-->
    <div class="container-fluid">
            <div class="col-md-3" id="box-card">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="bg-profil">
                        </div>
                        <div class="box-avatar">
                            <span><img src="../static/img/favicons/mstile-144x144.png" style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius:50% ;"></span>
                        </div>
                        <p><strong>Nom postnom prenom</strong></p>
                    </div>
                    <div class="card-body text-center">
                        <h6>464</h6>
                        <small><em>vue de votre profil</em></small>
                        <hr>
                        <h6>464</h6>
                        <small><em>vue de vos post</em></small>
                    </div>
                    <div class="card-footer">
                        autres suggestions
                    </div>
                </div>
            </div>
        <div class="row">
            <!--=====================================================--->
            <div class="offset-3 col-md-6" id="profil_container">
                <div class="box-profil_container">
                    <p>faites une publication d'une annonce,un article,une idée, ...</p><hr>
                    <nav class="navbar" id="nav">
                        <div class="justify-content-md-end">
                            <ul class="nav mr-0">
                                <li class="nav-item"><a class="nav-link btn btn-outline-info">Annonce</a></li>
                                <li class="nav-item"><a class="nav-link btn btn-outline-danger">Un article</a></li>
                                <li class="nav-item"><a class="nav-link btn btn-outline-primary">Une idée</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="box-profil_container">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="../static/img/favicons/favicon-32x32.png" width="50" style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius:50% ;">
                        </div>
                        <div class="col-md-7">
                            <p><strong>nom postnom prenom</strong><br>
                                statut professionnel
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small>il y a 3 jours</small>
                        </div>
                    </div>
                    <hr>
                    <img src="" alt="publication">
                </div>
                <div class="box-profil_container">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="../static/img/favicons/favicon-32x32.png" width="50" style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius:50% ;">
                        </div>
                        <div class="col-md-7">
                            <p><strong>nom postnom prenom</strong><br>
                                statut professionnel
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small>il y a 3 jours</small>
                        </div>
                    </div>
                    <hr>
                    <img src="" alt="publication">
                </div>
                <div class="box-profil_container">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="../static/img/favicons/favicon-32x32.png" width="50" style="-webkit-border-radius:50% ;-moz-border-radius:50% ;border-radius:50% ;">
                        </div>
                        <div class="col-md-7">
                            <p><strong>nom postnom prenom</strong><br>
                                statut professionnel
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small>il y a 3 jours</small>
                        </div>
                    </div>
                    <hr>
                    <img src="" alt="publication">
                </div>
            </div>
            <!--=====================================================--->
            <div class="col-md-3" style="background: #fff">
                <div style="border-bottom:1px solid #dcdcdc;padding-top: 15px ">
                    <H5>Qui voulez-vous suivre?</H5>
                </div>
                <div class="row friend">
                    <div class="img-friend col-3 text-center" >
                        <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                    </div>
                    <div class="identity-friend col-7">
                        <p>nom postnom prenom<br>
                            statut...
                            <br>
                    </div>
                    <div class="col-md-2">
                        <a href="" class="suivre"><small>Suivre</small></a>
                    </div>
                </div>
                <div class="row friend">
                    <div class="img-friend col-3 text-center" >
                        <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                    </div>
                    <div class="identity-friend col-7">
                        <p>nom postnom prenom<br>
                            statut...
                            <br>
                    </div>
                    <div class="col-md-2">
                        <a href="" class="suivre"><small>Suivre</small></a>
                    </div>
                </div>
                <div class="row friend">
                    <div class="img-friend col-3 text-center" >
                        <img src="../static/img/favicons/mstile-70x70.png" alt="" width="100%">
                    </div>
                    <div class="identity-friend col-7">
                        <p>nom postnom prenom<br>
                            statut...
                            <br>
                    </div>
                    <div class="col-md-2">
                        <a href="" class="suivre"><small>Suivre</small></a>
                    </div>
                </div>

                ami(e)s et autre infos
            </div>
        </div>
    </div>
<?php include '../include/footer.php';