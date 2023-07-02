<?php 
include("conexion.php");

$fname = trim($_POST['fname']);
$mobile = trim($_POST['mobile']);
$email = trim($_POST['email']);
$comentario = trim($_POST['comentario']);

$query = " INSERT into contacto_web(
    nombre,
    telefono,
    email,
    comentario )
 VALUES (
     '$fname',
     '$mobile',
     '$email',
     '$comentario')";

mysqli_query($conexion, $query);
header("location:../CONTACTO/")

?>