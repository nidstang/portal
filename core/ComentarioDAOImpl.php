<?php
require_once("BaseDpsDAO.php");
require_once("ArrayList.php");
require_once("ComentarioDTO.php");
require_once("ComentarioDAO.php");

class ComentarioDAOImpl extends BaseDpsDAO implements ComentarioDAO
{
	function __construct(){
		parent::__construct('comentario');
	}

	function getAllComentarios(){
		$comentarioDTOList = new ArrayList();

		$results = $this->findAll();

		foreach ($results as $key => $value) {
			$comentarioDTO = new ComentarioDTO();
			$comentarioDTO->setId($value['id_comentario']);
			$comentarioDTO->setComentario($value['texto']);

			$comentarioDTOList->add($comentarioDTO);
		}

		return $comentarioDTOList->getList();

	}

	function getAllComentariosByTutorial($id_tutorial){
		$comentarioDTOList = new ArrayList();

		$query = "SELECT * FROM ". parent::getEntity() . " WHERE id_tutorial = :tutorial";

		$results = $this->getEntityManager()->getRecords($query, array('tutorial' => $id_tutorial));

		foreach ($results as $key => $value) {
			$comentarioDTO = new ComentarioDTO();
			$comentarioDTO->setId($value['id_comentario']);
			$comentarioDTO->setTutorial($value['id_tutorial']);
			$comentarioDTO->setComentario($value['texto']);
			$comentarioDTO->setUsuario($value['usuario']);
			$comentarioDTO->setEmail($value['email']);
			$comentarioDTO->setCreated($value['created']);

			$comentarioDTOList->add($comentarioDTO);
		}

		return $comentarioDTOList->getList();

	}
}
