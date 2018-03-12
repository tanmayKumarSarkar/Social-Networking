<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center"><a href="">HOME</a></div>
  
  <?php
require_once("dbcon.php");


$username=addslashes( $_POST["username"]);
$password1=addslashes( $_POST["password1"]);
$password2=addslashes( $_POST["password2"]);
$fname=addslashes( $_POST["fname"]);
$lname=addslashes( $_POST["lname"]);
$address=addslashes($_POST["address"]);
$email=addslashes( $_POST["email"]);
$contact=addslashes( $_POST["contact"]);
$gender=addslashes($_POST["gender"]);
$dob_day=addslashes($_POST["dob_day"]);
$dob_month=addslashes($_POST["dob_month"]);
$dob_year=addslashes($_POST["dob_year"]);


$query0="SELECT * FROM `members` WHERE `username`='$username'";
$result0=mysql_query($query0, $conn);
	if(mysql_num_rows($result0) > 0) {
		echo "user name already exist !!!! <br> use another username and <a href='new_user.html'> try again</a>";

	}
	else	{

/*  $query1="CREATE TABLE IF NOT EXISTS `$username` (
   `mem_id` int(11) NOT NULL AUTO_INCREMENT,
   `username` varchar(30) NOT NULL,  
   `password` varchar(30) NOT NULL,  
   `fname` varchar(30) NOT NULL,  
   `lname` varchar(30) NOT NULL,  
   `address` varchar(100) NOT NULL,
   `email` varchar(100) NOT NULL,  
   `contact` varchar(30) NOT NULL,  
   `picture` varchar(100) NOT NULL,  
   `gender` varchar(10) NOT NULL,  
    PRIMARY KEY (`mem_id`))";
   $result1 = mysql_query($query1, $conn); 
*/   
   
   $query2 = "insert into `members` (`mem_id`,`username`,`password`,`fname`,`lname`,`address`,`DOB`,`email`,`contact`,`gender`) 
      values 
	  (NULL,'$username','$password1','$fname','$lname','$address','$dob_year-$dob_month-$dob_day','$email','$contact','$gender')";
   $result2 = mysql_query($query2, $conn);
   
   
/*   $query3 = "insert into `$username`(
     `mem_id`,`username`,`password`,`fname`,`lname`,`address`,`email`,`contact`,`gender`) 
      values (NULL,'$username','$password1','$fname','$lname','$address','$email','$contact','$gender')";
	$result3 = mysql_query($query3, $conn);
*/	
	
/*	$query4 = "SELECT * FROM `$username`";
	$result4 = mysql_query($query4, $conn);
*/

	$query5="SELECT * FROM `members` WHERE `username`='$username' AND `password`='$password1'";
	$result5=mysql_query($query5, $conn);
  
  echo " WELCOME"." ".$fname." ".$lname."<br>you have registered successfully";
?>
  
<table cellpadding='5' cellspacing='5'>
	<?php
	
	while ($list1 = mysql_fetch_assoc($result5)) {
		echo "<tr>";
		echo "<td>USER NAME ::</td><td>".$list1['username']."</td>";
		echo "<td>FIRST NAME ::</td><td> ".$list1['fname']."</td>";
		echo "<td>LAST NAME ::</td><td>".$list1['lname']."</td>";
		echo "<td>ADDRESS ::</td><td>".$list1['address']."</td>";
		echo "<td>DATE OF BIRTH ::</td><td>".$list1['DOB'].""."</td>";
		echo "<td>EMAIL ::</td><td>".$list1['email']."</td>";
		echo "<td>CONTACT NO. ::</td><td>".$list1['contact']."</td>";
		echo "<td>GENDER ::</td><td>".$list1['gender']."</td>";
		echo "</tr>";
		  }
	}
	?>
</table>

</body>
</html>