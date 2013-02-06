<?php
function registerBoard($board) {
	mysql_query('INSERT INTO tb_board(host_user_id, name) VALUES (\''.$board->getHostUser().'\', \''.$board->getName().'\')');
	
	$row = mysql_fetch_assoc(mysql_query('SELECT MAX(id) as id FROM tb_board'));
	
	$board->setId($row['id']);
	
	if(mysql_affected_rows($GLOBALS['link'])==1) {
		// echo 'board successful created';
	}
	
	return $board;
}

function getRegistedBoard($id, $host_user) {
	$row = mysql_fetch_assoc(mysql_query('SELECT name FROM tb_board WHERE id = '.mysql_real_escape_string($id).' and host_user_id = '.mysql_real_escape_string($host_user)));
	
	$board = new Board();
	$board->setId($id);
	$board->setHostUser($host_user);
	$board->setName($row['name']);
	
	return $board;
}

function createBoard() {	
	$board = new Board();
	$board->setName('mesa '.randonNameSession());
	$board->setHostUser($_SESSION['id']);
	
	$board = registerBoard($board);
	
	return $board;
}
?>