<?php
class Init
{
	private $data;
	private $dataXML;

	public function Init(){
		$this->dataXML = simplexml_load_file("config.xml");
	}

	public function getPath($type='Default'){
		$path = '';

		switch ($type) {
			case 'Default':
				$path = $this->dataXML->path->pathDefault['value'];
				break;
			case 'Windows':
				$path = $this->dataXML->path->pathWindows['value'];
			break;
			case 'Linux':
				$path = $this->dataXML->path->pathLinux['value'];
			break;
		}

		return $path;
	}

	protected function getData(){
		$this->dataXML = simplexml_load_file("config.xml");

		$this->data = array(
			'type' => $this->dataXML->connection->typeBD['value'],
			'server' => $this->dataXML->connection->server['value'],
			'user' => $this->dataXML->connection->user['value'],
			'pass' => $this->dataXML->connection->password['value'],
			'db' => $this->dataXML->selectDB->db['value']
		);

		return $this->data;
	}
}

$init = new Init();

define('PATH_LIBRARY', $init->getPath('Windows'));

set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);

require_once 'spoon/spoon.php';


?>