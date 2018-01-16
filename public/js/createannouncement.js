function displayannounce(refno){
	$('#sendsms').prop("disabled", true);    
	$('#updatestudentbutton').prop("disabled", false); 
$.ajax({
		url: 'Create_announcement/displayannounce',
		type: 'post',
		data: {refno: refno},
		success: function(response) {
			 
			 var data = JSON.parse(response);
			 console.log(data);
			 //alert(data.rfID);
			 document.getElementById("refNo").value = data.refNo;
			 document.getElementById("message").value = data.message;
			 document.getElementById("dateito").value = data.msgDate;

			

			 //window.location.reload();
			
		} 
	});

}

function displayann(){
	$('#sendsms').prop("disabled", false);    
	$('#updatestudentbutton').prop("disabled", true); 
	//document.getElementById("refNo").value = data.refNo;
			 document.getElementById("message").value = "";
			 document.getElementById("dateito").value = "";
}

function sendsms(){
	//alert("me");
	var dateito = document.getElementById("dateito").value;
	var message = document.getElementById("message").value;

	$.ajax({
		url: 'Create_announcement/sendsms',
		type: 'post',
		data: {dateito : dateito, message:message},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
}

function deleteannounce(refno){
	
	var r = confirm("Are your sure you want to delete this Project?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'Create_announcement/deleteannounce',
                    type: 'post',
                    data: {refno: refno},
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


