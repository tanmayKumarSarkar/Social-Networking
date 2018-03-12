<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>new message</title>
<link href="css/new_message.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="javascript_functions.js"></script>
<style type="text/css">
</style></head>

<body>

<?php 
require_once("dbcon.php");
require_once("php_functions.php");

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
      <td><?php echo strtoupper( $list1def['fname'].' '.$list1def['lname']);  ?></td>
    </tr>
    <tr>
      <td>Works at</td>
    </tr>
    <tr>
      <td>Lives in <?php echo strtoupper( $list1def['address']) ?></td>
    </tr>
    <tr>
    <?php  ?>
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
  	<center><strong style="color:rgba(35,175,205,0.9)"> <?php require("number_of_friends.php"); ?></strong><br> friends</center>
</label>
</div>
</div>
<div id="topright">
<label id="activity" > Send Messages </label>

<label id="activity2" ><a href="select_user.php"> Add Another Friend(max 5)</a></label>
  <div id="mymessage"><center> My Messages</center></div>
  <div id="msg">
  <div id="msgto">
 <div id="divlblmsgto"> To: </div>
<?php
//echo $_SESSION["add_msg_sender_session"].$_SESSION["no_msg_sender_session"];
if((isset($_SESSION["add_msg_sender_session"])) && (isset($_SESSION["no_msg_sender_session"]))){
	
	$name_senders=explode(" ^ ",$_SESSION["add_msg_sender_session"]);
	
for($i=0;$i<($_SESSION["no_msg_sender_session"]);$i++){

?> 
  	<div id="msgtobox">
  <div id="msgtoname">
 <?php 
 	$querySndrs="SELECT * FROM `members` WHERE `username`='$name_senders[$i]'";
 	$resultSndrs=mysql_query($querySndrs, $conn);
	$listSndrs = mysql_fetch_assoc($resultSndrs);
	echo $listSndrs['fname'];
 ?>
  </div>
  <script>name_senders<?php echo $i?>=<?php echo json_encode($name_senders[$i]) ?> </script> 
  <div id="msgtobtn"  onclick="delete_msg_sender(name_senders<?php echo $i?>)">
  <input type="button" id="inpmsgtobtn" value="" />
  </div>
  	</div>
<?php }}else{
	header("location: select_user.php");	
	} ?>    
  </div>  
  <div id="msgbody">
    <form id="msgfrm" method="post" action="send_msg.php">
      <textarea type="text" name="txtmsg" id="txtmsg" maxlength="150" rows="4" cols="45" required="required" ></textarea> 
  <div id="btnsendcancel">	  
      <input type="submit" id="btnsend" value="Send"/>
      <a href="message.php"><input type="button" id="btncancel" value="Cancel" /></a>
  </div>    
  	</form>
   </div>
   </div>
  
</div>
<div id="midleft">
  <div id="infohead" align="center">INFORMATIONS</div>
  <div id="info"><ul id="ulinfo">
  <li>Relationship Status</li>
  <li>Hometown <?php echo $list1def['address'] ?></li>
  <li>Current Location</li>
  <li>Gender <?php echo $list1def['gender'] ?></li>
  <li>Education</li>
  <li>Work</li>
  <li>Friends</li>
  <li>Profile Views</li>
  <li>Last Updated Date</li>
  <li>Joined Date </li>
  </ul></div>
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