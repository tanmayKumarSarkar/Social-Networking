<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
	function idfocus(){
		var id=document.getElementById("txtid");
		id.style.background="#BFFCFF";
		}
	function idblur(){
		var id=document.getElementById("txtid");
		if (id.value == '') {
			id.style.background="#F4F4F4 url(images/userid.png) no-repeat left center"}
			else{
				id.style.background="#BFFCFF";}
		}	
	function pwdfocus(pwd){
		pwd.style.background="#BFFCFF";
		}
	function pwdblur(pwd){
		if (pwd.value == '') {
			pwd.style.background="#F4F4F4 url(images/userpwd.png) no-repeat left center"}
			else{
				pwd.style.background="#BFFCFF";}
		}
			

</script>

<style type="text/css">
#main {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 25px;
	font-style: italic;
	font-weight: 100;
	color: #00CC00;
	text-decoration: none;
	background-color: #E0FACF;
	letter-spacing: 2px;
	word-spacing: 5px;
	padding: 20px;
	padding-right:0px;
	height: 490px;
	width: 1105px;
	z-index: 1000;
	margin-top: 0px;
	margin-left: 110px;
	visibility: inherit;
}
#panel {
	background-color: #FFF;
	height: 180px;
	width: 400px;
	margin-top: 20px;
	margin-left: 340px;
	padding-top: 100px;
	padding-right: 20px;
	padding-bottom: 20px;
	padding-left: 20px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: inset;
	border-right-style: inset;
	border-bottom-style: inset;
	border-left-style: inset;
	border-top-color: #68E234;
	border-right-color: #68E234;
	border-bottom-color: #68E234;
	border-left-color: #68E234;
	text-align: center;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
	-webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
	-moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
	box-shadow: rgba(0,0,0,1) 0 1px 0;
	text-shadow: rgba(0,0,0,0.1) 0 1px 0;
	border-top: 1px solid #69DEA7;
background: -moz-linear-gradient(45deg,  rgba(163,245,159,1) 0%, rgba(163,245,159,0.91) 6%, rgba(167,255,113,0.49) 35%, rgba(161,254,120,0.42) 40%, rgba(121,247,166,0.42) 71%, rgba(109,245,179,0.6) 80%, rgba(115,237,97,0.94) 97%, rgba(115,237,97,1) 100%); 
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%,rgba(163,245,159,1)), color-stop(6%,rgba(163,245,159,0.91)), color-stop(35%,rgba(167,255,113,0.49)), color-stop(40%,rgba(161,254,120,0.42)), color-stop(71%,rgba(121,247,166,0.42)), color-stop(80%,rgba(109,245,179,0.6)), color-stop(97%,rgba(115,237,97,0.94)), color-stop(100%,rgba(115,237,97,1))); 
background: -webkit-linear-gradient(45deg,  rgba(163,245,159,1) 0%,rgba(163,245,159,0.91) 6%,rgba(167,255,113,0.49) 35%,rgba(161,254,120,0.42) 40%,rgba(121,247,166,0.42) 71%,rgba(109,245,179,0.6) 80%,rgba(115,237,97,0.94) 97%,rgba(115,237,97,1) 100%);
background: -o-linear-gradient(45deg,  rgba(163,245,159,1) 0%,rgba(163,245,159,0.91) 6%,rgba(167,255,113,0.49) 35%,rgba(161,254,120,0.42) 40%,rgba(121,247,166,0.42) 71%,rgba(109,245,179,0.6) 80%,rgba(115,237,97,0.94) 97%,rgba(115,237,97,1) 100%);
background: -ms-linear-gradient(45deg,  rgba(163,245,159,1) 0%,rgba(163,245,159,0.91) 6%,rgba(167,255,113,0.49) 35%,rgba(161,254,120,0.42) 40%,rgba(121,247,166,0.42) 71%,rgba(109,245,179,0.6) 80%,rgba(115,237,97,0.94) 97%,rgba(115,237,97,1) 100%);
background: linear-gradient(45deg,  rgba(163,245,159,1) 0%,rgba(163,245,159,0.91) 6%,rgba(167,255,113,0.49) 35%,rgba(161,254,120,0.42) 40%,rgba(121,247,166,0.42) 71%,rgba(109,245,179,0.6) 80%,rgba(115,237,97,0.94) 97%,rgba(115,237,97,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a3f59f', endColorstr='#73ed61',GradientType=1 );
}
#top {
	background-color: #7BE13E;
	height: 28px;
	width: 405px;
	position: fixed;
	z-index: 1500;
	left: 463px;
	top: 180px;
	font-family: "Times New Roman", Times, serif;
	font-size: 24px;
	color: #FFF;
	font-weight: 300;
	font-style: italic;
	letter-spacing: 3px;
	word-spacing: 8px;
	padding-top: 3px;
	padding-right: 3px;
	padding-left: 50px;
	border-top-width: 1px;
	border-right-width: 1px;
	border-bottom-width: 1px;
	border-left-width: 2px;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: inset;
	border-top-color: #5CCF25;
	border-right-color: #5CCF25;
	border-bottom-color: #5CCF25;
	border-left-color: #5CCF25;
	-webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
	-moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
	box-shadow: rgba(0,0,0,1) 0 1px 0;
	text-shadow: rgba(0,0,0,.4) 0 1px 0;
}
#triangle-topright {
	width: 0px;
	height: 0px;
	border-top: 17px solid #58A637;
	border-left: 17px solid transparent;
	position: fixed;
	left: 463px;
	top: 213px;
	z-index: 1400;
	
}

