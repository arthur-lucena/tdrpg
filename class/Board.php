<?php
class Board {
	private $id;
	private $hostUser;
	private $name;
	private $data;
	private $players;

	public function getId() {
		return $this -> id;
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function getHostUser() {
		return $this -> hostUser;
	}

	public function setHostUser($hostUser) {
		$this -> hostUser = $hostUser;
	}

	public function getName() {
		return $this -> name;
	}

	public function setName($name) {
		$this -> name = $name;
	}

	public function getData() {
		return $this -> data;
	}

	public function setData($data) {
		$this -> data = $data;
	}

	public function getPlayers() {
		return $this -> players;
	}

	public function setPlayers($players) {
		$this -> players = $players;
	}

	public function getJsonData() {
		$var = get_object_vars($this);
		
		foreach ($var as &$value) {
			if (is_object($value) && method_exists($value, 'getJsonData')) {
				$value = $value -> getJsonData();
			}
		}
		return $var;
	}
}
?>