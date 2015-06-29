<?php 
class Validate{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email    = $email;
        $this->password = $password;
    }

    //-- Validate a unique email by user
    public function checkEmail(){
        $check = mysql_query("SELECT email FROM users WHERE email = '".$this->email."'");
        $count = mysql_num_rows($check);

        if($count > 0){
           header("Location:register.php?status=email_exists");
           die(); 
        }
    }

    //-- Specific rule to write a custom password
    public function checkPassword(){
        $regex = '/^[0-9a-zA-Z.]+$/';
        
        if((!preg_match($regex, $this->password))){
           header("Location:register.php?status=warning");
           die(); 
        }
    }



}

?>