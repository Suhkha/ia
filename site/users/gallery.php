<?php 
include('../blocks/__block--session.php');
include '../persistent-options.php';

require('../class/Gallery.php');
//--Display all images from gallery by current user
$gallery = new Gallery($image, $id_user);
$data_gallery = $gallery->all();
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
        <div class="flexslider">
          <ul class="slides">
          <?php for ($i=0; $i < sizeof($data_gallery); $i++) { ?>
            <li>
              <img src="../../<?php echo $data_gallery[$i]['image']; ?>" class="img-responsive" alt="">
            </li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </div>
</div>

<?php script('../../'); ?>
</body>
</html>