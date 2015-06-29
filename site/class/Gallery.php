<?php 
class Gallery{
    private $image;
    private $username;
    private $id_gallery;

    //-- Initialize variables
    public function __construct($image, $id_user){
        $this->id_user         = $id_user;
        $this->image           = $image;
        $this->id_gallery      = $id_gallery;
    }

    //-- Insert image of gallery by current user
    public function insert(){
        $save = mysql_query("INSERT INTO galleries (image, id_user) VALUES ('".$this->image."', '".$this->id_user."')");
        
        //-- Alerts to display for each case: success or error
        if($save == true){
            header("Location:../users/personal-gallery.php?id=$this->id_user&status=ok");
            die();
        }else{
            unlink('../../'.$this->image);
            header("Location:../users/personal-gallery.php?id=$this->id_user&status=error");
            die();
        }    
    }

    //-- List all images by current user
    public function index($id_user){
        $all = mysql_query("SELECT galleries.id_user, galleries.image, id_gallery, uploaded_at, qty_votes, sum_votes, average, users.vote FROM galleries INNER JOIN users ON(users.id_user = galleries.id_user ) WHERE galleries.id_user = '".$id_user."'");     
        
        //-- All data is stored in array. That array is used in personal-gallery
        while($row = mysql_fetch_array($all)){
           $this->all[] = $row;
        }

        return $this->all; 
    }

    //-- Delete each image by current user
    public function delete($id_image){

        $find_img = mysql_query("SELECT image, id_user FROM galleries WHERE id_gallery = '".$id_image."' LIMIT 1");
        $delete_img = mysql_fetch_array($find_img);
        $id_user = $delete_img['id_user'];
        $path = '../../'.$delete_img['image'];
        $delete = unlink($path);

        //-- If the image folder was removed , then the whole record is deleted
        if($delete == true){
            $delete_row = mysql_query("DELETE FROM galleries WHERE id_gallery = '".$id_image."' LIMIT 1")or die(mysql_error());

            //-- Alerts to display for each case: success or error
            if($delete_row == true ){
                header("Location:../users/personal-gallery.php?id=$id_user&status=deleted");
                die();
            }else{
                header("Location:../users/personal-gallery.php?id=$id_user&status=error");
                die();
            }
        }
    }

    //-- List all images by current user
    public function all(){
        $all = mysql_query("SELECT galleries.id_user, galleries.image, id_gallery, uploaded_at, qty_votes, sum_votes, average, users.vote FROM galleries INNER JOIN users ON(users.id_user = galleries.id_user )");     
        
        //-- All data is stored in array. That array is used in personal-gallery
        while($row = mysql_fetch_array($all)){
           $this->all[] = $row;
        }

        return $this->all; 
    }
}


?>