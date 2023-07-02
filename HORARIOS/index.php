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
<header id="header_img_horario">
 
<nav class="navbar navbar-expand-lg navbar-light" id="header_nav" style="z-index: 2;">

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
        <a class="nav-link" href="index.php" style="color: #fff; font-weight: bold;">PLAYAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../COMERCIO/" style="color: #fff; font-weight: bold;">COMERCIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="../HOTELES/" style="color: #fff; font-weight: bold;">HOTELES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="index.php" style="color: #fff; font-weight: bold;">HORARIOS</a>
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




<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="z-index: 1; margin-top: -100px;">


<?php 

    $imgS = "SELECT * FROM t_publicidad ORDER BY 
     id_publicidad DESC LIMIT 1 ";
     $exeS = mysqli_query($conexion,$imgS);
    while ($sli = mysqli_fetch_array($exeS)) {  
    $ultimoS = $sli['id_publicidad']; ?>


  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="../imagenes/img_publicidad/<?php echo
       $sli['img_publicidad']; ?>" alt="..." width="100%"
       height="480px">
      <div class="carousel-caption d-none d-md-block">
        <h1 style="color:#000; font-weight: bold; color: #052A6C;">
          <?php echo $sli['titulo_publicidad']; ?>
        </h1>
        <a href="<?php echo $sli['link_publicidad']; ?>" target="_blank">
          <p style="color:#000; font-size:25px;">
          <?php echo $sli['nombre_web']; ?>
         </p>
        </a>
      </div>
    </div>
    <?php }  ?>

   <?php $imgS2 = "SELECT * FROM t_publicidad WHERE 
    id_publicidad < '$ultimoS' ORDER BY id_publicidad DESC";

     $exeS2 = mysqli_query($conexion,$imgS2);
     while ($sli2 = mysqli_fetch_array($exeS2)) {   ?>

     <div class="carousel-item">
      <img src="../imagenes/img_publicidad/<?php echo
       $sli2['img_publicidad']; ?>" width="100%" 
       height="480px" alt="Second slide">
      <div class="carousel-caption d-none d-md-block"> 
       <h1 style="color:#000; font-weight: bold; color: #052A6C;">
          <?php echo $sli2['titulo_publicidad']; ?>
        </h1>
        <a href="<?php echo $sli2['link_publicidad']; ?>"
          target="_blank">
         <p style="color:#000; font-size:25px;">
          <?php echo $sli2['nombre_web']; ?>
         </p>
        </a>
      </div>  
    </div><?php }  ?> 


  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</header>

<br><br><br>

<center><b><h3 style="color: #096101;">HORARIO DE BUSES DE LUNES A VIERNES</h3></b>
<br><br></center>

<div class="row">
<div class="col-2" style="margin-left: 15%;">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5 style="color: #096101;">Salida de Ciudad Cortes</h5></th>
    </tr>
  </thead>
  <tbody>
    <?php 
       include("../BD/conexion.php");
       $horarios_lista = "SELECT * FROM horarios WHERE ruta = 1";
       $exe_list = mysqli_query($conexion,$horarios_lista);

       while ($l = mysqli_fetch_array($exe_list)) {
       ?>
    <tr>
      <td><b><?php echo $l['nombre_horario']; ?></b></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>



<div class="col-2">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5 style="color: #096101;">Salida de Palmar Norte</h5></th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $horarios_lista = "SELECT * FROM horarios WHERE ruta = 2";
       $exe_list = mysqli_query($conexion,$horarios_lista);

       while ($l = mysqli_fetch_array($exe_list)) {
       ?>
    <tr>
      <td><b><?php echo $l['nombre_horario']; ?></b></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>


<div class="col-2">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5 style="color: #096101;">Salida de Dominical</h5></th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $horarios_lista = "SELECT * FROM horarios WHERE ruta = 3";
       $exe_list = mysqli_query($conexion,$horarios_lista);

       while ($l = mysqli_fetch_array($exe_list)) {
       ?>
    <tr>
      <td><b><?php echo $l['nombre_horario']; ?></b></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>

<div class="col-3">
<table class="table">
  <thead>
    <tr>
      <th scope="col"><h5 style="color: #096101;">Salida de C.C Cortes-Ciudad Neily</h5></th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $horarios_lista = "SELECT * FROM horarios WHERE ruta = 4";
       $exe_list = mysqli_query($conexion,$horarios_lista);

       while ($l = mysqli_fetch_array($exe_list)) {
       ?>
    <tr>
      <td><b><?php echo $l['nombre_horario']; ?></b></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>

</div>




<br><br><br>
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
            <a href="#" class="text-white">HORARIO</a>
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