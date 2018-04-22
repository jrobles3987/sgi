var pg = require('pg');
 
var conString = "tcp://postgres:admin@localhost:5432/sistemasutm";
var client = new pg.Client(conString);
client.connect();
 
var io = require('socket.io').listen(7000);
 
io.sockets.on('connection', function (socket) {
    socket.on('sql', function (data) {
        var query = client.query(data.sql, data.values);
        query.on('row', function(row) {
            socket.emit('sql', row);
        });
    });
});