<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/Styl_for_chatSys.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="javascript_functions.js"></script>
<script src="JS/jquery.min.js"></script>
<style></style>
<script>
setInterval(function(){
	$('#ChatBody').load('./FriendsFrame.php #ChatBody').fadeIn("slow");
	},4000);
		
</script>
</head>
<?php
require_once("dbcon.php");
if((isset($_SESSION["username"])) && (isset($_SESSION["password"]))){

	$username_FL=$_SESSION["username"];}$i=0;$j=0;
	
?>	
<div id="ChatBoxBody">
<div id="ChatBody"><div id="ChatBodyscrlbr">
<?php $IndexNoOfFrnd=0;?>
<?php
	$queryFrndsLst="SELECT * FROM `friends` WHERE (`receiver`='$username_FL' OR `sender`='$username_FL') AND `accept`='yes'";
	$resultFrndLst=mysql_query($queryFrndsLst,$conn);
	if (mysql_num_rows($resultFrndLst) !== 0){
	while($ListFrndLst = mysql_fetch_assoc($resultFrndLst)) {
		if($username_FL==$ListFrndLst['receiver']){
			$FR_username_FL=$ListFrndLst['sender'];
			}else{
			$FR_username_FL=$ListFrndLst['receiver'];}
			
		$prevDT=date("0-0-0 0:0:0");
		$queryOnlineFriend="SELECT * FROM `onlineusers` WHERE `logouttime`='$prevDT' AND `username`='$FR_username_FL'
							AND `loginstatus`='1' ";
		$resultOnlineFriend=mysql_query($queryOnlineFriend,$conn);
		
		//echo $i++." ".$FR_username_FL." ";
		
		if (mysql_num_rows($resultOnlineFriend) !== 0){
	while($listOnlineFriend = mysql_fetch_assoc($resultOnlineFriend)) {
				
				
		//echo "<br>".$j++." ".$FR_username_FL." ";
		
			$FR_name=$listOnlineFriend['username'];
		  	$queryFR_name="SELECT * FROM `members` WHERE `username`='$FR_name'";
			$resultFR_name=mysql_query($queryFR_name, $conn);
			$listFR_name = mysql_fetch_assoc($resultFR_name);
?>

<?php
		print '<div id="frndbox" onclick=OpnFrndChatBx('.json_encode($FR_name).') >';
?>    
<div id="frndBxPhoto">
</div>
<div id="frndBxName"> 
&nbsp;<?php echo substr_replace($listFR_name['fname'],strtoupper(substr($listFR_name['fname'],0,1)),0,1)." ".
substr_replace($listFR_name['lname'],strtoupper(substr($listFR_name['lname'],0,1)),0,1); ?>
</div>
<div id="frndBxStatus">
<div id="frndBxStatusShape">
</div>
</div>
 		</div>

<?php 
 } }
		}} 
?>
</div></div>

</div>
</html>