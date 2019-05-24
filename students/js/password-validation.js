function CheckPasswordStudent()
{
    var vpass1 = document.newpassform.newpass;
    var vpass2 = document.newpassform.cpass;
    
	if (document.newpassform.oldpass.value == "")
	{
        document.getElementById("opval").style.padding = "10px";
		document.getElementById("opval").innerHTML = "<span class='glyphicon glyphicon-warning-sign'></span><br />Please insert your old password";
		return false;
	}
	
    if (document.newpassform.newpass.value == "")
	{
        document.getElementById("npval").style.padding = "10px";
		document.getElementById("npval").innerHTML = "<span class='glyphicon glyphicon-warning-sign'></span><br />Please insert your new password";
		return false;
	}
    
    if (document.newpassform.cpass.value == "")
	{
        document.getElementById("cpval").style.padding = "10px";
		document.getElementById("cpval").innerHTML = "<span class='glyphicon glyphicon-warning-sign'></span><br />Please confirm your new password";
		return false;
	}
    
    if (vpass1.value == vpass2.value)
	{
		document.getElementById("cpval").innerHTML = "";
		document.getElementById("pmval").innerHTML = "<strong>Passwords match!</strong>";
    }
	else
	{
		document.getElementById("pmval").innerHTML = "";
		document.getElementById("cpval").innerHTML = "<strong>Password's do not match.</strong>";
		return false;
    }
}