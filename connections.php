<?php

// DATASOURCE is either FileMaker or MySQL, comment out whichever is not used
//	$datasource = 'FileMaker' ;
	$datasource = 'MySQL' ;


// MySQL connection
if($datasource === 'MySQL'){
	// Connect to MySQL
	$host = "localhost:3306";
	$usn = "root";
	$pwd = "admin";
	$db = "demo";
	
	// MySQL table names
	$tUser = 'user';
	$tReset = 'reset';
	$tLog = 'log';
	$tFile = 'file';


	// for PDO connection to database
	$pdo = 'mysql:host='.$host.';dbname='.$db .';charset=utf8mb4';


	// Check connection
	try {
	// establish connection
		$conn = new PDO($pdo, $usn, $pwd,
		array(
		// set the PDO error mode to ERRMODE_WARNING to show MySQL errors:
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
			)
		);

	// report success
	//	echo 'Successfully connected to database.<br>';

	} catch (PDOException $e) {
	// report error
		echo '<pre>';
		echo 'Failed to connect to the MySQL database: ' . $e->getMessage();
		echo '</pre>';
		file_put_contents('/pdo_errors/pdo_errors.txt', $e->getMessage()."\n", FILE_APPEND);
		exit;
	}

}



// FileMaker connection
if($datasource === 'FileMaker'){
// Connect to FileMaker
require_once('FileMaker.php'); 

   $database = 'Demo';
   $host = '10.211.55.4';
   $username = 'Admin';
   $password = 'admin';

   // Alternative way to connect:
   //  $fm = new FileMaker('DatabaseName', 'HostSpec', 'UserName', 'Password');
   //  $fm = new FileMaker($database, $host, $username, $password);

   $fm = new FileMaker(); 
   $fm->setProperty('database', $database); 
   $fm->setProperty('hostspec', $host); 
   $fm->setProperty('username', $username); 
   $fm->setProperty('password', $password); 

   // FileMaker layout names
	   $tUser = 'web_user';
	   $tReset = 'web_reset';
	   $tLog = 'web_log';
	   $tFile = 'web_file';
	   $tRelated = 'web_related';
   
   
	   $result = $fm->listLayouts();

	   if (FileMaker::isError($result)) {
	   // report error
		   echo '<p>Failed to connect to the FileMaker <b>' . $database . '</b> database. ' .  $result->getMessage() . '</p>'; 
		   exit;
	   } 
	
}

?>



