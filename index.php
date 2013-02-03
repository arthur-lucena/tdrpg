<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<?php
include 'lib/Functions.php';
include 'lib/Connect.php';
include 'class/Board.php';
include 'class/RolledDice.php';
include 'control/BoardControl.php';
include 'control/RolledDiceControl.php';

// ALTER TABLE  `tb_dice_rolled` ADD INDEX (  `id` )

function _main() {	
	if (isset($_GET['createboard'])) {
		$board = createBoard();

		header('Location:?playing=true&id='.$board->getId().'&host_user='.$board->getHostUser().'&name='.$board->getName());
	} else if (isset($_GET['playing'])) {
		echo 'Id da mesa: '.$_GET['id'].'<br />Host da mesa: '.$_GET['host_user'];
		
		include 'pages/board.php';
	} else if (isset($_GET['seeboard'])) {		
		include 'pages/seeboard.php';
	} else if (isset($_GET['createacc'])) {
		include 'pages/createacc.php';
	} else {
		include 'pages/menu.php';
	}
}

_main();
?>