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

if(mysqli_query($conn,$sql)){
    echo "new recod created succefuly";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
