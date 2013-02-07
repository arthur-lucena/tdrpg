var http = require('http'), 
	fs = require('fs'), 
	url = require('url');

http.createServer(function(request, response) {
	var path = url.parse(request.url).pathname;

	if (path == "/getstring") {
		console.log("request recieved");
		response.writeHead(200, {"Content-Type" : "application/json"});
		var json = {};
		json['lol'] = 'kk';
		response.write('['+JSON.stringify(json)+']');
		response.end();
		console.log("string sent");

	} else {
		fs.readFile('./index.html', function(err, file) {
			if (err) {
				// write an error response or nothing here
				return;
			}
			response.writeHead(200, {
				'Content-Type' : 'text/html'
			});
			response.end(file, "utf-8");
		});
	}
}).listen(8001);

console.log("server initialized"); 