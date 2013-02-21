var http = require('http'), 
	fs = require('fs'), 
	url = require('url');

http.createServer(function(request, response) {
	var path = url.parse(request.url).pathname;

	if (path == "/sendMsg") {
		console.log("request recieved");
		response.writeHead(200, {"Content-Type" : "application/json"});
		
		var json = {};
		json['lol'] = 'kk';
		json['working'] = 'ok';
		
		// response.write();
		response.end('_responseNodeJS('+JSON.stringify(json)+')');
		console.log("string sent");

	} else {
		// parametro errado 
	}
}).listen(8001);

console.log("server initialized"); 