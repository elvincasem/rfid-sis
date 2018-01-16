
function addapr(){
	
			$('#updateapr').prop("disabled", true);    
			$('#saveproject').prop("disabled", false);    
			
}

function saveasset(){
	
	$('#savebutton').prop("disabled", true);    
	var particulars = document.getElementById("particulars").value;
	var article = document.getElementById("article").value;
	var classification = document.getElementById("classification").value;
	
	
	$.ajax({
		url: '../saveasset',
		type: 'post',
		data: {particulars: particulars,article:article,classification:classification},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}

function deleteasset(id){
	
	var r = confirm("Are your sure you want to delete this asset?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'asset/deleteasset',
                    type: 'post',
                    data: {assetid: id},
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

function savebasic(){
	var propertyno = document.getElementById("propertyno").value 
	var particulars = document.getElementById("particulars").value
	var dateacquired = document.getElementById("dateacquired").value;
	var unitprice = document.getElementById("unitprice").value;
	var accountcode = document.getElementById("accountcode").value;
	var barcode = document.getElementById("barcode").value;
	var service = document.getElementById("service").value;
	var supplierid = document.getElementById("supplierid").value;
	var equipno = document.getElementById("equipno").value;
	var inventorytag = document.getElementById("inventorytag").value;
	
	$.ajax({
		url: 'property/updateproperty',
		type: 'post',
		data: {equipno:equipno,propertyno:propertyno,particulars:particulars,dateacquired:dateacquired,unitprice:unitprice,accountcode:accountcode,barcode:barcode,service:service,supplierid:supplierid,inventorytag:inventorytag},
		success: function(response) {
			console.log(response);
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Property Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			//location.reload();
			
		}
	});
	
}




function editequipment(equipno){
	
	//$('#update').removeAttr("disabled");
	//$('#updateproject').prop("disabled", false);    
	//$('#saveproject').prop("disabled", true);    

	
	$.ajax({
		url: 'property/getesinglequipment/'+equipno,
		type: 'post',
		//data: {projectid : id},
		success: function(response) {
			//console.log(response);
			 var data = JSON.parse(response);
			 
			 document.getElementById("propertyno").value = data.propertyNo;
			 document.getElementById("particulars").value = data.particulars;
			 document.getElementById("dateacquired").value = data.dateacquired;
			 document.getElementById("unitprice").value = data.totalcost;
			 document.getElementById("accountcode").value = data.accountcode;
			 document.getElementById("inventorytag").value = data.inventorytag;
			 document.getElementById("barcode").value = data.barcode;
			 document.getElementById("equipno").value = equipno;
			 document.getElementById("issuedto").value = data.issuedto;
			 document.getElementById("enduser").value = data.enduser;
			 document.getElementById("whereabout").value = data.whereabout;
			 document.getElementById("remarks").value = data.remarks;
			 //document.getElementById("service").value = data.service;
			//var servicevalue = data.service;
			var serv = document.getElementById("service");
			var opt = document.createElement("option");
			opt.value = data.service;
			if(data.service==null){
				opt.text = "";
			}else{
				opt.text = data.service;
			}
			
			opt.selected = "selected";

			serv.add(opt,  serv.options[0]);
			
			//supplier
			var suppliers = document.getElementById("supplierid");
			var opt = document.createElement("option");
			opt.value = data.supplierID;
			if(data.supplierID==null){
				opt.text = "";
			}else{
				opt.text = data.supName;
			}
			opt.value = data.supplierID;
			opt.selected = "selected";

			suppliers.add(opt,  suppliers.options[0]);
			
			
			//issuedto
			var issued_to = document.getElementById("issuedto");
			var opt = document.createElement("option");
			opt.value = data.issuedto;
			if(data.issuedtoname==null){
				opt.text = "";
			}else{
				opt.text = data.issuedtoname;
			}
			
			opt.selected = "selected";

			issued_to.add(opt,  issued_to.options[0]);
			
			//enduser
			document.getElementById("enduser").value = data.enduser;
			/*
			var end_user = document.getElementById("enduser");
			var opt = document.createElement("option");
			opt.value = data.enduser;
			if(data.issuedtoname==null){
				opt.text = "";
			}else{
				opt.text = data.endusername;
			}
			
			opt.selected = "selected";

			end_user.add(opt,  end_user.options[0]);
			*/
			
			document.getElementById("processor").value = data.processor;
			document.getElementById("ram").value = data.ram;
			document.getElementById("harddisk").value = data.hd;
			document.getElementById("operatingsystem").value = data.operatingsystem;
			document.getElementById("equipmentsn").value = data.equipsn;
			document.getElementById("processorsn").value = data.processorsn;
			document.getElementById("monitorsn").value = data.monitorsn;
			document.getElementById("keyboardsn").value = data.keyboardsn;
			document.getElementById("mousesn").value = data.mousesn;
			
		} 
	});
		
//$('#updateequipment').prop("disabled", true); 	
	
	
}

function deleteequipitem(id){
	
	var r = confirm("Are your sure you want to delete this equipment?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleteequip',
                    type: 'post',
                    data: {equipno: id},
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



function updateusertab(){
	//alert("test");
	var issuedto = document.getElementById("issuedto").value 
	var enduser = document.getElementById("enduser").value
	var equipno = document.getElementById("equipno").value
	
	
	$.ajax({
		url: 'property/updateusertab',
		type: 'post',
		data: {equipno:equipno,issuedto:issuedto,enduser:enduser},
		success: function(response) {
			console.log(response);
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Property Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			//location.reload();
			
		}
	});
	
}
function updateremarks(){
	//alert("test");
	var whereabout = document.getElementById("whereabout").value 
	var remarks = document.getElementById("remarks").value
	var equipno = document.getElementById("equipno").value
	
	
	$.ajax({
		url: 'property/updateremarks',
		type: 'post',
		data: {equipno:equipno,whereabout:whereabout,remarks:remarks},
		success: function(response) {
			console.log(response);
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Property Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			//location.reload();
			
		}
	});
	
}
function updatepheriperal(){
	//alert("test");
	var equipno = document.getElementById("equipno").value
	var processor = document.getElementById("processor").value 
	var ram = document.getElementById("ram").value
	var harddisk = document.getElementById("harddisk").value
	var operatingsystem = document.getElementById("operatingsystem").value
	var equipmentsn = document.getElementById("equipmentsn").value
	var processorsn = document.getElementById("processorsn").value
	var monitorsn = document.getElementById("monitorsn").value
	var keyboardsn = document.getElementById("keyboardsn").value
	var mousesn = document.getElementById("mousesn").value
	
	
	
	
	$.ajax({
		url: 'property/updatepheriperal',
		type: 'post',
		data: {equipno:equipno,processor:processor,ram:ram,harddisk:harddisk,operatingsystem:operatingsystem,equipmentsn:equipmentsn,processorsn:processorsn,monitorsn:monitorsn,keyboardsn:keyboardsn,mousesn:mousesn},
		success: function(response) {
			console.log(response);
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Property Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			//location.reload();
			
		}
	});
	
}

function uploadimage(){
	
	//$('#saveitembutton').prop("disabled", true);    
	var assetimage = document.getElementById("assetimage").value;
	//var itemno = document.getElementById("itemno").value;
	
	$.ajax({
		url: '../do_upload',
		type: 'post',
		data: {assetimage:assetimage},
		success: function(response) {
			console.log(response);
			//location.reload();
			
		}
	});
	
}

function updategroupasset(){
	var assetid = document.getElementById("assetid").value 
	var particulars = document.getElementById("asset_particulars").value
	var articlename = document.getElementById("articlename").value;
	var classification = document.getElementById("classification").value;
	var asset_unit = document.getElementById("asset_unit").value;
	
	
	$.ajax({
		url: '../updategroupasset',
		type: 'post',
		data: {assetid:assetid,particulars:particulars,articlename:articlename,classification:classification,asset_unit:asset_unit},
		success: function(response) {
			console.log(response);
			
			location.reload();
			
		}
	});
	
}

function changefilter(){
	var selectedfilter = document.getElementById("classificationfilter").value;
	window.location.href = "../filter/"+selectedfilter;
}

function downloadproperty(){
	
	window.location.href = "property/downloadproperty";
}