<?php
    require_once '../../globals/database.php';
    require_once '../../model/Connexion.class.php';

    $con=Connexion::getConnexion();
    $req="select * from utilisateur";
    $stm=$con->prepare($req);
    $stm->execute();
    $result=$stm->fetchAll();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../jquery3.1.1.js"></script>
    <script src="../bootstrap.min.js"></script>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>send email buil </title>

</head>
<body>
    <div class="container">
        <br><br/>
            <h3 align="center"> send bulk email</h3><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Pseudo</td>
                    <td>Email</td>
                    <td>selection</td>
                    <td>Action</td>
                </tr>
                <?php
                    $count=0;
                    foreach ($result as $row){
                        $count=$count +1;

                        echo '
                            <tr> 
                                <td> '.$row['pseudo'].'</td>
                                <td> '.$row['email'].'</td>
                                <td> <input type="checkbox" name="sigle_select" class="single_select" data-email="'.$row['email'].'" data-name="'.$row['pseudo'].'"></td>
                                <td> 
                                    <button type="button" name="email_button" class="btn btn-sm btn-primary email_button" id="'.$count.'" data-email="'.$row['email'].'" data-name="'.$row['pseudo'].'" data-action="single">Envoi simple</button>
                                </td>
                            </tr>
                        ';
                    }
                ?>
                <tr>
                    <td colspan="3"></td>
                    <td>
                        <button type="button" name="bulk_email" class="btn btn-primary email_button" id="bulk_email" data-action="bulk">A tous</button>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
<script>
    $(document).ready(function () {

        $('.email_button').click(function () {

           $(this).attr('disabled','disabled');
           var id=$(this).attr('id');
           var action=$(this).data("action");
           var email_data=[];

           if(action == 'sigle'){
               email_data.push({
                  'email':$(this).data('email'),
                   'name':$(this).data('name')
               });
           }else{
               $('.single_select').each(function () {
                   if($(this).prop("checkbox") == true){
                       email_data.push({
                           'email':$(this).data('email'),
                           'name':$(this).data('name')
                       });
                   }
               })
           }

           $.ajax({
               url:'send.php',
               type:'post',
               data:{
                   'email_data':email_data
               },
               beforeSend:function () {
                   $('#'+id).addClass('btn btn-danger');
                   $('#'+id).text('Encours ...');
               },
               success:function (data) {
                   if(data == 'ok'){

                       $('#'+id).text('Envoi avec succes');
                       $('#'+id).removeClass('btn btn-danger');
                       $('#'+id).removeClass('btn btn-primary');
                       $('#'+id).addClass('btn btn-success');
                   }
                   else{
                       $('#'+id).html(data);
                   }
                   $('#'+id).attr('disabled', false);
               }
           })
        });
    })
</script>