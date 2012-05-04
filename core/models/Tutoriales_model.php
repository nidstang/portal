<?php
require_once("db_abstract_model.php");
class Tutorial extends Db_Abstract_Model
{
	public $id_tutorial;
	public $titulo;
	public $descripcion;
	public $video;
	public $created;
	public $mensaje = "Listo!";
	public $id_usuario;

	public function __construct(){
		//$this->db_name = "dpstation";
	}

	public function get($categoria=''){
		if($categoria != ''){
			$this->query = "SELECT t.id_tutorial, t.video, t.titulo, t.descripcion, t.created
			FROM tutorial as t, categoria as c 
			WHERE c.nombre = '$categoria' 
			AND t.id_categoria = c.id_categoria 
			ORDER BY t.created DESC";
			
			$this->get_results_from_query();

			if($this->num>0){
				return $this->rows;
			}else{
				return false;
			}
		}
		
	}

	public function getById($id_post=''){
		if($id_post != ''){
			$this->query = "SELECT * FROM tutorial WHERE id_tutorial = '$id_post'";
			$this->get_results_from_query();
		}
		if(count($this->rows) == 1){
			foreach($this->rows[0] as $propiedad => $valor):
				$this->$propiedad = $valor;
			endforeach;
			return true;
		}else{
			return false;
		}
	}

	public function set($data=array()){
		foreach($data as $campo => $valor):
			$$campo = $valor;
		endforeach;

		$this->query =
			"INSERT INTO post (titulo,texto,id_usuario,id_categoria)
		 	VAlUES ('$titulo', '$texto', '$id_usuario', '$id_categoria')";

		$this->execute_query();
		$this->mensaje = "Nuevo Post Creado!";

	}

	public function delete($id_post=''){
		if($id_post != ''){
			$this->query = "DELETE FROM post WHERE id_post = '$id_post'";
			$this->execute_query();

			$this->mensaje = "Tema Borrado Correctamente";
			return true;
		}
	}

	public function update($data=array(),$id_post){
		foreach($data as $propiedad => $valor){
			$this->query = "UPDATE post SET $propiedad = '$valor' WHERE id_post = '$id_post'";
			$this->execute_query();
		}
		$this->mensaje = "Actualizado!";
	}

	public function num_rows(){
		return $this->num;
	}

	public function max_posts(){
		$this->query = "SELECT COUNT(*), id_usuario FROM post GROUP BY id_usuario";
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