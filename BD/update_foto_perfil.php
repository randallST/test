<?php 
include("conexion.php");
  $id = $_POST['id'];   
   
   $foto=$_FILES["foto"]["name"];
   $ruta=$_FILES["foto"]["tmp_name"];
   $destino="../imagenes/img_perfil/".$foto;
    copy($ruta,$destino);

  	$act = "UPDATE user_sesion SET foto_perfil = '$foto' WHERE id_user = '$id' ";

    $exe69 = mysqli_query($conexion,$act);
    header('Location:../PERFIL/');

?>