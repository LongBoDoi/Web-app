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

function choose_sign_up(){
    document.getElementById('sign_up').style.cursor = "pointer";
}



function go_sign_up(){
    window.location.assign('../signup/SignUp.html');
}

window.onload = function () {
    let log_in = window.sessionStorage.getItem("username");
    if (log_in !== null) {
        window.location.assign('../Main/main.html');
    }
}