<?php 
include('../blocks/__block--session.php');
include '../persistent-options.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>IA Interactive - Web System</title>
    <?php styles('../../'); ?>
    
</head>
<body>

<?php menu_in('../'); ?>

<div class="container">
    <h1>Sistema web IA Interactive</h1>
    <?php include('../blocks/__block--alerts.php'); ?>

    <div class="m-top panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Panel de usuario <small class="right"><?php echo date("d/m/Y h:i:s A"); ?></small></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <a href="profile-edit.php?id=<?php echo $id_user; ?>">
                                        <img src="../../<?php echo $image; ?>" class="img-responsive" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h2><?php echo $welcome; ?></h2>
                        <p>Edite su perfil <a href="profile-edit.php?id=<?php echo $id_user; ?>">aquí</a> o dé clic en la imagen de perfil.</p>
                        
                        Ó seleccione alguna de las siguientes opciones:
                            <p>
                                <a class="btn btn-primary m-top" href="profile.php?id=<?php echo $id_user; ?>">Ver perfil</a>
                            
                                <a class="btn btn-primary m-top" href="personal-gallery.php?id=<?php echo $id_user; ?>">Administrar galería</a>
                            </p>

                            <p>
                                <a class="btn btn-primary m-top" href="gallery.php">Ver galería</a>
                            

                            <?php if($id_rol == 1){ ?>
                                
                                <a class="btn btn-primary m-top" href="all.php">Ver perfiles de usuario</a>
                            <?php } ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>