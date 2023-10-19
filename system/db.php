<?php
define('DSN', 'mysql:host=localhost;dbname=restoran');
define('DBUSER', 'root');
define('DBPASS', '');

$db = new PDO(DSN, DBUSER, DBPASS);
?>