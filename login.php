<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php
require("home_style.php");
?>
</head>

<body>
<div align="center"><a href="home.php">HOME</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <br>
 <?php
require_once("dbcon.php");


$username=addslashes( $_POST["username"]);
$password=addslashes( $_POST["password"]);

$query1="SELECT * FROM `members` WHERE `username`='$username' AND `password`='$password'";
$result1=mysql_query($query1, $conn);
if($result1) {
			if(mysql_num_rows($result1) > 0) {			
				$list0 = mysql_fetch_assoc($result1);
				/*header("location:user.php?username=$username%20&%20password=$password");	*/						
				$mem_id=$list0['mem_id'];
				$_SESSION["username"]=$username;
				$_SESSION["password"]=$password;
				$_SESSION["mem_id"]=$mem_id;
		session_write_close();	
		
		$prevDTActiveErr=date("0-0-0 0:0:0");
		$queryOnlineFriendActiveErr="SELECT * FROM `onlineusers` WHERE `logouttime`='$prevDT' AND `username`='$username'
							AND `loginstatus`='1' ";
		$resultOnlineFriendActiveErr=mysql_query($queryOnlineFriendActiveErr,$conn);
		if (mysql_num_rows($resultOnlineFriendActiveErr) !== 0){
		while($listOnlineFriendActiveErr = mysql_fetch_assoc($resultOnlineFriendActiveErr)) {
			$NameFrndActiveErr=$listOnlineFriendActiveErr['username'];
			$queryPutActiveErr="UPDATE `onlineusers` SET `loginstatus`='0' WHERE `username`='$NameFrndActiveErr' ";
			$resultPutActiveErr=mysql_query($queryPutActiveErr);
		}}
		
		date_default_timezone_set('Asia/Calcutta');		
		$currDate=date("Y-m-d H:i:s");	 
		$queryOnlineUserLogin="INSERT INTO `onlineusers`(`onlineuserid`, `username`, `logintime`,`loginstatus`)
		 VALUES (NULL,'$username','$currDate','1')";
		$resultOnlineUserLogin=mysql_query($queryOnlineUserLogin);
				
		header("location: home.php");			
		exit();
?>

<?php
}
				else {				
				echo 'user name and password not found<br>';
				$_SESSION["ErrorMsg"]="ERROR";
				session_write_close();			
				header("location: index.php");				
				exit();
										
					 }	
				}
				else {		
				die("Query failed"); }

?> 
<a href="logout.php">Log Out</a>

</body>
</html>