<?php
define("PARAM_HOST",'localhost');
define("PARAM_PORT",'3306');
define("PARAM_DB",'u845027411_cartask');
const PARAM_USER = 'u845027411_kananibrahimov';
const PARAM_PASSWD = 'CarTask12';
$conn = 'mysql:host='.PARAM_HOST;'port='.PARAM_PORT;'dbname='.PARAM_DB;
$pdo = new PDO($conn,PARAM_USER,PARAM_PASSWD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
