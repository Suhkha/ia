<!--Manage session variables and conection to database-->
<?php 
session_start();
$id_user    = $_SESSION['id_user'];
$id_rol     = $_SESSION['id_rol'];
$status     = $_SESSION['status'];
$username   = $_SESSION['username'];
$lastname_1 = $_SESSION['lastname_1'];
$lastname_2 = $_SESSION['lastname_2'];
$gender     = $_SESSION['gender'];
$image      = $_SESSION['image'];

if($gender == "F" ){
    $welcome = "Bienvenida, ".$username." ".$lastname_1." ".$lastname_2;
}else{
    $welcome = "Bienvenido, ".$username." ".$lastname_1." ".$lastname_2;
}

require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

require('../class/Login.php');

$login = new Login($email, $password);
echo $login->checkLogin($status);

?>