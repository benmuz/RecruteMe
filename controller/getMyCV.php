<?php

    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';
    include_once '../../model/Professionnels.class.php';
    include_once "../../model/FormationEducation.class.php";
    include_once "../../model/Competences.class.php";
    include_once "../../model/Langues.class.php";
    include_once "../../model/Certifications.class.php";


    $allExp=Experiences::getAllExperiencesForWhoIsConnected();
    $out='';
    if(sizeof($allExp)>0){
        echo '<div style="background: #dcdcdc;padding: 0.3rem">
                <h4><i class="fa fa-home"></i> EXPERIENCES</h4>
            </div>
            <div class="featurette-divider">
                <div class="container">
                    <div class="row">';

        foreach ($allExp as $exp){
            $out.='<div class="col-3">
                        <p><b>'.$exp['dateDebut'].' - '.$exp['dateFin'].'</b></p>
                    </div>
                    <div class="col-9">
                        <b>Poste occupé: </b>'.utf8_encode($exp['titrePost']).'
                        <br><b>L\'entreprise: </b>'.utf8_encode($exp['nomEntreprise']).'<br>
                        <b>Description: </b>'.utf8_encode($exp['description']).'
                    </div>';

        }

    }
    else{
        echo '';
    }
    echo $out;
    echo ' </div>
            </div>
        </div>';

    $allForm=FormationEducation::getAllFormationEducationForWhoIsConnected();
    $outF='';
    if(sizeof($allForm)>0){
        echo '<div style="background: #dcdcdc;padding: 0.3rem">
                <h4><i class="fa fa-university"></i>  ETUDES FAITES</h4>
            </div>
            <div class="featurette-divider">
                <div class="container">
                    <div class="row">';

        foreach ($allForm as $allf){
            $outF.='<div class="col-3">
                        <p><b>'.$allf['dateDebut'].' - '.$allf['dateFin'].'</b></p>
                    </div>
                    <div class="col-9">
                        <b>Diplome : </b>'.utf8_encode($allf['diplome']).'
                        <br><b>Ecole-Université : </b>'.utf8_encode($allf['ecoleUniversite']).'<br>
                        <b>Description: </b>'.utf8_encode($allf['description']).'
                    </div>';

        }
    }
    else{
        echo '';
    }
    echo $outF;
    echo ' </div>
            </div>
        </div>';


    $allComp=Competences::getAllCompetencesForWhoIsConnected();
    $outComp='';
    if(sizeof($allComp)>0){
        echo '<div style="background: #dcdcdc;padding: 0.2rem">
                    <h4><i class="fa fa-home"></i> COMPETENCES</h4>
                </div>
                <div class="featurette-divider">
                    <div class="container">
                        <div class="row">
                        ';

        foreach ($allComp as $allc){
            $outComp.=
                '<div class="col-12">
                    <p>'.$allc['description'].'</p>
                </div>';
        }
    }
    else{
        echo '';
    }
    echo $outComp;
    echo ' </div>
            </div>
        </div>';


$allLang=Langues::getAllLanguageForWhoIsConnected();
$outLang='';
if(sizeof($allLang)>0){
    echo '<div style="background: #dcdcdc;padding: 0.2rem">
                                    <h4><i class="fa fa-language"></i> LANGUES PARLEES</h4>
                                </div>
                                <div class="featurette-divider">
                                    <div class="container">
                                        <div class="row">
                        ';

    foreach ($allLang as $alllg){
        $outLang.=
            '<div class="col-3">
                    <p>'.$alllg['langue'].'</p>
            </div>
            <div class="col-9">
                <p><b>Niveau: </b>'.$alllg['niveau'].'</p>
            </div>';
    }
}
else{
    echo '';
}
echo $outLang;
echo ' </div>
            </div>
        </div>';

$allCert=Certifications::getAllCertificationsForWhoIsConnected();
$outCert='';
if(sizeof($allCert)>0){
    echo '<div style="background: #dcdcdc;padding: 0.2rem">
            <h4><i class="fa fa-certificate"></i> AUTRES FORMATIONS</h4>
        </div>
        <div class="featurette-divider">
            <div class="container">
                <div class="row">';
    foreach ($allCert as $allcert){
        $outCert.='<div class="col-3">
                        <p>'.$allcert['lieuCertification'].'</p>
                   </div>
                    <div class="col-9">
                        <p><b>Titre formation: </b>'.$allcert['titreCertification'].'<br><b>Description: </b>'.$allcert['description'].'</p>
                    </div>';
    }
}
else{
    echo '';
}
echo $outCert;
echo ' </div>
            </div>
        </div>';