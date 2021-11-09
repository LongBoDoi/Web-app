window.onload = function () {
    document.body.appendChild(toolbar_canvas)
    toolbar_context.fillStyle = 'rgba(105, 105, 105, 0.8)';
    toolbar_context.fillRect(0, 0, toolbar_canvas.offsetWidth, toolbar_canvas.offsetHeight);

    document.body.appendChild(home_page_image);

    document.body.appendChild(sign_up_button);
    document.body.appendChild(log_in_button);

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