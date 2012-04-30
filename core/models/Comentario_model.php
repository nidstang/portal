<?php
require_once("db_abstract_model.php");
class Comentario extends Db_Abstract_Model
{
	public $usuario;
	public $texto;
	public $id_tutorial;
	public $created;
	public $mensaje = "Listo!";

	public function __construct(){

	}

	public function get($id_tutorial=''){
		if($id_tutorial != ''){
			$this->query = "SELECT * FROM comentario WHERE id_tutorial = '$id_tutorial' ORDER BY created asc";
			$this->get_results_from_query();
		}
		if($this->num>0){
			return $this->rows;
		}else{
			return false;
		}
		
	}

	public function get_by_id($id_post=''){
		if($id_post != ''){
			$this->query = "SELECT * FROM post WHERE id_post = '$id_post'";
			$this->get_results_from_query();
		}
		if(count($this->rows) == 1){
			foreach($this->rows[0] as $propiedad => $valor):
				$this->$propiedad = $valor;
			endforeach;
		}
	}

	public function set($data=array()){
		foreach($data as $campo => $valor):
			$$campo = $valor;
		endforeach;

		$this->query =
			"INSERT INTO comentario (texto,id_tutorial,usuario)
		 	VAlUES ('$texto', '$id_tutorial', '$usuario')";

		$this->execute_query();
		$this->mensaje = "Agregado nuevo comentario!";

	}

	public function delete($id_user=''){
		if($id_user != ''){
			$this->query = "DELETE FROM usuario WHERE id_usuario = '$id_user'";
			$this->execute_query();

			$this->mensaje = "Usuario Borrado Correctamente";
		}
	}

	public function num_rows(){
		return $this->num;
	}

	public function max_comments(){
		$this->query = "SELECT COUNT(*), id_post FROM comentario GROUP BY id_post";
		$this->get_results_from_query();
		if($this->num_rows()>0){
			$maximo = max($this->rows);

			return $maximo;
		}
		
	}

	public function __destruct(){
		unset($this);
	}

}
?>