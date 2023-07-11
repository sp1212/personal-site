var http = require('http');
var server = http.createServer(
    function (request, response) {
        response.writeHead(200, { "Content-Type": "text/plain" });
        response.end("Welcome message!");
    });
server.listen(3000);
console.log("Server running at http://192.168.1.6:3000/");