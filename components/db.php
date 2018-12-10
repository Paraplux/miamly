<?php

$db_name = 'miamly';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);