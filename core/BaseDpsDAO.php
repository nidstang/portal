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
		$data = $this->getData();

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

	private function getEntity(){
		return $this->entity;
	}

	protected function findAll(){
		$query = 'SELECT * FROM '.$this->getEntity();

		return $this->getEntityManager()->getRecords($query);
	}

}

require_once("ArrayList.php");
require_once("ComentarioDTO.php");

class ComentarioDAO extends BaseDpsDAO
{
	function __construct(){
		parent::__construct('comentario');
	}

	function getAllComentarios(){
		$comentarioDTOList = new ArrayList();

		$data = $this->findAll();

		foreach ($data as $key => $value) {
			$comentarioDTO = new ComentarioDTO();
			$comentarioDTO->setId($value['id_comentario']);
			$comentarioDTO->setComentario($value['texto']);

			$comentarioDTOList->add($comentarioDTO);
		}

		return $comentarioDTOList;

	}
}

$objeto = new ComentarioDAO();
$comentarios = $objeto->getAllComentarios();

Spoon::dump($comentarios, false);

?>