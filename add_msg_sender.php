<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
	require_once("dbcon.php");
	require_once("php_functions.php");
	
	if(isset($_REQUEST['S%SDkM'])){
	$add_sender_username=decryptStringArray($_REQUEST['S%SDkM']);
	if(isset($_SESSION["add_msg_sender_session"])){
		
		$chk_fr_dup=false;
		$no_of_loop=$_SESSION["no_msg_sender_session"];
		$arr_sender=explode(" ^ ",$_SESSION["add_msg_sender_session"]);
		for($i=0;$i<$no_of_loop;$i++){
			if($arr_sender[$i]===$add_sender_username){
				$chk_fr_dup=true;}}
				
		if($chk_fr_dup!=true){
		$no_msg_sender=$_SESSION["no_msg_sender_session"]+1;
		unset($_SESSION["no_msg_sender_session"]);
		$_SESSION["no_msg_sender_session"]=$no_msg_sender;
		
		$msg_sender=$_SESSION["add_msg_sender_session"]." ^ ".$add_sender_username;
		unset($_SESSION["add_msg_sender_session"]);
		$_SESSION["add_msg_sender_session"]=$msg_sender;
		header("location: new_message.php");
		}else{header("location: new_message.php");}
		}
	else{
		$no_msg_sender=1;
		$_SESSION["no_msg_sender_session"]=$no_msg_sender;
		
		$msg_sender=$add_sender_username;
		$_SESSION["add_msg_sender_session"]=$msg_sender;
		header("location: new_message.php");
		}	
	}
?>



<body>
</body>
</html>