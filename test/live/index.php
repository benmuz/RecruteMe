<!doctype html>
<html lang="fr">
<head>
    <?php
        include_once 'config.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>live search</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../jquery3.1.1.js"></script>
    <script src="../bootstrap.min.js"></script>
    <script src="typeahead.jquery.js"></script>
</head>
<body>
<div class="container">
    <h2>Autocomplete Search with Bootstrap Typeahead</h2>
    <div class="row">
        <div class="col-xs-2">
            <br/>
            <label>Search Name</label>
            <input class="typeahead form-control" type="text" placeholder="Search Name....">
        </div>
    </div>
</div>
</body>
<script>
    $( document ).ready(function() {
        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get('index.php', { query: query }, function (data) {
                    data = $.parseJSON(data);
                    return process(data);
                });
            },
            showHintOnFocus:'all'
        });
    });
</script>
</html>

<?php
    include_once '../../globals/database.php';
    include_once '../../model/Connexion.class.php';

    $con=Connexion::getConnexion();
    $sql = "SELECT * FROM professionnels WHERE nom LIKE '%".$_GET['query']."%' LIMIT 20";
    $resultset = $con->prepare($sql);
    $resultset->execute();
    $resulta=$resultset->fetchAll();
    $json = array();

    if(sizeof($resulta)>0){
        foreach ($resulta as $rows) {
        $json[] = $rows["nom"];
    }
        echo json_encode($json);
    }

?>