<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center"><a href="home.php">HOME</a></div>
  <?php
require_once("dbcon.php");

$mem_id=addslashes( $_POST['mem_id']);
$username=addslashes( $_POST["username"]);
$password=addslashes( $_POST["password"]);
$fname=addslashes( $_POST["fname"]);
$lname=addslashes( $_POST["lname"]);
$address=addslashes($_POST["address"]);
$email=addslashes( $_POST["email"]);
$contact=addslashes( $_POST["contact"]);
$gender=addslashes($_POST["gender"]);

$equery = "UPDATE  `social_NW`.`members` SET `username`='$username',`password`='$password' ,
	`fname`='$fname' ,`lname`='$lname',`address`='$address' ,`email`='$email',`contact`='$contact',
	`gender`='$gender' WHERE `members`.`mem_id`='$mem_id'";
  print "<br>";
  $result = mysql_query($equery, $conn);
  if (!$result ){
  die ("Unable to find any record");
  }
  echo "data updated successfully";
  
  
  $dquery= "SELECT * FROM `members` WHERE `mem_id`='$mem_id' ";
  $result2 = mysql_query($dquery, $conn);


  if (!$result2 ){
  die ("Unable to find any record");
  }
  

?>
<table cellpadding='5' cellspacing='5'>
	<?php
	$list1 = mysql_fetch_assoc($result2)
	?>
	<tr><td>USER NAME </td><td> ::</td><td><?php echo $list1['username'] ?></td></tr>
<tr><td>FIRST NAME </td><td> ::</td><td><?php echo $list1['fname'] ?></td></tr>
<tr><td>LAST NAME </td><td> ::</td><td><?php echo $list1['lname'] ?></td></tr>
<tr><td>ADDRESS </td><td> ::</td><td><?php echo $list1['address'] ?></td></tr>
<tr><td>EMAIL </td><td> ::</td><td><?php echo $list1['email'] ?></td></tr>
<tr><td>CONTACT NO. </td><td> ::</td><td><?php echo $list1['contact'] ?></td></tr>
<tr><td>GENDER </td><td> ::</td><td><?php echo $list1['gender'] ?></td></tr>
</table>

</body>
</html>