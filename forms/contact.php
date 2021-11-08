<?php

require("enlaze.php");


$nombre= "";
$correo = "";
$tema = "";
$mensaje = "";

if(isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
}

if(isset($_POST["correo"])){
    $correo = $_POST["correo"];
}



if(isset($_POST["tema"])){
  $tema = $_POST["tema"];
}

if(isset($_POST["mensaje"])){
  $mensaje = $_POST["mensaje"];
}


$sql = "INSERT INTO registros (id,nombre,correo,tema,mensaje) VALUES (' ','$nombre','$correo','$tema','$mensaje')";

if(mysqli_query($conn,$sql)){
    echo "Base de datos conectada ";
} else { 
    echo "Status : " . $sql . "<br>" . mysqli_error($conn);
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ("vendor/autoload.php");
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 0;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.outlook.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'israel_1320114066@uptecamac.edu.mx';                     //SMTP username
  $mail->Password   = 'Tambo2002';                               //SMTP password
  $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('israel_1320114066@uptecamac.edu.mx', 'Curipapus');
  $mail->addAddress("$correo", "$nombre");     //Add a recipient
  

  

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Asunto de suma importancia';
  $mail->Body    = 'Correo recibido exitosamente';
  

  $mail->send();
  echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
  echo "Isra la cagaste en algo: {$mail->ErrorInfo}";
}

?>
