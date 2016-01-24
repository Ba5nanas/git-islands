<?php
function get_session() {
  global $islands;
  $records = json_decode(file_get_contents("data-store/session.json"));
  $session_id = session_id();
  if(empty($records->$session_id)){
    $islands['session'] = false;
  }else{
    $islands['session'] = true;
  }
}
