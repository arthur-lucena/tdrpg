<?php
if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');

/* Database config */

$db_host		= 'db.cauazkfvdwfe.sa-east-1.rds.amazonaws.com';
$db_user		= 'root';
$db_pass		= 'bilcra56';
$db_database	= 'db1'; 

/* End config */

$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

// $GLOBALS['link'] = $link;

mysql_select_db($db_database, $link);
mysql_query("SET names UTF8");

?>