<form method="post" action="<?php echo baseURL(); ?>?seeboard=true&gettable=true">
	id:<input type="text" name="id" />
	host:<input type="text" name="host" />
	
	<input type="submit" value="enter"/>
</form>

<div id="infoHost">
</div>

<div id="rolledDices">
</div>

<script type="text/javascript">
(function($) {
	var post = 'resources/BoardResource.php';
	var container = $('#rolledDices');
	var lastId;
	
	function getRolledDices(json) {
		$.post(post, {json: json}, function(response) {
			try {
				var jsonReturn = jQuery.parseJSON(response);
				
				if (jsonReturn.length > 0) {					
					var length = jsonReturn.length;
					
					for (var i = 0; i < length; i++) {
						var jsonRow = jQuery.parseJSON(jsonReturn[i]);
						
						var html = 'data: '+jsonRow.dtRolled+
						'<br />'+
						'tipo do dado: '+jsonRow.typeDice+
						'<br />'+
						'qtd: '+jsonRow.qtdDice+
						'<br />';

						var dicesResult = jsonRow.result;
						var dicesResultLength = dicesResult.length;
												
						for (var j = 0; j < dicesResultLength; j++) {
							html += 'dado numero '+(j+1)+': '+
							dicesResult[j]+
							'<br />';
						}
						
						
						html += '<br />-------<br />';
						container.append(html);
		
						lastId = jsonRow.id;
					}
					
					json['lastId'] = lastId;
				}
				
		    	getRolledDices(json);
		    } catch(err){
			}
		});
	}


<?php 
if (isset($_POST['id']) && isset($_POST['host'])) {
	$board = getRegistedBoard($_POST['id'], $_POST['host']);
	$msg = '';
	// verificar se foi retornado algum objeto
	
	$msg .= $board->getName().'<br /><br />';
	
	$jsFunction = 'getRolledDices('.json_encode($board->getJsonData()).')';
	
	
/*
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
		
		echo json_encode($rolledDices[$i]->getJsonData());
		
		echo '<br />---------<br />';
	}
*/
}

echo $jsFunction;
?>

})(jQuery);
</script>