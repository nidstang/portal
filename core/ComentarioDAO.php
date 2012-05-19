<?php
require_once("BaseDpsDAO.php");
require_once("ArrayList.php");
require_once("ComentarioDTO.php");

class ComentarioDAO extends BaseDpsDAO
{
	function __construct(){
		parent::__construct('comentario');
	}

	function getAllComentarios(){
		$comentarioDTOList = new ArrayList();

		$data = $this->findAll();

		foreach ($data as $key => $value) {
			$comentarioDTO = new ComentarioDTO();
			$comentarioDTO->setId($value['id_comentario']);
			$comentarioDTO->setComentario($value['texto']);

			$comentarioDTOList->add($comentarioDTO);
		}

		return $comentarioDTOList;

	}

	function getAllComentariosByTutorial($id_tutorial){
		$query = "SELECT * FROM ". parent::getEntity() . " WHERE id_tutorial = :tutorial";

	}
}

$objeto = new ComentarioDAO();
$comentarios = $objeto->getAllComentarios();

Spoon::dump($comentarios, false);