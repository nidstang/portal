<?php
require_once("db_abstract_model.php");
class Categoria extends Db_Abstract_Model
{
	public $mensaje = "Listo!";
	
	public function __construct(){
		//$this->db_name = "dpstation";
	}

	public function get(){
		$this->query = "SELECT * FROM categoria";
		$this->get_results_from_query();

		if($this->num>0){
			return $this->rows;
		}else{
			return false;
		}
		
	}

	public function set($data=array()){
		foreach($data as $campo => $valor):
			$$campo = $valor;
		endforeach;

		$this->query =
			"INSERT INTO categoria (nombre)
		 	VAlUES ('$nombre')";

		$this->execute_query();
		$this->mensaje = "Agregada Categoria";

	}

	public function delete($id_categoria=''){
		if($id_categoria != ''){
			$this->query = "DELETE FROM categoria WHERE id_categoria = '$id_categoria'";
			$this->execute_query();

			$this->mensaje = "Categoria Borrada Correctamente";
		}
	}

	public function __destruct(){
		unset($this);
	}

}
?>