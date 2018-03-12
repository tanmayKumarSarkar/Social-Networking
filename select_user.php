<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>select user</title>
<script type="text/javascript" src="javascript_functions.js"></script>
<link href="css/select_user.css" rel="stylesheet" type="text/css">
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
	
	
if(isset($_SESSION["select_user_session"])){
	
	$txtsearch=addslashes( $_SESSION["select_user_session"]);
	if(strpos($txtsearch," ") >0){
		$resultstr=split(" ",$txtsearch);
		$fname=$resultstr[0];
		$lname=$resultstr[1];

		$query0search="SELECT * FROM `members` WHERE `fname` LIKE '$fname%' AND `lname` LIKE '$lname%'";
		$result0search=mysql_query($query0search, $conn);
		}
	else{
		$query0search="SELECT * FROM `members` WHERE `fname` LIKE '$txtsearch%'";
		$result0search=mysql_query($query0search, $conn);
		}
	}
	
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
      <td>Date Of Birth <?php echo $list1def['DOB']; ?></td>
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
<label id="activity" > Select Friend </label>
  <div id="mymessage"><center> Send Messages</center></div>
  <div id="user">
<div id="fsearch">
  <form id="frmsearch" method="post" action="<?php select_user(); ?>">
    <input type="search" name="txtsearch" id="txtsearch" maxlength="50" placeholder="Search Your Friends" required/>
    <input name="btnsearch" id="btnsearch" type="submit" value="Search Friends" />
  </form>
</div>
  </div>
  <div id="msg">
<?php
if(isset($_SESSION["select_user_session"])){
	if(mysql_num_rows($result0search) == 0) {
		echo "No Match Found !!!! <br> Try Another Name ";
		}
	else{
		while ($list0search = mysql_fetch_assoc($result0search)) {
			$addusername=$list0search['username'];
			if($username!==$addusername){
?>  
  	<div id="msgbox">
  <div id="msgphoto">
  </div>
  <div id="msgname"> <?php echo $list0search['fname']." ".$list0search['lname'];?>
   <a href="add_msg_sender.php?S%SDkM=<?php echo encryptStringArray($list0search['username']) ?>">
   <input type="button" id="btnmsgname" value="OK" /> </a>
  </div>
  	</div>
<?php }}}} ?>     
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