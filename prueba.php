<?php
$link =  mysql_connect('mysql17.000webhost.com', 'a2274834_station', 'david1992');
if($link){
	echo "Conexion correcta!";
}else{
	echo "Error!". die(mysql_error());
}




?>