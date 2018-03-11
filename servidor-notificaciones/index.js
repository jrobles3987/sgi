
const { Client } = require('pg')
var conString = "tcp://postgres:admin@localhost:5432/sistemasutm";
const client = new Client(conString)

client.connect()
//console.log(client)

var io = require('socket.io').listen(7000);
var query = client.query('LISTEN addprueba2');

io.sockets.on('connection', function (socket) {
    socket.emit('connected', { connected: true });
    newFunction();
    socket.on('ready for data', function (data) {
        client.on('notification', function(title) {
            socket.emit('update', { message: title });
        });
    });
});

function newFunction() {
    //console.log('Conectado al puerto: 7000');
}
