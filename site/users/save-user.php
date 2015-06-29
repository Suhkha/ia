<?php 
require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

require('../class/Validate.php');
require('../class/User.php');

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

//-- First validate a unique email and a correct password.
$validate = new Validate($email, $password);
echo $validate->checkEmail();
echo $validate->checkPassword();

 //Upload image
require('../blocks/__block--upload_image.php');
if($foo->processed){
    //-- If the image was saved correctly, then we insert the data of the new user into the database.
    $user = new User($image, $username, $lastname_1, $lastname_2, $gender, $birthday, $email, $password, $street, $number, $location, $zip, $city);
    echo $user->insert();
}

?>