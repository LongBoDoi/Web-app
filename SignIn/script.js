function sub(){
	var valueUser = document.getElementById("username").value;
	var valuePass = document.getElementById("password").value;
	if(valueUser == 'Tên tài khoản'){
		alert('Bạn phải điền Tên tài khoản');
	}
	else{
		if(valueUser.length < 8 || value.length > 32){
			alert('Tên tài khoản phải có độ dài từ 8-32 ký tự');
		}
        else{
        	
        }
	}
    
    if(valuePass == 'Mật khẩu'){
		alert('Bạn phải điền Mật khẩu');
	}
	else{
		if(valueUser.length < 8 || value.length > 16){
			alert('Mật khẩu phải có độ dài từ 8-16 ký tự');
		}
        else{
        	
        }
	}
}

function forgotPass(){
	
}


function rememberAcc(){

}