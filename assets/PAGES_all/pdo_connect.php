<?php


define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'urna_votacao');

$pdo_bd = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);


?>