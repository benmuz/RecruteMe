
<?php

$stm=$con->prepare($req);
$stm->execute();
$result=$stm->fetchAll();
if(isset($_POST["search"])){

}
foreach ($result as $res){
    ?>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <img src="../../avatar/photo%20cv.png" width="100%">
            </div>
            <div class="card-footer">
                <p class="text-center"><small><?=$res['idProfil']?></small><br><b><?=$res['nom']?></b></p>
            </div>
        </div>
    </div>


    <?php
}
?>
