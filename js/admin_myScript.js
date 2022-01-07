/* IT20083700 
   K.M.R.I Senanayaka 
   Group - 9  */


function enableAddNowBtn(){

	if(document.getElementById("check").checked){
		 document.getElementById("sbtn").disabled = false;
	}
	else{
		document.getElementById("sbtn").disabled = true;
	}

}

function filter(){

	
	document.getElementById('filter_display').submit();

}


