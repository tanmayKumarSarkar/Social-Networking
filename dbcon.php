<?php
$dbhost = 'localhost';	//Default Port changes to 3308 from 3306;
$dbuser = 'root';
$dbpass = '';
$conn = mysql_pconnect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('social_NW',$conn);
?>
