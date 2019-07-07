<?php

    $connect=mysqli_connect("localhost","root","","bd_name");
    $number=count($_POST['name']);

    if($number > 0){
        for($i=0; $i<$number; $i++){
            if(trim($_POST["name"][$i])!=''){

                $req="INSERT INTO name(name) VALUES ('".mysqli_real_escape_string($connect,$_POST['name'][$i])."')";
                mysqli_query($connect,$req);
            }
            else{
                echo 'all fields required';
            }
        }
        echo 'data inserted';

    }