<form method="post" action="<?php echo baseURL(); ?>?seeboard=true&gettable=true">
	id:<input type="text" name="id" />
	host:<input type="text" name="host" />
	
	<input type="submit" value="enter"/>
</form>

<?php 
if (isset($_POST['id']) && isset($_POST['host'])) {
	$board = getRegistedBoard($_POST['id'], $_POST['host']);
	
	echo $board->getName().'<br /><br />';
	
	$rolledDices = getRolledDices($board);
	
	$length = sizeof($rolledDices);
	
	for ($i = 0; $i < $length; $i++) {
		echo 'data: '.$rolledDices[$i]->getDtRolled();
		echo '<br />';
		
		echo 'tipo do dado: '.$rolledDices[$i]->getTypeDice();
		echo '<br />';	
		
		echo 'Qtd: '.$rolledDices[$i]->getQtdDice();
		echo '<br />';	
		
		$results = $rolledDices[$i]->getResult();
		$lengthj = sizeof($results);
		for ($j = 0; $j < $lengthj; $j++) {
			echo 'dado numero '.($j+1).': ';
			echo $results[$j];
			echo '<br />';
		}
		
		echo '<br />---------<br />';
	}
	
	
	echo var_dump($board);
	
}
?>