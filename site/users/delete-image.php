<?php 
require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

require('../class/Gallery.php');

$id_gallery     = $_GET['id'];
$id_user        = $_POST['id_user'];
$image_tmp      = $_FILES['image_tmp'];

//-- Delete image. We are using Gallery class
$gallery = new Gallery($image, $id_user);
echo $gallery->delete($id_gallery);


?>