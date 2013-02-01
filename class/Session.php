<?php
class Session {
	private $id;
	private $name;
	private $data;
	
	function setId($id) { 
		$this->id = $id;
	}
	
	function getId() {
		return $this->id;
	}
	
	function setName($name) { 
		$this->name = $name;
	}
	
	function getName() {
		return $name->name;
	}
	
	function setData($data) { 
		$this->data = $data;
	}
	
	function getData() {
		return $this->data;
	}
}
?>