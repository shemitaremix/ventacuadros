<?php

require("enlaze.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ("vendor/autoload.php");
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

/*if(mysqli_query($conn,$sql)){
    echo "new recod created succefuly";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/


$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 0;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'shemarodriguez1406@gmail.com';                     //SMTP username
  $mail->Password   = 'tambo1406';                               //SMTP password
  /*$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
  $mail->Port       = 587;   */                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('shemarodriguez1406@gmail.com', 'Curipapus');
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
