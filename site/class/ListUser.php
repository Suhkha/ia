<?php 
class ListUser{

    //-- List user for the rol: admin
    public function index(){
        $all = mysql_query("SELECT id_user, cities.id_city, cities.city, email, username, lastname_1, lastname_2, image FROM users INNER JOIN cities ON(users.id_city = cities.id_city )");     
        
        //-- All data is stored in array. That array is used in all (only for admin)
        while($row = mysql_fetch_assoc($all)){
           $this->all[] = $row;
        }

        return $this->all; 
    }
}


?>