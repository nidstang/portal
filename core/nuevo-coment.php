<?php
require_once("models/Comentario_model.php");
require_once("vendor/Session.php");
$coment = new Comentario();
$sesion = new Session();

if(!empty($_POST['texto'])){
	$newComent = array(
		'texto' => strip_tags($_POST['texto']),
		'id_usuario' => $sesion->userdata('id'),
		'id_post' => $_POST['id_post']
	);

	$coment->set($newComent);

	echo json_encode(array(
				"val" => true, 
				"mensaje" => $coment->mensaje, 
				"texto" => $newComent['texto'], 
				"usuario" => $sesion->userdata('nombre'),
				"created" => date("Y-m-d H:i:s")
				)
			);
}else{
	echo json_encode(array("error" => true, "mensaje" => "Debes escribir algo!"));
}




?>