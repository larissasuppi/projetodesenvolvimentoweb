<?php

	

	define('DB_HOSTNAME','localhost'); // database host name
	define('DB_USERNAME', 'root');     // database user name
	define('DB_PASSWORD', '12345'); // database password
	define('DB_NAME', 'db_abc_bolinhas'); // database name

	$dsn = 'mysql:host='.DB_HOSTNAME.';dbname='.DB_NAME;
	$options = array(
	   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);
	$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
