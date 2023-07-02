<?php 
session_start();
unset($_SESSION['u_usuario']);
header("location:../");
?>