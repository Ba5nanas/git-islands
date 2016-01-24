<?php
function connect_server($port,$ip,$callback){
  global $islands;
  $address = gethostbyname($ip);
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  $result = socket_connect($socket, $address, $port);
  if ($result === false) {
    $islands['state']['code'] = "error";
    $islands['state']['on'] = "admin";
    $islands['state']['view'] = "error-connect";
    $isladns['state']['message'] = socket_strerror(socket_last_error());
    return;
  }
  $callback($socket);
  socket_close($socket);
}

function islands_sendto($port,$ip,$object) {
  global $islands;
  $address = gethostbyname($ip);
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  $result = socket_connect($socket, $address, $port);
  if ($result === false) {
    $islands['state']['code'] = "error";
    $islands['state']['on'] = "admin";
    $islands['state']['view'] = "error-connect";
    $islands['state']['message'] = socket_strerror(socket_last_error($socket));
    return;
  }
  $object['key_server'] = $islands['server_config']->key_server;
  socket_write($socket, json_encode($object), strlen(json_encode($object)));
  socket_close($socket);
}

function islands_sendto_v2($object) {
  global $islands;
  $address = gethostbyname($islands['server_config']->server->host);
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  $result = socket_connect($socket, $address, $islands['server_config']->server->port);
  if ($result === false) {
    $islands['state']['code'] = "error";
    $islands['state']['on'] = "admin";
    $islands['state']['view'] = "error-connect";
    $islands['state']['message'] = socket_strerror(socket_last_error($socket));
    return;
  }
  $object['key_server'] = $islands['server_config']->key_server;
  socket_write($socket, json_encode($object), strlen(json_encode($object)));
  socket_close($socket);
}

function islands_sendto_recv($object) {
  global $islands;
  $address = gethostbyname($islands['server_config']->server->host);
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  $result = socket_connect($socket, $address, $islands['server_config']->server->port);
  if ($result === false) {
    $islands['state']['code'] = "error";
    $islands['state']['on'] = "admin";
    $islands['state']['view'] = "error-connect";
    $islands['state']['message'] = socket_strerror(socket_last_error($socket));
    return;
  }
  $object['key_server'] = $islands['server_config']->key_server;
  socket_write($socket, json_encode($object), strlen(json_encode($object)));
  $out = socket_read($socket, 2048);
  socket_close($socket);
  return $out;
}

function get_config(){
  global $islands;
  $islands['server_config'] = json_decode(file_get_contents("data-store/config.json"));
}

function init_browser(){
  global $islands;
  $session_id = session_id();
  $generate = array('session_id'=>$session_id,"action"=>"init-browser");
  islands_sendto_v2($generate);
}


/* how to use
connect_server(3000,"188.166.188.226","test");

function test($socket){
  $session_id = session_id();
  $generate = array('session_id'=>$session_id,"action"=>"ready", "key_server" => $islands['server_config']->server->key_server);
  socket_write($socket, json_encode($generate), strlen(json_encode($generate)));
}
*/
