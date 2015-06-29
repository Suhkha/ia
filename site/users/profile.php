<?php 
include('../blocks/__block--session.php');
include '../persistent-options.php';

$id_user = $_GET['id'];

//-- Find current user and display all data
require('../class/User.php'); 
$user = new User($image, $username, $lastname_1, $lastname_2, $gender, $birthday, $email, $password, $street, $number, $location, $zip, $city);
$data_user = mysql_fetch_object($user->find($id_user));
$id_city = $data_user->id_city; 

require('../class/City.php'); 
$city      = new City();
$data_city = mysql_fetch_object($city->find($id_city));

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
                                <?php if($_SESSION['id_user'] == $id_user){ ?>
                                    <a href="profile-edit.php?id=<?php echo $id_user; ?>">
                                        <img src="../../<?php echo $data_user->image; ?>" class="img-responsive" alt="">
                                    </a>
                                <?php }else{ ?>
                                    <img src="../../<?php echo $data_user->image; ?>" class="img-responsive" alt="">
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-8">
                        <div class="form-group">
                            <h2><?php echo $data_user->username; ?> <?php echo $data_user->lastname_1; ?> <?php echo $data_user->lastname_2; ?></h2>
                            <div class="col-md-6 m-top">
                                <h4>Datos personales: </h4>
                                <p><strong>Sexo: </strong><?php echo $data_user->gender; ?></p>
                                <p><strong>Fecha de nacimiento: </strong><?php echo date("d-m-Y", strtotime($data_user->birthday)); ?></p>
                                <p><strong>Email: </strong><?php echo $data_user->email; ?></p>
                            </div>
                            <div class="col-md-6 m-top">
                                <h4>Domicilio: </h4>
                                <p><strong>Calle </strong><?php echo $data_user->street; ?> #<?php echo $data_user->number_home; ?></p>
                                <p><strong>Colonia </strong><?php echo $data_user->location; ?>, <strong>C.P.</strong> <?php echo $data_user->zip; ?></p>
                                <p><strong><?php echo $data_city->city ?>, <?php echo $data_city->state ?></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>