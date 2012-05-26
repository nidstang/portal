<?php
require_once("models/Comentario_model.php");
$coment = new Comentario();

require_once("DPService.php");


$service = new DPService();


if(!empty($_POST['texto'])){
	if(!strpos($_POST['texto'], "<") && !strpos($_POST['texto'], ">")){
		/*$newComent = array(
		'texto' => strip_tags($_POST['texto']),
		'id_tutorial' => $_POST['id_tutorial'],
		'email' => $_POST['email'],
		'usuario' => $_POST['user']

		);

		$newComent['texto'] = str_replace("'", "", $newComent['texto']);*/

		$comentarioDTO = new comentarioDTO();

		$comentarioDTO->setComentario(strip_tags($_POST['texto']));
		$comentarioDTO->setTutorial($_POST['id_tutorial']);
		$comentarioDTO->setEmail($_POST['email']);
		$comentarioDTO->setUsuario($_POST['user']);
		$comentarioDTO->setCreated(time());

		if($service->addComment($comentarioDTO)){
			echo json_encode(array(
				"val" => true, 
				"mensaje" => 'Comentario nuevo agregado',
				"texto" => $_POST['texto'], 
				"usuario" => $_POST['user'],
				"created" => 'Hace un momento'
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