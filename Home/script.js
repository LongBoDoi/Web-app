

function choosesignin(){
	document.getElementsByClassName("signin")[0].style.backgroundColor = "#ff3366";
	document.getElementsByClassName("signin")[0].style.cursor = "pointer";
}

function choosesignup(){
	document.getElementsByClassName("signup")[0].style.backgroundColor = "#ff3366";
	document.getElementsByClassName("signup")[0].style.cursor = "pointer";
}

function leavesignin(){
	document.getElementsByClassName("signin")[0].style.backgroundColor = "#000";
}


function leavesignup(){
	document.getElementsByClassName("signup")[0].style.backgroundColor = "#000";
}

function gosignin(){
	window.location.assign("../signin/SignIn.html");
}

function gosignup(){
	window.location.assign("../signup/SignUp.html");
}