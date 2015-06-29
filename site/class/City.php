<?php 
class City{

    //-- Find an specific city to display in update-profile
    public function find($id_city){

        //-- return all query and use the object result in update-profile
        return $search = mysql_query("SELECT id_city, states.id_state, states.state, city FROM cities INNER JOIN states ON(cities.id_state = states.id_state ) WHERE id_city='".$id_city."' LIMIT 1");     
    
    }

}
?>