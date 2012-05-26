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
		$list = $this->getComentarioDAO()->getAllComentarios();

		if($list->isNull()){
			return $list->toArray();
		}else{
			return null;
		}
	}

	public function getAllCommentsByTutorial($id){
		$id = (int)$id;
		$list = $this->getComentarioDAO()->getAllComentariosByTutorial($id);

		if($list->isNull()){
			return $list;
		}else{
			return null;
		}
	}

	public function addComment($comentarioDTO){
		if($this->getComentarioDAO()->addComentario($comentarioDTO)){
			return true;
		}else{
			return false;
		}
	}
}