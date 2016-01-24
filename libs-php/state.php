<?php
class islands_state {
  public function state_init(){
    global $islands;

    $this->control_admin();
    $admin = new islands_controller_admin();
    $admin->controller_init();
    $this->control_models();

  }

  private function control_admin(){
    require_once("islands-admin/controller.php");
  }

  private function control_models(){
    require_once("islands-models/index.php");
  }

}
