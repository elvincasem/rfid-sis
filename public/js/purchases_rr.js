function savedelivery(){
	
			  
			var receiveddate = document.getElementById("receiveddate").value;
			var drno = document.getElementById("drno").value;
			var aprid = document.getElementById("aprid").value;
			var poid = document.getElementById("poid").value;
			var prid = document.getElementById("prid").value;
			var supplierid = document.getElementById("supplierid").value;
			var invoiceno = document.getElementById("invoiceno").value;
			var warehouseid = document.getElementById("warehouseid").value;
			
			
			//check if drno is empty
			if(drno =="" || supplierid==""){
				alert("Receipt No. or Supplier Cannot be empty.")
			}else{
				$('#addbutton').prop("disabled", true);  
				$.ajax({
					url: 'receiving/savedelivery',
					type: 'post',
					data: {receiveddate: receiveddate,drno:drno,aprid:aprid,poid:poid,supplierid:supplierid,invoiceno:invoiceno,warehouseid:warehouseid,prid:prid},
					success: function(response) {
						var lastid = JSON.parse(response);
						window.location.href = "receiving/details/"+lastid;
					}
					});
					
			}
			
			

}	

function adddelivery(){
	//document.getElementById("receiveddate").value="";
	document.getElementById("drno").value="";
	
}

