<?php
include("../BD/conexion.php");
 header("Cache-Control: no-cache, must-revalidate"); 
     session_start();
      if (isset($_SESSION['u_usuario'])) {
        $no = $_SESSION['u_usuario'];

 $nivel_us = "SELECT * FROM user_sesion WHERE email = '$no'";
 $exe_nivel_u = mysqli_query($conexion,$nivel_us);  

  while ($un = mysqli_fetch_array($exe_nivel_u)) {
    $NIVEL_ACCESO = $un['tipo_user'];
    $USUARIO_P = $un['nombre'];
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
<header id="header_img" style="background: url(../imagenes/10.jpg);background-position: center;background-attachment: contain;  background-size: cover;background-color: rgba(0,0,0,0.7);">
 
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
        <a class="nav-link" href="../PLAYAS/" style="color: #fff; font-weight: bold;">PLAYAS</a>
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
        <a class="nav-link dropdown-toggle" href="SESION/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff; font-weight: bold;">
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

<br><br><br><br><br><br><br><br><br>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div style="background-color:rgba(0, 0, 0, 0.6); width:40%;color:#fff;border-radius: 20px;"><center>
      <h1>LA MEJOR INFORMACIÓN</h1>
    <p>LA MEJOR INFORMACIÓN</p></center>
    </div>
    </div>
    <div class="carousel-item">
  <div style="background-color:rgba(0, 0, 0, 0.6); width:40%;color:#fff;border-radius: 20px;"><center>
      <h1>LA MEJOR INFORMACIÓN</h1>
    <p>LA MEJOR INFORMACIÓN</p></center>
    </div>
  </div>
</div>
    <div class="carousel-item">
  <div style="background-color:rgba(0, 0, 0, 0.6); width:40%;color:#fff;border-radius: 20px;"><center>
      <h1>LA MEJOR INFORMACIÓN</h1>
    <p>LA MEJOR INFORMACIÓN</p></center>
    </div>
</div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
   <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>-->
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>-->
  </a>
</div>


</header>

<br>

<center>
    
</center>



<div class="col-lg-5 col-md-6" style="margin-left:15%;">
                <h4 class="contact-us-heading">Mantente en contacto con nosotros</h4><br><br>
  <form id="demo-form2" method="post" action="../BD/insert_contacto.php" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    
                    <input type="hidden" name="user_id"  value="1" />

                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Nombre Completo">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronicos">
                    </div>
                    <div class="comment btm-20">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Comentario" name="comentario"></textarea>
                    </div><br>

                    
                    <div class="contact-form-btn">
                        <button type="submit" class="btn btn-outline-primary">Enviar mensaje</button>
                    </div>
    </form>
 </div>


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

</body>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>