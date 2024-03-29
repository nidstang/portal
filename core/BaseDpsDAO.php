<?php
require_once("init.php");

class BaseDpsDAO
{
	private $em;
	private $entity;

	function __construct($entityArg=null){
		if($entityArg != null){
			$this->setEntity($entityArg);
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

	protected function findAll($fields=null){
		if(!is_Null($fields) and is_array($fields)){
			$listFields = implode(',', $fields);

			$query = 'SELECT '.$listFields.' FROM '.$this->getEntity(); 
		}else{
			$query = 'SELECT * FROM '.$this->getEntity();
		}
		
		return $this->getEntityManager()->getRecords($query);
	}

}