	function myFunction(idinput) {
  var input, filter, table, tr, td, i, txtValue, idex;
  input = document.getElementById(idinput.id);
  filter = input.value.toUpperCase();
  table = document.getElementById("tbody");
  tr = table.getElementsByTagName("tr");
  
  if (idinput.id == "mssv") idex = 0;
  else if (idinput.id == "hovaten") idex = 1;
  else if (idinput.id == "ngaysinh") idex = 2;
  else if (idinput.id == "gioitinh") idex = 3;
  else if (idinput.id == "lop") idex = 4;
  else if (idinput.id == "tinh") idex = 5;
  else idex = 9;
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[idex];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
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