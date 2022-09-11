<?php 
require "../PHPMAIL/src/Exception.php";
require "../PHPMAIL/src/PHPMailer.php";
require "../PHPMAIL/src/SMTP.php";
include_once 'logueo.php';

$index = new logueo();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

header('Content-type: application/json');

if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['correo'])){

    $cedula = $_GET['correo'];
    $id;
    $nombres;
    $datos = array();

    $result = $index->obtener_logueo($cedula);
    if ($result->rowCount()){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $id = $row['Id_us'];
            $nombres = $row['nombre'].' '.$row['apellido'];
        }
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'flaremy.net';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'system@porkino.flaremy.net';                     //SMTP username
            $mail->Password   = 'Jjponce200';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465; 

            
            //Recipients
            $mail->setFrom('system@porkino.flaremy.net', 'Servidor');
            $mail->addAddress($cedula, $nombres);     //Add a recipient
            //$mail->addCC('servidor@asociacioncodesol.org', 'Servidor');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            //$mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'RECUPERACION DE CUENTA';
            $mail->Body    = 'A continuacion va encontrar un enlace el cual le redireccionara a el cambio de contraseña de su cuenta
              https://porkino.flaremy.net/backend/changepass.php?id='.$id.' 
             En caso de haber recibido el correo por error ignore este correo';
            $mail->AltBody = 'Esto es un mensaje alternativo que ya voy a saber para que sirve';

            if($mail->send()){
                $item = array(
                    'mensaje' => "cre",
                );
            }
        } catch (Exception $e) {
            echo "No se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
        }
    }else{
        $item = array(
            'mensaje' => "cne",
        );
    }

    array_push($datos, $item);

    printJSON($datos);
}

function printJSON($array){
    print_r(json_encode($array));
}