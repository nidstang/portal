<?php

/**
* ArrayList
*/
class ArrayList
{
	private $list;

	function __construct(){
		$list = array();
	}

	function setList($listArg){
		$this->list[] = $listArg;
	}

	function getList(){
		return $this->list;
	}

	function add($object){
		$this->setList($object);
	}
}

