<?php
include 'lib/Functions.php';
include 'class/Session.php';
include 'class/Board.php';
include 'connect.php';

function registerBoard($board) {
	mysql_query('INSERT INTO tb_board(host_user_id, name) VALUES (\''.$board->getHostUser().'\', \''.$board->getName().'\')');
	
	$row = mysql_fetch_assoc(mysql_query('SELECT MAX(id) as id FROM tb_board'));
	
	$board->setId($row['id']);
	
	if(mysql_affected_rows($GLOBALS['link'])==1) {
		echo 'board successful  created';
	}
	
	return $board;
}

function getRegistedBoard($id, $host_user) {
	$row = mysql_fetch_assoc(mysql_query('SELECT name FROM tb_board WHERE id = '.$id.' and host_user_id = '.$host_user));
	
	echo $row['name'];
}

function createBoard() {	
	$board = new Board();
	$board->setName('mesa '.randonNameSession());
	$board->setHostUser(1);
	
	$board = registerBoard($board);
	
	return $board;
}

function _main() {	
	if (isset($_GET['createtable'])) {
		$board = createBoard();
		
		echo 'Id da mesa: '.$board->getId().'<br />Host da mesa: '.$board->getHostUser();
	} else if (isset($_GET['seetable'])) {		
		include 'pages/seetable.php';
	} else {
		include 'pages/menu.php';
	}
}

_main();
?>