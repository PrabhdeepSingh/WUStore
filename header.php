<?php
session_start();
require(dirname(__FILE__) . "/includes/config.php");
require(dirname(__FILE__) . "/includes/functions.php");

if($application["mode"] == DEVELOPMENT)
{
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

if(!isset($_GET["server"]) && !isset($_GET["player"]))
{
	header("Location: ./walkthrough/");
	die();
}