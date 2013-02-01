<?php
include 'lib/Functions.php';
include 'class/Session.php';
include 'class/Board.php';

function registerBoard($board){
	// gravar mesa 
}

function getRegistedBoard($id) {
	// procurar mesa gravada com esse id
}

function createBoard() {	
	$board = new Board();
	$board->setId(randonNameSession());
	$board->setName('mesa 1');
	$board->setData(1);
	
	return $board;
}

function _main() {	
	if (isset($_GET['createtable'])) {
		$board = createBoard();
		
		echo 'Id da mesa: '.$board->getId();
		
	} else if (isset($_GET['seetable'])) {		
		
	}
}

_main();
?>

<a href="<?php echo baseURL(); ?>?createtable=true">criar mesa</a>
<br />
<a href="<?php echo baseURL(); ?>?seetable=true">ver mesa</a>