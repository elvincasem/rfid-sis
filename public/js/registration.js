
function editregistration(dbstudid){

	//ajax
	//alert("me");
	
	$.ajax({
		url: 'registration/editregistration',
		type: 'post',
		data: {studid: dbstudid},
		success: function(response) {
			 
			 var data = JSON.parse(response);
			 console.log(data);
			 document.getElementById("dbstudidr").value = data.dbstudid;
			 document.getElementById("rfidr").value = data.rfID;
			 document.getElementById("sidr").value = data.studID;
			 document.getElementById("fullnamer").value = data.lname+", "+data.fname+" "+data.mname;
			 document.getElementById("addressr").value = data.studAddress;
			 document.getElementById("regdater").value = data.regDate;
			 document.getElementById("yrlvlr").value = data.yrLevel;
			 document.getElementById("sectionr").value = data.section;
			 document.getElementById("syr").value = data.sy;

			 //window.location.reload();
			
		} 
	});

}

function updateregistration(){
	//alert("me");
	var rfid = document.getElementById("rfidr").value;
	var regdate = document.getElementById("regdater").value;
	var yrlvl = document.getElementById("yrlvlr").value;
	var section = document.getElementById("sectionr").value;
	var sy = document.getElementById("syr").value;

	$.ajax({
		url: 'registration/updateregistration',
		type: 'post',
		data: {rfid : rfid, regdate:regdate, yrlvl:yrlvl, section:section, sy:sy},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});

}
function deleteregistration(refNo){
	
	var r = confirm("Are your sure you want to delete this Project?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'registration/deleteregistration',
                    type: 'post',
                    data: {refNo: refNo},
                    success: function(response) {
						console.log(response);
						//alert("me");
						location.reload();
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

//display registration


