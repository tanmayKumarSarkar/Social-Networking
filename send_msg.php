<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
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
<?php
if((isset($_SESSION["add_msg_sender_session"])) && (isset($_SESSION["no_msg_sender_session"]))){
	$name_senders=explode(" ^ ",$_SESSION["add_msg_sender_session"]);
if(isset($_REQUEST['txtmsg'])){
	$txtmsg=addslashes($_REQUEST['txtmsg']);
	
	for($i=0;$i<($_SESSION["no_msg_sender_session"]);$i++){
		
		$query0MsgSnd="SELECT * FROM `members` WHERE `username`='$name_senders[$i]'";
		$result0MsgSnd=mysql_query($query0MsgSnd, $conn);
		if(mysql_num_rows($result0MsgSnd) == 0) {
			echo "No match found ";
		}else{
	 		while ($list0MsgSnd = mysql_fetch_assoc($result0MsgSnd)) {
		 	$Reciverusername=$list0MsgSnd['username'];
	date_default_timezone_set('Asia/Calcutta');		
	$currDate=date("Y-m-d H:i:s");	  
	$query1MsgSnd = "insert into `message` (`messageid`, `sender`, `reciever`, `msgbody`, `sendingdate`, `status`)								values (NULL,'$username','$Reciverusername','$txtmsg','$currDate','0')";
   		$result1MsgSnd = mysql_query($query1MsgSnd, $conn);
   	if($result1MsgSnd){
	   	echo 'message sent';echo $currDate;
		
		header("location: message.php");		
		unset($_SESSION["add_msg_sender_session"]);
		unset($_SESSION["no_msg_sender_session"]);
		
	}else{echo "message cannot sent try again";}
		}
	}
		
	}
}}
?>
<?php  }else{
	$_SESSION["LoggedOut"]="AlreadyLoggedOut";
	session_write_close();
	header("location: index.php");				
	exit();
	} 
 ?>
</body>
</html>