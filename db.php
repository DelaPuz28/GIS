<?php

//$server = 'localhost';
//$db_name = 'GISMAP';
//$username = 'postgres';
//$password = 'postgres';
//$port   = '5432';

//$dbconn = pg_connect("host=$server dbname=$db_name user=$username password=$password port=$port");

 $server = 'db.buycuwzzxzvvrcibgynq.supabase.co';
 $db_name= 'postgres';
 $username= 'postgres';
 $password= '0909Try_only0909';
 $port= '5432';

 $dbconn = pg_connect("host=$server dbname=$db_name user=$username password=$password port=$port");
//user=postgres password=0909Try_only0909 host=db.buycuwzzxzvvrcibgynq.supabase.co port=5432 dbname=postgres
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}
?>