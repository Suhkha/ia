<!--Code block to upload to the server the images for galleries -->
<?php 
require('../class/Upload.php');
$foo = new upload ($image_tmp);
if ($foo->uploaded) {

    $image_name = strtolower(str_replace(" ", "_", $id_user."_".rand(1, 9999))); 
    $foo->file_new_name_body = $image_name; // nombre de la foto...
    $foo->image_resize = false; // autoriza que si se redimensione
    $foo->image_convert = jpg; // formato a convertir
    $foo->process('../../images/galleries/');
    $path = 'images/galleries/' . $image_name.'.jpg';

    function dropAccents($incoming_string){        
      $tofind = "ÀÁÂÄÅàáâäÒÓÔÖòóôöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿ";
      $replac = "AAAAAAAAAOOOOOOOOEEEEEEEECCIIIIIIIIUUUUUUUUY";
      return utf8_encode(strtr(utf8_decode($incoming_string), utf8_decode($tofind), $replac));
    }

    $image = dropAccents($path);
}

?>