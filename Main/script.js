function chooselist(){
	document.getElementById('list').style.border = "1px solid white";
	document.getElementById('list').style.cursor = "pointer";
}

function choosechatall(){
	document.getElementById('chatall').style.border = "1px solid white";
	document.getElementById('chatall').style.cursor = "pointer";
}

function chooseevents(){
	document.getElementById('events').style.border = "1px solid white";
	document.getElementById('events').style.cursor = "pointer";
}
	
function leavelist(){
	document.getElementById('list').style.border = "0px";
}

function leavechatall(){
	document.getElementById('chatall').style.border = "0px";
}
	
function leaveevents(){
	document.getElementById('events').style.border = "0px";
}

function golist(){
	window.location.assign("../List/List.html");
}