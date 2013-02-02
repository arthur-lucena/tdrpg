
<?php
/*
$board = new Board();
$board->setId($_GET['id']);
$board->setHostUser($_GET['host_user']);
$board->setName($_GET['name']);
*/

$baseBoardUrl = baseURL().'?playing=true&id='.$_GET['id'].'&host_user='.$_GET['host_user'].'&name='.rawurlencode($_GET['name']);

?>
<form id="form" method="post" action="<?php echo $baseBoardUrl; ?>&throwDice=true" >
<label for="d4">D4</label>
<input type="radio" id="d4" name="dice" value="4">
<br />
<label for="d6">D6</label>
<input type="radio" id="d6" name="dice" value="6">
<br />
<label for="d8">D8</label>
<input type="radio" id="d8" name="dice" value="8">
<br />
<label for="d10">D10</label>
<input type="radio" id="d10" name="dice" value="10">
<br />
<label for="d12">D12</label>
<input type="radio" id="d12" name="dice" value="12">
<br />
<label for="d16">D16</label>
<input type="radio" id="d16" name="dice" value="16">
<br />
<label for="d20">D20</label>
<input type="radio" id="d20" name="dice" value="20">
<br />
<label for="d30">D30</label>
<input type="radio" id="d30" name="dice" value="30">
<br />
<label for="d100">D100</label>
<input type="radio" id="d100" name="dice" value="100">
<br />
<label for="qtd">Qtd.</label>
<input id="qtd" name="qtd" type="text" value="1">
<br />
<input type="submit" value="Throw Dice">
</form>
<?php 

if (isset($_GET['throwDice'])) {
	
	$result = throwDices($_POST['qtd'], $_POST['dice']);
		
	$lenght = sizeof($result);
	
	for ($i=0; $i < $lenght; $i++) {
		echo 'Dado numero '.($i+1).': '.$result[$i].'<br />';
	}
	
	$rolledDice = new RolledDice();
	
	$rolledDice->setBoardId($_GET['id']);
	$rolledDice->setHostUser($_GET['host_user']);
	$rolledDice->setTypeDice('D'.$_POST['dice']);
	$rolledDice->setQtdDice($_POST['qtd']);
	$rolledDice->setResult($result);
	
	registerRolledDice($rolledDice);
	
	//header('location:'.$baseBoardUrl);
}

?>