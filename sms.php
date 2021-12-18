<?php 
 $username = "889900";
    $hash = "6cd073c157d4a39fa425f22b1838bc93"; //generate token from the control panel
    $numbers = "01794973738"; //Recipient Phone Number multiple number must be separated by comma
    $message = "Dear customer,
Your registration has been successfully completed.Your user
email : markjoy261@gmail.com and password : 123456.
Thanks for Join with SAHOJ BAZAR.";

    $params = array('u'=>$username, 'h'=>$hash, 'op'=>'pv', 'to'=>$numbers, 'msg'=>$message);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://alphasms.biz/index.php?app=ws");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($ch);
    curl_close ($ch);

 ?>