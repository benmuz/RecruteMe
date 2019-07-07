<?php

if(isset($_POST['email_data'])){
    //require_once 'class/class.phpmailer.php';

    $output='';
    foreach ($_POST['email_data'] as $row){

        $email=new PHPMailer;
        $email->IsSMTP();
        $email->Host='stmpout.secureserver.net';
        $email->Port='80';
        $email->SMTPAuth=true;
        $email->Username='xxxxxx';
        $email->Password='xxxxxx';
        $email->SMTPSecure='';
        $email->From='infos@congojob.com';
        $email->FromName='Offre d\'emploi';
        $email->AddAddress($row['email'],$row['name']);
        $email->WordWrap=50;
        $email->IsHTML(true);
        $email->Suject='offre d\'emploit qui peut vous interesse';
        $email->Body='<p> ici du text pour le message</p>';

        $email->AltBody='';
        $result=$email->Send();

        if($result['code']=='400'){
            $output .= html_entity_decode($result['full_error']);
        }
    }
    if($output==''){
        echo 'ok';
    }
    else{
        echo $output;
    }
}