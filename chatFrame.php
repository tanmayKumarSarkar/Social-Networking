<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/Styl_for_chatSys.css" rel="stylesheet" type="text/css">
<script src="JS/jquery.min.js"></script>
<script type="text/javascript" src="javascript_functions.js"></script>
<script>
$(document).ready(function () {
	
    $('#mainChatBodyTextIp').keydown(function (event) { // your input(textarea) class
        if (event.keyCode == 13) {
			if(document.getElementById('mainChatBodyTextIp').value.length>0){
            event.preventDefault();
			var chttyp=1;
            $.ajax({
                url: "send_msg_chat.php", // script to process data
                type: 'POST',
                data: $("#mainChatBodyTextFrm").serialize(), // form ID
				async:true,
     			cache:false,
                success: function() {
                  // $('#msgChatBody').load('./chatFrame.php #msgChatBody').fadeIn("slow"); 
				   //getChatFrmDbJ();
				   document.getElementById('mainChatBodyTextIp').value="";
				   setScrollHgt();
                }
			});
        }}
    });
});

function setScrollHgt(){
	//var scrolltoh = $('#scrollChatBody')[0].scrollHeight; $('#scrollChatBody').scrollTop(scrolltoh);
	document.getElementById('scrollChatBody').scrollTop = document.getElementById('scrollChatBody').scrollHeight;
	}
</script>
<?php 

?>
<style type="text/css"></style>
<script>
$(function() {
  $("#mainChatBodyHeadNm").click(function() {
	  
	 if(window.parent.document.getElementById("CHTUser").style.visibility="visible"){
		
		 window.parent.document.getElementById("CHTUser").style.visibility="hidden";
		 window.parent.document.getElementById("CHTUserMin").style.visibility="visible";
		 }
  });
}); 

$(function() {
  $("#mainChatBodyHeadCls").click(function() { 
  	window.parent.document.getElementById('divChat').style.display='none';
	//window.parent.document.getElementById('divChat').parentNode.removeChild(dv);
  });
}); 

setInterval(function(){
	//$('#msgChatBody').load('./chatFrame.php #msgChatBody').fadeIn("slow");
	//$('#mainChatBodyHeadNm').load('./chatFrame.php #mainChatBodyHeadNm').fadeIn("slow");
	getChatFrmDbJ();
	},2000);

	
/*$(function() {
  $("#imgsmly").click(function() { 
  
  	document.getElementById('smiliblock').style.display='block';

  });
});	*/

$(document).on('click', function(eh) {
    SWhideDiv(eh);
});
function SWhideDiv(eh) {
	if($(eh.target).is('#imgsmly')){
		document.getElementById('smiliblock').style.display='block';
		}
     else if(!$(eh.target).is('#smiliblock') && !$(eh.target).parents().is('#smiliblock') && (document.getElementById('smiliblock').style.display='block')) {
        document.getElementById('smiliblock').style.display='none';}
}

function insertSmiley(smiley){
	document.getElementById('smiliblock').style.display='none';
	var currentText = document.getElementById('mainChatBodyTextIp').value;
	var smileyWithPadding = " " + smiley + " ";
    currentText += smileyWithPadding;
    document.getElementById('mainChatBodyTextIp').value=currentText;
	document.getElementById('mainChatBodyTextIp').focus();
	}
	 
/*function SmileyConvertToImg(str) {
	var ImgSmArr= [
		':;)@winking.png',
		':X(@angry.png',
		':D@bigGreen.png',
		':-/@confused.png',
		':-)@cool.png',
		':((@crying.png',
		':)@happy.png',
		':I@impressed.png',
		':X@inLove.png',
		':-O@surprised.png',
		':(|@sleepy.png',
		':-*@kissed.png',
		':P@tongue.png',
		':-W@woo.png',
		':-M@mistry.png',
		':(@sad.png'	
	];
	
	for (i=0; i<ImgSmArr.length; i++) {
   		 tarr = ImgSmArr[i].split('@');
	 	 str=str.replace(tarr[0],'<img src="images/smilies/'+tarr[1]+'" >');}
	return str;
	//document.getElementById('spnmsgBD').innerHTML=str;
}*/

</script>


<?php
require_once("dbcon.php");
require_once("php_functions.php");

