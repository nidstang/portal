<?php
/**
* ComentarioDTO
*/
class ComentarioDTO
{
	private $id_comentario;
	private $id_tutorial;
	private $comentario;
	private $usuario;
	private $email;
	private $created;

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

	public function getTutorial(){
		return $this->id_turorial;
	}

	public function setTutorial($id_turorialArg){
		$this->id_turorial = $id_turorialArg;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuarioArg){
		$this->usuario = $usuarioArg;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($emailArg){
		$this->email = $emailArg;
	}

	public function getCreated(){
		return $this->created;
	}

	public function setCreated($createdArg){
		$this->created = $createdArg;
	}
}


