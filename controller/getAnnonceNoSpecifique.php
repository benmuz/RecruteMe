<?php

include_once '../../globals/database.php';
include_once '../../model/Connexion.class.php';
include_once '../../model/Professionnels.class.php';

if(isset($_SESSION['titrePost'])){
    $allExp=Annonces::getAnnonNotSpecifique();
    $out='';
    if(sizeof($allExp)>0){
        foreach ($allExp as $exp){
            $out.= '<div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <img src="../../avatar_pourv/'.$exp['avatar'].'" width="80%">
                            </div>
                            <div class="col-md-12">
                                <p style="color:#000" class="text-center"><a href="annonces_.php?'.ID_USER.'='.$_SESSION['id'].'&tsdgjsdvysdjhsgdhsfdy='.md5($_SESSION['pseudo']).'&annonce='.$exp['idAnnonce'].'">'.utf8_encode($exp['intitulePost']).'</a><br>
                                <small>region :'.utf8_encode($exp['ville']).'</small></p>
                             </div>
                        </div>
                    </div>
            ';
        }
        echo '<div class="featurette-divider"></div>';
    }
    else{
        echo '<p class="text-info text-center"> Aucune donnee à afficher</p>';
    }
    echo $out;

}
else{
    echo '<p class="text-info text-center"> verifier que vous avez deja completer votre cv pour pouvoir voir les annonces</p>';
}
