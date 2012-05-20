<?php
require_once("ComentarioDAOImpl.php");


/**
* Service of DPS
*/
class DPService
{
	private $comentarioDAO;

	function DPService(){
		$this->setComentarioDAO(new ComentarioDAOImpl());
	}

	public function setComentarioDAO($comentarioDAOArg){
		$this->comentarioDAO = $comentarioDAOArg;
	}

	public function getComentarioDAO(){
		return $this->comentarioDAO;
	}


	public function getAllComments(){
		return $this->getComentarioDAO()->getAllComentarios();
	}

	public function getAllCommentsByTutorial($id){
		$id = (int)$id;
		return $this->getComentarioDAO()->getAllComentariosByTutorial($id);
	}
}