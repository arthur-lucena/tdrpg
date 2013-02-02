<?php 
if (isset($_POST['id']) && isset($_POST['host'])) {
	$board = getRegistedBoard($_POST['id'], $_POST['host']);
	
	echo $board->getName();
}
?>

<form method="post" action="?gettable=true">
	id:<input type="text" name="id" />
	host:<input type="text" name="host" />
	
	<input type="submit" value="enter"/>
</form>