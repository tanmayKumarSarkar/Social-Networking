<?php
session_start();
require_once("dbcon.php");
$username=$_SESSION["username"];

		date_default_timezone_set('Asia/Calcutta');		
		$currDate=date("Y-m-d H:i:s");
		$prevDT=date("0-0-0 0:0:0");
$queryOnlineUserLogout="UPDATE `social_nw`.`onlineusers` SET `logouttime`='$currDate' 
						WHERE `username`='$username' AND `logouttime`='$prevDT' ";
$resultOnlineUserLogout=mysql_query($queryOnlineUserLogout, $conn);
echo $username.$currDate;

unset($_SESSION["user"]);
session_destroy();
header("location: index.php");
?>
<a href="index.php">LOGIN AGAIN</a>
</body>
</html>