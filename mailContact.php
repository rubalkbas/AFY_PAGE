<?php

// $name = $_POST['name'];
// $email = $_POST['email'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];
// $mailheader = "From:".$name. "<" .$email. "> \r\n";
// $emailReceiver = "oulises5552@gmail.com";
// mail($emailReceiver, $subject, $message, $mailheader) or die("Error!");

// echo "Mensaje enviado exitosamente";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'afyconsulting1@outlook.com';
        $mail->Password = 'Afy.contact.23*';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        //Configuración del correo
        $mail->setFrom('afyconsulting1@outlook.com', 'Contacto AFY Consulting');
        $mail->addAddress('ramirezguillermo19@gmail.com');//Reemplazar por el correo de atención
        
        //Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = (string)$_POST['subject'];
        $mail->Body = 'Nombre: '.$_POST['name'].'<br>'.'Correo: '.$_POST['email'].'<br>'.'Mensaje: '.(string)$_POST['message'];

        $mail->send();
        //echo 'El correo ha sido enviado exitosamente';
        exit(json_encode(array('status' => 'El correo ha sido enviado exitosamente')));
    } catch (Exception $e) {
        //echo 'Hubo un error al enviar el correo: ', $mail->ErrorInfo;
        exit(json_encode(array('status' => 'Hubo un error al enviar el correo: ', $mail->ErrorInfo)));
    }

?>