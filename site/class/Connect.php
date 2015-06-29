<?php 
date_default_timezone_set('America/Mexico_City');

function Connect()
{
    //-- Set params: host, user, password
    if (!($link=mysql_connect("localhost","root",""))) {
        echo "Error conectando a la base de datos.";
        exit();
    }

    //-- Set database
    if (!mysql_select_db("ia",$link)){
        echo "Error seleccionando la base de datos.";
        exit();
    }
    return $link;
}

$link = Connect();
mysql_close($link);

?>