<?php 
include('../blocks/__block--session.php');
include '../persistent-options.php';

require('../class/ListUser.php'); 
$user = new ListUser();
$data_user = $user->index();
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
                    <table class="table table-stripped">
                        <thead>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Ciudad</th>
                            <th>Fotografía</th>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < sizeof($data_user); $i++) { ?>
                            <tr>
                                <td>
                                    <a href="profile.php?id=<?php echo $data_user[$i]['id_user']; ?>">
                                        <?php echo $data_user[$i]['username']; ?> <?php echo $data_user[$i]['lastname_1']; ?> <?php echo $data_user[$i]['lastname_2']; ?>
                                    </a>
                                </td>
                                <td><?php echo $data_user[$i]['email']; ?></td>
                                <td><?php echo $data_user[$i]['city']; ?></td>
                                <td>
                                    <a href="profile.php?id=<?php echo $data_user[$i]['id_user']; ?>">
                                        <img src="../../<?php echo $data_user[$i]['image']; ?>" width="200px" class="img-responsive" alt="">
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>