<?php
define('PATH_LIBRARY', 'F:\Archivos de programa\xampp\xampp\htdocs\prueba2\portal\core');

set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);

require_once 'spoon/spoon.php';

class BaseDpsDAO
{
	private $em;
	private $entity;

	function __construct($entityArg=null){
		if($entityArg != null){
			$this->entity = $entityArg;
		}
		$this->em = new SpoonDatabase(
			'mysql', 
			'localhost', 
			'root',
			'',
			'dpstation'
		);
	}

	protected function getEntityManager(){
		return $this->em;
	}

	private function setEntity($entityArg){
		$this->entity = $entityArg;
	}

	protected function getEntity(){
		return $this->entity;
	}

	protected function findAll(){
		$query = 'SELECT * FROM '.$this->getEntity();

		return $this->getEntityManager()->getRecords($query);
	}

}