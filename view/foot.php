<div class="container-fluid" id="entreprises" style="background: #cccccc;padding: 1rem;">
    <div class="container">
        <h3></h3>
    </div>
</div>

<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="nav">
                    <ul class="ul-footer">
                        <li class="li-footer"><a href="" class="a-footer">Qui sommes-nous</a></li>
                        <li class="li-footer"><a href="" class="a-footer">Offres d'emploi</a></li>
                        <li class="li-footer"><a href="" class="a-footer">Aide</a></li>
                        <li class="li-footer"><a href="" class="a-footer">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-5">
                <h5>Ensemble de secteurs d'activite</h5>
                <?php

                include_once '../globals/database.php';
                include_once '../model/Connexion.class.php';

                $con=Connexion::getConnexion();
                $req="SELECT * FROM secteurs ORDER by nomSecteur asc limit 10";
                $stm=$con->prepare($req);
                $stm->execute();
                $result=$stm->fetchAll();

                if(sizeof($result)>0){
                    $output="";
                    echo '<hr class="featurette-heading"> ';
                    foreach ($result as $res){
                        $output.="<div class='row' style='padding-left: 3rem;'>
                            ".utf8_encode($res['nomSecteur']).",
                        </div>";
                    }
                }
                echo $output;
                ?>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Regions de ceux qui nous font confiance</h5>
                        <?php include_once '../controller/getTop10regions.php';?>
                        <h3>...</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright text-center" style="background: #000">
    <small><em>Copyright &copy; 2018</em></small>
</div>