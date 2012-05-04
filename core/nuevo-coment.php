<?php
require_once("models/Comentario_model.php");
$coment = new Comentario();

if(!empty($_POST['texto'])){
	if(!strpos($_POST['texto'], "<") && !strpos($_POST['texto'], ">")){
		$newComent = array(
		'texto' => strip_tags($_POST['texto']),
		'id_tutorial' => $_POST['id_tutorial'],
		'usuario' => $_POST['user']

		);

		$newComent['texto'] = str_replace("'", "", $newComent['texto']);

		if($coment->set($newComent)){
			echo json_encode(array(
				"val" => true, 
				"mensaje" => $coment->mensaje, 
				"texto" => $newComent['texto'], 
				"usuario" => $newComent['usuario'],
				"email" => $newComent['email'],
				"created" => date("d-m-Y H:i:s")
				)
			);
		}else{
			echo json_encode(array("error" => true, "mensaje" => "Error general en la aplicacion"));
		}
		
	}else{
		echo json_encode(array("error" => true, "mensaje" => "El texto tiene caracteres no permitidos"));
	}
	
}else{
	echo json_encode(array("error" => true, "mensaje" => "Debes escribir algo!"));
}




?>