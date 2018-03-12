/*! jQuery v2.0.2 | (c) 2005, 2013 jQuery Foundation, Inc. | jquery.org/license
//@ sourceMappingURL=onlineFriends.js
*/

var min = "-333px", // remember to set in css the same value
    max = "0px";

$(function() {
  $("#onlnFrndsCallerShape").click(function() {
	 
    if($("#onlnFrnds").css("right") == min) // is it left?
      $("#onlnFrnds").animate({ right: max }); // move right
    else
      $("#onlnFrnds").animate({ right: min }); // move left

  });
}); 


//

$(function() {
  $("#CHTUserMin").click(function() {
	  
	 if(window.parent.document.getElementById("CHTUserMin").style.visibility="visible"){
		 if(window.parent.document.getElementById("CHTUser").style.visibility="hidden"){ 
		 
		 window.parent.document.getElementById("CHTUser").style.visibility="visible";
		 window.parent.document.getElementById("CHTUserMin").style.visibility="hidden";
		 }
  		}

  });
}); 