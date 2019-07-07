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
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12"> <h2 align="center">le filter sur les donnees</h2></div>
            <div class="col-sm-4">
                <div class="list-group">
                    <h5>le filter de professionnel selon leurs</h5>
                    <h3>Ville</h3>
                    <div style="height:15rem;overflow-y:auto;overflow-x: hidden;">
                        <?php
                        include_once '../globals/database.php';
                        include_once '../model/Connexion.class.php';

                        $con=Connexion::getConnexion();
                        $req="select DISTINCT(ville) from professionnels ";
                        $stm=$con->prepare($req);
                        $stm->execute();
                        $result=$stm->fetchAll();

                        foreach ($result as $res){
                            ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" name="" id="" class="common_selector ville" value="<?=$res['ville']?>">
                                    <?=$res['ville']?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="list-group">

                    <h3>Annees d'experiences</h3>
                    <div style="height:15rem;overflow-y:auto;overflow-x: hidden;">
                        <?php
                        include_once '../globals/database.php';
                        include_once '../model/Connexion.class.php';

                        $con=Connexion::getConnexion();
                        $req="select DISTINCT nombreAnnee from experiences ";
                        $stm=$con->prepare($req);
                        $stm->execute();
                        $result=$stm->fetchAll();

                        foreach ($result as $res){
                            ?>
                            <div class="list-group-item checkbox">
                                <label>
                                    <input type="checkbox" name="" id="" class="common_selector experience" value="<?=$res['nombreAnnee']?>">
                                    <?=$res['nombreAnnee']?> annee(s)
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row filter_data card-body" style="padding: 1rem">

                </div>
            </div>
        </div>

    </div>

</body>
<style>
    #loading{
        text-align: center;
        background: url("../view/static/img/loading.gif") center;
        height: 105rem;
    }
</style>
<script>
    $(document).ready(function () {
        filter_data();
        
        function filter_data() {
            $('.filter_data').html('<div id="loading" style=""></div>');
            var action='fetch_data';
            var ville=get_filter('ville');
            var experience=get_filter('experience');
            var competence=get_filter('competence');

            $.ajax({
                url:"fetch_data.php",
                type:"post",
                data:{"action":action,"ville":ville,"experience":experience,"competence":competence},
                success:function(data){
                    $('.filter_data').html(data);
                }
            })
        }
        
        function get_filter(class_name) {
            var filter=[];
            $('.'+class_name+':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }
        
        $('.common_selector').click(function () {
            filter_data();
        })
    })
</script>
</html>