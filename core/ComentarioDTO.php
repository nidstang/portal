<?php
/**
* ComentarioDTO
*/
class ComentarioDTO
{
	private $id_comentario;
	private $comentario;

	function setId($idArg){
		$this->id_comentario = $idArg;
	}

	function getId(){
		return $this->id_comentario;
	}

	function setComentario($comentarioArg){
		$this->comentario = $comentarioArg;
	}

	function getComentario(){
		return $this->comentario;
	}
}