function deletepo(id){
	
	var r = confirm("Are your sure you want to delete this Purchase Order?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'purchaseorder/deletepo',
                    type: 'post',
                    data: {poid: id},
                    success: function(response) {
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

function savepounitprice(poitemsid){
	var unitprice = document.getElementById("unitprice-"+poitemsid).value;
	$.ajax({
		url: '../updateunitprice',
		type: 'post',
		data: {poitemsid: poitemsid,unitprice:unitprice},
		success: function(response) {
			console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			$('#totalamount').load(document.URL +  ' #totalamount');
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
		}
	});
	
	$('#general-table').load(document.URL +  ' #general-table');
}

function editpo(){
	
			$('#pono').prop("disabled", false);    
			$('#podate').prop("disabled", false);    
			//$('#modeofprocurement').prop("disabled", false);    
			$('#placeofdelivery').prop("disabled", false);    
			$('#deliveryterm').prop("disabled", false);    
			$('#dateofdelivery').prop("disabled", false);    
			$('#paymentterm').prop("disabled", false);    
			
			
}

function printpo()
{
	var DocumentContainer = document.getElementById('poprintbody');
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
function printvoucher()
{
	var DocumentContainer = document.getElementById('voucherprintbody');
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


$("#itemlist").keypress(function (e) {
    if (e.which == 13) {
		//alert("test");
		//savepritem();
		$("#itemqty").focus();
		showitemunit();
		showitemprice();
    }
});

$("#itemqty").keypress(function (e) {
    if (e.which == 13) {
		//alert("test");
		//savepritem();
		$("#itemunit").focus();
		
    }
});

$("#itemlist").focusout(function (e) {
    showitemunit();
    showitemprice();
});

$("#unitcost").keypress(function (e) {
    if (e.which == 13) {
		//alert("test");
		//savepritem();
		//$("#itemqty").focus();
		//showitemunit();
		var addbutton = document.getElementById("additemreceived");
		addbutton.click();
    }
});

function showitemunit(){
	var unitselect = document.getElementById("itemunit");
	
	for (var i = 0; i <= unitselect.length; i++) { 
		unitselect.remove(unitselect.length-1);
	}
	
	//$("#itemunit").append("<option value='0'>Select Item</option>");
	
	var itemid = parseInt(document.getElementById("itemlist").value);
	$.ajax({
		url: '../getitemunit',
		type: 'post',
		data: {itemid: itemid},
		success: function(response) {
			//console.log(response);
			var uom = JSON.parse(response);
			//console.log(uom);
			//console.log(uom['0'].unit);
			//document.getElementById("inventoryqty").innerHTML = uom.inventory_qty;
				
				$("#itemunit").append("<option value='"+uom.unit+"'>"+uom.unit+"</option>");
			
				var max = 20;
				for (var ctr = 0; ctr <= max; ctr++) { 
					try{
						var testing = uom[ctr].equiv_unit;
						var base_qty = uom[ctr].base_qty;
						var base_unit = uom[ctr].base_unit;
						$("#itemunit").append("<option value='"+testing+"'>"+testing+ " (" +base_qty+" "+base_unit+")</option>");
						//console.log(testing);
					}catch(e){
						max = 21;
						return 0;	
					}
				}
				
				
				
				
			
		}
	});
	
}

function showitemprice(){
	var unitselect = document.getElementById("itemunit");
	
	for (var i = 0; i <= unitselect.length; i++) { 
		unitselect.remove(unitselect.length-1);
	}
	
	//$("#itemunit").append("<option value='0'>Select Item</option>");
	
	if(document.getElementById("itemlist").value==""){
		var itemid=0;
	}else{
		var itemid = parseInt(document.getElementById("itemlist").value);
	}
	
	
	
	
	$.ajax({
		url: '../getitemprice',
		type: 'post',
		data: {itemid: itemid},
		success: function(response) {
			console.log(response);
			//var uom = JSON.parse(response);
				if(response=="NONE"){
					//do nothing
				}else{
					document.getElementById("unitcost").value = response;
				}
				
				//$("#unitcost").append("<option value='"+uom.unit+"'>"+uom.unit+"</option>");
			
				
				
				
			
		}
	});
	
}

function additemreceived(poitemsid){
	
	var deliveryid = document.getElementById("deliveryid").value;
	var drno =document.getElementById("drno").value;
	var itemid = parseInt(document.getElementById("itemlist").value);
	var itemqty = document.getElementById("itemqty").value;
	var itemunit =document.getElementById("itemunit").value;
	var unitcost = document.getElementById("unitcost").value;
	var warehouseid = document.getElementById("warehouseid").value;
	
	
	
	$.ajax({
		url: '../additemreceived',
		type: 'post',
		data: {deliveryid:deliveryid, drno:drno, itemid: itemid,itemqty:itemqty,itemunit:itemunit,unitcost:unitcost,warehouseid:warehouseid},
		success: function(response) {
			//console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			$('#totalamount').load(document.URL +  ' #totalamount');
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			document.getElementById("itemlist").value="";
			document.getElementById("unitcost").value="0.00";
			
			document.getElementById("itemlist").focus();
		}
	});
	
	$('#general-table').load(document.URL +  ' #general-table');
}


function saveunitprice(deliveryitemsid){
	var unitprice = document.getElementById("unitprice-"+deliveryitemsid).value;

	$.ajax({
		url: '../updateunitprice',
		type: 'post',
		data: {deliveryitemsid: deliveryitemsid,unitprice:unitprice},
		success: function(response) {
			console.log(response);
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			$('#totalamount').load(document.URL +  ' #totalamount');
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
		}
	});
	
	$('#general-table').load(document.URL +  ' #general-table');
}

function deletedritem(id){
	//alert(id);
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deletedritem',
                    type: 'post',
                    data: {deliveryitemsid: id},
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
function deletedelivery(id){
	//alert(id);
	var r = confirm("Are your sure you want to delete this Delivery?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'receiving/deletedelivery',
                    type: 'post',
                    data: {deliveryid: id},
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
$("#itemlist").focus();

function editrr(){
	
	$('#savedrbutton').prop("disabled", false);  
	$('#supplierid').prop("disabled", false);  
	$('#drno').prop("disabled", false);  
	$('#aprid').prop("disabled", false);  
	$('#receivedate').prop("disabled", false);  
	$('#status').prop("disabled", false);  
	$('#poid').prop("disabled", false);  
	$('#prid').prop("disabled", false);  
	$('#invoiceno').prop("disabled", false);  
	$('#warehouseid').prop("disabled", false);  
	$('#purpose').prop("disabled", false);  
}
	
function updatedrdetails(){
	var deliveryid = document.getElementById("deliveryid").value;
	var receivedate = document.getElementById("receivedate").value;
	var drno = document.getElementById("drno").value;
	var aprid = document.getElementById("aprid").value;
	var poid = document.getElementById("poid").value;
	var prid = document.getElementById("prid").value;
	var supplierid = document.getElementById("supplierid").value;
	var status = document.getElementById("status").value;
	var invoiceno = document.getElementById("invoiceno").value;
	var warehouseid = document.getElementById("warehouseid").value;
	var purpose = document.getElementById("purpose").value;
	
			
			//check if drno is empty
			//if(drno ==""){
				//alert("Receipt No. Cannot be empty.")
			//}else{
				//$('#addbutton').prop("disabled", true);  
				$.ajax({
					url: '../updatedelivery',
					type: 'post',
					data: {receiveddate: receivedate,drno:drno,aprid:aprid,poid:poid,supplierid:supplierid,deliveryid:deliveryid,status:status,invoiceno:invoiceno,warehouseid:warehouseid,purpose:purpose,prid:prid},
					success: function(response) {
						console.log(response);
						//var lastid = JSON.parse(response);
						location.reload();
						//window.location.href = "receiving/details/"+lastid;
					}
					});
					
			//}
}

function updateinventory(){
	//alert("Temp: inventory Updated!");
	
	var deliveryid = document.getElementById("deliveryid").value;
	//alert(deliveryid);
	$.ajax({
		url: '../updatedeliveryinventory',
		type: 'post',
		data: {deliveryid: deliveryid},
		success: function(response) {
			
			$('#success-alert').show("slow");

			alert("Inventory Updated");
			console.log(response);
			window.location.reload();
		}
	});
}
			
function updatevoucher_requestby(){
	
	document.getElementById("print_requested_by1").innerHTML = document.getElementById("requested_by").value;
	document.getElementById("print_requested_by2").innerHTML = document.getElementById("requested_by").value;
	document.getElementById("print_requested_by3").innerHTML = document.getElementById("requested_by").value;
}


function updatevoucher_approvedby(){
	
	document.getElementById("print_approved_by").innerHTML = document.getElementById("approved_by").value;
	
}


function updatevoucher_c1(){
	
	var cvalue = document.getElementById("selectc").value;
	
	if(cvalue==1){
		document.getElementById("c1").innerHTML = "X";
		document.getElementById("c2").innerHTML = "";
		
	}else{
		document.getElementById("c1").innerHTML = "";
		document.getElementById("c2").innerHTML = "X";
	}
	
}

function updatevoucher_c2(){
	
	var dvalue = document.getElementById("selectd").value;
	
	if(dvalue==1){
		document.getElementById("d1").innerHTML = "X";
		document.getElementById("d2").innerHTML = "";
		
	}else{
		document.getElementById("d1").innerHTML = "";
		document.getElementById("d2").innerHTML = "X";
	}
	
}

$(document).ready(function() {
    $('#example-datatable_rr').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );