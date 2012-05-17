<?php
define('PATH_LIBRARY', '/opt/lampp/htdocs/portal/core');

set_include_path(get_include_path() . PATH_SEPARATOR . PATH_LIBRARY);

require_once 'spoon/spoon.php';

class Init
{
	public $data;

	function Init(){
		$dataXML = simplexml_load_file("config.xml");

		$this->data = array(
			'type' => $dataXML->connection->typeBD['value'],
			'server' => $dataXML->connection->server['value'],
			'user' => $dataXML->connection->user['value'],
			'pass' => $dataXML->connection->password['value'],
			'db' => $dataXML->selectDB->db['value']
		);
	}
}

?>