<?php 
class State{
    //-- Find all states to create a combo-select in register and update-profile
    public function index(){
        $states = mysql_query("SELECT id_state, state FROM states");
        while($row = mysql_fetch_assoc($states)){
           $this->state[] = $row;
        }

        return $this->state; 
    }
}


?>