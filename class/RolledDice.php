<?php
class RolledDice {
	private $id;
	private $boardId;
	private $hostUser;
	private $typeDice;
	private $qtdDice;
	private $result;
	private $dtRolled;

	public function getId() {
		return $this -> id;
	}

	public function setId($id) {
		$this -> id = $id;
	}

	public function getBoardId() {
		return $this -> boardId;
	}

	public function setBoardId($boardId) {
		$this -> boardId = $boardId;
	}

	public function getHostUser() {
		return $this -> hostUser;
	}

	public function setHostUser($hostUser) {
		$this -> hostUser = $hostUser;
	}

	public function getTypeDice() {
		return $this -> typeDice;
	}

	public function setTypeDice($typeDice) {
		$this -> typeDice = $typeDice;
	}

	public function getQtdDice() {
		return $this -> qtdDice;
	}

	public function setQtdDice($qtdDice) {
		$this -> qtdDice = $qtdDice;
	}

	public function getResult() {
		return $this -> result;
	}

	public function setResult($result) {
		$this -> result = $result;
	}

	public function getDtRolled() {
		return $this -> dtRolled;
	}

	public function setDtRolled($dtRolled) {
		$this -> dtRolled = $dtRolled;
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