<?php
include("../BD/conexion.php");
 header("Cache-Control: no-cache, must-revalidate"); 
     session_start();
      if (isset($_SESSION['u_usuario'])) {
        $no = $_SESSION['u_usuario'];

 $nivel_us = "SELECT * FROM user_sesion WHERE email = '$no'";
 $exe_nivel_u = mysqli_query($conexion,$nivel_us);  

  while ($un = mysqli_fetch_array($exe_nivel_u)) {
    $ID = $un['id_user'];
    $NIVEL_ACCESO = $un['tipo_user'];
    $USUARIO_P = $un['nombre'];
    $FOTO_P = $un['foto_perfil'];
    $NOMBRE = $un['nombre'];
    $CEDULA = $un['cedula'];
    $EMAIL = $un['email'];
    $CELULAR = $un['celular'];
  }
      }else{   
     $NIVEL_ACCESO = 0;
      }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TOURIMS OSA</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header id="header_img" style="background: url(../imagenes/fondo_perfil.jpg);background-position: center;background-attachment: contain;  background-size: cover;background-color: rgba(0,0,0,0.7); height: 400px;">
 
 <nav class="navbar navbar-expand-lg navbar-light" id="header_nav">
  <a class="navbar-brand" href="../" style="color: #fff; margin-left: 7%;"><h4>TURISMO OSA</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav" style="margin-left: 38%;">
      <li class="nav-item active">
        <a class="nav-link" href="../" style="color: #fff; font-weight: bold; ">INICIO <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../" style="color: #fff; font-weight: bold;">PLAYAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../COMERCIO/" style="color: #fff; font-weight: bold;">COMERCIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="../HOTELES/" style="color: #fff; font-weight: bold;">HOTELES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="../HORARIOS/" style="color: #fff; font-weight: bold;">HORARIOS</a>
      </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="../SESION/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-weight: bold;">
        <?php 
         if ($NIVEL_ACCESO==1) {
         echo $USUARIO_P;
         }elseif($NIVEL_ACCESO==2){
          echo $USUARIO_P;
          }else{
            echo "LOGIN";
          }?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php 
         if ($NIVEL_ACCESO==1) {
          ?>
           <a class="dropdown-item" href="../../turismo_administracion/" target="_blank">ADMINISTRACIÓN</a>
           <a class="dropdown-item" href="../PERFIL/">PERFIL</a>
        <?php }elseif($NIVEL_ACCESO==2){ ?>
          <a class="dropdown-item" href="../PERFIL/">PERFIL</a>
       <?php }else{
        ?>
          <a class="dropdown-item" href="../SESION/">Iniciar Sesion</a>
          <a class="dropdown-item" href="../REGISTRO/">Registrarse</a>

         <?php }

          ?>
          
          <div class="dropdown-divider"></div>
        <?php  if($NIVEL_ACCESO==2){ ?>
           <a class="dropdown-item" href="../BD/salir.php">SALIR</a>
       <?php }elseif($NIVEL_ACCESO==1){ ?>
        <a class="dropdown-item" href="../BD/salir.php">SALIR</a>
      <?php }
        ?>
        </div>
      </li>
    </ul>
  </div>
</nav>
  <h1 style="margin-top: 220px; color: #fff; margin-left: 90px;"><b>PERFIL</b></h1>
</header>

<style type="text/css">
  #foto_perfil{
    width: 20%;
    /*background: red;*/
    margin-left: 60px;
    min-width: 200px;
  }
  #detalles_user{
    width: 50%;
    /*background: green;*/
    margin-left: 10%;
  }

</style>


<br>
<br>
<br>
<center>
<div class="row">
   
<div id="foto_perfil">
<br>

<style type="text/css">
   #foto_circulo{
   /* background: yellow;*/
    width: 90%;
    height: 90%;
  /*  background: url(../imagenes/img_perfil/<?php echo $FOTO_P; ?>);*/
  }
 </style>
<div id="foto_circulo"><br>
  <img src="../imagenes/img_perfil/<?php echo $FOTO_P; ?>" width="300px" height="300px"
  style="border-radius: 200px;">

<br><br>
  <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
  <b>ACTUALIZAR FOTO</b>
</button><br><br>

<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#clave22">
  <b>CAMBIAR CLAVE</b>
</button><br><br><br>


