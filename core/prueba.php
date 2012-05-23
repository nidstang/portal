<?php  
require_once("DPService.php");


$service = new DPService();
$comentariosDTOList = $service->getAllComments();

foreach ($comentariosDTOList as $key => $comentarioDTO) {
	echo "ID: ".$comentarioDTO->getId()."<br />";
	echo "Usuarios: ".$comentarioDTO->getUsuario()."<br />";
	echo "Fecha: ".$comentarioDTO->getCreated()."<br />";
	echo "Comentario: ".$comentarioDTO->getComentario()."<br /><hr>";
}


//Spoon::dump($comentariosDTOList[0]->getCreated(), false);




?>