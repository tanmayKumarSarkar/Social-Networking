<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
require("home_style.php");
?>

<body>

<?php
require_once("dbcon.php");
$username=$_SESSION["username"];


$fname=addslashes( $_REQUEST["fname"]);
$lname=addslashes( $_REQUEST["lname"]);

$query0="SELECT * FROM `members` WHERE `fname`='$fname' AND `lname`='$lname'";
$result0=mysql_query($query0, $conn);

	if(mysql_num_rows($result0) == 0) {
		echo "No match found ";

	}
	else	{
	  while ($list0 = mysql_fetch_assoc($result0)) {
		  $acceptusername=$list0['username'];
		  
	$query1 = "UPDATE  `social_nw`.`friends` SET `accept`='yes' WHERE
 	`sender`='$acceptusername' AND `receiver`='$username'";
   $result1 = mysql_query($query1, $conn);
   if($result1){
	   	echo 'friend request accepted';
		header("location: friends.php");
		
   				}
	else{echo "friend request cannot be accepted try again";}
			

		}
	}
?>


</body>
</html>