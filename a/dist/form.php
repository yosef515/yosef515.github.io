﻿<?php

session_cache_limiter('nocache');

header('Expires: ' . gmdate('r', 0));

header('Content-type: application/json');

$to = 'yosef.saleh515@gmail.com
';

$subject = $_POST['subject'];

if(isset($_POST['email'])) {

$name = $_POST['name'];

$email = $_POST['email'];

$fields = array(

0 =>array(

'text' => 'Name',

'val' => $_POST['name']

),

1 =>array(

'text' => 'Email address',

'val' => $_POST['email']

),

2 =>array(

'text' => 'Message',

'val' => $_POST['message']

)

);

$message = "";

foreach($fields as $field) {

$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";

}

$headers = '';

$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";

$headers .= "Reply-To: " .  $email . "\r\n";

$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if (mail($to, $subject, $message, $headers)){

$arrResult = array ('response'=>'success');

} else{

$arrResult = array ('response'=>'error');

}

echojson_encode($arrResult);

} else {

$arrResult = array ('response'=>'error');

echojson_encode($arrResult);

}

?>