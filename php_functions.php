<?php
require_once("dbcon.php");
?>
<?php
function select_user(){
	if(isset($_POST["txtsearch"])){
	if(isset($_SESSION["select_user_session"])){
		unset($_SESSION["select_user_session"]);
		$_SESSION["select_user_session"]=$_POST["txtsearch"];
		header("location: select_user.php");}
	else{
		$_SESSION["select_user_session"]=$_POST["txtsearch"];
		header("location: select_user.php");}	
	}}
?>	
<?php
function destroy_select_user_session(){
	if(isset($_SESSION["select_user_session"])){
		unset($_SESSION["select_user_session"]);
		}
	}
?>
<?php
function destroy_add_msg_sender_session(){
	if(isset($_SESSION["add_msg_sender_session"])){
		unset($_SESSION["add_msg_sender_session"]);
		}
	}
?>
<?php
function decryptStringArray ($stringArray)
 {	
 	 $key = "My sec TaN";
    $s = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($stringArray, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
    return $s;
 }

 function encryptStringArray ($stringArray) 
 {
	$key = "My sec TaN"	;
    $s = strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), serialize($stringArray), MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_,');
    return $s;
 }
?>

<?php 
function textScrInput($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	}
?>
<?php
function SmileyConvertToImg($str){
	$ImgSmArr= array(
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
	);
	for ($i=0; $i<sizeof($ImgSmArr); $i++) {
   		 $tarr = split("@",$ImgSmArr[$i]);
	 	 $str=str_replace($tarr[0],'<img src="images/smilies/'.$tarr[1].'" width="20px" height="20px" >',$str);}
	echo $str;
	}
?>