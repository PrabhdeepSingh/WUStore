<?php
if(!defined("DEVELOPMENT")) define("DEVELOPMENT", 0);
if(!defined("PRODUCTION")) define("PRODUCTION", 1);

/**
 * This array is used through out the website
 * @var mode          Determines if errors should show or stay hidden
 * @var rootPath      The web address to this software
 * @var siteTitle 		Will be used for page title
 * @var version       This is just a versioning variable nothing else
 */
$application = array(
	"mode" => DEVELOPMENT,
	"rootPath" => "//localhost/WUStore", // CHANGE ME - DO NOT ADD / AT THE END
	"siteTitle" => "Name of your site, clan, or community",
	"version" => "0.0.1-Alpha"
);

/**
 * Your servers RMI connection details. 
 * @var serverName				Name of your server
 * @var ip               	IP of your RMI Registery
 * @var port              Port of your RMI
 * @var password          Your RMI password
 */
$serverRMIConfigs = array(
	array(
		"serverName" => "Server 1",
		"ip" => "",
		"port" => 7220,
		"password" => ""
	),
	// array(
	//  "serverName" => "Server 2",
	// 	"ip" => "",
	// 	"port" => 7220,
	// 	"password" => ""
	// ),
);

$WUAHelper = dirname(__FILE__) . "/WUAHelper.jar";

?>