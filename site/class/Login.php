<?php 
class Login{
    private $email;
    private $password;
    private $id_user;
    private $id_rol;
    private $username;
    private $lastname_1;
    private $lastname_2;
    private $gender;
    private $image;

    //-- Initialize variables
    public function __construct($email, $password){
        $this->email    = $email;
        $this->password = $password;
    }

    //-- Set login function and the session variables for the web system
    public function login(){
        $login = mysql_query("SELECT id_user, id_rol, username, image, gender, lastname_1, lastname_2, email, password FROM users WHERE email = '".$this->email."' AND password = '".md5($this->password)."' LIMIT 1");
     
        if($row = mysql_fetch_array($login)){
            $_SESSION['id_user']    = $row['id_user'];
            $_SESSION['id_rol']     = $row['id_rol'];
            $_SESSION['username']   = $row['username'];
            $_SESSION['lastname_1'] = $row['lastname_1'];
            $_SESSION['lastname_2'] = $row['lastname_2'];
            $_SESSION['gender']     = $row['gender'];
            $_SESSION['image']      = $row['image'];
            $_SESSION['status']     = 1;

            return 1; 

        }else{

            return 0;
            
        }
    }

    //-- Checking if there are a active session
    public function checkLogin($status){
        if($status != 1){
            header("Location:../index.php?status=denied");
            die(); 
        }
    }
}


?>