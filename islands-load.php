<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
session_start();
// include
require_once("libs-php/client.php");
require_once("libs-php/state.php");
require_once("libs-php/session.php");
// function Init
get_config();
init_browser();
get_session();
