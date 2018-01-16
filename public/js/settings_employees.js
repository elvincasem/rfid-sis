function saveemployee(){
	
	$('#savebutton').prop("disabled", true);    
	var empno = document.getElementById("empno").value;
	var lname = document.getElementById("lname").value;
	var fname = document.getElementById("fname").value;
	var mname = document.getElementById("mname").value;
	var extension = document.getElementById("extension").value;
	var designation = document.getElementById("designation").value;
	
	$.ajax({
		url: 'employees/saveemployee',
		type: 'post',
		data: {empno: empno,lname:lname,fname:fname,mname:mname,extension:extension,designation:designation},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}

function deleteemployee(id){
	
	var r = confirm("Are your sure you want to delete this employee?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'employees/deleteemployee',
                    type: 'post',
                    data: {eid: id},
                    success: function(response) {
						console.log(response);
						location.reload();
						//$('#general-table').load(document.URL +  ' #general-table');
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}