<?php
//echo get_include_path();
require_once("core/DPService.php");


$service = new DPService();

$comentariosDTOList = $service->getAllComments();

if($comentariosDTOList != null){
echo "Vienen datitos";

foreach ($comentariosDTOList as $key => $comentarioDTO) {
	echo "ID: ".$comentarioDTO->getId()."<br />";
	echo "Usuarios: ".$comentarioDTO->getUsuario()."<br />";
	echo "Fecha: ".$comentarioDTO->getCreated()."<br />";
	echo "Comentario: ".$comentarioDTO->getComentario()."<br /><hr>";
}

}

//Spoon::dump($comentariosDTOList[0]->getCreated(), false);




?>