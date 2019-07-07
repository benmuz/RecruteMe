<?php
$title="Profil du professionnel";
include '../header.php';

?>
<body class="body-professionnel">
<?php
include '../nav.php';
?>
<?php
if(isset($_GET['employee_search']) and !empty($_GET['employee_search'])){
    $_SESSION['profilp']= $_GET['employee_search'];
}
else{
    $_SESSION['profilp']='';
}
?>
<?php
include_once '../../model/Connexion.class.php';
include_once '../../globals/database.php';

$con=Connexion::getConnexion();
$requete='SELECT * FROM projet_recrutement WHERE idRecruteur=? order by dateCreation DESC limit 1';
$stm=$con->prepare($requete);
$stm->execute(array(
    $_SESSION['id']
));
$result=$stm->fetchAll();
?>
<?php
foreach ($result as $row){
    echo '<input type="hidden" name="idProjet" class="idProjet" value="'.$row['idProjet'].'" readonly>';
}
?>

<div class="container" style="margin-bottom: 3rem;padding-bottom: 3rem">
    <div class="featurette-divider"></div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row getCandidatSelected" style="background:#fff;padding: 1rem;">
            </div>
        </div>
    </div>
</div>
<?php include_once '../footer.php';?>
</body>


<script>
    $(document).ready(function () {
        var idProjet=$('.idProjet').val();
        $.ajax({
            url:'../../controller/getCandidatSelected.php',
            type:'post',
            data:{'idProjet':idProjet},
            success:function (data) {
                $('.getCandidatSelected').html(data);
            }
        })
    })
</script>
