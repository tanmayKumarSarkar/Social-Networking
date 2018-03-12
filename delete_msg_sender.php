<?php session_start(); ?>
<?php
	require_once("dbcon.php");
	if(isset($_REQUEST['p_tomsgsndr'])){
		$del_sndr=$_REQUEST['p_tomsgsndr'];
		
		if(isset($_SESSION["add_msg_sender_session"])){
			
		if($_SESSION["no_msg_sender_session"]==1){
			unset($_SESSION["add_msg_sender_session"]);
			unset($_SESSION["no_msg_sender_session"]);
		}else{
			$no_of_loop=$_SESSION["no_msg_sender_session"];
		$arr_sender=explode(" ^ ",$_SESSION["add_msg_sender_session"]);
		for($i=0;$i<$no_of_loop;$i++){//echo "counterS ";
			if($arr_sender[$i]===$del_sndr){//echo "counterFND ";
				if(($key = array_search($del_sndr,$arr_sender))!==false){
					unset($arr_sender[$key]);}
				$msg_sender=implode(" ^ ", $arr_sender);
				unset($_SESSION["add_msg_sender_session"]);
				$_SESSION["add_msg_sender_session"]=$msg_sender;
		
				$no_msg_sender=$_SESSION["no_msg_sender_session"]-1;
				unset($_SESSION["no_msg_sender_session"]);
				$_SESSION["no_msg_sender_session"]=$no_msg_sender;
				//echo $_SESSION["add_msg_sender_session"].$_SESSION["no_msg_sender_session"];
				}//echo "counterE ";
			}
				
		}	
?>


<div id="msgto">
 <div id="divlblmsgto"> To: </div>
<?php
//echo $_SESSION["add_msg_sender_session"].$_SESSION["no_msg_sender_session"];
if((isset($_SESSION["add_msg_sender_session"])) && (isset($_SESSION["no_msg_sender_session"]))){
	
	$name_senders=explode(" ^ ",$_SESSION["add_msg_sender_session"]);
	
for($i=0;$i<($_SESSION["no_msg_sender_session"]);$i++){

?> 
  	<div id="msgtobox">
  <div id="msgtoname"><?php  echo $name_senders[$i] ; ?>
  </div>
  <script>name_senders<?php echo $i?>=<?php echo json_encode($name_senders[$i]) ?> </script> 
  <div id="msgtobtn"  onclick="delete_msg_sender(name_senders<?php echo $i?>)">
  <input type="button" id="inpmsgtobtn" value="" />
  </div>
  	</div>
<?php }}else{
	echo "No Friends Selected";	
	} ?>    
  </div> 
  
   
<?php		
	}
}
?>	