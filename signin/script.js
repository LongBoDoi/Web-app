function sub(){
	var valueUser = document.getElementById("username").value;
	var valuePass = document.getElementById("password").value;
	
	if(valueUser != "Tên tài khoản"){
		if(valueUser.length >= 8){
			if(valuePass != "Mật khẩu"){
				if(valuePass.length  >=8){
					window.location.assign("../Main/Main.html");
				}
				else alert('Tài khoản hoặc Mật khẩu không hợp lệ1');	
			}
			else alert('Tài khoản hoặc Mật khẩu không hợp lệ2');
		}
		else alert('Tài khoản hoặc Mật khẩu không hợp lệ3');
		
	}
	else alert('Tài khoản hoặc Mật khẩu không hợp lệ4');
			
    	
}

function choosesignin(){
	document.getElementById('signin').style.cursor = "pointer";
}

function forgotPass(){
	
}


function rememberAcc(){

}