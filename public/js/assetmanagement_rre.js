


function saverre(){
	
	$('#savebutton').prop("disabled", true);    
	var rredate = document.getElementById("rredate").value;
	var rreno = document.getElementById("rreno").value;
	var rreenduser = document.getElementById("rreenduser").value;

	
	$.ajax({
		url: 'rre/saverre',
		type: 'post',
		data: {rredate: rredate,rreno:rreno,rreenduser:rreenduser},
		success: function(response) {
			//console.log(response);
			//location.reload();
			var lastid = JSON.parse(response);
			window.location.href = "rre/details/"+lastid;
			
		}
	});
	
}

function deleterre(id){
	
	var r = confirm("Are your sure you want to delete this RRE?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'rre/deleterre',
                    type: 'post',
                    data: {rreid: id},
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

function updaterredetails(){
	var rreid = document.getElementById("rreid").value 
	var rreno = document.getElementById("rreno").value 
	var rredate = document.getElementById("rredate").value 
	var rreenduser = document.getElementById("rreenduser").value 
	
	
	$.ajax({
		url: '../updaterredetails',
		type: 'post',
		data: {rreid:rreid,rreno:rreno,rredate:rredate,rreenduser:rreenduser},
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

function addpropertytolistrre(){
	
	//$('#savebutton').prop("disabled", true);    
	var equipno = document.getElementById("equipno").value;
	var assetid = document.getElementById("assetid").value;
	var rreid = document.getElementById("rreid").value;
	var parics = document.getElementById("parics").value;
	var rreenduser_item = document.getElementById("rreenduser_item").value;
	var rre_remarks = document.getElementById("rre_remarks").value;
		//alert(icsno);
	$.ajax({
		url: '../addpropertytolistrre',
		type: 'post',
		data: {rreid: rreid,equipno:equipno,assetid:assetid,parics:parics,rreenduser_item:rreenduser_item,rre_remarks:rre_remarks},
		success: function(response) {
			console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			
		}
	});
	
}

function deleterreitem(id){
	
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleterreitem',
                    type: 'post',
                    data: {rreitemsid: id},
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