if((isset($_SESSION["username"])) && (isset($_SESSION["password"]))){
	
	if(isset($_REQUEST['ONto_msgsndr'])){
		unset($_SESSION["add_msg_sender_session_chat"]);
		unset($_SESSION["msg_sender_session_chat_Idd"]);
		$_SESSION["add_msg_sender_session_chat"]=$_REQUEST['ONto_msgsndr'];}
		$username=$_SESSION["username"];

?>	

<div id="mainChatBody">
<div id="mainChatBodyHead">
<?php $sndrMsg=$_SESSION["add_msg_sender_session_chat"]; ?>
<div id="mainChatBodyHeadNm">
<?php
	$querySndrsc="SELECT * FROM `members` WHERE `username`='$sndrMsg'";
 	$resultSndrsc=mysql_query($querySndrsc, $conn);
	$listSndrsc = mysql_fetch_assoc($resultSndrsc);
	echo substr_replace($listSndrsc['fname'],strtoupper(substr($listSndrsc['fname'],0,1)),0,1);
?>	
</div>
<div id="mainChatBodyHeadCls"></div>
</div>
<div id="msgChatBody">
<div id="scrollChatBody" >

<?php  	
	$query3msgs="SELECT * FROM `message` WHERE (`sender`='$username' OR `reciever`='$username') AND (`sender`='$sndrMsg' OR `reciever`='$sndrMsg') ";
	$result3msgs=mysql_query($query3msgs, $conn);
	if (mysql_num_rows($result3msgs) !== 0){
	while($list3msgs = mysql_fetch_assoc($result3msgs)) {
			
?>  
<?php
if(($list3msgs['sender'])===$username){
 	$msg_sndr= $list3msgs['sender'];
	//$backGRNDclr='rgba(177,135,248,0.5)';
	}
	if(($list3msgs['reciever'])===$username){
 	$msg_sndr= $list3msgs['sender'];
	//$backGRNDclr="rgba(125,242,196,0.6)";
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
<?php
	unset($_SESSION["msg_sender_session_chat_Idd"]);
	$_SESSION["msg_sender_session_chat_Idd"]=$list3msgs['messageid'];
 ?>
 
</div>    
	</div>
<?php
	
	}	}
?>	
</div>
</div>
<script>function focustextBX(){document.getElementById('mainChatBodyTextIp').focus();} setScrollHgt(); </script>
<div id="mainChatBodyText" onmousemove="focustextBX()">
<form id="mainChatBodyTextFrm" action="" method="post">
<input type="text" id="mainChatBodyTextIp" name="txtmsg" maxlength="150" required="required" />
<input type="submit" hidden="" />
</form>
	<img id="imgsmly" src="images/smilies/happy.png" width="32" height="32" />
<div id="smiliblock">
  <table width="128" border="0">
  <tr>
    <td width="32"><img src="images/smilies/winking.png" width="32" height="32" onclick="insertSmiley(':;)')" /></td>
    <td width="32"><img src="images/smilies/angry.png" width="32" height="32" onclick="insertSmiley(':X(')" /></td>
    <td width="32"><img src="images/smilies/bigGreen.png" width="32" height="32" onclick="insertSmiley(':D')" /></td>
    <td width="32"><img src="images/smilies/confused.png" width="32" height="32" onclick="insertSmiley(':-/')" /></td>
  </tr>
  <tr>
    <td><img src="images/smilies/cool.png" width="32" height="32" onclick="insertSmiley(':-)')" /></td>
    <td><img src="images/smilies/crying.png" width="32" height="32" onclick="insertSmiley(':((')" /></td>
    <td><img src="images/smilies/happy.png" width="32" height="32" onclick="insertSmiley(':)')" /></td>
    <td><img src="images/smilies/impressed.png" width="32" height="32" onclick="insertSmiley(':I)')" /></td>
  </tr>
  <tr>
    <td><img src="images/smilies/inLove.png" width="32" height="32" onclick="insertSmiley(':X')" /></td>
    <td><img src="images/smilies/surprised.png" width="32" height="32" onclick="insertSmiley(':-O')" /></td>
    <td><img src="images/smilies/sleepy.png" width="32" height="32" onclick="insertSmiley(':(|')" /></td>
    <td><img src="images/smilies/kissed.png" width="32" height="32" onclick="insertSmiley(':-*')" /></td>
  </tr>
  <tr>
    <td height="35"><img src="images/smilies/tongue.png" width="32" height="32" onclick="insertSmiley(':P')" /></td>
    <td><img src="images/smilies/woo.png" width="32" height="33" onclick="insertSmiley(':-W')" /></td>
    <td><img src="images/smilies/mistry.png" width="32" height="32" onclick="insertSmiley(':-M')" /></td>
    <td><img src="images/smilies/sad.png" width="32" height="32" onclick="insertSmiley(':(')" /></td>
  </tr>
</table>

	</div>

</div>
</div>
<?php  } ?>

</html>