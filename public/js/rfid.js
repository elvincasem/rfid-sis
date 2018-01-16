$("#rfid").keypress(function(e) {
    if(e.which == 13) {
       clickme();
    }
});

$("#rfid2").keypress(function(e) {
    if(e.which == 13) {
       clickme2();
    }
});


$("#rfid").focus();




function clickme(){
	 var rfid = document.getElementById("rfid").value;
	 //alert(rfid);
	  $.ajax({
		url: 'rfid/details',
		type: 'post',
		data: {rfid:rfid},
		success: function(response) {
			
			 var data = JSON.parse(response);
			 console.log(data);

			 //document.getElementById("dbstudid").value = data.dbstudid;
			 document.getElementById("rfid").value = data.rfID;
			 document.getElementById("studid").value = data.studID;
			 document.getElementById("lname").value = data.lname;
			 document.getElementById("fname").value = data.fname;
			 document.getElementById("mname").value = data.mname;
			// document.getElementById("bday").value = data.bdate;
			 //document.getElementById("gender").value = data.gender;
			 document.getElementById("address").value = data.studAddress;
			 document.getElementById("guardian").value = data.guardian;
			 //document.getElementById("guardianadd").value = data.guardianAddress;
			 //document.getElementById("gcp").value = data.guardianCP;
			 document.getElementById("rfid2").focus();
			 document.getElementById("rfid2").select();
			 document.getElementById("studentphoto").src = 'public/img/students/' + data.studID + '.jpg';
			 document.getElementById("studentphoto1").src = 'public/img/students/' + data.studID + '.jpg';
			 //window.location.reload();
			
		} 
	});
	
	studentlog();
}

function clickme2(){
	 var rfid = document.getElementById("rfid2").value;
	 //alert(rfid);
	  $.ajax({
		url: 'rfid/details',
		type: 'post',
		data: {rfid:rfid},
		success: function(response) {
			
			 var data = JSON.parse(response);
			 console.log(data);
			
			 //document.getElementById("dbstudid").value = data.dbstudid;
			 //document.getElementById("rfid2").value = data.rfID;
			 document.getElementById("studid2").value = data.studID;
			 document.getElementById("lname2").value = data.lname;
			 document.getElementById("fname2").value = data.fname;
			 document.getElementById("mname2").value = data.mname;
			 // document.getElementById("bday").value = data.bdate;
			 //document.getElementById("gender").value = data.gender;
			 document.getElementById("address2").value = data.studAddress;
			 document.getElementById("guardian2").value = data.guardian;
			 //document.getElementById("guardianadd").value = data.guardianAddress;
			 //document.getElementById("gcp").value = data.guardianCP;
			 document.getElementById("rfid").focus();
			 document.getElementById("rfid").select();
			 document.getElementById("studentphoto").src = 'public/img/students/' + data.studID + '.jpg';
			 document.getElementById("studentphoto2").src = 'public/img/students/' + data.studID + '.jpg';
			 //window.location.reload();
			
		} 
	});
	studentlog2();
}






function uploadadvertisementusera(){
    
    $('#uploadrecbtnusera').prop("disabled", false);
    
    var inputFile = $('input[name=advertisementphotousera]');
    var uploadURI = $('#form_uploadadvertisementusera').attr('action');
    var progressBar = $('#progress-bar-adusera');
    
    listFilesOnServer();
    
    $('#uploadadvertisementbtnusera').on('click',function(event){
        var fileToUpload = inputFile[0].files[0];
        console.log(fileToUpload);
        
        if (fileToUpload != 'undefined'){
            var formData = new FormData();
            formData.append("advertisementphotousera",fileToUpload);
            
            $.ajax({
                url: uploadURI,
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(){
                    listFilesOnServer();
                },
                xhr: function(){
                    var xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(event) {
                        if (event.lengthComputable){
                            var percentComplete = Math.round((event.loaded / event.total) * 100);
                            $('#adprogress').show();
                            progressBar.css({width: percentComplete + "%"});
                            progressBar.text(percentComplete + '%');
                        };
                    }, false);
                    
                    return xhr;
                }
                
            });
        }
        
        
    });

    }
	
	
	
	
	
function studentlog(){

	var rfid1 = document.getElementById("rfid").value;

	
	$.ajax({
		url: 'rfid/studentlog',
		type: 'post',
		data: {rfid:rfid1},
		success: function(response) {
		console.log(response);
			 //var data = JSON.parse(response);
			
			
		} 
	});

}





function studentlog2(){

	var rfid2 = document.getElementById("rfid2").value;

	$.ajax({
		url: 'rfid/studentlog2',
		type: 'post',
		data: {rfid2:rfid2},
		success: function(response) {
		console.log(response);
			 //var data = JSON.parse(response);
			
			
		} 
	});

}