window.onload = function () {
    document.body.appendChild(toolbar_canvas)
    toolbar_context.fillStyle = 'rgba(105, 105, 105, 0.8)';
    toolbar_context.fillRect(0, 30, toolbar_canvas.offsetWidth, toolbar_canvas.offsetHeight - 50);

    document.body.appendChild(sign_up_button);
    document.body.appendChild(log_in_button);

    toolbar_context.drawImage(home_page_image, 15, 0, 40, toolbar_canvas.offsetHeight);


    document.getElementById('radio1').checked = true;
    
}

let counter = 2;
setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 4) {
        counter = 1;
    }
}, 5000);

log_in_button.onclick = function() {
	window.location.assign('../signin/SignIn.html');
}

sign_up_button.onclick = function() {
	window.location.assign('../signup/SignUp.html');
}

log_in_button.onmouseenter = function() {
	document.getElementById('log_in_button').style.cursor = "pointer";
	document.getElementById('log_in_button').style.border = "1px solid white"
}

log_in_button.onmouseleave = function() {
	
	document.getElementById('log_in_button').style.border = "0px"
}

sign_up_button.onmouseenter = function() {
	document.getElementById('sign_up_button').style.cursor = "pointer";
	document.getElementById('sign_up_button').style.border = "1px solid white"
}

sign_up_button.onmouseleave = function() {
	document.getElementById('sign_up_button').style.border = "0px"
}