let toolbar_canvas = document.createElement('canvas');
toolbar_canvas.id = 'toolbar_canvas';
let toolbar_context = toolbar_canvas.getContext("2d");

const home_page_image = document.createElement('img');
home_page_image.id = 'home_page_image';
home_page_image.src = 'home_page_icon.png';

let profile_form = document.createElement('form');
profile_form.method = 'get';
profile_form.action = '../Profile/Profile.php';
let username_info = document.createElement('input');
username_info.type = 'hidden';
username_info.value = window.sessionStorage.getItem('username');
username_info.name = 'username_info';
let input_username = document.createElement('input');
input_username.type = 'hidden';
input_username.value = window.sessionStorage.getItem('username');
input_username.name = 'input_username';
let profile_submit = document.createElement('input');
profile_submit.type = 'submit';
profile_submit.id = 'submit';
profile_submit.value = "";
profile_submit.onmouseenter = function () {
	profile_submit.style.cursor = 'pointer';
};
profile_form.appendChild(username_info);
profile_form.appendChild(input_username);
profile_form.appendChild(profile_submit);

const toolbar_button_names = ['Trang chủ', 'Danh sách sinh viên', 'Thông báo', 'Diễn đàn chung', 'Sự kiện'];
const toolbar_button_left = ['24%', '33%', '49.1%', '58.5%', '71.5%'];
const toolbar_button_links = ['../Main/main.html', '../List/List.php', '../Notification/Notification.php', '../Forum/Post.php', ''];
toolbar_buttons = [];
for (let i = 0; i < toolbar_button_names.length; i++) {
	let btn = document.createElement('button');
	btn.className = 'toolbar_button';
	btn.innerHTML = toolbar_button_names[i];
	btn.style.left = toolbar_button_left[i];
	btn.onmouseenter = function () {
		btn.style.backgroundColor = '#ff3366';
		btn.style.borderLeft = '1px solid';
		btn.style.borderRight = '1px solid';
		btn.style.cursor = "pointer";
	}
	btn.onmouseleave = function () {
		btn.style.backgroundColor = 'transparent';
		btn.style.border = '0';
	}
	btn.onclick = function () {
		window.location.assign(toolbar_button_links[i]);
	}
	toolbar_buttons.push(btn);
}

window.onload = function () {
	document.body.appendChild(toolbar_canvas)
	toolbar_context.fillStyle = 'rgba(105, 105, 105, 0.8)';
	toolbar_context.fillRect(0, 0, toolbar_canvas.offsetWidth, toolbar_canvas.offsetHeight);

	document.body.appendChild(home_page_image);
	document.body.appendChild(profile_form);

	for (let i = 0; i < toolbar_buttons.length; i++) {
		document.body.appendChild(toolbar_buttons[i]);
	}
}