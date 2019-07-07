<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="">
        <form name="add_name" id="add_name">
            <table class="table table-responsive" id="dynamyc_field">
                <tr>
                    <th>nom</th>
                    <th>last</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="name[]" id="name" class="name_list">
                    </td>
                    <td>
                        <input type="text" name="last[]" id="last" class="name_list">
                    </td>
                    <td>
                        <button type="button" name="add" id="add">+</button>
                    </td>
                </tr>
            </table>
            <input type="button" name="submit" id="submit" value="inser">
        </form>
    </div>
    <div style="width:50%;margin: auto">
        <?php
        $dateystem=date('Y');$datedebut=$dateystem-80;
        //date debut
        echo '<select id="s1" class="form-control"><option>annee</option>';
        for ($datedebut=$dateystem-80; $datedebut<=$dateystem; $datedebut++){
            echo '<option value="'.$datedebut.'">'.$datedebut.'</option>';
        }
        echo '</select>';
        ?>
        <select id="s2" class="form-control">
            <option>votre date de fin</option>
        </select>
    </div>
=========================================================================
    <div align="center" style="margin-top: 15rem">
        <?php
            $date=date('Y');
            //date debut
            $dd=$date-80;
            $i=1;
            $a=$dd;
            $m=1;

        echo '<select class="form-control-input"><option>jours</option>';
        for ($i; $i<=31; $i++){
            echo '<option>'.$i.'</option>';
        }
        echo '</select>';

        echo '<select><option>mois</option>';
        for ($m; $m<=12; $m++){
            echo '<option>'.$m.'</option>';
        }
        echo '</select>';

        echo '<select><option>annee</option>';
        for ($a=$dd; $a<=$date; $a++){
            echo '<option>'.$a.'</option>';
        }
        echo '</select>';


        ?>
    </div>
    <div align="center">
        <iframe src="" style="width: 1000px;height: 1000px" ></iframe>
    </div>
<div align="center">
    <figure>
        <img src="../avatar/1b6eef16-85f7-41b1-a292-fbe8d82d2b0e.jpg" class="avatar-profil">
    </figure>
</div>

</body>
</html>
<script src="jquery3.1.1.js"></script>
<script src="bootstrap.min.js"></script>
<script>
    $(document).ready(function (){
        $('#s1').on('change',function () {
            var s1 = $(this).val();
            var annee, madate, dateD, incr=0;

            madate = new Date();
            annee = madate.getFullYear();
            dateD = parseInt(annee) - parseInt(s1);
			//alert(dateD);
            $('#s2').empty();
            if(s1){
                for(i=1 ; i<= dateD ; i++ ){
                    incr = parseInt(s1)+i;
                    $('#s2').append('<option>'+incr+'</option>');
                }
            }
        });

    });
</script>
<script>

    $(document).ready(function () {
        $('cavas').show();
        $('.avatar-profil').css({
           'height':'300px',
            'width':'255px'
        });

        var i=1;
       $('#add').click(function () {
           i++;
           $('#dynamyc_field').append('<tr id="row'+i+'">' +
               '<td><input type="text" name="name[]" id="name" class="name_list"></td>' +
               '<td><input type="text" name="last[]" id="last" class="last_list"></td>' +
               '<td><button type="button" name="remove" data-row="row'+i+'" class="btn_remove">X</button></td>' +
               '</tr>');
       });
        $(document).on('click','.btn_remove',function () {
            var delete_row=$(this).data("row");
            $('#'+ delete_row).remove();
        });

        $('#submit').click(function () {
           $.ajax({
                url:"test.php",
                method:"post",
                data:$('#add_name').serialize(),
                success:function (data) {
                    alert(data);
                    $('#add_name')[0].reset();
               }
           });
        });
    });
</script>