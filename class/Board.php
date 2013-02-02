<?php
class Board {
	private $id;
	private $host_user;
	private $name;
	private $data;
	private $players;
	
	function setId($id) { 
		$this->id = $id;
	}
	
	function getId() {
		return $this->id;
	}
	
	function getHostUser() {
		return $this->host_user;
	}
	
	function setHostUser($host_user) { 
		$this->host_user = $host_user;
	}
	
	function setName($name) { 
		$this->name = $name;
	}
	
	function getName() {
		return $this->name;
	}
	
	function setData($data) { 
		$this->data = $data;
	}
	
	function getData() {
		return $this->data;
	}
}
?>