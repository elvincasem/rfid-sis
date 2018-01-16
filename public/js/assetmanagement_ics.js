


function saveics(){
	
	$('#savebutton').prop("disabled", true);    
	var icsdate = document.getElementById("icsdate").value;
	var icsno = document.getElementById("icsno").value;
	var eid = document.getElementById("eid").value;
	
	
	$.ajax({
		url: 'ics/saveics',
		type: 'post',
		data: {icsdate: icsdate,icsno:icsno,eid:eid},
		success: function(response) {
			//console.log(response);
			//location.reload();
			var lastid = JSON.parse(response);
			window.location.href = "ics/details/"+lastid;
			
		}
	});
	
}

function deleteics(id){
	
	var r = confirm("Are your sure you want to delete this ICS?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'ics/deleteics',
                    type: 'post',
                    data: {icsid: id},
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
		url: '../updateproperty',
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
		url: '../getesinglequipment/'+equipno,
		type: 'post',
		//data: {projectid : id},
		success: function(response) {
			console.log(response);
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
						//location.reload();
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
		url: '../updateusertab',
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
		url: '../updateremarks',
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
		url: '../updatepheriperal',
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

function showasset_unit(){
	
	var equipno = document.getElementById("equipno").value;
	$.ajax({
		url: '../showasset_unit',
		type: 'post',
		data: {equipno:equipno},
		success: function(response) {
			//console.log(response);
			var data = JSON.parse(response);
			var itemunit = document.getElementById("itemunit");
			var assetid = document.getElementById("assetid");
			itemunit.value = data.asset_unit;
			assetid.value = data.assetid;
			
			//$(itemunit).append( "<option value='"+response+"'>"+response+"</option>");
			//alert(response);
			
		}
	});
	
	
}

function printpar(){
	var DocumentContainer = document.getElementById('printbody');
	var WindowObject = window.open("", "PrintWindow",
	"width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
	WindowObject.document.writeln(DocumentContainer.innerHTML);
	WindowObject.document.close();
	setTimeout(function(){
		WindowObject.focus();
		WindowObject.print();
		WindowObject.close();
	},50);
}

function addpropertytolistics(){
	
	//$('#savebutton').prop("disabled", true);    
	var equipno = document.getElementById("equipno").value;
	var assetid = document.getElementById("assetid").value;
	var icsid = document.getElementById("icsid").value;
		//alert(icsno);
	$.ajax({
		url: '../addpropertytolistics',
		type: 'post',
		data: {icsid: icsid,equipno:equipno,assetid:assetid},
		success: function(response) {
			console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			
		}
	});
	
}

function deleteparitem(id){
	
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleteparitem',
                    type: 'post',
                    data: {paritem: id},
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


function updateicsdetails(){
	//alert("test");
	var icsid = document.getElementById("icsid").value 
	var eid = document.getElementById("eid").value
	var icsno = document.getElementById("icsno").value
	var icsdate = document.getElementById("icsdate").value
	
	
	
	$.ajax({
		url: '../updateicsdetails',
		type: 'post',
		data: {icsid:icsid,eid:eid,icsno:icsno,icsdate:icsdate},
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