	function myFunction() {
  var tbody = document.querySelector("#tbody");
  tbody.innerHTML = "";
  var getText = document.getElementById(this.id).ariaValueText;
  var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var arr= JSON.parse(this.responseText);
						for (var i=0;i<arr.length;i++) {
							var trow= document.createElement('tr');
							var stttd= document.createElement('td');
							stttd.innerHTML=i+1;
							var masvtd= document.createElement('td');
							masvtd.innerHTML= arr[i]['id'];
							var tencsvtd= document.createElement('td');
							tencsvtd.innerHTML= arr[i]['fullname'];
							var ngaysinhtd= document.createElement('td');
							ngaysinhtd.innerHTML= arr[i]['date_of_birth'];
              var phonetd = document.createElement('td');
              phonetd.innerHTML = arr[i]['phone'];
              var emailtd = document.createElement('td');
              emailtd.innerHTML = arr[i]['email'];
              var hosotd = document.createElement('td');
              var linkhoso = document.createElement('a');
              linkhoso.innerHTML = "Info";
              linkhoso.href = "../Profile/Profile.html";
              hosotd.appendChild(linkhoso);
              var ghichutd = document.createElement('td');
              ghichutd.innerHTML = arr[i]['achievement'];
              var moditd = document.createElement('td');
              var modibtn = document.createElement('button');
              modibtn.id = i;
              modibtn.onclick = "openmodi(this)";
              var iconbtn = document.createElement('i');
              var imgbtn = document.createElement('img');
              imgbtn.src = "./icon/change.png";
              imgbtn.width = "15px";
              imgbtn.height = "15px";

              iconbtn.appendChild(imgbtn);
              modibtn.appendChild(iconbtn);
              moditd.appendChild(modibtn);

							trow.appendChild(stttd);
              trow.appendChild(masvtd);
              trow.appendChild(tencsvtd);
              trow.appendChild(ngaysinhtd);
              trow.appendChild(phonetd);
              trow.appendChild(emailtd);
              trow.appendChild(hosotd);
              trow.appendChild(moditd);
							document.querySelector('#tb1 tbody').appendChild(trow);
						}
						var note=document.getElementById('note_data');
						if (arr.length==0) note.innerHTML="Khong tim thay ban ghi nao thoa man!";
						else note.innerHTML="";
					}
				}
        if (this.id == "mssv") {
        var mssvText = document.getElementById('mssv').ariaValueText;
				xhttp.open("GET", "searchMSV.php?mssv="+mssvText, true);
				xhttp.send(null);
        } else if (this.id == "hovaten") {
        var fullname = document.getElementById('hovaten').ariaValueText;
        xhttp.open("GET", "searchName.php?fullname="+fullname, true);
				xhttp.send(null);
        } else if (this.id == "ghichu") {
          var achievement = document.getElementById('ghichu').ariaValueText;
          xhttp.open("GET", "searchAchi.php?achievement="+achievement, true);
				  xhttp.send(null);
        }
}

function goadd(){
	document.getElementById('capnhatb').style.display = "none";
	document.getElementById('xoab').style.display = "none";
	document.getElementById('themb').style.display = "block";
	document.getElementById('modi').style.display = "block";
	clickbutton.style.border = "1px solid blue";
}


function choose(clickbutton){
	clickbutton.style.cursor = "pointer";
	clickbutton.style.border = "1px solid white";
}

function leave(clickbutton){
	clickbutton.style.border = "0px";
}

function clickcapnhat(clickbutton) {
	
}
function clickxoa(clickbutton) {
	
}
function clickthem(clickbutton) {
	
}
function openmodi(openid) {
	document.getElementById('capnhatb').style.display = "block";
	document.getElementById('xoab').style.display = "block";
	document.getElementById('themb').style.display = "none";
	document.getElementById('modi').style.display = "block";
}

function closemodi() {
	
	document.getElementById('modi').style.display = "none";
}