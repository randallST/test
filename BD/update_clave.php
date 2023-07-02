<?php 
include("conexion.php");

session_start();

 $actual= trim($_POST["actual"]);
 $correo= trim($_POST["correo"]);

 $clave1= trim($_POST["clave1"]);
 $clave2= trim($_POST["clave2"]);

 if ($clave1 == $clave2) {
 

define('METHOD','AES-256-CBC');
define('SECRET_KEY','$HSA@2021');
define('SECRET_IV','010121');

class SED {
    public static function encryption($string){
      $output=FALSE;
      $key=hash('sha256', SECRET_KEY);
      $iv=substr(hash('sha256', SECRET_IV), 0, 16);
      $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
      $output=base64_encode($output);
      return $output;
    }}
$sed = new SED();
$cifrado = $sed->encryption($actual);

$query = "SELECT * from user_sesion  
    where email = '$correo' 
    AND clave = '$cifrado'";

$sql  = mysqli_query($conexion, $query);

while ($oo = mysqli_fetch_array($sql)) {
  $id_us = $oo['id_user'];
}



/*PARTE DE ACTUALIZACIÓN*/

class SED2 {
    public static function encryption($string){
      $output=FALSE;
      $key=hash('sha256', SECRET_KEY);
      $iv=substr(hash('sha256', SECRET_IV), 0, 16);
      $output=openssl_encrypt($string, METHOD, $key, 0, $iv);
      $output=base64_encode($output);
      return $output;
    }}
$sed2 = new SED2();
$encry2 = $sed2->encryption($clave1);
//echo $encry."<br>";


$act = "UPDATE user_sesion SET clave = '$encry2' WHERE id_user = '$id_us' ";


$sql2=mysqli_query($conexion, $act);
 if( $sql2  == true){
 echo "
   <script>
 alert('CONTRASEÑA ACTUALIZADA');
window.location.href='../PERFIL/';
</script>";
 }




}
 ?>