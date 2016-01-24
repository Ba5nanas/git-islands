const side_server = require('./side-server');

side_server.action('init-browser',function(data,socket){
  islands_session_id = data.session_id;
});
