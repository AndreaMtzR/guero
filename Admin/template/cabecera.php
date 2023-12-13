<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location:../index.php');
}else {
  if ($_SESSION['usuario']=="ok") {
    $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>INICIO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  </head>
  <body>
  <?php $url="http://".$_SERVER ['HTTP_HOST']."/GUERO"?>

<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link active" href="#">Administrador<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/inicio.php">Inicio</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/seccion/producto.php">Menu</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/seccion/cerrar.php">cerrar sesion</a>
        <a class="nav-item nav-link" href="<?php echo $url;?>">ver sitio web</a>
       
    </div>
</nav>




    <div class="container">
      <br/>
        <div class="row">