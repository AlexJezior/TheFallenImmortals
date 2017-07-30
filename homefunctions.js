function votepage(){
	data = "";
    evalpostAJAXHtml("votepage.php",data);
}

function updates(){
	data = "";
    evalpostAJAXHtml("updates.php",data);
}

function contactUs(){
    Email = $("email").value;
	Message = $("message").value;
    data = "email=" + Email + "&message=" + Message;
    evalpostAJAXHtml("contact.php",data);
}

function contact(){
	data = "";
    evalpostAJAXHtml("contact.php",data);
}

function about(){
	data = "";
    evalpostAJAXHtml("about.php",data);
}

function findPassword(){
    email = $("lostEmail").value;
    data = "email=" + email;
    evalpostAJAXHtml("forgot.php",data);
}

function forgotPassword(){
	data = "";
    evalpostAJAXHtml("forgot.php",data);
}

function goLogin(){
    userAlias = $("username").value;
    userPass = $("password").value;
    data = "userAlias=" + userAlias + "&userPass=" + userPass;
    evalpostAJAXHtml("login.php",data);
}



function goRegister(){
    userAlias = $("usernamereg").value;
    userPass = $("passwordreg").value;
    userVPass = $("passwordvreg").value;
    userComrade = $("comrade").value;
    userEmail = $("emailreg").value;
    userGender = $("genderreg").value;
    userClass = $("classreg").value;
    data = "userAlias=" + userAlias + "&userPass=" + userPass + "&userVPass=" + userVPass + "&userComrade=" + userComrade + "&userEmail=" + userEmail + "&userGender=" + userGender + "&userClass=" + userClass;
    evalpostAJAXHtml("register.php",data);
}



function cleanReg(){
    document.registrationForm.usernamereg.value = "";
    document.registrationForm.emailreg.value = "";
    document.registrationForm.passwordreg.value = "";
    document.registrationForm.passwordvreg.value = "";
    document.registrationForm.genderreg.value = "Male";
    document.registrationForm.classreg.value = "Fighter";
}