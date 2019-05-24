function ValidateLogin()
{
	if (document.loginform.username.value == "")
	{
        document.loginform.username.style.border = "1px solid #FF0000";
		document.getElementById("uval").innerHTML = "<strong>Please enter your username.</strong>";
		return false;
	}
	
	if (document.loginform.password.value == "")
	{
        document.loginform.password.style.border = "1px solid #FF0000";
		document.getElementById("pval").innerHTML = "<strong>Please enter your password.</strong>";
		return false;
	}
}