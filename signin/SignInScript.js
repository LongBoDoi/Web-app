function signIn(){
    var valueUser = document.getElementById("username").value;
    var valuePass = document.getElementById("password").value;
    if(valueUser === ''){
        alert('Bạn phải điền Tên tài khoản');

        return false;
    }

    if(valuePass === ''){
        alert('Bạn phải điền Mật khẩu');

        return false;
    }

    return true;
}


function choose_sign_in(){
    document.getElementById('sign_in').style.cursor = "pointer";
}

window.onload = function () {
    window.alert('sign in di');
}