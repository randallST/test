<?php 
include("conexion.php");
session_start();
 $nombre= trim($_POST["email_user"]);
 $clave= trim($_POST["clave_user"]);

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
$cifrado = $sed->encryption($clave);

$query = "SELECT * from user_sesion  
    where email = '$nombre' 
    AND clave = '$cifrado'";

$sql  = mysqli_query($conexion, $query);

if ($resul = mysqli_fetch_array($sql)) {
	$_SESSION['u_usuario'] = $nombre;
	header("location: ../index.php");
    
} else {
	 echo "<script>
     alert('Usuario no registrado');
     location.href='../SESION/';
	</script>";
	
}

 ?>