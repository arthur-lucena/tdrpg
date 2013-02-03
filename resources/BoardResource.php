<?php
include '../class/Board.php';
include '../class/RolledDice.php';
include '../control/RolledDiceControl.php';
include '../lib/Connect.php';

$board = new Board();
$board->setId($_POST['json']['id']);
$board->setHostUser($_POST['json']['hostUser']);

if (isset($_POST['json']['lastId'])) {
	$lastRolledDice = getLastRolledDice($board, $_POST['json']['lastId']);
	
	$return = array();
	
	if (sizeof($lastRolledDice) > 0) {
		$return[] = json_encode($lastRolledDice[0]->getJsonData());
	}
	
	echo json_encode($return);

} else {
	$rolledDices = getRolledDices($board);
	
	$length = sizeof($rolledDices);
	
	$return = array();
	
	for ($i = 0; $i < $length; $i++) {
		$return[] = json_encode($rolledDices[$i]->getJsonData());
	}
	
	echo json_encode($return);
}
?>