<?php
define('DSN', 'mysql:host=localhost;dbname=restoran');
define('DBUSER', 'root');
define('DBPASS', '');

// Connect to Database
$db = new PDO(DSN, DBUSER, DBPASS);
?>