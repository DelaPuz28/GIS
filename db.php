<?php

//$server = 'localhost';
//$db_name = 'GISMAP';
//$username = 'postgres';
//$password = 'postgres';
//$port   = '5432';

//$dbconn = pg_connect("host=$server dbname=$db_name user=$username password=$password port=$port");


$url = 'postgres://default:NQsRLIHiYE41@ep-broken-meadow-37339063-pooler.us-east-1.postgres.vercel-storage.com:5432/verceldb';
$prisma_url = 'postgres://default:NQsRLIHiYE41@ep-broken-meadow-37339063-pooler.us-east-1.postgres.vercel-storage.com:5432/verceldb?pgbouncer=true&connect_timeout=15';
$url_non_pooling = 'postgres://default:NQsRLIHiYE41@ep-broken-meadow-37339063.us-east-1.postgres.vercel-storage.com:5432/verceldb';
$server = 'ep-broken-meadow-37339063-pooler.us-east-1.postgres.vercel-storage.com';
$db_name= 'verceldb';
$username= 'default';
$password= 'NQsRLIHiYE41';
$port= '5432';

 
 //$server = 'db.buycuwzzxzvvrcibgynq.supabase.co';
 //$db_name= 'postgres';
 //$username= 'postgres';
 //$password= '0909Try_only0909';
 //$port= '5432';


 $dbconn = pg_connect("POSTGRES_URL=$url POSTGRES_PRISMA_URL=$prisma_url  POSTGRES_URL_NON_POOLING=$url_non_pooling POSTGRES_HOST=$server POSTGRES_DATABASE=$db_name POSTGRES_USER=$username POSTGRES_PASSWORD=$password port=$port");
 //$dbconn = pg_connect("host=$server dbname=$db_name user=$username password=$password port=$port");

//user=postgres password=0909Try_only0909 host=db.buycuwzzxzvvrcibgynq.supabase.co port=5432 dbname=postgres
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}
?>