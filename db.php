<?php
$server = 'localhost';
$db_name = 'GISMAP';
$username = 'postgres';
$password = 'postgres';
$port   = '5432';

$dbconn = pg_connect("host=$server dbname=$db_name user=$username password=$password port=$port");

if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}
?>