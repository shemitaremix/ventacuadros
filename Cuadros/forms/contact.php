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
  $correo = $_POST["tema"];
}

if(isset($_POST["mensaje"])){
  $correo = $_POST["mensaje"];
}


$sql = "INSERT INTO registros (id,nombre,correo,tema,mensaje) VALUES (' ','$nombre','$correo','$tema','$mensaje')";

/*if(mysqli_query($conn,$sql)){
    echo "new recod created succefuly";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->Host = "localhost";
 
$mail->From = "shemarodriguez1406@gmail.com";
$mail->FromName = "Nombre del Remitente";
$mail->Subject = "Subject del correo";
$mail->AddAddress("$correo","$nombre");


 
$body  = "Hola <strong>amigo</strong><br>";
$body .= "probando <i>PHPMailer<i>.<br><br>";
$body .= "<font color='red'>Saludos</font>";
$mail->Body = $body;
$mail->AltBody = "Hola amigo\nprobando PHPMailer\n\nSaludos";

$mail->Send();

?>
