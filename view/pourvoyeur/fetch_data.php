
    <?php
        session_start();
        include_once '../../model/Connexion.class.php';
        include_once '../../globals/database.php';
        $search=$_SESSION['profilp'];

        if(isset($_POST['action'])){

            $con=Connexion::getConnexion();
            $reqs="SELECT * FROM professionnels p join formations e on e.idProfil=p.idProfil  WHERE p.etatEmploi=1 and e.diplome LIKE '%$search%' GROUP BY p.idProfil";
            if(isset($_POST['ville'])){
                $ville_filter=implode("','", $_POST['ville']);
                $reqs .=" and p.ville in('".$ville_filter."')";
            }

            $requet="select * from professionnels p join experiences e on e.idProfil=p.idProfil WHERE p.etatEmploi=1 and e.titrePost LIKE '%$search%' GROUP BY p.idProfil ";
            if(isset($_POST['ville'])){
                $ville_filter=implode("','", $_POST['ville']);
                $requet .=" and p.ville in('".$ville_filter."')";
            }

            $stm=$con->prepare($reqs);
            $stm->execute();
            $results=$stm->fetchAll();
            $ress_=$stm->rowCount();

            $stm=$con->prepare($requet);
            $stm->execute();
            $result=$stm->fetchAll();
            $res_=$stm->rowCount();
    ?>

    <div  class="col-sm-12" style="border-bottom: 1px solid #ccc;">
        <div class="row">
            <div class="col-sm-12">
                <h3 style="color: #30a752">
                    <?php
                    if($res_==0 or $ress_==0){echo ' ';}
                    if($res_>=1 or $ress_>=1){echo $res_+$ress_.' '.' resultat(s)';}
                    ?>
                </h3>
            </div>
        </div>
    </div>

    <?php
        if(sizeof($result)>0 or sizeof($results)>0 ){
            $output='';$outputs='';
            foreach ($result as $res){
                $outputs .='<div class="col-sm-12">
                        <div class="featurette-divider"></div>
                            <div class="row">
                                <div class="col-sm-4" style="height: 20vh;">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <form name="form-select-candidat" id="form-select-candidat">
                                                <div class="form-group">
                                                    <label class="text-center"><input type="checkbox" class="form-control chekbox_Profil" id="candidatSelectionne" name="candidatSelectionne[]" value="'.$res['idProfil'].'"></label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-10">
                                            <img src="../../avatar/'.$res['avatar'].'" class="img-thumbnail" style="height: 20vh;width: 90%" align="center">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <p align=""><b>'.$res['nom'].' '.$res['prenom'].'</b></p>
                                    <p>
                                    <small><b><em>'.$res['titrePost'].' a
                                    '.$res['nomEntreprise'].'<br></em></b><br>
                                    <em>'.$res['ville'].' '.'/'.' '.$res['pays'].'</em></small></p>
                                    
                                    </div>
                            </div>
                    </div>
                   
                ';
            }
            foreach ($results as $ress){
                $output .='<div class="col-sm-12">
                        <div class="featurette-divider"></div>
                            <div class="row">
                                <div class="col-sm-4" style="height: 20vh;">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <form name="form-select-candidat" id="form-select-candidat">
                                                <div class="form-group">
                                                    <label class="text-center"><input type="checkbox" class="form-control" id="candidatSelectionne" name="candidatSelectionne[]" value="'.$ress['idProfil'].'"></label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-sm-10">
                                            <img src="../../avatar/'.$ress['avatar'].'" class="img-thumbnail" style="height: 20vh;width: 90%" align="center">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <p align=""><b>'.$ress['nom'].' '.$ress['prenom'].'</b></p>
                                    <p>
                                    <small><b><em>'.$ress['diplome'].' a
                                    '.$ress['ecoleUniversite'].'<br></em></b><br>
                                    <em>'.$ress['ville'].' '.'/'.' '.$ress['pays'].'</em></small></p>
                                    
                                    </div>
                            </div>
                    </div>
                   
                ';
            }
        }
        else{
            $output='<h5 style="padding: 10rem 17rem;color: #ccc" class="text-center">la donnée est introuvable</h5>';
            $outputs='<h5 style="padding: 10rem 17rem;color: #ccc" class="text-center">la donnée est introuvable</h5>';
        }
        echo $outputs;
            echo $output;
}
?>

<script type="text/javascript">

</script>
