<?php
function curPageURL() {
	return 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}

function randonNameSession() {
    $caracteres = 'abcdefghijklmnopqrstuwxyz0123456789-_';
    $str = array();
    $length = strlen($caracteres) - 1;

    for ($i = 0; $i < 16; $i++) {
        $n = mt_rand(0, $length);
        $str[] = $caracteres[$n];
    }

    return implode($str);
}

function createSession() {
	//if (!isset($_GET['session'])) {
		//$_SESSION[randonNameSession()] = 'reg';
		
		//header('Location:?session='.session_id());
	//}
	
	session_name('tdrpg');
	session_set_cookie_params(2*7*24*60*60);
	session_start();
	
}

function _main() {	
	if (isset($_GET['seeDices'])) {
		include 'pages/seeDices.php';
	} else {
		createSession();
		
		include 'pages/throwDices.php';
		
		if (isset($_GET['throwDice'])) {		
			if (!isset($_POST['qtd'])) {
				echo 'Quantidade está vazio!';
				return false;
			}
			
			if (!isset($_POST['dice'])) {
				echo 'Escolha um tipo de dado!';
				return false;
			}
			
			for ($i=0;$i<$_POST['qtd'];$i++) {
				echo 'dado n'.($i+1).'<br />';
				echo mt_rand(0, $_POST['dice']).'<br />';
			}
		} 
	}
}

_main();
?>