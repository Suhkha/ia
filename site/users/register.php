<?php 
require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'");   

require('../class/State.php'); 

$state      = new State();
$data_state = $state->index();

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

<?php menu('../'); ?>

<div class="container">
    <h1>Sistema web IA Interactive</h1>

    <?php include('../blocks/__block--alerts.php'); ?>

    <div class="m-top panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Registro de usuario</h3>
      </div>
      <div class="panel-body">
        <form action="save-user.php" method="post" id="register-form" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                            <label class="control-label">Fotografía de perfil</label>
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
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label">Nombre</label>
                              <input name="username" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label">Apellido paterno</label>
                              <input name="lastname_1" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label">Apellido materno</label>
                              <input name="lastname_2" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                              <label class="control-label">Sexo</label>
                              <select class="form-control" name="gender">
                                <option value="">Seleccione</option>
                                <option value="F">F</option>
                                <option value="M">M</option>
                              </select>
                            </div>
                
                            <div class="col-md-6">
                                <label class="control-label">Fecha de nacimiento</label>
                                <input type="text" class="form-control" id="birthday" name="birthday">
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label">Email</label>
                      <input name="email" class="form-control" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label">Contraseña</label>
                      <input name="password" id="password" class="form-control" type="password">
                    </div>
                
                    <div class="col-md-6">
                      <label class="control-label">Confirma contraseña</label>
                      <input name="confirm_password" class="form-control" type="password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8">
                      <label class="control-label">Calle</label>
                      <input name="street" class="form-control" type="text">
                    </div>

                    <div class="col-md-4">
                      <label class="control-label">Número</label>
                      <input name="number" class="form-control" type="text">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="control-label">Colonia</label>
                      <input name="location" class="form-control" type="text">
                    </div>

                    <div class="col-md-4">
                      <label class="control-label">Código postal</label>
                      <input name="zip" class="form-control" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label">Estado</label>
                      <select class="form-control"name="state" id="state">
                        <option value="">Seleccione</option>
                        <?php for ($i=0; $i < sizeof($data_state); $i++) { ?>
                          <option value="<?php echo $data_state[$i]['id_state']; ?>"><?php echo $data_state[$i]["state"]; ?></option>
                          
                        <?php  }  ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="control-label">Ciudad</label>
                      <select class="form-control"name="city" id="city">
                      </select>
                    </div>
                </div>

                <div class="form-group">
                      <div class="col-md-12">
                      <label class="control-label"></label>
                        <button type="submit" class="btn m-top right btn-primary">Registrarse</button>
                      </div>
                </div>
            </form>
      </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>