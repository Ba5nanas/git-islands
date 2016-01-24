<?php
global $islands;
$islands['state']['on'] = "admin";
$islands['state']['code'] = "admin";
$islands['state']['view'] = "dashboard";
require_once("islands-load.php");
require_once("libs-php/admin-authorize.php");
state_login();
$state = new islands_state();
$state->state_init();
