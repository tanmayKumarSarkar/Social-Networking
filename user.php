<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center"><a href="home.php">HOME</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
 <br>
 <?php
require_once("dbcon.php");

$username=addslashes( $_REQUEST["username"]);
$password=addslashes( $_REQUEST["password"]);

$query1="SELECT * FROM `members` WHERE `username`='$username' AND `password`='$password'";
$result1=mysql_query($query1, $conn);
if($result1) {
			if(mysql_num_rows($result1) > 0) {			
				$list0 = mysql_fetch_assoc($result1);							
				}
				else {				
				echo 'user name and password not found';							
					 }	
				}
				else {		
				die("Query failed"); }

?>
  welcome <?php echo $list0['fname'].' '.$list0['lname']; ?><br>
  your details is bellow 

<table cellpadding="5" cellspacing="5">
<tr><td><a href="edit.php?mem_id=<?php echo $list0['mem_id'];?>">&nbsp;EDIT</a></div></td></tr>
<tr><td>USER NAME ::</td><td><?php echo $list0['username'] ?></td></tr>
<tr><td>FIRST NAME ::</td><td><?php echo $list0['fname'] ?></td></tr>
<tr><td>LAST NAME ::</td><td><?php echo $list0['lname'] ?></td></tr>
<tr><td>ADDRESS ::</td><td><?php echo $list0['address'] ?></td></tr>
<tr><td>EMAIL ::</td><td><?php echo $list0['email'] ?></td></tr>
<tr><td>CONTACT NO. ::</td><td><?php echo $list0['contact'] ?></td></tr>
<tr><td>GENDER ::</td><td><?php echo $list0['gender'] ?></td></tr>

</table>


</body>
</html>