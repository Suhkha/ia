<?php 
include('../blocks/__block--session.php');
include '../persistent-options.php';
$id_user = $_GET['id'];

require('../class/Gallery.php');
//--Display all images from gallery by current user
$gallery = new Gallery($image, $id_user);
$data_gallery = $gallery->index($id_user);
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
        <form action="save-image.php" method="post" id="register-form" enctype="multipart/form-data" >
        <input name="id_user" class="form-control" type="hidden" value="<?php echo $id_user; ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                            <label class="control-label">Imagen</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail"></div>
                                        <div>
                                            <span class="btn btn-primary btn-file btn-blue-dark">
                                                <span class="fileupload-new">Seleccionar Imagen</span>
                                                <span class="fileupload-exists">Cambiar</span>
                                                <input type="file" id="image_tmp" name="image_tmp"/>
                                            </span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Quitar</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="btn m-top btn-primary">Subir imagen</button>
                        </div>

                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                           <table class="table table stripped">
                              <thead>
                                  <th>Imagen</th>
                                  <th>Subida</th>
                                  <th>Eliminar</th>
                              </thead>
                              <tbody>
                                  <?php for ($i=0; $i < sizeof($data_gallery); $i++) { ?>
                                  <tr>
                                      <td>
                                      <img src="../../<?php echo $data_gallery[$i]['image']; ?>" width="100px" class="img-responsive" alt="">
                                      </td>
                                      <td><?php echo date("d/m/Y h:i:s A", strtotime($data_gallery[$i]['uploaded_at'])); ?></td>
                                      <td style="vertical-align:middle"><a class="btn btn-danger" href="delete-image.php?id=<?php echo $data_gallery[$i]['id_gallery']; ?>">Eliminar imagen</a></td>
                                  </tr>
                                  <?php } ?>
                              </tbody>
                           </table> 
                      </div>
                    </div>
            </form>
      </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>