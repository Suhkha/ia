<?php 
session_start();
require('class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

require('class/Login.php');

$email          = $_POST['email'];
$password       = $_POST['password'];

$login = new Login($email, $password);

if($login->login() == 1){
    header("Location:users/");
    die(); 
}else{
    header("Location:index.php?status=denied");
    die(); 
}

?>