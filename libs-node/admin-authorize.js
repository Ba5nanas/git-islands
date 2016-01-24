const fs = require('fs');
const config = require("./server-config");
const side_server = require('./side-server');
const mysql = require('./mysql-driver');

setInterval(function () {
    mysql.query('SELECT 1');
}, 5000);

side_server.action('admin-login',function(data,socket){

  var generate = [];
  var username = {},
  password = {};
  username[config.mysql.user_db.user_field] = data.variables.username;
  password[config.mysql.user_db.pass_field] = data.variables.password;
  generate.push(config.mysql.user_db.table);
  generate.push(username);
  generate.push(password);

  mysql.query('select * from ?? where ? and ? ' , generate ,function(err, rows, fields){
    try {
      var result = JSON.parse(JSON.stringify(rows));
      if(result.length > 0){

        var session = fs.readFileSync('data-store/session.json', "utf8");
        var session_data = JSON.parse(session);
        if(islands_session_id == "") { socket.write("empty"); return; }
        if(typeof(session_data[islands_session_id] === undefined)){
          var date = new Date("Y-m-d H:i:s");
          session_data[islands_session_id] = {
            'user_id':data.variables.username,
            'login_time':date,
            'status':'online'
          };

          fs.writeFile("data-store/session.json", JSON.stringify(session_data),function(){
            socket.write("has");
          });
        }
      }else{
        socket.write("empty");
      }
    } catch (e) {
      //console.log(e);
      return;
    }

  });


});


side_server.action('admin-logout',function(data,socket){

  var deleteKey = require('key-del');
  var item_session = fs.readFileSync('data-store/session.json', "utf8");
  var data_session = JSON.parse(item_session);
  var results_session = deleteKey(data_session, [data.session_id] );

  fs.writeFile("session.json", JSON.stringify(results_session),function(err){
    socket.write("success");
  });


});
