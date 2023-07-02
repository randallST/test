<?php 
include("conexion.php");
  $id = $_POST['id'];   

   $nombre = $_POST['nombre'];
   $cedula = $_POST['cedula'];	
   $celular = $_POST['celular'];
   //$email = $_POST['email']; 

  	$act = "UPDATE user_sesion SET nombre = '$nombre', cedula = '$cedula', celular =
     '$celular' WHERE id_user = '$id' ";

    $exe69 = mysqli_query($conexion,$act);
    header('Location:../PERFIL/');
 

?>