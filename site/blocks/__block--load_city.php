<!--We load dependent combo city according to id state-->
<?php 
require('../class/Connect.php'); 
$link = Connect();
mysql_query("SET NAMES 'utf8'"); 

$id_state = $_GET['id'];

$cities = mysql_query("SELECT id_city, id_state, city FROM cities WHERE id_state = '".$id_state."'")or die(mysql_error());
    while($row = mysql_fetch_array($cities)){
        echo "<option value=".$row['id_city'].">".$row['city']."</option>";
    }
 ?>