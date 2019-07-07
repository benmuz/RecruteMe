<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery3.1.1.js"></script>
    <script>
        $(document).ready(function (){
            $('#pays').on('change',function () {
                var monpays = $(this).val();
                if(monpays){

                    $.ajax({
                        type:'POST',
                        url:'fetch_localisation.php',
                        data:{'monpays':monpays},
                        success:function(data){
                            $('#ville').html(data);
                        }
                    });
                }else{
                    $('#ville').html('<option value="">Selection d\'abord le pays</option>');
                }
            })
        });
    </script>
</head>
<body>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="jumbotron col-sm-6">
                c'est deja bon ca marche
                <div class="form-group">
                    <?php
                    //Include database configuration file
                    include_once '../globals/database.php';
                    include_once '../model/Connexion.class.php';

                    $con=Connexion::getConnexion();

                    //Get all country data
                    $query = "SELECT * FROM pays  ORDER BY nomPays ASC";
                    $stm =$con->prepare($query);
                    $stm->execute();
                    //Count total number of rows
                    $count = $stm->fetchAll();
                    ?>
                    <select name="pays" id="pays" class="form-control">
                        <option value="">Votre pays</option>
                            <?php
                                if(sizeof($count) > 0){
                                    foreach($count as $row){
                                        $idPays=$row['idPays'];
                                        $nomPays=$row['nomPays'];
                                        echo "<option value='$idPays'>$nomPays</option>";
                                    }
                                }else{
                                    echo '<option value="">ce pays est invalide</option>';
                                }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="ville" id="ville" class="form-control">
                        <option value="">votre ville de residence</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</body>
</html>