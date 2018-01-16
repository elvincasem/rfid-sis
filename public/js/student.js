


function addstudents(){
	//alert("me");
	var rfid = document.getElementById("rfid").value;
	var sid = document.getElementById("sid").value;
	var lname = document.getElementById("lname").value;
	var fname = document.getElementById("fname").value;
	var mname = document.getElementById("mname").value;
	var bday = document.getElementById("bday").value;
	var gender = document.getElementById("gender").value;
	var sadd = document.getElementById("sadd").value;
	var guardian = document.getElementById("guardian").value;
	var guardianadd = document.getElementById("guardianadd").value;
	var gcp = document.getElementById("gcp").value;
	var status = document.getElementById("status").value;
	var grade = document.getElementById("grade").value;
	var sectionad = document.getElementById("sectionad").value;
	var escc = document.getElementById("escc").value;
	
	$.ajax({
		url: 'student/addstudents',
		type: 'post',
		data: {rfid:rfid, sid:sid, lname:lname, fname:fname, mname:mname, gender:gender, bday:bday, sadd:sadd, guardian:guardian, guardianadd:guardianadd, gcp:gcp, status:status, grade:grade, sectionad:sectionad, escc:escc},
		success: function(response) {
			console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});

}

function addnewstudent(){

	$('#addstudentbutton').prop("disabled", false);    
	$('#updatestudentbutton').prop("disabled", true);  
			document.getElementById("dbstudid").value = "";
			 document.getElementById("rfid").value = "";
			 document.getElementById("sid").value = "";
			 document.getElementById("lname").value = "";
			 document.getElementById("fname").value = "";
			 document.getElementById("mname").value = "";
			 document.getElementById("bday").value = "";
			 document.getElementById("gender").value = "";
			 document.getElementById("sadd").value = "";
			 document.getElementById("guardian").value = "";
			 document.getElementById("guardianadd").value = "";
			 document.getElementById("gcp").value = "";
	//ajax

	
}

function edituser(dbstudid){

	$('#addstudentbutton').prop("disabled", true);    
	$('#updatestudentbutton').prop("disabled", false);  

	//ajax
	$.ajax({
		url: 'student/paymentdetails',
		type: 'post',
		data: {studid: dbstudid},
		success: function(response) {
			 
			 var data = JSON.parse(response);
			 console.log(data);
			 document.getElementById("dbstudid").value = data.dbstudid;
			 document.getElementById("rfid").value = data.rfID;
			 document.getElementById("sid").value = data.studID;
			 document.getElementById("lname").value = data.lname;
			 document.getElementById("fname").value = data.fname;
			 document.getElementById("mname").value = data.mname;
			 document.getElementById("bday").value = data.bdate;
			 document.getElementById("gender").value = data.gender;
			 document.getElementById("sadd").value = data.studAddress;
			 document.getElementById("guardian").value = data.guardian;
			 document.getElementById("guardianadd").value = data.guardianAddress;
			 document.getElementById("gcp").value = data.guardianCP;

			 //window.location.reload();
			
		} 
	});

}

function displaydetails(){
	alert("me");
}

function updatestudent(){
	var dbstudid = document.getElementById("dbstudid").value;
	var rfid = document.getElementById("rfid").value;
	var sid = document.getElementById("sid").value;
	var lname = document.getElementById("lname").value;
	var fname = document.getElementById("fname").value;
	var mname = document.getElementById("mname").value;
	var bday = document.getElementById("bday").value;
	var gender = document.getElementById("gender").value;
	var sadd = document.getElementById("sadd").value;
	var guardian = document.getElementById("guardian").value;
	var guardianadd = document.getElementById("guardianadd").value;
	var gcp = document.getElementById("gcp").value;
	
	$.ajax({
		url: 'student/updatestudent',
		type: 'post',
		data: {dbstudid: dbstudid,rfid : rfid, sid:sid, lname:lname, fname:fname, mname:mname, bday:bday, gender:gender, sadd:sadd, guardian:guardian, guardianadd:guardianadd, gcp:gcp},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});

}

function deletestudent(dbstudid){
	
	var r = confirm("Are your sure you want to delete this student?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'student/deletestudent',
                    type: 'post',
                    data: {dbstudid: dbstudid},
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
function displaystudent(dbstudid){
	//alert("me");

	//ajax
	$.ajax({
		url: 'student/displaystudent',
		type: 'post',
		data: {studid: dbstudid},
		success: function(response) {
			 
			 var data = JSON.parse(response);
			 console.log(data);
			 //alert(data.rfID);
			 document.getElementById("dbstudids").value = data.dbstudid;
			 document.getElementById("rfids").value = data.rfID;
			 document.getElementById("sids").value = data.studID;
			 document.getElementById("fullnames").value = data.lname+", "+data.fname+" "+data.mname;
			 document.getElementById("addresss").value = data.studAddress;
			
			

			 //window.location.reload();
			
		} 
	});

}


function registerstudent(){
	alert("me");
	var rfid = document.getElementById("rfids").value;
	var sid = document.getElementById("sids").value;
	var regdate = document.getElementById("regdate").value;
	var yrlvl = document.getElementById("yrlvl").value;
	var section = document.getElementById("section").value;
	var sy = document.getElementById("sy").value;
	
	
	$.ajax({
		url: 'student/registerstudent',
		type: 'post',
		data: {rfid : rfid, sid:sid, regdate: regdate, yrlvl: yrlvl, section:section, sy:sy},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});

}


function getsection(){
	//alert("me");

	//ajax
	$.ajax({
		url: 'student/addstudent',
		type: 'post',
		data: {},
		success: function(response) {
			 
			 var data = JSON.parse(response);
			 console.log(data);
			 //alert(data.rfID);
			 document.getElementById().value = data.section;
			

			 //window.location.reload();
			
		} 
	});

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

    function displaystudent(dbstudid){
    	document.getElementById("dbstudids").value = dbstudid;
    }

	    function displaypayment(dbstudid){
    	document.getElementById("dbstudids").value = dbstudid;
    }



    function listFilesOnServer(){
        var items = [];
        
        $.getJSON(uploadURI, function(data){
            $.each(data, function(index, element){
                items.push('<li style="display: none;"><input type="text" value="' + element + '"  id="logoimage"></li>');
            });
            
            $('.toggle-menu').html("").html(items.join(""));
            
        });
        
    }
    





function uploadadvertisementusera(){
    
   
    $('#savedadvertisementbtnusera').prop("disabled", false);
    
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

    function saveadvertisementusera(){

    var dbstudids = document.getElementById("dbstudids").value;

    var adimage = document.getElementById("advertisementphotousera").value;    
    var aimage = adimage.replace(/^.*\\/,"");

    
    $.ajax({
        url: "student/saveadimage",
        type: 'post',
        data: {dbstudids:dbstudids, adimage:aimage},
        success: function(response) {
            console.log(response);
            window.location.reload();;
        }
    });
}

function savegranteeinfo(studid){
	var dbstudidd = document.getElementById("dbstudidd").value;
	var rfidd = document.getElementById("rfid").value;
	var sidd = document.getElementById("sid").value;
	var lnamed = document.getElementById("lname").value;
	var fnamed = document.getElementById("fname").value;
	var mnamed = document.getElementById("mname").value;
	var genderd = $("input:radio[name=gender]:checked").val()
	var bdayd = document.getElementById("bday").value;
	var saddd = document.getElementById("sadd").value;
	var guardiand = document.getElementById("guardian").value;
	var guardianaddd = document.getElementById("guardianadd").value;
	var gcpd = document.getElementById("gcp").value;
	var statuss = document.getElementById("statuss").value;
	var current_student_grade = document.getElementById("current_student_grade").value;
	var student_grade = document.getElementById("student_grade").value;
	var sectiondd = document.getElementById("sectiond").value;
	var esc = document.getElementById("esc").value;
	
	

	$.ajax({
		url: '../updatestudentdetails',
		type: 'post',
		data: {dbstudidd:dbstudidd, rfid:rfidd, sid:sidd, lname:lnamed, fname:fnamed, mname:mnamed, gender:genderd, bday:bdayd, sadd:saddd, guardian:guardiand, guardianadd:guardianaddd, gcp:gcpd, statuss:statuss, student_grade:student_grade, sectiond:sectiondd, esc:esc},
		success: function(response) {
			console.log(response);
			//alert(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
	
}



function updatepayment(){
	
	var ornox = document.getElementById("ornox").value;
	var paydatex = document.getElementById("paydatex").value;
	var amountx = document.getElementById("amountx").value;
	var appliedtox = document.getElementById("appliedtox").value;
	var dbstudidx = document.getElementById("dbstudidx").value;


	
	$.ajax({
		url: '../updatepayment',
		type: 'post',
		data: {ornox:ornox, paydatex:paydatex, amountx:amountx, appliedtox:appliedtox, dbstudidx:dbstudidx},
		success: function(response) {
			console.log(response);
			//alert(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
	
}
/*function editregistration(dbstudid){


	alert(dbstudid);
	
	$.ajax({
		url: 'student/details',
		type: 'post',
		data: {studidd: dbstudid},
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

}*/

function addregistration(){
	//var dbstudidr = document.getElementById("dbstudidr").value;
	var rfidr = document.getElementById("rfidr").value;
	var sidr = document.getElementById("sidr").value;
	var regdater = document.getElementById("regdater").value;
	var yrlvlr = document.getElementById("yrlvlr").value;
	var sectionr = document.getElementById("sectionr").value;
	var syr = document.getElementById("syr").value;

	//alert(dbstudidr);
	/*alert(rfidr);
	alert(sidr);
	alert(regdater);
	alert(yrlvlr);
	alert(sectionr);
	alert(syr);*/
	$.ajax({
		url: 'student/details',
		type: 'post',
		data: {rfid:rfidr, sid:sidr, regdate:regdater, yrlvl:yrlvlr, section:sectionr, sy:syr},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});


}

function addpayment(){
	//var rfidp = document.getElementById("rfidp").value;
	var dbstudid = document.getElementById("dbstudid").value;
	var orno = document.getElementById("orno").value;
	var paydate = document.getElementById("paydate").value;
	var amount = document.getElementById("amount").value;
	var appliedto = document.getElementById("appliedto").value;


	$.ajax({
		url: '../addpayment',
		type: 'post',
		data: { dbstudid:dbstudid, orno:orno, paydate:paydate, amount:amount, appliedto:appliedto},
		success: function(response) {
			console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
}