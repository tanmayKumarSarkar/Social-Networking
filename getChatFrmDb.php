<?php session_start(); ?>
<?php 
require_once("dbcon.php");
require_once("php_functions.php");
if((isset($_SESSION["username"])) && (isset($_SESSION["password"]))){

	$username=$_SESSION["username"];
	$password=$_SESSION["password"];


if((isset($_SESSION["add_msg_sender_session_chat"]))){
if(isset($_SESSION["msg_sender_session_chat_Idd"])){	
	$Sndr_username=$_SESSION["add_msg_sender_session_chat"];
	$Sndr_userMgid=$_SESSION["msg_sender_session_chat_Idd"];


	 if(isset($_GET['chat'])) {
	
		 $sql_Sndr = "SELECT `messageid`, `sender`,`reciever`, `msgbody`,`sendingdate`,`viewingdate`,`status`
				FROM message WHERE (`sender`='$username' OR `reciever`='$username') AND 
				(`sender`='$Sndr_username' OR `reciever`='$Sndr_username') AND `messageid`>'$Sndr_userMgid' ";
		$result3msgs1=mysql_query($sql_Sndr, $conn);
		
		if (mysql_num_rows($result3msgs1) !== 0){
			while($list3msgs = mysql_fetch_assoc($result3msgs1)) {
			
?>  
<?php
if(($list3msgs['sender'])===$username){
 	$msg_sndr= $list3msgs['sender'];
	}
	if(($list3msgs['reciever'])===$username){
 	$msg_sndr= $list3msgs['sender'];
	}
?>
		
		
	
		
		<div id="msgChatBodyBox">
<div id="msgChatBodyBoxCntnt">
<span id="msgChatBodyBoxCntntNM">
 <?php
 	
 	$querySndrs="SELECT * FROM `members` WHERE `username`='$msg_sndr'";
 	$resultSndrs=mysql_query($querySndrs, $conn);
	$listSndrs = mysql_fetch_assoc($resultSndrs);
	echo substr_replace($listSndrs['fname'],strtoupper(substr($listSndrs['fname'],0,1)),0,1);
	
 ?>
 </span>
	&nbsp;:
<span id="spnmsgBD"><?php SmileyConvertToImg($list3msgs['msgbody']);?></span>
</div>
<div id="msgChatBodyBoxTime">
 <?php
 	$msgDtTm=date_create($list3msgs['sendingdate']);
  echo date_format($msgDtTm,"j M y, g:i:s a"); 
 ?>
 <?php
 if($list3msgs['status']=='1'){
	 echo '<span style="color:green" id="spanstsseeN">Seen</span>';}
 ?>
</div>    
	</div>
<?php
	unset($_SESSION["msg_sender_session_chat_Idd"]);
	$_SESSION["msg_sender_session_chat_Idd"]=$list3msgs['messageid'];
	
		}	}else{
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