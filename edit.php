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
click in the conjugate boxes and edit your profile<br>

<?php
require_once("dbcon.php");

	$mem_id=$_SESSION["mem_id"];
	$uquery= "SELECT * FROM `members` WHERE `mem_id`='$mem_id'";
  	$result0 = mysql_query($uquery, $conn);
  	$list0 = mysql_fetch_assoc($result0);
?>

  <form method="post" action="edit2.php">
<table align="center"  width="530" height="673" border="0" cellpadding="3" cellspacing="3">

<tr><td>USER NAME </td><td><input type="text" name="username" value="<?php echo $list0['username'] ?>"></td> </tr>
<tr><td>PASSWORD </td><td><input type="password" name="password" value="<?php echo $list0['password'] ?>"></td> </tr>
<tr><td>FIRST NAME </td><td><input type="text" name="fname" value="<?php echo $list0['fname'] ?>"></td> </tr>
<tr><td>LAST NAME </td><td><input type="text" name="lname" value="<?php echo $list0['lname'] ?>"></td> </tr>
<tr><td>ADDRESS </td><td><input type="text" name="address" value="<?php echo $list0['address'] ?>"></td> </tr>
<tr><td>EMAIL </td><td><input type="text" name="email" value="<?php echo $list0['email'] ?>"></td> </tr>
<tr><td>CONTACT NO. </td><td><input type="text" name="contact" value="<?php echo $list0['contact'] ?>"></td> </tr>
<tr>
  <td scope="row">GENDER ::</td>
  <td align="middle">male &nbsp;&nbsp;<input type="radio" name="gender" value="male" />
  					female &nbsp;&nbsp;<input type="radio" name="gender" value="female" /></td>
</tr>
<tr><td> </td><td><input type="hidden" name="mem_id" value="<?php echo $list0['mem_id'] ?>"></td> </tr>

<tr><td></td><td><input type="submit" value="save"></td></tr>

</table>


</body>
</html>