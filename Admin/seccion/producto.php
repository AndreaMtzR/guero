<?php include ("../template/cabecera.php");?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


 include ("../config/bd.php");

switch($accion){
    case "Agregar":
        
        $sentenciaSQL=$conexion->prepare("INSERT INTO menu (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);

        $fecha=new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen!="") {
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();

        header('Location:producto.php');
        break;
    case "Modificar":
        $sentenciaSQL=$conexion->prepare("UPDATE menu SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();


            if ($txtImagen!="") {

                $fecha=new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

                $sentenciaSQL=$conexion->prepare("SELECT imagen FROM menu WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $menu=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
                if (isset($menu["imagen"]) &&($menu["imagen"]!="imagen.jpg") ) {
                    if (file_exists("../../img/".$menu["imagen"])) {
                        unlink("../../img/".$menu["imagen"]);
                    }
                }
            $sentenciaSQL=$conexion->prepare("UPDATE menu SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            header('Location:producto.php');
              
            }
        
        
        break;
    case "Cancelar":

        header('Location:producto.php');
        
        break;
    case "Seleccionar":

        
    $sentenciaSQL=$conexion->prepare("SELECT * FROM menu WHERE id=:id");
    $sentenciaSQL->bindParam(':id',$txtID);
    $sentenciaSQL->execute();
    $menu=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

    $txtNombre=$menu['nombre'];
    $txtImagen=$menu['imagen'];

        
        break;
    case "Borrar":
        $sentenciaSQL=$conexion->prepare("SELECT imagen FROM menu WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $menu=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($menu["imagen"]) &&($menu["imagen"]!="imagen.jpg") ) {
            if (file_exists("../../img/".$menu["imagen"])) {
                unlink("../../img/".$menu["imagen"]);
            }
        }
        $sentenciaSQL=$conexion->prepare("DELETE FROM menu WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        header('Location:producto.php');
        break;
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM menu");
$sentenciaSQL->execute();
$listamenu=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>






<div class="col-md-5">

<div class="card">
    <div class="card-header">
       DATOS DE MENU
    </div>
    <div class="card-body">
       

    <form method="POST" enctype="multipart/form-data">

<div class = "form-group">
<label for="txtID">ID</label>
<input type="text" Required  readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
</div>

<div class = "form-group">
<label for="txtNombre">Nombre:</label>
<input type="text" Required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
</div>

<div class = "form-group">
<label for="txtImagen">Imagen:</label>

<br/>

<?php
    if ($txtImagen!="") {?>
        <img class="img-thumbnail rounded" src="../../img/<?php echo $menu['imagen'];?>" width="50" alt="" srcset="">
        
<?php
}?>

<input type="file" class="form-control"name="txtImagen" id="txtImagen" placeholder="Imagen">
</div>
<br/>
<div class="btn-group" role="group" aria-label="">
    <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":"";?>value="Agregar" class="btn btn-success">Agregar</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Modificar" class="btn btn-warning">Modificar</button>
    <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":"";?> value="Cancelar" class="btn btn-info">Cancelar</button>
</div>


</form>
    </div>
    <div class="card-footer text-muted">
        carnitas "El GUERO"
    </div>
</div>

    
</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listamenu as $menu){?>
            <tr>
                <td><?php echo $menu['id'];?></td>
                <td><?php echo $menu['nombre'];?></td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $menu['imagen'];?>" width="50" alt="" srcset="">
                
            </td>

                <td>
                    <form method="POST">
                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $menu['id'];?>"/>
                        
                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    
</div>

<?php include ("../template/pie.php");?>