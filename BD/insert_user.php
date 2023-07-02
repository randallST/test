<?php 
include("conexion.php");
$email_user = trim($_POST['email']);
$nombreUser = trim($_POST['nombre']);
$cedula_user = trim($_POST['identificacion']);
$celular_user = trim($_POST['celular']);

/*$id_nivel_user = trim($_POST['id_nivel_user']);*/
$clave1 = trim($_POST['clave1']);
$clave2 = trim($_POST['clave2']);

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
$encry = $sed->encryption($clave1);
//echo $encry."<br>";

$query = " INSERT into user_sesion(
     nombre,
     cedula,
     celular,
 	 email,
     clave)
 VALUES (
     '$nombreUser',
     '$cedula_user',
     '$celular_user',
     '$email_user',
     '$encry')";

$sql=mysqli_query($conexion, $query);
 if( $sql  == true){
   echo "
   <script>
 alert('USUARIO REGISTRADO CON EXITO');
window.location.href='../';
</script>

   ";
 }
}
else{
	echo "<script>
 alert('CONTRASEÑAS NO COINCIDEN');
</script>";
//header("location:./?go=key");
}
//header("location:./?go=Login");
 ?>