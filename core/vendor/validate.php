<?php
require_once("../models/Usuario_model.php");

if($_POST){
	if(isset($_POST['email'])){
		$user = new Usuario();
		$user->get_by_email($_POST['email']);
		if($user->email == $_POST['email']){
			echo "false";
		}else{
			echo "true";
		}
	}elseif(isset($_POST['nombre'])){
		$user = new Usuario();
		$user->get($_POST['nombre']);
		if($user->nombre == $_POST['nombre']){
			echo "false";
		}else{
			echo "true";
		}
	}
}

?>