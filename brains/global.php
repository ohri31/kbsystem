<?php
	/*Konfiguracijski fajl */
	$DB_HOST = "mysql-55-centos7-1-hexdh";
	$DD_USER = "root";
	$DB_PASS = "";
	$DB_NAME = "vrocket";

	$db = new mysqli($DB_HOST, $DD_USER, $DB_PASS, $DB_NAME);
	$db->set_charset("utf8");

	if(!$db){
		die("Greška prilikom spajanja na bazu: ".$db->error);
	}

	error_reporting(E_ALL);
 	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
 	error_reporting(-1);
	
?>