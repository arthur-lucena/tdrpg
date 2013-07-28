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
			echo 'usuario n�o logado, favor <a href="'.baseURL().'?createacc=true">criar uma conta</a> ou <a href="'.baseURL().'?login=true">logar</a>!';
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
<!DOCTYPE >
<html>
<head>
    <title>TDRPG</title>
    
    <link rel="stylesheet" type="text/css" href="fonts/Bariol-Regular/font.css">
    
    <style>
    body {
        background-color:#EEE;
        /*font-size:62.5%;*/
    }
    
    body, input[type=text], input[type=submit], input[type=reset], #content {
        font-family:'Bariol-Regular';
        color:#666;
        outline: none;
        font-smoothing:antialiased;
        -moz-font-smoothing:antialiased;
        -webkit-font-smoothing:antialiased;
        -o-font-smoothing:antialiased;
    }
    /*
    label {
        font-size: 1.2em;   
    }
    */
    input[type=text] {
        width: 260;
    }
    /*
    input[type=text], #submit, #reset, #content {
        font-size: 1.6em;
    }
    */
    </style>
</head>

<body>
<br />
<br />
<a rel="license" target="_blank" href="http://creativecommons.org/licenses/by/3.0/deed.pt_BR">
    <img alt="Licença Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/88x31.png" />
</a>
</body>    
</html>
