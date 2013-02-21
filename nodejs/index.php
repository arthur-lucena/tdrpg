<html>
	<head>
	<style> 
		<!--
		#messages {
		height: 150px;
		width: 400px;
		overflow-y: scroll;
		}
		-->
	</style>
	</head>
	
	<body>
		<div id="messages">
		</div>
	
		<label>user: </label>
		<input type="text" id="user" name="user">
		<br />
		<label>msg: </label>
		<textarea type="text" id="msg" name="msg"></textarea>
		<br />
		<input id="bt-send" type="submit" value="enviar">
		
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
			(function($) {
				var btSend = $('#bt-send');
			
				var send = function() {
					var json = {};
					var user = $('#user').value;
					var msg = $('#msg').value;
					json['user'] = user;
					json['msg'] = msg;
			
					$.ajax({
						type : 'GET',
						data : json,
						url : 'http://localhost:8001/sendMsg',
						jsonpCallback: "_responseNodeJS",
						dataType : 'jsonp',
						success : function (response) {responseHandler(response);},
						error : function (jqXHR, textStatus, errorThrown) {
							errorHandler(jqXHR, textStatus, errorThrown);
						}
					});
				}
								
				var responseHandler = function(response) {
					$('#messages').append(response['working']+'<br />');
				}
				
				var errorHandler = function(jqXHR, textStatus, errorThrown){
					console.log('error ' + textStatus + " " + errorThrown);
				}
				
				btSend.click(function(){
					send();
				});
			})(jQuery);
		</script>
	</body>
</html>

<!--
http://psitsmike.com/2011/09/node-js-and-socket-io-chat-tutorial/
http://tech.pro/tutorial/1091/posting-json-data-with-nodejs
-->