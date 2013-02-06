<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<?php
define('INCLUDE_CHECK',true);

include 'lib/Functions.php';
include 'lib/Connect.php';
include 'class/Board.php';
include 'class/RolledDice.php';
include 'class/Member.php';
include 'control/BoardControl.php';
include 'control/RolledDiceControl.php';
include 'control/MemberControl.php';

// ALTER TABLE  `tb_dice_rolled` ADD INDEX (  `id` )

session_name('tdRpg');
session_set_cookie_params(2*7*24*60*60);
session_start();

if (isset($_SESSION['id'])) {
	echo 'usuario logado';
} else {
	echo 'usuario nao logado';
}

echo '<br /><br />';

function _main() {	
	if (isset($_GET['createboard'])) {
		if (isset($_SESSION['id'])) {
			$board = createBoard();

			header('Location:?playing=true&id='.$board->getId().'&host_user='.$board->getHostUser().'&name='.$board->getName());
		} else {
			echo 'usuario não logado, favor <a href="'.baseURL().'?createacc=true">criar uma conta</a> ou <a href="'.baseURL().'?login=true">logar</a>!';
		}
	} else if (isset($_GET['playing'])) {
		echo 'Id da mesa: '.$_GET['id'].'<br />Host da mesa: '.$_GET['host_user'];
		
		include 'pages/board.php';
	} else if (isset($_GET['seeboard'])) {		
		include 'pages/seeboard.php';
	} else if (isset($_GET['createacc'])) {
		include 'pages/createacc.php';
	} else if (isset($_GET['login'])) {
		include 'pages/login.php';
	} else if (isset($_GET['logout'])) {
		$_SESSION = array();
		session_destroy();
		
		header('Location: http://'.$_SERVER['SERVER_NAME'].'/tdrpg/');
		exit;
	} else {
		include 'pages/menu.php';
	}
}

_main();
?>