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
	
}

function godelete(){
	
}

function chooseadd(){
	document.getElementById('add').style.cursor = "pointer";
	document.getElementById('add').style.border = "2px solid white";
}

function leaveadd(){
	document.getElementById('add').style.border = "0px";
}

function choosedelete(){
	document.getElementById('delete').style.cursor = "pointer";
	document.getElementById('delete').style.border = "2px solid white";
}

function leavedelete(){
	document.getElementById('delete').style.border = "0px";
	
}

function openmodi(openid) {
	
	document.getElementById('modi').style.display = "block";
}

function closemodi() {
	document.getElementById('modi').style.display = "none";
}