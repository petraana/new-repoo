const http = require('http');
function index (request, response) {
response.writeHead(200);
response.end('Hello, World!palalalapallala this is the best place to be in');
}
http.createServer(function (request, response) {
if (request.url === '/') {
return index(request, response);
}
response.writeHead(404);
response.end(http.STATUS_CODES[404]);
}).listen();
