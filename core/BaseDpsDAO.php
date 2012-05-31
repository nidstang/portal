<?php
require_once("init.php");

class BaseDpsDAO
{
	private $em;
	private $entity;

	function __construct($entityArg=null){
		if($entityArg != null){
			$this->entity = $entityArg;
		}
		global $config;
		$this->em = new SpoonDatabase(
			$config['type'], 
			$config['server'], 
			$config['user'],
			$config['pass'],
			$config['dbname']
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