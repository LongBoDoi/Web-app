function sub(){
	var valueUser = document.getElementById("username").value;
	var valuePass = document.getElementById("password").value;
	
	if(valueUser != "Tên tài khoản"){
		if(valueUser.length >= 8 && valueUser.length <= 20){
			if(valuePass != "Mật khẩu"){
				if(valuePass.length  >=8){
					window.location.assign("../Main/Main.html");
				}
				else alert('Tài khoản hoặc Mật khẩu không hợp lệ');
			}
			else alert('Tài khoản hoặc Mật khẩu không hợp lệ');
		}
		else alert('Tài khoản hoặc Mật khẩu không hợp lệ');
		
	}
	else alert('Tài khoản hoặc Mật khẩu không hợp lệ');
			
    	
}

function choosesignin(){
	document.getElementById('signin').style.cursor = "pointer";
}

function forgotPass(){
	
}


function rememberAcc(){

}

function thanh_focus() {
	let usn = document.getElementById("username").value;
	if (usn === "Tên tài khoản") {
		document.getElementById("username").value = ''
	}
	let pwd = document.getElementById("password").value;
	if (pwd === "Mật khẩu") {
		document.getElementById("password").value = '';
	}
}