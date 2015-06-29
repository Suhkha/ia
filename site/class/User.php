<?php
class User{
    private $image;
    private $username;
    private $lastname_1;
    private $lastname_2;
    private $gender;
    private $birthday;
    private $email;
    private $password;
    private $street;
    private $number;
    private $location;
    private $zip;
    private $city;

    //-- Initialize variables
    public function __construct($image,$username, $lastname_1, $lastname_2, $gender, $birthday, $email, $password, $street, $number, $location, $zip, $city ){
        $this->id_user         = $id_user;
        $this->image           = $image;
        $this->username        = $username;
        $this->lastname_1      = $lastname_1;
        $this->lastname_2      = $lastname_2;
        $this->gender          = $gender;
        $this->birthday        = date("Y-m-d", strtotime($birthday));
        $this->email           = $email;
        $this->password        = $password;
        $this->street          = $street;
        $this->number          = $number;
        $this->location        = $location;
        $this->zip             = $zip;
        $this->state           = $state;
        $this->city            = $city;

    }

    //-- Insert data from register form
    public function insert(){
        $save = mysql_query("INSERT INTO users (id_city, id_rol, image, username, lastname_1, lastname_2, gender, birthday, email, password, street, number_home,location, zip) 
                             VALUES ('".$this->city."', '2', '".$this->image."', '".$this->username."', '".$this->lastname_1."', '".$this->lastname_2."', '".$this->gender."', '".$this->birthday."', '".$this->email."', '".md5($this->password)."', '".$this->street."', '".$this->number."', '".$this->location."', '".$this->zip."')")or die(mysql_error());
        if($save ==  true){  

            //-- If the insert is success, we send a email to user          
            require_once('mail/class.phpmailer.php');
            require_once('mail/class.smtp.php');

            //PHPMailer Object
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com"; 
            $mail->Port = 465;
            $mail->Username = "erandivilla92@gmail.com";
            $mail->Password = "makeIT4w38_m3";
             
            //From email address and name
            $mail->From = "erandivilla92@gmail.com";
            $mail->FromName = "IA Sistema Web";

            //To address and name
            $mail->addAddress($this->email, iconv('UTF-8', 'ISO-8859-1', $this->username." ".$this->lastname_1));            
                         
            //Send body text
            $mail->isHTML(true);
             
            $mail->Subject = "Accesos al sistema.";
            $mail->Body =   iconv('UTF-8', 'ISO-8859-1', "<p><strong>Gracias por registrarse!</strong> A continuación le proporcionamos los accesos al sistema: </p>
                             <p><strong>Email: </strong>".$this->email."</p>
                             <p><strong>Password: </strong>".$this->password."</p>

                             <h5>Cualquier detalle o sugerencia, póngase en contacto con nosotros.</h5>");
            $mail->AltBody = "This is the plain text version of the email content";
             
            if(!$mail->send()){
                header("Location:register.php?status=error_envio");
                die();
            }else{
                header("Location:../index.php?status=ok");
                die();
            }

        }else{

            //-- If the insert fails, the image we got on the server, now will be deleted
            unlink('../../'.$this->image);
            header("Location:register.php?status=error");
            die();
        }

    }

    //-- Find an specific user (current) to display in update-profile
    public function find($id_user){
        //-- return all query and use the object result in update-profile
        return $find = mysql_query("SELECT id_user, id_city, id_rol, image, username, lastname_1, lastname_2, gender, birthday, email, password, street, number_home,location, zip FROM users WHERE id_user='".$id_user."' LIMIT 1");     
    }

    //-- We update data user according to different options: when the user update the image and the password.
    public function update_w_image($id_user){

        $find_img = mysql_query("SELECT image FROM users WHERE id_user = '".$id_user."' LIMIT 1");
        $delete_img = mysql_fetch_array($find_img);
        $path = '../../'.$delete_img['image'];
        $delete = unlink($path);

        if($delete == true){

            if($this->password == ""){
                $update = mysql_query("UPDATE users SET id_city = '".$this->city."', image = '".$this->image."', username = '".$this->username."', lastname_1 = '".$this->lastname_1."', lastname_2 = '".$this->lastname_2."', gender = '".$this->gender."', birthday = '".$this->birthday."', email = '".$this->email."', street = '".$this->street."', number_home = '".$this->number."', location = '".$this->location."', zip = '".$this->zip."' WHERE id_user = '".$id_user."'");
                
                if($update == true ){
                    header("Location:../logout.php");
                    die();
                }else{
                    header("Location:../users/profile-edit.php?id=$id_user&status=error");
                    die();
                }

            }else{
                $update = mysql_query("UPDATE users SET id_city = '".$this->city."', image = '".$this->image."', username = '".$this->username."', lastname_1 = '".$this->lastname_1."', lastname_2 = '".$this->lastname_2."', gender = '".$this->gender."', birthday = '".$this->birthday."', email = '".$this->email."', password = '".md5($this->password)."', street = '".$this->street."', number_home = '".$this->number."', location = '".$this->location."', zip = '".$this->zip."' WHERE id_user = '".$id_user."'");
                if($update == true ){

                    //-- If everything is ok, we send to the user the new password by email.
                    require_once('mail/class.phpmailer.php');
                    require_once('mail/class.smtp.php');

                    //PHPMailer Object
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "ssl";
                    $mail->Host = "smtp.gmail.com"; 
                    $mail->Port = 465;
                    $mail->Username = "erandivilla92@gmail.com";
                    $mail->Password = "makeIT4w38_m3";
                     
                    //From email address and name
                    $mail->From = "erandivilla92@gmail.com";
                    $mail->FromName = "IA Sistema Web";

                    //To address and name
                    $mail->addAddress($this->email, iconv('UTF-8', 'ISO-8859-1', $this->username." ".$this->lastname_1));            
                                 
                    //Send HTML or Plain Text email
                    $mail->isHTML(true);
                     
                    $mail->Subject = "Nuevo password.";
                    $mail->Body =   iconv('UTF-8', 'ISO-8859-1', "<p><strong>Su password ha sido actualizado!</strong> A continuación le proporcionamos los nuevos accesos al sistema: </p>
                                     <p><strong>Email: </strong>".$this->email."</p>
                                     <p><strong>Password: </strong>".$this->password."</p>

                                     <h5>Cualquier detalle o sugerencia, póngase en contacto con nosotros.</h5>");
                    $mail->AltBody = "This is the plain text version of the email content";
                    if($mail->send()){
                        header("Location:../logout.php");
                        die();
                    }

                 }else{
                    header("Location:../users/profile-edit.php?id=$id_user&status=error");
                    die();
                }
            }
        }else{
            header("Location:../users/profile-edit.php?id=$id_user&status=error");
            die();
        }

    }

    //-- We update data user according to different options: when the user not update the image and but updates the password.
    public function update_wo_image($id_user){
        if($this->password == ""){
            $update = mysql_query("UPDATE users SET id_city = '".$this->city."', username = '".$this->username."', lastname_1 = '".$this->lastname_1."', lastname_2 = '".$this->lastname_2."', gender = '".$this->gender."', birthday = '".$this->birthday."', email = '".$this->email."', street = '".$this->street."', number_home = '".$this->number."', location = '".$this->location."', zip = '".$this->zip."' WHERE id_user = '".$id_user."'")or die(mysql_error());
            
            if($update == true ){
                header("Location:../logout.php");
                die();
            }else{
                header("Location:../users/profile-edit.php?id=$id_user&status=error");
                die();
            }

        }else{
            $update = mysql_query("UPDATE users SET id_city = '".$this->city."', username = '".$this->username."', lastname_1 = '".$this->lastname_1."', lastname_2 = '".$this->lastname_2."', gender = '".$this->gender."', birthday = '".$this->birthday."', email = '".$this->email."', password = '".md5($this->password)."', street = '".$this->street."', number_home = '".$this->number."', location = '".$this->location."', zip = '".$this->zip."' WHERE id_user = '".$id_user."'")or die(mysql_error());
        
            if($update == true ){  
                //-- If everything is ok, we send to the user the new password by email.          
                require_once('mail/class.phpmailer.php');
                require_once('mail/class.smtp.php');

                //PHPMailer Object
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com"; 
                $mail->Port = 465;
                $mail->Username = "erandivilla92@gmail.com";
                $mail->Password = "makeIT4w38_m3";
                 
                //From email address and name
                $mail->From = "erandivilla92@gmail.com";
                $mail->FromName = "IA Sistema Web";

                //To address and name
                $mail->addAddress($this->email, iconv('UTF-8', 'ISO-8859-1', $this->username." ".$this->lastname_1));            
                             
                //Send HTML or Plain Text email
                $mail->isHTML(true);
                 
                $mail->Subject = "Nuevo password.";
                $mail->Body =   iconv('UTF-8', 'ISO-8859-1', "<p><strong>Su password ha sido actualizado!</strong> A continuación le proporcionamos los nuevos accesos al sistema: </p>
                                 <p><strong>Email: </strong>".$this->email."</p>
                                 <p><strong>Password: </strong>".$this->password."</p>

                                 <h5>Cualquier detalle o sugerencia, póngase en contacto con nosotros.</h5>");
                $mail->AltBody = "This is the plain text version of the email content";
                if($mail->send()){
                    header("Location:../logout.php");
                    die();
                }

             }else{
                header("Location:../users/profile-edit.php?id=$id_user&status=error");
                die();
            }
        }
    }
}
?>