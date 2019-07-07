<?php
    include '../../globals/functions.php';
    include '../../globals/getId.php';
    include_once '../../globals/constantes.php';
    include '../../globals/typePublication.php';
?>
<?php include '../../controller/getDetailsForProfessionnalConnected.php'; ?>
<?php if(isset($_SESSION['id']) || isset($_SESSION['pseudo']) && isset($_SESSION['typecompte'])):?>
    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-dark" id="navbar-expand-md">
            <div class="container">
                <div class="navbar-brand- animated slideInLeft">
                    <a class="navbar-brand " href="../"><?=WEBSITE_NAME?></a>
                </div>
            </div>
        </nav>
    </header>
<?php else:  ?>
    <?php header('location: ../index.php');?>
<?php endif;?>