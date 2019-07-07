<?php
    session_start();
    include_once '../globals/functions.php';
    include_once '../globals/constantes.php';
    include_once '../globals/getId.php';

    include_once '../globals/typeCompte.php';
    include_once '../globals/typePublication.php';
?>
<header>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark" id="navbar-expand-md">
        <div class="container">
            <div class="navbar-brand- animated slideInLeft">
                <a class="navbar-brand " href="../"><?=WEBSITE_NAME?></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapse">
                <ul class="navbar-nav mr-0">
                    <li class="nav-item>">
                        <a class="nav-link" href="#" id="link_login" style="color: #fff;border: 1px solid #fff">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


