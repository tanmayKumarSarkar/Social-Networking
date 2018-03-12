var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;
	if(window.ActiveXObject){
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp =false;
		}
	}else{
		try{
			xmlHttp = new XMLHttpRequest();
		}catch(e){
			xmlHttp =false;
		}
	}
	
	if(!xmlHttp){
		alert("Can't create that object hoss!");
	}else{
		return xmlHttp;
	}
}


	// delete_msg_sender() function -------------------->>>>>>>>>>>>>>>
var xmlHttpDMS = createXmlHttpRequestObject();
	
function delete_msg_sender(tomsgsndr){
	if(xmlHttpDMS.readyState==0 || xmlHttpDMS.readyState==4){
		xmlHttpDMS.onreadystatechange=del_sndr;
		xmlHttpDMS.open("GET","delete_msg_sender.php?p_tomsgsndr="+tomsgsndr,true);
		xmlHttpDMS.send();
	}else{
		setTimeout('delete_msg_sender(tomsgsndr)',1000);
		}
		
}
function del_sndr(){
	if(xmlHttpDMS.readyState==4){
		if(xmlHttpDMS.status==200){
			document.getElementById("msgto").innerHTML=xmlHttpDMS.responseText;
			setTimeout('delete_msg_sender(tomsgsndr)',1000);
		}else{
			alert('Something went wrong!');
			}
		}
	}
	
	
	// OpnFrndChatBx() function--------------------------->>>>>>>>>>>
var xmlHttpOFCB = createXmlHttpRequestObject();	
	
var Dup_FR_name=null;	
function OpnFrndChatBx(FR_name){//alert(FR_name);
	if(xmlHttpOFCB.readyState==0 || xmlHttpOFCB.readyState==4){		
		
		xmlHttpOFCB.open("GET","chatFrame.php?ONto_msgsndr="+FR_name,true);
		Dup_FR_name=FR_name;
		xmlHttpOFCB.onreadystatechange=Opn_NW;
		xmlHttpOFCB.send();
	}else{
		setTimeout('OpnFrndChatBx(FR_name)',1000);
		}
	}	
	
function Opn_NW(){
	if(xmlHttpOFCB.readyState==4){
		if(xmlHttpOFCB.status==200){//alert(Dup_FR_name);
			
			if(typeof cntR !== 'undefined' && cntR==true){
					/*window.open("", "otherwindow");window.open("", "othertab");*/
					window.parent.document.getElementById('divChat').remove();
					window.parent.document.getElementById('divChatMin').remove();
					//alert("cancelling....");
					cntR=false;
				}
					
			var divTag = document.createElement("div");
			divTag.id = "divChat";

			divTag.style.width="280px";
			divTag.style.height="350px";
			divTag.style.cssFloat = divTag.style.styleFloat = "right";
			
			
			divTag.innerHTML ='<iframe id="InsdICHtFrme" src="chatFrame.php?ONto_msgsndr='+Dup_FR_name+'" width="280px" height="350px" scrolling="no"  frameborder="0"/>';
			
			window.parent.document.getElementById("CHTUser").appendChild(divTag);
			var CHTUserdivTag=window.parent.document.getElementById("CHTUser");
			CHTUserdivTag.style.borderRadius=" 6px";	
			CHTUserdivTag.style.boxShadow="1px 2px rgba(0,0,0,1)";
			
			var divTagMin=document.createElement("div");
			divTagMin.id="divChatMin";
			divTagMin.style.width="170px";
			divTagMin.style.height="30px";
			divTagMin.innerHTML=Dup_FR_name;
			window.parent.document.getElementById("CHTUserMin").appendChild(divTagMin);
			window.parent.document.getElementById("CHTUserMin").style.backgroundColor="rgba(132,22,222,1)";
			window.parent.document.getElementById("CHTUserMin").style.borderRadius=" 6px";	
			window.parent.document.getElementById("CHTUserMin").style.boxShadow="1px 2px rgba(0,0,0,1)";
			
			cntR=true;
			
			setTimeout('OpnFrndChatBx(FR_name)',1000);
		}else{
			alert('Something went wrong!');
			}
		}	
	}	
	

function cancelDv(){alert("cancelling");
	var dv=document.getElementById('divChat');
	//dv.style.display='none';
	dv.parentNode.removeChild(dv);
	}	
	
	
	//----------------------------------------<<<<<<<<<<<<functions for chatting>>>>>>>>>>>>>>>------------------------------
	
	var xmlHttpSendRq = createXmlHttpRequestObject();
	var xmlHttpReceiveRq = createXmlHttpRequestObject();
	var lastMsg = 0;
	var mTimer;
	
	function getChatFrmDbJ(){
	 if (xmlHttpReceiveRq.readyState == 4 || xmlHttpReceiveRq.readyState == 0) {
		xmlHttpReceiveRq.open("GET", 'getChatFrmDb.php?chat=1', true);
		xmlHttpReceiveRq.onreadystatechange = handleReceiveChat; 
		xmlHttpReceiveRq.send(null);
		}
	 }
	 
	function handleReceiveChat() {
	if (xmlHttpReceiveRq.readyState == 4) {

		document.getElementById("scrollChatBody").innerHTML+=xmlHttpReceiveRq.responseText;
		document.getElementById('scrollChatBody').scrollTop = document.getElementById('scrollChatBody').scrollHeight;
		//mTimer = setTimeout('getChatText();',2000); //Refresh our chat in 2 seconds
	}
}