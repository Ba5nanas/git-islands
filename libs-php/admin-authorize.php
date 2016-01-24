<?php
function state_login(){
  global $islands;
  if(isset($_GET['state']) && $islands_session == false){
    state_loggin();
  }
}


function state_loggin(){
  global $islands;
  $full_url = "http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}";
  //$actual_link = "http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}";
  $generate = array(
    "action" => "admin-login",
    "url" => $full_url,
    "method" => "POST",
    "variables" => $_POST
  );
  $result = islands_sendto_recv($generate);
  if($result == "has"){
    header("Location: http://{$islands['server_config']->server->host}/{$islands['server_config']->server->path}/islands-admin.php");
  }else{
    header("Location: http://{$islands['server_config']->server->host}/{$islands['server_config']->server->path}/islands-login.php");
  }
}

function state_logout(){
  global $islands;
  $session_id = session_id();
  $generate = array(
    "action" => "admin-logout",
    "session_id" => $session_id
  );

  $result = islands_sendto_recv($generate);
  header("Location: http://{$islands['server_config']->server->host}/{$islands['server_config']->server->path}/islands-login.php");
}
