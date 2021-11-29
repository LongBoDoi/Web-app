let toolbar_canvas = document.createElement('canvas');
toolbar_canvas.id = 'toolbar_canvas';
let toolbar_context = toolbar_canvas.getContext("2d");

const home_page_image = document.createElement('img');
home_page_image.id = 'home_page_image';
home_page_image.src = 'home_page_icon.png';

const user_image = document.createElement('img');
user_image.id = 'user_img';
user_image.src = 'https://courses.uet.vnu.edu.vn/theme/image.php/lambda/core/1635321604/u/f1';
user_image.addEventListener('click', function (e) {
	window.location.assign('../Profile/Profile.html');
});
user_image.addEventListener('mouseenter', function (e) {
	user_image.style.cursor = "pointer";
});

const toolbar_button_names = ['Trang chủ', 'Danh sách sinh viên', 'Thông báo', 'Diễn đàn chung', 'Sự kiện'];
const toolbar_button_left = ['24%', '33%', '49.1%', '58.5%', '71.5%'];
const toolbar_button_links = ['../Main/main.html', '../List/List.html', '', '', ''];
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
	document.body.appendChild(user_image);

	for (let i = 0; i < toolbar_buttons.length; i++) {
		document.body.appendChild(toolbar_buttons[i]);
	}
}