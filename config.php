<?php
try {

	$dsn = "mysql:dbname=cadastros;host=localhost";
	$dbuser = "root";
	$dbpass = "root";
	$pdo = new PDO($dsn, $dbuser, $dbpass);

} catch(PDOException $e) {
	die($e->getMessage());
}
?>