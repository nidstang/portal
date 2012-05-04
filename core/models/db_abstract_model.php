<?php
abstract class Db_Abstract_Model
{
	#atributos
	private static 	$host 		= 	"localhost";
	private static 	$user 		= 	"root";
	private static 	$pass 		= 	"";
	protected 		$db_name 	= 	"dpstation";
	protected		$query;
	protected		$rows 		= 	array();
	protected		$num;
	private 		$conect;

	#metodos abstractos
	abstract protected function get();
	abstract protected function set();
	//abstract protected function update();
	abstract protected function delete();

	#metodos
	private function open_connection(){
		$this->conect = new mysqli(self::$host, self::$user, self::$pass, $this->db_name);
	}
	private function close_connection(){
		$this->conect->close();
	}

	protected function execute_query(){
		$this->open_connection();
		if(!$this->conect->query($this->query)){
			echo $this->conect->error;
			return false;
		}else{
			return true;
		}
		$this->close_connection();
	}

	protected function get_results_from_query(){
		$this->open_connection();
		$result = $this->conect->query($this->query);
		$this->num = $result->num_rows;

		$this->rows = array();
		while($this->rows[] = $result->fetch_assoc());
		$this->close_connection();
		array_pop($this->rows);
	}
}






?>