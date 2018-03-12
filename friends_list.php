<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.lof{
	height:auto;
	width:220px;
	position:relative;
	border-radius:3px;
	border-bottom:groove #069 4px;
	border-right:groove #30C 3px;
	border-top:inset #CA9BE3 2px;
	border-left:groove #CCBCE7 1px;
	background:#71CEC5;
	
}
.photo{
	height:100px;
	width:100px;
	position:relative;
	float:left;
}
</style>
</head>

<body>

<?php 
require_once("dbcon.php");

$username=$_SESSION["username"];

$query8="SELECT * FROM `friends` WHERE `receiver`='$username' AND `accept`='yes'";
$result8=mysql_query($query8, $conn);

$query9="SELECT * FROM `friends` WHERE `sender`='$username' AND `accept`='yes'";
$result9=mysql_query($query9, $conn);
	if (mysql_num_rows($result8) === 0 && mysql_num_rows($result9) === 0) {
		echo "you have no friends search for friends to add new friends"; }
?>

<?php
	if (mysql_num_rows($result8) !== 0) {
		while($list8 = mysql_fetch_assoc($result8)) {
			 $s_username=$list8['sender'];
		  
		  $query8_1="SELECT * FROM `members` WHERE `username`='$s_username'";
			$result8_1=mysql_query($query8_1, $conn);
			$list8_1 = mysql_fetch_assoc($result8_1);
			
?>
	<div class="lof" >
<table width="218" height="156" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td width="100" height="104">
    <div class="photo">

    </div></td>
   <td width="104"><span class=""></span></td>
    </tr>
  <tr>
    <td colspan="2" height="38"><?php echo $list8_1['fname']." ".$list8_1['lname'];?></td>
    
    </tr>
  </table>
</div>
<?php } } ?>
	
<?php
	if (mysql_num_rows($result9) !== 0) {
		while($list9 = mysql_fetch_assoc($result9)) {
			 $r_username=$list9['receiver'];
		  
		  $query9_1="SELECT * FROM `members` WHERE `username`='$r_username'";
			$result9_1=mysql_query($query9_1, $conn);
			$list9_1 = mysql_fetch_assoc($result9_1);
			
?>
	<div class="lof" >
<table width="218" height="156" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td width="100" height="104">
    <div class="photo">

    </div></td>
   <td width="104"><span class=""></span></td>
    </tr>
  <tr>
    <td colspan="2" height="38"><?php echo $list9_1['fname']." ".$list9_1['lname'];?></td>
    
    </tr>
  </table>
</div>
<?php } } ?>
	
</body>
</html>