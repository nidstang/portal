<?php
require_once("models/Post_model.php");
require_once("vendor/Session.php");
$post = new Post();
$sesion = new Session();

if(!empty($_POST['titulo']) and !empty($_POST['texto'])){
	$newPost = array(
		'titulo' => strip_tags($_POST['titulo']),
		'texto' => strip_tags($_POST['texto']),
		'id_usuario' => $sesion->userdata('id'),
		'id_categoria' => $_POST['category']
	);

	$post->set($newPost);

	echo json_encode(array(
				"val" => true, 
				"mensaje" => $post->mensaje, 
				"titulo" => $newPost['titulo'], 
				"usuario" => $sesion->userdata('nombre'),
				"created" => date("Y-m-d H:i:s")
				)
			);
}else{
	echo json_encode(array("error" => true, "mensaje" => "Debes rellenar todos los campos!"));
}




?>