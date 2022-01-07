function Checkpassword()
{
	var pw1 = document.getElementById('pwd').value;
	var pw2 = document.getElementById('rpwd').value;


if (pw1!=pw2)
{
	alert ("Password mismatch");
	return false;
}

else
{
	alert ("Password match");
	return true;
}
}

function enableButton()
{
	if (document.getElementById('term1').checked)
	{
		document.getElementById('sbmt').disabled = false;
	}
	
	else
	{
		document.getElementById('sbmt').disabled = true;
	}
}