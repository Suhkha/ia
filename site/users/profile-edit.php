<?php 
include('../blocks/__block--session.php');

require('../class/User.php');

//-- Find current user to update
$user = new User($image, $username, $lastname_1, $lastname_2, $gender, $birthday, $email, $password, $street, $number, $location, $zip, $city);
$data_user = mysql_fetch_object($user->find($id_user));
$id_city = $data_user->id_city; 

//-- Find the state to create the combo-select
require('../class/State.php'); 
$state      = new State();
$data_state = $state->index();

//-- Find the current city to create the combo-select
require('../class/City.php'); 
$city      = new City();
$data_city = mysql_fetch_object($city->find($id_city));

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
        <form action="update-user.php" method="post" id="update-profile-form" enctype="multipart/form-data" >
        <input name="id_user" class="form-control" type="hidden" value="<?php echo $data_user->id_user; ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                            <label class="control-label">Fotografía de perfil</label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail"><img src="../../<?php echo $data_user->image; ?>"></div>
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
                              <input name="username" class="form-control" type="text" value="<?php echo $data_user->username; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label">Apellido paterno</label>
                              <input name="lastname_1" class="form-control" type="text" value="<?php echo $data_user->lastname_1; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                              <label class="control-label">Apellido materno</label>
                              <input name="lastname_2" class="form-control" type="text" value="<?php echo $data_user->lastname_2; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                              <label class="control-label">Sexo</label>
                              <select class="form-control" name="gender">
                                <option value="<?php echo $data_user->gender; ?>"><?php echo $data_user->gender; ?></option>
                                <option value="F">F</option>
                                <option value="M">M</option>
                              </select>
                            </div>
                
                            <div class="col-md-6">
                                <label class="control-label">Fecha de nacimiento</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo date("d-m-Y", strtotime($data_user->birthday)); ?>" >
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="col-md-12">
                      <label class="control-label">Email</label>
                      <input name="email" class="form-control" type="email" value="<?php echo $data_user->email; ?>">
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
                      <input name="street" class="form-control" type="text" value="<?php echo $data_user->street; ?>">
                    </div>

                    <div class="col-md-4">
                      <label class="control-label">Número</label>
                      <input name="number" class="form-control" type="text" value="<?php echo $data_user->number_home; ?>">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="control-label">Colonia</label>
                      <input name="location" class="form-control" type="text" value="<?php echo $data_user->location; ?>">
                    </div>

                    <div class="col-md-4">
                      <label class="control-label">Código postal</label>
                      <input name="zip" class="form-control" type="text" value="<?php echo $data_user->zip; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                      <label class="control-label">Estado</label>
                      <select class="form-control"name="state" id="state">
                        <option value="<?php echo $data_city->id_state; ?>"><?php echo $data_city->state ?> (Actual)</option>
                        <?php for ($i=0; $i < sizeof($data_state); $i++) { ?>
                          <option value="<?php echo $data_state[$i]['id_state']; ?>"><?php echo $data_state[$i]["state"]; ?></option>
                        <?php  }  ?>
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label class="control-label">Ciudad</label>
                      <select class="form-control"name="city" id="city">
                        <option value="<?php echo $data_city->id_city; ?>"><?php echo $data_city->city ?></option>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                      <div class="col-md-12">
                      <label class="control-label"></label>
                        <button type="submit" class="btn m-top right btn-primary">Actualizar</button>
                      </div>
                </div>
            </form>
      </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>