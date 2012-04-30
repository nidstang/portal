<?php
sleep(3);
require_once("models/Comentario_model.php");
$coment = new Comentario();

if(!empty($_POST['texto'])){
	$newComent = array(
		'texto' => strip_tags($_POST['texto']),
		'id_tutorial' => $_POST['id_tutorial'],
		'usuario' => $_POST['user']

	);

	$coment->set($newComent);

	echo json_encode(array(
				"val" => true, 
				"mensaje" => $coment->mensaje, 
				"texto" => $newComent['texto'], 
				"usuario" => $newComent['usuario'],
				"created" => date("Y-m-d H:i:s")
				)
			);
}else{
	echo json_encode(array("error" => true, "mensaje" => "Debes escribir algo!"));
}




?>