
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 
require_once("dbcon.php");

if((isset($_SESSION["username"])) && (isset($_SESSION["password"]))){
	$username=$_SESSION["username"];
	$password=$_SESSION["password"];
	$query1defno="SELECT * FROM `members` WHERE `username`='$username' AND `password`='$password'";
	$result1defno=mysql_query($query1defno, $conn);
	$list1defno = mysql_fetch_assoc($result1defno);
	
	$counterno=0;
	$counterrec=0;
	$countersen=0;
?>
<?php
	$query8listno="SELECT * FROM `friends` WHERE `receiver`='$username' AND `accept`='yes'";
	$result8listno=mysql_query($query8listno, $conn);

	$query9listno="SELECT * FROM `friends` WHERE `sender`='$username' AND `accept`='yes'";
	$result9listno=mysql_query($query9listno, $conn);
	if (mysql_num_rows($result8listno) === 0 && mysql_num_rows($result9listno) === 0) {
		echo " 0 "; }
	else{	
		
?>	
<?php
	if (mysql_num_rows($result8listno) !== 0) {
	while($list8listno = mysql_fetch_assoc($result8listno)) {
			$s_username=$list8listno['sender'];
		  
		  	$query8_1listno="SELECT * FROM `members` WHERE `username`='$s_username'";
			$result8_1listno=mysql_query($query8_1listno, $conn);
			$list8_1listno = mysql_fetch_assoc($result8_1listno);

	$counterrec=mysql_num_rows($result8listno);

	}}
?>
<?php
	if (mysql_num_rows($result9listno) !== 0) {
	while($list9listno = mysql_fetch_assoc($result9listno)) {
			$r_username=$list9listno['receiver'];
		  
		  	$query9_1listno="SELECT * FROM `members` WHERE `username`='$r_username'";
			$result9_1listno=mysql_query($query9_1listno, $conn);
			$list9_1listno = mysql_fetch_assoc($result9_1listno);
	
	$countersen=mysql_num_rows($result9listno);
	
	}}	
?>
<?php 
	$counterno=$counterrec+$countersen;
	echo "$counterno";
 }
	
 ?>
<?php  }

	
 ?>

</body>
</html>