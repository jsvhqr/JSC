/**
 * 
 */
var xmlHttp = createXmlHttpRequestObject();


function createXmlHttpRequestObject(){

	var ret;

	if(window.ActiveXObject){
		try{
			ret = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			ret = false;
		}

	}
	else
	{
		try{
			ret = new XMLHttpRequest();
		}catch(e){
			ret = false;
		}
	}

	if(!ret){
		alert("Ajax error");
	}
	else
	{
		return ret;
	}
}

function process(){
	monitorRegisterUsername();
	monitorRegisterPassword();
	monitorRegisterEmail();
}

function monitorRegisterUsername(){


	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		var usernameReg = $('#usernameReg').val();
		if(usernameReg.length > 5 && validUsername(usernameReg)){
			var send = encodeURIComponent(usernameReg);
			xmlHttp.open("GET","php/checkUsername.php?username=" + send,true);
			xmlHttp.onreadystatechange = handleRegisterUsernameCheckResponse;
			xmlHttp.send(null);
		}
		else if(usernameReg.length == 0)
		{
			$('#usernameStatus').text("");
			setTimeout('monitorRegisterUsername()',100);
		}
		else if(usernameReg.length > 0 && usernameReg.length < 6){
			if(validUsername(usernameReg)){

				$('#usernameStatus').css("color","red");
				$('#usernameStatus').text("username must be at least 6 charachters");
			}
			else
			{
				$('#usernameStatus').css("color","red");
				$('#usernameStatus').text("only a-z/A-Z allowed");

			}

			setTimeout('monitorRegisterUsername()',100);
		}
		else
		{
			$('#usernameStatus').css("color","red");
			$('#usernameStatus').text("only a-z/A-Z allowed");
			setTimeout('monitorRegisterUsername()',100);
		}
	}
	else
	{
		setTimeout('monitorRegisterUsername()',100);
	}

}

function monitorRegisterPassword(){
	var passwordReg = $('#passwordReg').val();
	if(!validPassword(passwordReg)){
		$('#passwordStatus').css("color","red");
		$('#passwordStatus').text("only a-z/A-Z allowed");
	}
	else if(passwordReg.length == 0 || validPassword(passwordReg)){
		$('#passwordStatus').text("");
	}
	setTimeout('monitorRegisterPassword()',100);
}

function monitorRegisterEmail(){

	if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
		var emailReg = $('#emailReg').val();
		if(emailReg.length > 0 && validEmail(emailReg)){
			var send = encodeURIComponent(emailReg);
			xmlHttp.open("GET","php/checkEmail.php?email=" + send,true);
			xmlHttp.onreadystatechange = handleRegisterEmailCheckResponse;
			xmlHttp.send(null);
		}
		else
		{
			if(emailReg.length == 0){
				$('#emailStatus').text("");
			}
			setTimeout('monitorRegisterEmail()',100);
		}

	}
	else
	{
		setTimeout('monitorRegisterEmail()',100);
	}
}

function handleRegisterUsernameCheckResponse(){
	if(xmlHttp.readyState == 4){
		if(xmlHttp.status==200){
			xmlResponse = xmlHttp.responseXML;
			xmlDocument = xmlResponse.documentElement;
			message = xmlDocument.getElementsByTagName("msg")[0].childNodes[0].nodeValue;
			var fail = xmlDocument.getElementsByTagName("fail")[0].childNodes[0].nodeValue;
			var cmp = fail.localeCompare("true");
			if(cmp == 0){
				$('#usernameStatus').css("color","red");
			}
			else{
				$('#usernameStatus').css("color","green");
			}
			$('#usernameStatus').text(message);
			setTimeout('monitorRegisterUsername()',100);
		}
	}
}

function handleRegisterEmailCheckResponse(){
	if(xmlHttp.readyState == 4){
		if(xmlHttp.status==200){
			xmlResponse = xmlHttp.responseXML;
			xmlDocument = xmlResponse.documentElement;
			message = xmlDocument.getElementsByTagName("msg")[0].childNodes[0].nodeValue;
			var fail = xmlDocument.getElementsByTagName("fail")[0].childNodes[0].nodeValue;
			var cmp = fail.localeCompare("true");
			if(cmp == 0){
				$('#emailStatus').css("color","red");
				$('#emailStatus').text(message);
			}
			else{
				$('#emailStatus').text("");
			}
			setTimeout('monitorRegisterEmail()',100);
		}
	}
}

function registerSubmit(){

	var username = $('#usernameReg').val();
	var password = $('#passwordReg').val();
	var email = $('#emailReg').val();

	if(username.length == 0 || email.length == 0 || password.length == 0){
		$('#overallStatusLabel').text("please complete all fields");
		return false;
	}
	else if(!valid(username) || !validEmail(email)){
		if(!valid(username)){
			$('#usernameStatus').css("color","red");
			$('#usernameStatus').text("invalid charachters");
		}
		if(!valid(email)){
			$('#emailStatus').css("color","red");
			$('#emailStatus').text("invalid email");
		}
		return false;
	}

}

function validEmail(email){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}

function validUsername(username){
	var illegalChars = /^[a-zA-Z]*$/; // allow letters, numbers, and underscores
	return illegalChars.test(username);
}

function validPassword(password){
	var illegalChars = /^[a-zA-Z]*$/; // allow letters, numbers, and underscores
	return illegalChars.test(password);
}