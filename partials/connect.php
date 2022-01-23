<?php
// to connect to the database
$pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=phpblog","root", "");
// check for errors
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>