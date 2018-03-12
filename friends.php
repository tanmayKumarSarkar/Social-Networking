<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>friends</title>
<link href="css/friends.css" rel="stylesheet" type="text/css">
<style type="text/css">
</style></head>

<body>

<?php 
require_once("dbcon.php");

if((isset($_SESSION["username"])) && (isset($_SESSION["password"]))){
	$username=$_SESSION["username"];
	$password=$_SESSION["password"];
	$query1def="SELECT * FROM `members` WHERE `username`='$username' AND `password`='$password'";
	$result1def=mysql_query($query1def, $conn);
	$list1def = mysql_fetch_assoc($result1def);
	
	
	

?>

<div id="body">
<div id="head">
<div id="mnubar">
  <span id="home"><a href="home.php"> Home </a></span>
  <span id="myprofile"><a href="edit.php"> My Profile </a></span> 
  <span id="friends"><a href="friends.php"> Friends </a></span>
  <span id="updates"> Updates</span> 
  <span id="messages"> <a href="message.php"> Messages </a></span> 
  <span id="photos"> Photos</span> 
  <span id="settings"> Settings</span> 
  <span id="signout"><a href="logout.php"> Sign Out </a></span>
</div>

<div id="src">
  <form id="frmsrc" name="frmsrc" method="post" action="s_friend_r.php">
  <input name="txtsearch" type="text" id="txtsrc" maxlength="50" placeholder=" Search...." onfocus="value=''" required/>
  <input name="btnsrc" type="submit" id="btnsrc" value=""  />
  
  </form>
</div>
</div>

</div>
<div id="main">
<div id="topleft">
<div id="photo">
</div>
<div id="details">
  <table width="347" height="135" border="0" cellpadding="2" cellspacing="2">
    <tr>
      <td><?php echo strtoupper( $list1def['fname'].' '.$list1def['lname']); ?></td>
    </tr>
    <tr>
      <td>Works at</td>
    </tr>
    <tr>
      <td>Lives in <?php echo strtoupper( $list1def['address']) ?></td>
    </tr>
    <tr>
      <td>Date Of Birth <?php $DOBDt=date_create($list1def['DOB']); echo date_format($DOBDt,"j M Y"); ?></td>
    </tr>
    <tr>
      <td>Phone no <?php echo $list1def['contact'] ?></td>
    </tr>
  </table>
</div>
<div id="photobottom">
<a href="edit.php?mem_id=<?php echo $list1def['mem_id'];?>">
	 <em id="txtEMP"><img src="images/edit.gif" width="17" height="17" /> Edit My Profile </em> </a>
<label id="noFrnd" >
  	<center><strong style="color:rgba(35,175,205,0.9)">
    <?php require("number_of_friends.php"); ?>
    </strong><br> friends</center>
</label>
</div>
</div>
<div id="topright">
<label id="activity" > Search Your Friends </label>
  <div id="myfrnd"><center> My Friends</center></div> 
<div id="fsearch">
  <form id="frmsearch" method="post" action="s_friend_r.php">
    <input type="search" name="txtsearch" id="txtsearch" maxlength="50" placeholder="Search Your Friends" required/>
    <input name="btnsearch" id="btnsearch" type="submit" value="Search Friends" />
  </form>
</div>
<label id="lblntf" > Friend Request Notifications  </label>
<label id="lblfrndlist" > Friend List </label>
<div id="pnlfrnd">
<div id="frndntf">
<?php
	$query1ntf="SELECT * FROM `friends` WHERE `receiver`='$username' AND `accept`='no'";
	$result1ntf=mysql_query($query1ntf, $conn);
	if(mysql_num_rows($result1ntf) == 0) {
		echo "There are no requests";}
	else	{
	  while ($list1ntf = mysql_fetch_assoc($result1ntf)) {
		    $acceptusername=$list1ntf['sender'];
		  
		    $query2ntf="SELECT * FROM `members` WHERE `username`='$acceptusername'";
			$result2ntf=mysql_query($query2ntf, $conn);
			$list2ntf = mysql_fetch_assoc($result2ntf);
?>
	<div id="frndntfbox">
<div id="frndntfphoto"></div>
<div id="frndntfname">
<?php echo $list2ntf['fname']." ".$list2ntf['lname'];?>
</div>
<div id="frndntfstatus"> 
<?php
   $query3ntf = "SELECT * FROM `friends` WHERE `sender`='$acceptusername' AND `receiver`='$username' AND `accept`='yes'";
   $result3ntf = mysql_query($query3ntf, $conn);
   if(mysql_num_rows($result3ntf) !== 0){
	   	echo 'friend request accepted';}				
	else{
   ?> 
    <a href="accept_req.php?fname=<?php echo $list2ntf['fname'];?>&lname=<?php echo $list2ntf['lname'];?>">+Accept+</a> 
   <?php } ?>
</div>
	</div>
 
<?php }} ?>
</div>
<div id="frndlist">
<?php
	$query8list="SELECT * FROM `friends` WHERE `receiver`='$username' AND `accept`='yes'";
	$result8list=mysql_query($query8list, $conn);

	$query9list="SELECT * FROM `friends` WHERE `sender`='$username' AND `accept`='yes'";
	$result9list=mysql_query($query9list, $conn);
	if (mysql_num_rows($result8list) === 0 && mysql_num_rows($result9list) === 0) {
		echo "you have no friends, search for friends to add new friends"; }
?>
<?php
	if (mysql_num_rows($result8list) !== 0) {
	while($list8list = mysql_fetch_assoc($result8list)) {
			$s_username=$list8list['sender'];
		  
		  	$query8_1list="SELECT * FROM `members` WHERE `username`='$s_username'";
			$result8_1list=mysql_query($query8_1list, $conn);
			$list8_1list = mysql_fetch_assoc($result8_1list);
			
?>
	<div id="frndlistbox">
<div id="frndlistphoto">
</div>
<div id="frndlistname">
<?php echo $list8_1list['fname']." ".$list8_1list['lname'];?>
</div>
	</div>
<?php } } ?>  
    
<?php
	if (mysql_num_rows($result9list) !== 0) {
	while($list9list = mysql_fetch_assoc($result9list)) {
			$r_username=$list9list['receiver'];
		  
		  	$query9_1list="SELECT * FROM `members` WHERE `username`='$r_username'";
			$result9_1list=mysql_query($query9_1list, $conn);
			$list9_1list = mysql_fetch_assoc($result9_1list);
			
?>
 	<div id="frndlistbox">
<div id="frndlistphoto">
</div>
<div id="frndlistname">
<?php echo $list9_1list['fname']." ".$list9_1list['lname'];?>
</div>
	</div>   
<?php } } ?>    
</div>

</div>
</div>
<div id="midleft">
  <div id="sugghead" align="center"> Suggestions </div>
  <div id="suggbod">
  <div id="sugphoto"></div>
  <div id="sugname"></div>
  <div id="sugstatus"></div>
  </div>
  <label id="moresug"> More Suggestions >> </label>
</div>

</div>

<?php  }
else{
	$_SESSION["LoggedOut"]="AlreadyLoggedOut";
	session_write_close();
	header("location: index.php");				
	exit();
	}
	
 ?>
</body>
</html>