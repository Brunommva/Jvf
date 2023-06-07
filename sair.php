<?php 

$host_ip = $_SERVER['HTTP_HOST'];

$url = "http://".$host_ip."/";

	session_start(); 
	session_destroy(); 
	header("Location: $url"); 
	exit;
?>