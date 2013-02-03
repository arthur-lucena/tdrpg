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
	$query = mysql_query('SELECT id, result, type_dice, qtd_dice, dt_rolled FROM tb_dice_rolled WHERE board_id = '.$board->getId().' and host_user_id = '.$board->getHostUser().' ORDER BY id ASC');
	
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

function getLastRolledDice($board, $lastId) {
	$i = 0;
	$result = array();
	
	while ($i < 8) {
		sleep(3);
		
		$where = $board->getId().' and host_user_id = '.$board->getHostUser().' and id > '.$lastId.' ORDER BY id DESC LIMIT 1';
		$count = mysql_fetch_object(mysql_query('SELECT count(*) as count FROM tb_dice_rolled WHERE '.$where));
				
		if ($count->count > 0) {
			$row = mysql_fetch_object(mysql_query('SELECT id, result, type_dice, qtd_dice, dt_rolled FROM tb_dice_rolled WHERE '.$where));
			
			$rolledDice = new RolledDice();
			$rolledDice->setId($row->id);
			$rolledDice->setBoardId($board->getId());
			$rolledDice->setHostUser($board->getHostUser());
			$rolledDice->setTypeDice($row->type_dice);
			$rolledDice->setQtdDice($row->qtd_dice);
			$rolledDice->setResult(json_decode($row->result));
			$rolledDice->setDtRolled($row->dt_rolled);
			
			$result[] = $rolledDice;
			
			break;
		}
		
		$i++;
	}
	
	return $result;
}
?>