<!-- SEgundp Modal 1 -->
<div class="modal fade" id="clave22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CAMBIAR CONTRASEÑA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="../BD/update_clave.php" method="POST">
         
         <input type="hidden" name="correo" value="<?php echo $EMAIL; ?>">
          
          <div class="form-group col-md-11">
              <label for="inputEmail4">CONTRASEÑA ACTUAL</label>
              <input type="password" class="form-control" id="inputEmail4" placeholder="Clave actual" name="actual">
            </div>
         
            <div class="form-group col-md-11">
              <label for="inputEmail4">NUEVA CONTRASEÑA</label>
              <input type="password" class="form-control" id="inputEmail4" placeholder="Nueva clave" name="clave1">
            </div>

            <div class="form-group col-md-11">
              <label for="inputEmail4">CONFIRMAR CONTRASEÑA</label>
              <input type="password" class="form-control" id="inputEmail4" placeholder="Confirmar clave" name="clave2">
            </div>
         
         <button type="submit" class="btn btn-outline-warning" name="buscar"><b>GENERAR CAMBIO</b></button>
         </form>  
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


</div>



</div>

<div id="detalles_user" style="border-style:ridge;"><br>
  <h2 style="text-align:left; margin-left: 80px;color:#096101;">Información Personal</h2><br><br>
  <form action="../BD/update_perfil.php" method="POST" style="width: 80%;">
  <input type="hidden" name="id" value="<?php echo $ID; ?>">
  <div class="row">
    <div class="col">
      <label for="fo" style="color:#096101;"><b>NOMBRE</b></label>
      <input id="fo" type="text" class="form-control" name="nombre" value="<?php echo $NOMBRE; ?>" >
    </div>
    <div class="col">
      <label for="fo1" style="color:#096101;"><b>CEDULA</b></label>
      <input id="fo1" type="text" class="form-control"  name="cedula" value="<?php echo
       $CEDULA; ?>">
    </div>
  </div><br>
  <div class="row">
    <div class="col">
    <label for="exampleFormControlTextarea1" style="color:#096101;"><b>CELULAR</b></label>
    <input id="fo2" type="text" class="form-control" name="celular" value="<?php echo $CELULAR; ?>">
  </div>
    <div class="col">
      <label for="fo2" style="color:#096101;"><b>CORREO ELECTRONICO</b></label>
    <input id="fo2" type="text" class="form-control" disabled
    value="<?php echo $EMAIL; ?>">
    </div>
  </div><br>


  <br>  
  <button type="submit" class="btn btn-outline-success" style="float:right;"><b>Actualizar Datos</b></button>
</form> 
</div>

</div>

</center>

<br><br><br><br>

<footer class="text-white text-center text-lg-start" 
style="background: url(../imagenes/playa_footer.jpg); background-position: center;background-attachment: contain;  background-size: cover;">
  <center>
  <div class="container p-4" style="background-color: rgba(0,0,0,0.7); width:100%;">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase"style="text-align: left;"><b>Turismo Osa.com</b></h5><br>

        <p style="text-align: left;">
Declarado uno de los lugares biológicamente más intenso sobre la tierra por la revista National Geographic.
<br><br>
La península de Osa, junto con la Bahía de Drake se ha convertido en el primer destino de turismo ecológico en la provincia.
        </p>
      </div>
      
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">DIRECTORIO</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="../PLAYAS/" class="text-white">PLAYAS</a>
          </li>
          <li>
            <a href="../COMERCIO/" class="text-white">COMERCIO</a>
          </li>
          <li>
            <a href="../HOTELES/" class="text-white">HOTELES</a>
          </li>
          <li>
            <a href="../HORARIOS/" class="text-white">HORARIO</a>
          </li>
        </ul>
      </div>
     
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <a href="../CONTACTO/" style="text-decoration:none;color: #fff;"><h5 class="text-uppercase mb-0">Contactenos</h5></a>
      </div>

    </div>
  </div>
  </center>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.9);">
    © 2021 Copyright:
  </div>
</footer>


<!-- Modal 1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color: black;" class="modal-title" id="exampleModalLabel">ACTUALIZAR FOTO DE PERFIL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <div class="col-12">
<form action="../BD/update_foto_perfil.php" method="POST"
  enctype="multipart/form-data">
  
  <input type="hidden" name="id" value="<?php echo $ID; ?>">

  <div class="form-group">
    <label for="exampleFormControlFile1" style="float: right;margin-right: 10%;"><b>FOTO DE PERFIL</b></label>
    <input name="foto" type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
    
 <div class="modal-footer">
 <input type="submit" value="AGREGAR" name="" class="btn btn-success">
</form>
</div>

<!-- Modal -->





</body>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>