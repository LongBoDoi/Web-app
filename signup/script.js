function signUp(){
	var valueFull = document.getElementById("fullname").value;
	var valueUser = document.getElementById("username").value;
	var valuePass = document.getElementById("password").value;
    var valueconfirmPass = document.getElementById("confirmPass").value;
	var grade = document.getElementById("grade").value;
    if(valueFull === ''){
		alert('Bạn phải điền Họ và tên');

		return false;
	}
	if(valueUser === ''){
		alert('Bạn phải điền Tên tài khoản');

		return false;
	}
	else{
		if(valueUser.length < 8 || valueUser.length > 32){
			alert('Tên tài khoản phải có độ dài từ 8-32 ký tự');

			return false;
		}
	}
    
    if(valuePass === ''){
		alert('Bạn phải điền Mật khẩu');

		return false;
	}
	else{
		if(valuePass.length < 8 || valuePass.length > 16){
			alert('Mật khẩu phải có độ dài từ 8-16 ký tự');

			return false;
		}
	}
    
    if(valueconfirmPass === ''){
		alert('Bạn phải xác nhận lại Mật khẩu');

		return false;
	}
	else{
		if(valueconfirmPass !== valuePass){
			alert('Mật khẩu không giống nhau');

			return false;
		}
	}

	if(grade === ''){
		alert('Bạn phải điền Khoá học');

		return false;
	}

	return true;
}


function choosesignup(){
	document.getElementById('signup').style.cursor = "pointer";
}