<?php
require_once("models/Post_model.php");
require_once("models/Usuario_model.php");
require_once("models/Comentario_model.php");
require_once("models/Categoria_model.php");
require_once("vendor/Session.php");
$post = new Post();
$user = new Usuario();
$coment = new Comentario();
$sesion = new Session();
$category = new Categoria();

if($_POST){
	if(isset($_POST['method'])){
		switch($_POST['method']){
			case 'delete_post':
				$post->delete($_POST['id']);
				echo json_encode(array("success" => true, "message" => $post->mensaje, "id" => $_POST['id']));
			break;
			case 'update_data':
				$user->get($sesion->userdata('id'));
				$user->update(array('nombre' => $_POST['nombre'], 'descripcion' => $_POST['descrip']), $_POST['id']);
				echo json_encode(array("success" => true, "message" => $user->mensaje));
			break;
			case 'new_category':
				if(!empty($_POST['nombre'])){
					$newCategory = array('nombre' => $_POST['nombre']);
					$category->set($newCategory);
					echo json_encode(array("success" => true, "message" => $user->mensaje, 'nueva' => $_POST['nombre']));
				}
			break;
			case 'delete_category':
				$category->delete($_POST['id']);
				echo json_encode(array("success" => true, "message" => $user->mensaje));
			break;
			case 'edit_post':
				$post->update(array('titulo' => $_POST['titulo'], 'texto' => $_POST['texto']), $_POST['id']);
				echo json_encode(array("success" => true, "message" => $user->mensaje));
			break;
			case 'delete_user':
				$user->delete($_POST['id']);
				echo json_encode(array("success" => true, "message" => $user->mensaje, "id" => $_POST['id']));
			break;
			case 'buscar_user':
				if($user->get($_POST['name'])){
					echo json_encode(array('success' => true, 'nombre' => $user->nombre, 'email' => $user->email, 'id' => $user->id_usuario));
				}else{
					echo json_encode(array('success' => false, 'mensaje' => "El usuario no existe!"));
				}
			break;
		}
	}
}



?>