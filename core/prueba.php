<?php  
require_once("DPService.php");


$service = new DPService();
$comentariosDTOList = $service->getAllComments();

foreach ($comentariosDTOList as $key => $comentarioDTO) {
	echo "ID: ".$comentarioDTO->getId()."<br />";
	echo "Uusuarios: ".$comentarioDTO->getUsuario()."<br />";
	echo "Comentario: ".$comentarioDTO->getComentario()."<br /><hr>";
}


//Spoon::dump($datos, false);




?>