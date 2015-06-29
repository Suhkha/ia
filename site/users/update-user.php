<?php 
require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

require('../class/Validate.php');
require('../class/User.php');

$id_user        = $_POST['id_user'];
$image_tmp      = $_FILES['image_tmp'];
$username       = $_POST['username'];
$lastname_1     = $_POST['lastname_1'];
$lastname_2     = $_POST['lastname_2'];
$gender         = $_POST['gender'];
$birthday       = $_POST['birthday'];
$email          = $_POST['email'];
$password       = $_POST['password'];
$street         = $_POST['street'];
$number         = $_POST['number'];
$location       = $_POST['location'];
$zip            = $_POST['zip'];
$city           = $_POST['city'];

//-- First validate a correct password with a checkPassword 
if($password != ""){
    $validate = new Validate($email, $password);
    echo $validate->checkPassword();
}
 //Upload image
if($_FILES['image_tmp']['size'] > 0){ 
    require('../blocks/__block--upload_image.php');
    if($foo->processed){
        //-- If the image was saved correctly, then we update the data of the user into the database.
        $user = new User($image, $username, $lastname_1, $lastname_2, $gender, $birthday, $email, $password, $street, $number, $location, $zip, $city);
        echo $user->update_w_image($id_user);
    }
}else{
    //-- If no image to process, then we store only the current data in the database.
    $user = new User($image, $username, $lastname_1, $lastname_2, $gender, $birthday, $email, $password, $street, $number, $location, $zip, $city);
    echo $user->update_wo_image($id_user);
}
?>