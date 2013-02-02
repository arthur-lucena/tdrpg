<?php
function curPageURL() {
	return 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}

function baseURL() {
	return 'http://localhost/tdrpg/';
}

function randonNameSession() {
    $caracteres = 'abcdefghijklmnopqrstuwxyz0123456789';
    $str = array();
    $length = strlen($caracteres) - 1;

    for ($i = 0; $i < 8; $i++) {
        $n = mt_rand(0, $length);
        $str[] = $caracteres[$n];
    }

    return implode($str);
}

function throwDices($qtd, $dice) {
	if (empty($qtd)) {
		echo 'Quantidade est� vazio!';
		return false;
	}
	
	if (empty($dice)) {
		echo 'Escolha um tipo de dado!';
		return false;
	}
	
	$result = array();
	
	for ($i=0; $i<$qtd; $i++) {
		$result[$i] = mt_rand(0, $dice);
	}
	
	return $result;
}
?>