<?php
function registerRolledDice($rolledDice) {
	$values = $rolledDice->getBoardId().'\', \''.
			  $rolledDice->getHostUser().'\', \''.
			  $rolledDice->getTypeDice().'\', \''.
			  $rolledDice->getQtdDice().'\', \''.
			  json_encode($rolledDice->getResult());

	mysql_query('INSERT INTO tb_dice_rolled (board_id, host_user_id, type_dice, qtd_dice, result) VALUES (\''.$values.'\')');
	
	$row = mysql_fetch_assoc(mysql_query('SELECT MAX(id) as id FROM tb_dice_rolled'));
	
	$rolledDice->setId($row['id']);
	
	if(mysql_affected_rows($GLOBALS['link'])==1) {
	//	echo 'board successful created';
	}
	
	return $rolledDice;
}

function getRolledDices($board) {
	$query = mysql_query('SELECT id, result, type_dice, qtd_dice, dt_rolled FROM tb_dice_rolled WHERE board_id = '.$board->getId().' and host_user_id = '.$board->getHostUser());
	
	$result = array();

	while($row = mysql_fetch_object($query)) {
		$rolledDice = new RolledDice();
		$rolledDice->setId($row->id);
		$rolledDice->setBoardId($board->getId());
		$rolledDice->setHostUser($board->getHostUser());
		$rolledDice->setTypeDice($row->type_dice);
		$rolledDice->setQtdDice($row->qtd_dice);
		$rolledDice->setResult(json_decode($row->result));
		$rolledDice->setDtRolled($row->dt_rolled);
		
		$result[] = $rolledDice;
	}

	return $result;
}
?>