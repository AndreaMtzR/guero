<?php
session_start();
    if ($_POST) {
      if (($_POST['usuario']=="Daniel")&&($_POST['contrasenia']=="")){
            
            $_SESSION['usuario']="ok";
            $_SESSION['nombreUsuario']="Daniel";
            header('Location:inicio.php');
        }else {
            $mensaje="ERROR DATOS EERONEOS";
        }

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Admin/css/bootstrap.min.css" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <div class="row">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            <br/> <br/> <br/> <br/>
            <div class="card">
                <div class="card-header">
                    LOGIN
                </div>
                <div class="card-body">
                    <?php if(isset($mensaje)){?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                    <?php } ?>



                    <form method="POST">
                    <div class = "form-group">
                    <label>Usuario:</label>
                    <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Ingresa usuario">
                    
                    </div>

                    <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" class="form-control" name="contraseña" placeholder="ingresa contraseña">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                    
                    
                    
                </div>

                </div>
            </div>
        </div>
        
    </div>
  </div>
      
   
  </body>
</html>