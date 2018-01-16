


function saveptr(){
	
	$('#savebutton').prop("disabled", true);    
	var ptrno = document.getElementById("ptrno").value;
	var ptrdate = document.getElementById("ptrdate").value;
	var ptrfrom = document.getElementById("ptrfrom").value;
	var ptrto = document.getElementById("ptrto").value;
	var reasonfortransfer = document.getElementById("reasonfortransfer").value;
	
	var ptrtransfertype = document.getElementById("ptrtransfertype").value;
	var ptrothers = document.getElementById("ptrothers").value;
	
	if(ptrtransfertype = "OTHERS"){
		var transfertypevalue = ptrothers;
	}else{
		var transfertypevalue = ptrtransfertype;
	}
		
	
	
	$.ajax({
		url: 'ptr/saveptr',
		type: 'post',
		data: {ptrno: ptrno,ptrdate:ptrdate,ptrfrom:ptrfrom,ptrto:ptrto,transfertypevalue:transfertypevalue,reasonfortransfer:reasonfortransfer},
		success: function(response) {
			//console.log(response);
			//location.reload();
			var lastid = JSON.parse(response);
			window.location.href = "ptr/details/"+lastid;
			
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

function updateptrdetails(){
	var ptrid = document.getElementById("ptrid").value 
	var fromoffice = document.getElementById("fromoffice").value 
	var ptrno = document.getElementById("ptrno").value 
	var ptrdate = document.getElementById("ptrdate").value 
	var tooffice = document.getElementById("tooffice").value 
	var transferreason = document.getElementById("transferreason").value 
	
	
	$.ajax({
		url: '../updateptrdetails',
		type: 'post',
		data: {ptrid:ptrid,fromoffice:fromoffice,ptrno:ptrno,ptrdate:ptrdate,tooffice:tooffice,transferreason:transferreason},
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

function printptrfulldetails(){
	var DocumentContainer = document.getElementById('fulldetailsbody');
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

function addpropertytolistptr(){
	
	//$('#savebutton').prop("disabled", true);    
	var equipno = document.getElementById("equipno").value;
	var assetid = document.getElementById("assetid").value;
	var ptrid = document.getElementById("ptrid").value;
		//alert(icsno);
	$.ajax({
		url: '../addpropertytolistptr',
		type: 'post',
		data: {ptrid: ptrid,equipno:equipno,assetid:assetid},
		success: function(response) {
			console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			
		}
	});
	
}

function deleteptritem(id){
	
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleteptritem',
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

function addblankspace(){
	var blankspace = document.getElementById("blankspace").value;
	
	/*
	
		for($ctr=$itemcount;$ctr<=32;$ctr++){
			//echo "<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>";
		}
	*/
}