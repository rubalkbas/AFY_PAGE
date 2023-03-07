<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$mailheader = "From:".$name. "<" .$email. "> \r\n";

$emailReceiver = "oulises5552@gmail.com";

mail($emailReceiver, $subject, $message, $mailheader) or die("Error!");


echo "Mensaje enviado exitosamente";

?>