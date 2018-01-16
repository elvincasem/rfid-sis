function displaysms(dbstudid){

	//ajax
	//alert("me");
	
	$.ajax({
		url: 'sms_one/displaysms',
		type: 'post',
		data: {studid:dbstudid},
		success: function(response) {
			 
			 var data = JSON.parse(response);
			 console.log(data);
			 document.getElementById("dbstudid").value = data.dbstudid;
			 document.getElementById("rfidr").value = data.rfID;
			 document.getElementById("sidr").value = data.studID;
			 document.getElementById("fullnamer").value = data.lname+", "+data.fname+" "+data.mname;
			 document.getElementById("addressr").value = data.studAddress;
			 document.getElementById("cpno").value = data.guardianCP;


			 //window.location.reload();
			
		} 
	});

}

function sendsms(dbstudid){

	var dbstudid = document.getElementById("dbstudid").value;
	var cpno = document.getElementById("cpno").value;
	var message = document.getElementById("message").value;
	var sent = document.getElementById("sent").value;
	//alert(dbstudid);
	//alert(message);

	$.ajax({
		url: 'sms_one/sendsms',
		type: 'post',
		data: {dbstudid:dbstudid, cpno:cpno, message:message, sent:sent},
		success: function(response) {
			window.location.reload();
		} 
	});
}