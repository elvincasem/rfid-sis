
//add project button

function addproject(){
	
			$('#updateproject').prop("disabled", true);    
			$('#saveproject').prop("disabled", false);    
			document.getElementById("projectname").value ="";
			document.getElementById("projectnumber").value="";
			document.getElementById("projectdate").value="";
			document.getElementById("signoff").value="";
			setTimeout(function () { $("#projectname").focus(); }, 20);
}
	
			



//save project

function saveproject(){
	

					var projectname = document.getElementById("projectname").value;
					var projectnumber = document.getElementById("projectnumber").value;
					var projecttype = document.getElementById("projecttype").value;
					var projectdate = document.getElementById("projectdate").value;
					var signoff = document.getElementById("signoff").value;
					
					
					$.ajax({
                    url: 'functions/saveproject',
                    type: 'post',
                    data: {action: "saveproject", projectname: projectname, projectnumber: projectnumber,projecttype:projecttype,projectdate:projectdate,signoff:signoff},
                    success: function(response) {
						console.log(response);
						convertresponse = JSON.parse(response);
						var lastid = parseInt(convertresponse.lastid);
						//console.log(last);
						window.location.href = "projects/details/"+lastid;

						
                    }
                });

	
	
}
function deleteproject(id){
	
	var r = confirm("Are your sure you want to delete this Project?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'functions/deleteproject',
                    type: 'post',
                    data: {projectid: id},
                    success: function(response) {
						console.log(response);
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

function updateproject(){
	
					var projectid = document.getElementById("projectid").value;
					var projectname = document.getElementById("projectname").value;
					var projectnumber = document.getElementById("projectnumber").value;
					var projecttype = document.getElementById("projecttype").value;
					var projectdate = document.getElementById("projectdate").value;
					var signoff = document.getElementById("signoff").value;
					
					
					$.ajax({
                    url: 'functions/updateproject',
                    type: 'post',
                    data: {projectid:projectid, projectname: projectname, projectnumber: projectnumber,projecttype:projecttype,projectdate:projectdate,signoff:signoff},
                    success: function(response) {
						console.log(response);
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails/"+lastid;
						location.reload();

						
                    }
                });

	$('#updateproject').prop("disabled", true);    
	
}


function editproject(projid){
	
	//$('#update').removeAttr("disabled");
	$('#updateproject').prop("disabled", false);    
	$('#saveproject').prop("disabled", true);    
	
	
	

	//alert(id);
	
	$.ajax({
		url: 'functions/getproject/'+projid,
		type: 'post',
		//data: {projectid : id},
		success: function(response) {
			//console.log(response);
			 var data = JSON.parse(response);
			 
			//insert values	
			document.getElementById("projectid").value = projid;
			document.getElementById("projectname").value = data.projectname;
			document.getElementById("projectnumber").value = data.projectnumber;
			document.getElementById("projectdate").value = data.formdate;
			document.getElementById("signoff").value = data.originator;
			
			var projecttypevalue = data.projecttype;
			var proj = document.getElementById("projecttype");
			var opt = document.createElement("option");
			opt.value = data.projecttype;
			if(data.projecttype==""){
				opt.text = "";
			}else{
				opt.text = data.projecttype;
			}
			
			opt.selected = "selected";

			proj.add(opt,  proj.options[0]);
			
			
			
			return "valid";
		} 
	});
		
$('#updateequipment').prop("disabled", true); 	
	
	
}

function saveincomplete(){
	

					var projectid = document.getElementById("projectid").value;
					var partnumber = document.getElementById("partnumber").value;
					var partdescription = document.getElementById("partdescription").value;
					var notes = document.getElementById("notes").value;
					
					
					
					$.ajax({
                    url: '../../functions/saveincomplete',
                    type: 'post',
                    data: {projectid: projectid, partnumber: partnumber,partdescription:partdescription,notes:notes},
                    success: function(response) {
						//console.log(response);
						var lastid = parseInt(response);
						var closeinc = document.getElementById("closeincomplete");
						$('#incompletestable').load(document.URL +  ' #incompletestable');
						//$('#incompletestable tr:last').after("<tr><td>"+partnumber+"</td><td>"+partdescription+"</td><td>"+notes+"</td><td><button class='btn btn-danger notification' id='notification' onClick='deleteincomplete("+lastid+")'><i class='fa fa-times'></i></button></td></tr>");
						closeinc.click();
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                });

	
	
}

function addincompletebutton(){
	
	document.getElementById("partnumber").value="";
	document.getElementById("notes").value="";
}

function deleteincomplete(id){
	
	var r = confirm("Are your sure you want to delete this detail?");
    if (r == true) {
        //alert ("You pressed OK!");
		//alert(id);
		$.ajax({
                    url: '../../functions/deleteincomplete',
                    type: 'post',
                    data: {pdetailsid: id},
                    success: function(response) {
						console.log(response);
						//location.reload();
						$('#incompletestable').load(document.URL +  ' #incompletestable');
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}


function saveexceptions(){
	
					var projectid = document.getElementById("projectid").value;
					if(document.getElementById("authyes").checked==true){
						var authshipment = "YES";
					}else{
						var authshipment = "NO";
					}
					//var authshipment = document.getElementById("authshipment").value;
					//var authshipment = $('#authshipment').this;
					var authsolution = document.getElementById("authsolution").value;
					var authdate = document.getElementById("authdate").value;
					var hardwarebox = document.getElementById("hardwarebox").value;
					/*if(document.getElementById("hardwareyes").checked==true){
						var hardwarebox = "YES";
					}else{
						var hardwarebox = "NO";
					}*/
					if(document.getElementById("authpackyes").checked==true){
						var authpackaged = "YES";
					}else{
						var authpackaged = "NO";
					}
					if(document.getElementById("pmseeyes").checked==true){
						var pmsee = "YES";
					}else{
						var pmsee = "NO";
					}
					
					var pmsolution = document.getElementById("pmsolution").value;
					var pmdate = document.getElementById("pmdate").value;
					if(document.getElementById("pmexceptionyes").checked==true){
						var pmexception = "YES";
					}else{
						var pmexception = "NO";
					}
					
					var pmexsolution = document.getElementById("pmexsolution").value;
					var pmexdate = document.getElementById("pmexdate").value;
					//alert (authshipment);
					
					$.ajax({
                    url: '../../functions/saveexceptions',
                    type: 'post',
                    data: {projectid: projectid, authshipment:authshipment,authsolution:authsolution,authdate:authdate,hardwarebox:hardwarebox,authpackaged:authpackaged,pmsee:pmsee,pmsolution:pmsolution,pmdate:pmdate,pmexception:pmexception,pmexsolution:pmexsolution,pmexdate:pmexdate},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Exceptions Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                });

	
	
}

function saveassembly(){
	
					var projectid = document.getElementById("projectid").value;
					var faintegration = document.getElementById("faintegration").value;
					if(document.getElementById("q101yes").checked==true){
						var q101 = "YES";
					}if(document.getElementById("q101no").checked==true){
						var q101 = "NO";
					}if(document.getElementById("q101na").checked==true){
						var q101 = "NA";
					}
					
					if(document.getElementById("q102yes").checked==true){
						var q102 = "YES";
					}if(document.getElementById("q102no").checked==true){
						var q102 = "NO";
					}if(document.getElementById("q102na").checked==true){
						var q102 = "NA";
					}
					
					
					
					if(document.getElementById("q103yes").checked==true){
						var q103 = "YES";
					}if(document.getElementById("q103no").checked==true){
						var q103 = "NO";
					}if(document.getElementById("q103na").checked==true){
						var q103 = "NA";
					}
					
					if(document.getElementById("q104yes").checked==true){
						var q104 = "YES";
					}if(document.getElementById("q104no").checked==true){
						var q104 = "NO";
					}if(document.getElementById("q104na").checked==true){
						var q104 = "NA";
					}
					
					
					if(document.getElementById("q105yes").checked==true){
						var q105 = "YES";
					}if(document.getElementById("q105no").checked==true){
						var q105 = "NO";
					}if(document.getElementById("q105na").checked==true){
						var q105 = "NA";
					}
					
					
					if(document.getElementById("q106yes").checked==true){
						var q106 = "YES";
					}if(document.getElementById("q106no").checked==true){
						var q106 = "NO";
					}if(document.getElementById("q106na").checked==true){
						var q106 = "NA";
					}
					
					
					if(document.getElementById("q107yes").checked==true){
						var q107 = "YES";
					}if(document.getElementById("q107no").checked==true){
						var q107 = "NO";
					}if(document.getElementById("q107na").checked==true){
						var q107 = "NA";
					}
					
					
					if(document.getElementById("q108yes").checked==true){
						var q108 = "YES";
					}if(document.getElementById("q108no").checked==true){
						var q108 = "NO";
					}if(document.getElementById("q108na").checked==true){
						var q108 = "NA";
					}
					
					
					if(document.getElementById("q109yes").checked==true){
						var q109 = "YES";
					}if(document.getElementById("q109no").checked==true){
						var q109 = "NO";
					}if(document.getElementById("q109na").checked==true){
						var q109 = "NA";
					}
					
					
					if(document.getElementById("q110yes").checked==true){
						var q110 = "YES";
					}if(document.getElementById("q110no").checked==true){
						var q110 = "NO";
					}if(document.getElementById("q110na").checked==true){
						var q110 = "NA";
					}
					/*if(document.getElementById("q111yes").checked==true){
						var q111 = "YES";
					}if(document.getElementById("q111no").checked==true){
						var q111 = "NO";
					}if(document.getElementById("q112na").checked==true){
						var q111 = "NA";
					}*/
					if(document.getElementById("q112yes").checked==true){
						var q112 = "YES";
					}if(document.getElementById("q112no").checked==true){
						var q112 = "NO";
					}if(document.getElementById("q112na").checked==true){
						var q112 = "NA";
					}
					
					if(document.getElementById("q113yes").checked==true){
						var q113 = "YES";
					}if(document.getElementById("q113no").checked==true){
						var q113 = "NO";
					}if(document.getElementById("q113na").checked==true){
						var q113 = "NA";
					}
					var positionnos = document.getElementById("positionnos").value;
					var assemblynotes = document.getElementById("assemblynotes").value;
					
					$.ajax({
                     url: '../../functions/saveassembly',
                    type: 'post',
                    data: {projectid: projectid,faintegration:faintegration,assemblynotes:assemblynotes,q101:q101,q102:q102,q103:q103,q104:q104,q105:q105,q106:q106,q107:q107,q108:q108,q109:q109,q110:q110,q112:q112,q113:q113,positionnos:positionnos},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Assembly Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                }); 

	
	
}
function saveservices(projectid){
	
					var servicesname = document.getElementById("servicesname").value;
					
					
					if(document.getElementById("q21yes").checked==true){
						var q21 = "YES";
					}if(document.getElementById("q21no").checked==true){
						var q21 = "NO";
					}if(document.getElementById("q21na").checked==true){
						var q21 = "NA";
					}
					
					if(document.getElementById("q22yes").checked==true){
						var q22 = "YES";
					}if(document.getElementById("q22no").checked==true){
						var q22 = "NO";
					}if(document.getElementById("q22na").checked==true){
						var q22 = "NA";
					}
					
					
					
					if(document.getElementById("q23yes").checked==true){
						var q23 = "YES";
					}if(document.getElementById("q23no").checked==true){
						var q23 = "NO";
					}if(document.getElementById("q23na").checked==true){
						var q23 = "NA";
					}
					
					if(document.getElementById("q24yes").checked==true){
						var q24 = "YES";
					}if(document.getElementById("q24no").checked==true){
						var q24 = "NO";
					}if(document.getElementById("q24na").checked==true){
						var q24 = "NA";
					}
					
					
					if(document.getElementById("q25yes").checked==true){
						var q25 = "YES";
					}if(document.getElementById("q25no").checked==true){
						var q25 = "NO";
					}if(document.getElementById("q25na").checked==true){
						var q25 = "NA";
					}
					
					
					if(document.getElementById("q26yes").checked==true){
						var q26 = "YES";
					}if(document.getElementById("q26no").checked==true){
						var q26 = "NO";
					}if(document.getElementById("q26na").checked==true){
						var q26 = "NA";
					}
					
					
					if(document.getElementById("q27yes").checked==true){
						var q27 = "YES";
					}if(document.getElementById("q27no").checked==true){
						var q27 = "NO";
					}if(document.getElementById("q27na").checked==true){
						var q27 = "NA";
					}
					
					
					
					
					var servicesnotes = document.getElementById("servicesnotes").value;
					var extra1 = document.getElementById("extra1").value;
					if(document.getElementById("eq1yes").checked==true){
						var eq1 = "YES";
					}if(document.getElementById("eq1no").checked==true){
						var eq1 = "NO";
					}if(document.getElementById("eq1na").checked==true){
						var eq1 = "NA";
					}
					
					var extra2 = document.getElementById("extra2").value;
					if(document.getElementById("eq2yes").checked==true){
						var eq2 = "YES";
					}if(document.getElementById("eq2no").checked==true){
						var eq2 = "NO";
					}if(document.getElementById("eq2na").checked==true){
						var eq2 = "NA";
					}
					
					var extra3 = document.getElementById("extra3").value;
					
					if(document.getElementById("eq3yes").checked==true){
						var eq3 = "YES";
					}if(document.getElementById("eq3no").checked==true){
						var eq3 = "NO";
					}if(document.getElementById("eq3na").checked==true){
						var eq3 = "NA";
					}
					
					
					$.ajax({
                     url: '../../functions/saveservices',
                    type: 'post',
                    data: {projectid: projectid,servicesname:servicesname,servicesnotes:servicesnotes,q21:q21,q22:q22,q23:q23,q24:q24,q25:q25,q26:q26,q27:q27,extra1:extra1,extra2:extra2,extra3:extra3,eq1:eq1,eq2:eq2,eq3:eq3},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Services Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                }); 

	
	
}





$('.btn-growl').on('click', function(){
                var growlType = $(this).data('growl');

                $.bootstrapGrowl('<h4><strong>Notification</strong></h4> <p>Content..</p>', {
                    type: growlType,
                    delay: 3000,
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 20}
                });

                $(this).prop('disabled', true);
            });
			
		

function addregularprojectbutton(){
	
	
	//var projectid = document.getElementById("projectid").value;
	//var rp_issuetype = document.getElementById("rp_issuetype").value;
	$("#saveregularbutton").removeClass("hidden");
	$("#updateregularbutton").addClass("hidden");
	document.getElementById("rp_partdescription").value ="";
	document.getElementById("rp_qty").value ="";
	document.getElementById("rp_posno").value ="";
	document.getElementById("rp_issuedetails").value ="";
	document.getElementById("rp_correction").value ="";
	
	document.getElementById("rp_cause").value ="";
	
	document.getElementById("rp_level2").value ="";
	document.getElementById("rp_level3").value ="";
	document.getElementById("rp_approvedby").value ="";
	document.getElementById("rp_date").value ="";
}

function saveregular(){
	
					var projectid = document.getElementById("projectid").value;
					var rp_issuetype = document.getElementById("rp_issuetype").value;
					var rp_partdescription = document.getElementById("rp_partdescription").value;
					var rp_qty = document.getElementById("rp_qty").value;
					var rp_posno = document.getElementById("rp_posno").value;
					var rp_issuedetails = document.getElementById("rp_issuedetails").value;
					var rp_correction = document.getElementById("rp_correction").value;
					var rp_groupresponsible = document.getElementById("rp_groupresponsible").value;
					var rp_cause = document.getElementById("rp_cause").value;
					var rp_ship = document.getElementById("rp_ship").value;
					var rp_level0 = document.getElementById("rp_level0").value;
					var rp_level1 = document.getElementById("rp_level1").value;
					var rp_level2 = document.getElementById("rp_level2").value;
					var rp_level3 = document.getElementById("rp_level3").value;
					var rp_approvedby = document.getElementById("rp_approvedby").value;
					var rp_date = document.getElementById("rp_date").value;
					//alert("test");
					
					$.ajax({
                    url: '../../functions/saveregular',
                    type: 'post',
                    data: {projectid: projectid, rp_issuetype: rp_issuetype,rp_partdescription:rp_partdescription,rp_qty:rp_qty,rp_issuedetails:rp_issuedetails,rp_correction:rp_correction,rp_groupresponsible:rp_groupresponsible,rp_cause:rp_cause,rp_ship:rp_ship,rp_level0:rp_level0,rp_level1:rp_level1,rp_level2:rp_level2,rp_level3:rp_level3,rp_approvedby:rp_approvedby,rp_date:rp_date,rp_posno:rp_posno},
                    success: function(response) {
						console.log(response);
						//var lastid = parseInt(response);
						var closeregular = document.getElementById("closeregular");
						$('#regularprojecttable').load(document.URL +  ' #regularprojecttable');
						//$('#modalform').load(document.URL +  ' #modalform');
						//$('#incompletestable tr:last').after("<tr><td>"+partnumber+"</td><td>"+partdescription+"</td><td>"+notes+"</td><td><button class='btn btn-danger notification' id='notification' onClick='deleteincomplete("+lastid+")'><i class='fa fa-times'></i></button></td></tr>");
						closeregular.click();
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                });

	
	
}

function editregular(id){
	$("#saveregularbutton").addClass("hidden");
	$("#updateregularbutton").removeClass("hidden");
	
	
	$.ajax({
		url: '../../functions/getregularproject/'+id,
		type: 'post',
		//data: {projectid : id},
		success: function(response) {
			//console.log(response);
			var data = JSON.parse(response);
			console.log(data);
			document.getElementById("regularprojectid").value = data.rpid;

			//var issuetype = data.rp_issuetype;
			var proj = document.getElementById("rp_issuetype");
			var opt = document.createElement("option");
			opt.value = data.rp_issuetype;
			if(data.rp_issuetype==""){
				opt.text = "";
			}else{
				opt.text = data.rp_issuetype;
			}
			opt.selected = "selected";
			proj.add(opt,  proj.options[0]);
			
			
			document.getElementById("rp_partdescription").value = data.rp_partdescription;
			document.getElementById("rp_qty").value = data.rp_qty;
			document.getElementById("rp_posno").value = data.rp_posno;
			document.getElementById("rp_issuedetails").value = data.rp_issuedetails;
			document.getElementById("rp_correction").value = data.rp_correction;
			//var rp_groupresponsible = document.getElementById("rp_groupresponsible").value;
			var rp_groupresponsible = document.getElementById("rp_groupresponsible");
			var opt = document.createElement("option");
			opt.value = data.rp_groupresponsible;
			if(data.rp_groupresponsible==""){
				opt.text = "";
			}else{
				opt.text = data.rp_groupresponsible;
			}
			opt.selected = "selected";
			rp_groupresponsible.add(opt,  rp_groupresponsible.options[0]);

			document.getElementById("rp_cause").value = data.rp_cause;
			
			var rp_ship = document.getElementById("rp_ship");
			var opt = document.createElement("option");
			opt.value = data.rp_ship;
			if(data.rp_ship==""){
				opt.text = "";
			}else{
				opt.text = data.rp_ship;
			}
			opt.selected = "selected";
			rp_ship.add(opt,  rp_ship.options[0]);
			//level 0
			var rp_level0 = document.getElementById("rp_level0");
			var opt = document.createElement("option");
			opt.value = data.rp_level0;
			if(data.rp_level0==""){
				opt.text = "";
			}else{
				opt.text = data.rp_level0;
			}
			opt.selected = "selected";
			rp_level0.add(opt,  rp_level0.options[0]);
			//level 1
			var rp_level1 = document.getElementById("rp_level1");
			var opt = document.createElement("option");
			opt.value = data.rp_level1;
			if(data.rp_level1==""){
				opt.text = "";
			}else{
				opt.text = data.rp_level1;
			}
			opt.selected = "selected";
			rp_level1.add(opt,  rp_level1.options[0]);
			
			//level 2
			document.getElementById("rp_level2").value = data.rp_level2;
			document.getElementById("rp_level3").value = data.rp_level3;
			

			document.getElementById("rp_approvedby").value = data.rp_approvedby;
			document.getElementById("rp_date").value = data.rp_date;
			
			
		} 
	});
	
	
}

function updateregular(){
	
	$(this).prop('disabled', true);
					var regularprojectid = document.getElementById("regularprojectid").value;
					//var projectid = document.getElementById("projectid").value;
					var rp_issuetype = document.getElementById("rp_issuetype").value;
					var rp_partdescription = document.getElementById("rp_partdescription").value;
					var rp_qty = document.getElementById("rp_qty").value;
					var rp_posno = document.getElementById("rp_posno").value;
					var rp_issuedetails = document.getElementById("rp_issuedetails").value;
					var rp_correction = document.getElementById("rp_correction").value;
					var rp_groupresponsible = document.getElementById("rp_groupresponsible").value;
					var rp_cause = document.getElementById("rp_cause").value;
					var rp_ship = document.getElementById("rp_ship").value;
					var rp_level0 = document.getElementById("rp_level0").value;
					var rp_level1 = document.getElementById("rp_level1").value;
					var rp_level2 = document.getElementById("rp_level2").value;
					var rp_level3 = document.getElementById("rp_level3").value;
					var rp_approvedby = document.getElementById("rp_approvedby").value;
					var rp_date = document.getElementById("rp_date").value;
					//alert("test");
					
					$.ajax({
                    url: '../../functions/updateregular',
                    type: 'post',
                    data: {regularprojectid:regularprojectid,rp_issuetype: rp_issuetype,rp_partdescription:rp_partdescription,rp_qty:rp_qty,rp_issuedetails:rp_issuedetails,rp_correction:rp_correction,rp_groupresponsible:rp_groupresponsible,rp_cause:rp_cause,rp_ship:rp_ship,rp_level0:rp_level0,rp_level1:rp_level1,rp_level2:rp_level2,rp_level3:rp_level3,rp_approvedby:rp_approvedby,rp_date:rp_date,rp_posno:rp_posno},
                    success: function(response) {
						console.log(response);
						
						var closeregular = document.getElementById("closeregular");
						$('#regularprojecttable').load(document.URL +  ' #regularprojecttable');
						closeregular.click();
						

						
                    }
                });

	
	
}



function deleteregular(id){
	
	var r = confirm("Are your sure you want to delete this detail?");
    if (r == true) {
        //alert ("You pressed OK!");
		//alert(id);
		$.ajax({
                    url: '../../functions/deleteregular',
                    type: 'post',
                    data: {rpid: id},
                    success: function(response) {
						console.log(response);
						//location.reload();
						$('#regularprojecttable').load(document.URL +  ' #regularprojecttable');
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}


function savedesign(projectid){
	
					var designname = document.getElementById("designname").value;
					
					
					if(document.getElementById("q31yes").checked==true){
						var q31 = "YES";
					}if(document.getElementById("q31no").checked==true){
						var q31 = "NO";
					}if(document.getElementById("q31na").checked==true){
						var q31 = "NA";
					}
					
					if(document.getElementById("q32yes").checked==true){
						var q32 = "YES";
					}if(document.getElementById("q32no").checked==true){
						var q32 = "NO";
					}if(document.getElementById("q32na").checked==true){
						var q32 = "NA";
					}
					
					
					
					if(document.getElementById("q33yes").checked==true){
						var q33 = "YES";
					}if(document.getElementById("q33no").checked==true){
						var q33 = "NO";
					}if(document.getElementById("q33na").checked==true){
						var q33 = "NA";
					}
					

					var designnotes = document.getElementById("designnotes").value;
					var designextra1 = document.getElementById("designextra1").value;
					if(document.getElementById("deq1yes").checked==true){
						var deq1 = "YES";
					}if(document.getElementById("deq1no").checked==true){
						var deq1 = "NO";
					}if(document.getElementById("deq1na").checked==true){
						var deq1 = "NA";
					}
					var designextra2 = document.getElementById("designextra2").value;
					if(document.getElementById("deq2yes").checked==true){
						var deq2 = "YES";
					}if(document.getElementById("deq2no").checked==true){
						var deq2 = "NO";
					}if(document.getElementById("deq2na").checked==true){
						var deq2 = "NA";
					}
					
					$.ajax({
                    url: '../../functions/savedesign',
                    type: 'post',
                    data: {projectid: projectid,designname:designname,designnotes:designnotes,q31:q31,q32:q32,q33:q33,designextra1:designextra1,designextra2:designextra2,deq1:deq1,deq2:deq2},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Design Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                }); 

	
	
}	

function saveqa(projectid){
	
					var qaname = document.getElementById("qaname").value;
					var qanotes = document.getElementById("qanotes").value;
					
					
					
					if(document.getElementById("q41yes").checked==true){
						var q41 = "YES";
					}if(document.getElementById("q41no").checked==true){
						var q41 = "NO";
					}if(document.getElementById("q41na").checked==true){
						var q41 = "NA";
					}
					
					if(document.getElementById("q42yes").checked==true){
						var q42 = "YES";
					}if(document.getElementById("q42no").checked==true){
						var q42 = "NO";
					}if(document.getElementById("q42na").checked==true){
						var q42 = "NA";
					}
					
					
					
					if(document.getElementById("q43yes").checked==true){
						var q43 = "YES";
					}if(document.getElementById("q43no").checked==true){
						var q43 = "NO";
					}if(document.getElementById("q43na").checked==true){
						var q43 = "NA";
					}
					

					
					
					$.ajax({
                    url: '../../functions/saveqa',
                    type: 'post',
                    data: {projectid: projectid,qaname:qaname,qanotes:qanotes,q41:q41,q42:q42,q43:q43},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <pQA Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                }); 

	
	
}	

function savepackaging(projectid){
	
					var packagingname = document.getElementById("packagingname").value;
					var packagingnotes = document.getElementById("packagingnotes").value;
					
					
					
					if(document.getElementById("q51yes").checked==true){
						var q51 = "YES";
					}if(document.getElementById("q51no").checked==true){
						var q51 = "NO";
					}if(document.getElementById("q51na").checked==true){
						var q51 = "NA";
					}
					
					if(document.getElementById("q52yes").checked==true){
						var q52 = "YES";
					}if(document.getElementById("q52no").checked==true){
						var q52 = "NO";
					}if(document.getElementById("q52na").checked==true){
						var q52 = "NA";
					}
					
					
					
					if(document.getElementById("q53yes").checked==true){
						var q53 = "YES";
					}if(document.getElementById("q53no").checked==true){
						var q53 = "NO";
					}if(document.getElementById("q53na").checked==true){
						var q53 = "NA";
					}
					
					if(document.getElementById("q55yes").checked==true){
						var q55 = "YES";
					}if(document.getElementById("q55no").checked==true){
						var q55 = "NO";
					}if(document.getElementById("q55na").checked==true){
						var q55 = "NA";
					}
					
					if(document.getElementById("q56yes").checked==true){
						var q56 = "YES";
					}if(document.getElementById("q56no").checked==true){
						var q56 = "NO";
					}if(document.getElementById("q56na").checked==true){
						var q56 = "NA";
					}

					if(document.getElementById("q57yes").checked==true){
						var q57 = "YES";
					}if(document.getElementById("q57no").checked==true){
						var q57 = "NO";
					}if(document.getElementById("q57na").checked==true){
						var q57 = "NA";
					}
					
					if(document.getElementById("q58yes").checked==true){
						var q58 = "YES";
					}if(document.getElementById("q58no").checked==true){
						var q58 = "NO";
					}if(document.getElementById("q58na").checked==true){
						var q58 = "NA";
					}
					
					if(document.getElementById("q59yes").checked==true){
						var q59 = "YES";
					}if(document.getElementById("q59no").checked==true){
						var q59 = "NO";
					}if(document.getElementById("q59na").checked==true){
						var q59 = "NA";
					}
					
					if(document.getElementById("q510yes").checked==true){
						var q510 = "YES";
					}if(document.getElementById("q510no").checked==true){
						var q510 = "NO";
					}if(document.getElementById("q510na").checked==true){
						var q510 = "NA";
					}
					
					$.ajax({
                    url: '../../functions/savepackaging',
                    type: 'post',
                    data: {projectid: projectid,packagingname:packagingname,packagingnotes:packagingnotes,q51:q51,q52:q52,q53:q53,q55:q55,q56:q56,q57:q57,q58:q58,q59:q59,q510:q510},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Packaging Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                }); 

	
	
}	

function savedetails(projectid){
	
					var installernotes = document.getElementById("installernotes").value;
					var integrationrep = document.getElementById("integrationrep").value;
					var packagingrep = document.getElementById("packagingrep").value;
					var timerelease = document.getElementById("timerelease").value;
					var daterelease = document.getElementById("daterelease").value;
							
					
					$.ajax({
                    url: '../../functions/savedetails',
                    type: 'post',
                    data: {projectid: projectid,installernotes:installernotes,integrationrep:integrationrep,packagingrep:packagingrep,timerelease:timerelease,daterelease:daterelease},
                    success: function(response) {
						console.log(response);
						//var growlType = $(this).data('growl');

						$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Details Saved!</p>', {
							type: 'success',
							delay: 3000,
							allow_dismiss: true,
							offset: {from: 'top', amount: 20}
						});
						//var lastid = parseInt(response);
						//window.location.href = "projectdetails.php?id="+lastid;

						
                    }
                }); 

	
	
}	


function adduser(){
			
			$("#username").get(0).setSelectionRange(0,0);
			$('#updateuser').prop("disabled", true);    
			$('#saveuser').prop("disabled", false);    
			document.getElementById("username").value ="";
			document.getElementById("password").value="";
			document.getElementById("user_name").value="";

			setTimeout(function () { $("#username").focus(); }, 20);
			

}
	
			



//save project

function saveuser(){
	

					var username = document.getElementById("username").value;
					var password = document.getElementById("password").value;
					var user_name = document.getElementById("user_name").value;
					var usertype = document.getElementById("usertype").value;
					
			if(username!="" && password!="" && user_name!="" && usertype!=""){

					//check duplicate user
					$.ajax({
                    url: 'functions/checkusername',
                    type: 'post',
                    data: {username: username},
                    success: function(response) {
						console.log(response);
						duplicateid = JSON.parse(response);
						var numberofduplicate = parseInt(duplicateid.duplicateid);
						//alert(numberofduplicate);
						//console.log(last);
						
						if(numberofduplicate==0){
							$.ajax({
								url: 'functions/saveuser',
								type: 'post',
								data: {username: username, password: password,user_name:user_name,usertype:usertype},
								success: function(response) {
									//console.log(response);
									//convertresponse = JSON.parse(response);
									//var lastid = parseInt(convertresponse.lastid);
									location.reload();
									//console.log(last);
									//window.location.href = "projects/details/"+lastid;

									
								}
							});
						}else{
							alert("Username already used.")
						}
						
						
                    }
                });

			}//end if all fields are not blank
			else{
				alert("Please fill up the required fields.");
				setTimeout(function () { $("#username").focus(); }, 20);
			}
}

function deleteuser(id){
	
	var r = confirm("Are your sure you want to delete this User?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'functions/deleteuser',
                    type: 'post',
                    data: {userid: id},
                    success: function(response) {
						//console.log(response);
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

function edituser(id){
	
	//$('#update').removeAttr("disabled");
	$('#updateuser').prop("disabled", false);    
	$('#saveuser').prop("disabled", true);  
	$('#password').prop("disabled", true); 	
	

	$.ajax({
		url: 'functions/getuser/'+id,
		type: 'post',
		//data: {projectid : id},
		success: function(response) {
			//console.log(response);
			 var data = JSON.parse(response);
			 
			//insert values	
			document.getElementById("uid").value = id;
			document.getElementById("username").value = data.username;
			//document.getElementById("password").value = data.password;
			document.getElementById("user_name").value = data.name;
			//document.getElementById("usertype").value = data.usertype;
			
			var usertypevalue = data.usertype;
			var proj = document.getElementById("usertype");
			var opt = document.createElement("option");
			opt.value = data.usertype;
			if(data.usertype==""){
				opt.text = "";
			}else{
				opt.text = data.usertype;
			}
			
			opt.selected = "selected";

			proj.add(opt,  proj.options[0]);
			
			
			
			return "valid";
		} 
	});
		
	
}

function updateuser(){
	
	$('#updateuser').prop("disabled", true);    
	
	var userid = document.getElementById("uid").value;
	var username = document.getElementById("username").value;
	var user_name = document.getElementById("user_name").value;
	var usertype = document.getElementById("usertype").value;
	
	$.ajax({
		url: 'functions/updateuser/',
		type: 'post',
		data: {userid : userid,username:username,user_name:user_name,usertype:usertype},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		

}

function changepassword(id){
	document.getElementById("uid").value = id;
	setTimeout(function () { $("#newpassword").focus(); }, 20);
}

function updatepassword(){
	var userid = document.getElementById("uid").value;
	var newpassword = document.getElementById("newpassword").value;
	$.ajax({
		url: 'functions/changepassword/',
		type: 'post',
		data: {userid : userid,newpassword:newpassword},
		success: function(response) {
			//console.log(response);
			 //var data = JSON.parse(response);
			 window.location.reload();
			
		} 
	});
		

}