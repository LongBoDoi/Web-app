function signUp(){
	var valueFull = document.getElementById("fullname").value;
	var valueUser = document.getElementById("username").value;
	var valuePass = document.getElementById("password").value;
    var valueconfirmPass = document.getElementById("confirmPass").value;
    var valueEmail = document.getElementById("email").value;
    if(valueFull == 'Tên đầy đủ'){
		alert('Bạn phải điền Tên đầy đủ');
	}
	else{
		if(valueFull.length < 8){
			alert('Tên đầy đủ phải có độ dài từ 8 ký tự trở lên');
		}
        else{
        	
        }
	}
	if(valueUser == 'Tên tài khoản'){
		alert('Bạn phải điền Tên tài khoản');
	}
	else{
		if(valueUser.length < 8 || valueUser.length > 32){
			alert('Tên tài khoản phải có độ dài từ 8-32 ký tự');
		}
        else{
        	
        }
	}
    
    if(valuePass == 'Mật khẩu'){
		alert('Bạn phải điền Mật khẩu');
	}
	else{
		if(valuePass.length < 8 || valuePass.length > 16){
			alert('Mật khẩu phải có độ dài từ 8-16 ký tự');
		}
        else{
        	
        }
	}
    
    if(valueconfirmPass == 'Xác nhận Mật khẩu'){
		alert('Bạn phải xác nhận lại Mật khẩu');
	}
	else{
		if(valueconfirmPass != valuePass){
			alert('Mật khẩu không giống nhau');
		}
        else{
        	
        }
	}
}