#txtid {
	font-family: "MS Serif", "New York", serif;
	background: #F4F4F4 url(images/userid.png) no-repeat left center;
	letter-spacing: 2px;
	padding-left: 5px;
	height: 21px;
	width:170px;
	border:1px groove #78BB35;
    border-radius:5px;
	-webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
	-moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
	box-shadow: rgba(0,0,0,1) 0 1px 0;
}
#txtpwd {
	background: #F4F4F4 url(images/userpwd.png) no-repeat left center;
	padding-left: 5px;
	height: 21px;
	width:170px;
	border:1px groove #78BB35;
    border-radius:5px;
	-webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
	-moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
	box-shadow: rgba(0,0,0,1) 0 1px 0;
}
#txtid:focus{ border:1px groove #FD4D39;}
#txtpwd:focus {border:1px groove #FD4D39;}

#btnlogin,#btnregister {
	 border-top: 1px solid #97f1f7;
  	 background: #65d488;
  	 background: -webkit-gradient(linear, left top, left bottom, from(#7fde25), to(#65d488));
  	 background: -webkit-linear-gradient(top, #7fde25, #65d488);
  	 background: -moz-linear-gradient(top, #7fde25, #65d488);
  	 background: -ms-linear-gradient(top, #7fde25, #65d488);
  	 background: -o-linear-gradient(top, #7fde25, #65d488);
  	 padding: 4px 31px;
  	 -webkit-border-radius: 10px;
  	 -moz-border-radius: 10px;
  	 border-radius: 10px;
	 -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
  	 -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
  	 box-shadow: rgba(0,0,0,1) 0 1px 0;
  	 text-shadow: rgba(0,0,0,.4) 0 1px 0;
  	 color: #20042b;
   	 font-size: 12px;
  	 font-family: Georgia, serif;
 	 text-decoration: none;
 	 vertical-align: middle;
}

#btnlogin:hover,#btnregister:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #25a5fa), color-stop(1, #83ff78) );
	background:-moz-linear-gradient( center top, #25a5fa 5%, #83ff78 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25a5fa', endColorstr='#83ff78');
	background-color:#25a5fa;
	color:white;
}
#btnlogin:active,#btnregister:active {
	position:relative;
	top:1px;
}


#username {
	word-spacing: 3px;
	word-spacing: 3px;
	text-shadow: rgba(0,0,0,.4) 0 1px 0;
}
#password {
	letter-spacing: 1px;
	word-spacing: 3px;
	text-shadow: rgba(0,0,0,.4) 0 1px 0;
}
#frgtpwd {
	font-family: "Times New Roman", Times, serif;
	font-size: 16px;
	font-style: italic;
	font-variant: normal;
	text-decoration: underline;
	color: #33BEEC;
	padding-left: 72px;
	margin-bottom: 1px;
}
#head {
	background-color: #0BF210;
	height: 65px;
	width: 98.6%;
	padding-top: 30px;
	padding-left: 30px;
	margin-top: -6px;
	margin-left: -6px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
#error {
	font-family: "Comic Sans MS", cursive;
	font-size: 16px;
	font-style: italic;
	color: #E91675;
	background-color: rgba(254,205,233,0.7);
	letter-spacing: 1px;
	word-spacing: 3px;
	padding-top: 3px;
	padding-left: 24px;
	height: 31px;
	width: 1100px;
	margin-left: -20px;
	margin-top: -18px;
	border-bottom-style: inset;
	border-bottom-width: 2px;
	border-bottom-color: rgba(245,31,149,0.4);
	visibility:hidden ;
}
</style></head>

<body>
<div id="body">
<div id="head"></div>
<div id="main" class="main" >
 <?php 
	if(isset($_SESSION["ErrorMsg"])){
	unset($_SESSION["ErrorMsg"]);	
	echo '<style> #error {visibility:visible ;} </style>';
 ?>
<div id="error" ><u>UserName</u> or <u>Password</u> is wrong please try again !!!!&nbsp;&nbsp;&nbsp; 
 <a href=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Forgot Password</u> ?</a></div>
 <?php }
 if(isset($_SESSION["LoggedOut"])){
	unset($_SESSION["LoggedOut"]);	
	echo '<style> #error {visibility:visible ;} </style>';
 ?>
<div id="error" >&nbsp;&nbsp;&nbsp; You must have to login first !!!!</div>
 <?php }
 	 session_destroy();
  ?>
<div class="panel" id="panel">
<div id="top">LOGIN HERE</div>
<div id="triangle-topright"></div>
 <form name="loginform" action="login.php" method="post">
<table width="406" height="115" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td width="140"><span id="username"> usename</span></td>
    <td width="251">
   <input name="username" type="text" id="txtid" size="30" maxlength="50" onfocus="idfocus()" onblur="idblur()" required />
    </td>
  </tr>
  <tr>
    <td><span id="password">password</span></td>
    <td>
  <input name="password" type="password" id="txtpwd" size="30" maxlength="50" onblur="pwdblur(this)" onfocus="pwdfocus(this)" required/>
   </td>
  </tr>
  </table>
  <label id="frgtpwd"><a href="" id="frgtpwd">Forgot Password?</a></label>
<table width="358" height="45" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td width="155" align="right"><input type="submit" name="btnlogin" id="btnlogin" value="LOGIN"  /></td>
    <td width="189" align="right">
    <a href="new_user_form.php" ><input type="button" name="btnregister" id="btnregister" value="REGISTER HERE" /></a></td>
  </tr>
</table>
  
 </form>
</div>
</div>
</div>

</body>
</html>