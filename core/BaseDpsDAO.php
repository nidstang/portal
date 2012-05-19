<?php
require_once('init.php');

class BaseDpsDAO extends Init
{
	private $em;
	private $entity;

	function __construct($entityArg=null){
		if($entityArg != null){
			$this->entity = $entityArg;
		}
		$data = new Init();
		$data = $data->getData();

		$this->em = new SpoonDatabase(
			$data['type'], 
			$data['server'], 
			$data['user'],
			$data['pass'],
			$data['db']
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