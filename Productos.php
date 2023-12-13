<?php include("template/cabecera.php"); ?>

<?php
include ("Admin/config/bd.php");
$sentenciaSQL=$conexion->prepare("SELECT * FROM menu");
$sentenciaSQL->execute();
$listamenu=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<?php foreach($listamenu as $menu) {?>
<div class="col-md-3">
<div class="card">
        <img class="card-img-top" src="./img/<?php echo $menu['imagen']; ?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $menu['nombre']; ?></h4>
            <a name="" id="" class="btn btn-primary" href="arrachera.php" role="button">Ver Producto</a>
        </div>
    </div>
    
</div>
<?php }?>


    
<?php include("template/pie.php"); ?>