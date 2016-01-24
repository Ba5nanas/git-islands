<?php
class islands_controller_admin {

  public function controller_init(){
    global $islands;
    $this->check_state();
  }

  private function check_state(){
    global $islands;

    if(is_file("islands-{$islands['state']['on']}/templates/{$islands['state']['code']}/{$islands['state']['view']}.php")){
      $this->controller_pageview();
    }
  }

  private function controller_pageview(){
    global $islands;

    $islands['admin']['view']['assets'] = "http://{$islands['server_config']->server->host}/{$islands['server_config']->server->path}/islands-{$islands['state']['on']}/templates/{$islands['state']['code']}/assets/";
    include("islands-{$islands['state']['on']}/templates/{$islands['state']['code']}/{$islands['state']['view']}.php");
  }

}
