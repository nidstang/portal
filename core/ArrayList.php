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

	function add($item){
		$this->list[] = $item;
	}

	function toArray(){
		return $this->list;
	}

	function size(){
		return count($this->list);
	}

	function isNull(){
		if($this->size() < 0){
			return false;
		}else{
			return true;
		}
	}
}

