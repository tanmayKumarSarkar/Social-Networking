<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
require_once("dbcon.php");
require_once("php_functions.php");

if((isset($_SESSION["username"])) && (isset($_SESSION["password"]))){

	$username=$_SESSION["username"];
	$password=$_SESSION["password"];


if((isset($_SESSION["add_msg_sender_session_chat"]))){
	
if(isset($_REQUEST['txtmsg'])){
	$txtmsg=addslashes($_REQUEST['txtmsg']);
	
	$Reciverusername=$_SESSION["add_msg_sender_session_chat"];
	date_default_timezone_set('Asia/Calcutta');		
	$currDate=date("Y-m-d H:i:s");	  
	$query1MsgSnd = "insert into `message` (`messageid`, `sender`, `reciever`, `msgbody`, `sendingdate`, `status`)								values (NULL,'$username','$Reciverusername','$txtmsg','$currDate','0')";
   		$result1MsgSnd = mysql_query($query1MsgSnd, $conn);
   	
		}
	}

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