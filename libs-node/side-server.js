const net = require("net");
const config = require("./server-config");
global.islands_session_id = "";
const side_server = net.createServer().listen({
  host: config.server.host,
  port: config.server.port
},function(){
  console.log("server created.");
});


const action = function(action,callback){
  side_server.on("connection",function(socket){

      socket.on("data",function(data){
        try {
          var json = JSON.parse(data.toString());
        } catch (e) {
            return;
        }
        if(typeof(json) != "undefined"){
          if(action == json.action && json.key_server == config.key_server){
            callback(json,socket);
          }
        }
      });
  });

}

// how to use side_server
module.exports.side_server = side_server;

// how to use action
//action("your like action",function(data){
// dothingsome.
//});
module.exports.action = action;
