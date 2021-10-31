const home_page_image = document.createElement('img');
home_page_image.src = 'home_page_icon.png';

let toolbar_canvas = document.createElement('canvas');
toolbar_canvas.id = 'toolbar_canvas';
let toolbar_context = toolbar_canvas.getContext("2d");

let sign_up_button = document.createElement('button');
sign_up_button.id = 'sign_up_button';
sign_up_button.innerHTML = 'Đăng ký'
sign_up_button.style.backgroundColor = 'rgba(0, 0, 0, 0)';

let log_in_button = document.createElement('button');
log_in_button.id = 'log_in_button';
log_in_button.innerHTML = 'Đăng nhập'
log_in_button.style.backgroundColor = '#ff3366';
log_in_button.style.borderTop = "0px";
log_in_button.style.borderBottom = "0px";
log_in_button.style.borderColor = '#ff3366';

