<?php 
require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

require('../class/Gallery.php');

$id_user        = $_POST['id_user'];
$image_tmp      = $_FILES['image_tmp'];

 //Upload image
require('../blocks/__block--upload_image_gallery.php');
if($foo->processed){
   //-- If the image was saved correctly, then we insert the data of the new image into the database.
    $gallery = new Gallery($image, $id_user);
    echo $gallery->insert();
}

?>