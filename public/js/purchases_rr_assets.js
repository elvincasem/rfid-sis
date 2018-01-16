function savedelivery(){
	
			  
			var receiveddate = document.getElementById("receiveddate").value;
			var drno = document.getElementById("drno").value;
			var aprid = document.getElementById("aprid").value;
			var poid = document.getElementById("poid").value;
			var supplierid = document.getElementById("supplierid").value;
			var invoiceno = document.getElementById("invoiceno").value;
			
			
			//check if drno is empty
			if(drno =="" || supplierid==""){
				alert("Receipt No. or Supplier Cannot be empty.")
			}else{
				$('#addbutton').prop("disabled", true);  
				$.ajax({
					url: 'receivingassets/savedelivery',
					type: 'post',
					data: {receiveddate: receiveddate,drno:drno,aprid:aprid,poid:poid,supplierid:supplierid,invoiceno:invoiceno},
					success: function(response) {
						var lastid = JSON.parse(response);
						window.location.href = "receivingassets/details/"+lastid;
					}
					});
					
			}
			
			

}	

function adddelivery(){
	//document.getElementById("receiveddate").value="";
	document.getElementById("drno").value="";
	
}

function editrr(){
	
	$('#savedrbutton').prop("disabled", false);  
	$('#supplierid').prop("disabled", false);  
	$('#drno').prop("disabled", false);  
	$('#aprid').prop("disabled", false);  
	$('#receivedate').prop("disabled", false);  
	$('#status').prop("disabled", false);  
	$('#poid').prop("disabled", false);  
	$('#invoiceno').prop("disabled", false);  
}

function updatedrdetails(){
	var deliveryid = document.getElementById("deliveryid").value;
	var receivedate = document.getElementById("receivedate").value;
	var drno = document.getElementById("drno").value;
	var aprid = document.getElementById("aprid").value;
	var poid = document.getElementById("poid").value;
	var supplierid = document.getElementById("supplierid").value;
	var status = document.getElementById("status").value;
	var invoiceno = document.getElementById("invoiceno").value;
	
			
			//check if drno is empty
			//if(drno ==""){
				//alert("Receipt No. Cannot be empty.")
			//}else{
				//$('#addbutton').prop("disabled", true);  
				$.ajax({
					url: '../updatedelivery',
					type: 'post',
					data: {receiveddate: receivedate,drno:drno,aprid:aprid,poid:poid,supplierid:supplierid,deliveryid:deliveryid,status:status,invoiceno:invoiceno},
					success: function(response) {
						console.log(response);
						//var lastid = JSON.parse(response);
						location.reload();
						//window.location.href = "receiving/details/"+lastid;
					}
					});
					
			//}
}

function addassetitem(){
	
	var deliveryid = document.getElementById("deliveryid").value;
	var assetid =document.getElementById("assetid").value;
	var itemunit =document.getElementById("itemunit").value;
	var itemqty =document.getElementById("itemqty").value;
	var unitprice =document.getElementById("unitprice").value;
	
	
	
	
	$.ajax({
		url: '../addassetreceived',
		type: 'post',
		data: {deliveryid:deliveryid, assetid:assetid, itemunit: itemunit,itemqty:itemqty,unitprice:unitprice},
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
			//document.getElementById("itemlist").value="";
			document.getElementById("unitprice").value="0.00";
			
			//document.getElementById("itemlist").focus();
		}
	});
	
	$('#general-table').load(document.URL +  ' #general-table');
}

function deletedelivery(id){
	//alert(id);
	var r = confirm("Are your sure you want to delete this Delivery?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'receivingassets/deletedelivery',
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
function printinspection()
{
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

function deletedritem(id){
	
	var r = confirm("Are your sure you want to delete this Item?");
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
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function addtoasset(deliveryitemsid){
	

				$.ajax({
					url: '../addtoasset',
					type: 'post',
					data: {deliveryitemsid: deliveryitemsid},
					success: function(response) {
						console.log(response);
						location.reload();
						//var lastid = JSON.parse(response);
						//window.location.href = "receivingassets/details/"+lastid;
					}
					});
					
		
			
			

}	

function saveasset(){
	
	$('#savebutton').prop("disabled", true);    
	var particulars = document.getElementById("particulars").value;
	var article = document.getElementById("article").value;
	var classification = document.getElementById("classification").value;
	
	
	$.ajax({
		url: '../../asset/saveasset',
		type: 'post',
		data: {particulars: particulars,article:article,classification:classification},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}


function assigndritems(dritemsid){
	document.getElementById("deliveryitemsid").value=dritemsid;
}

function addtoasset_barcode(){
	var deliveryitemsid = document.getElementById("deliveryitemsid").value
	var prefix = document.getElementById("prefix").value
	var barcode_from = document.getElementById("barcode_from").value
	var barcode_to = document.getElementById("barcode_to").value
	var whereabout = document.getElementById("whereabout").value

				$.ajax({
					url: '../addtoassetbarcode',
					type: 'post',
					data: {deliveryitemsid: deliveryitemsid,prefix:prefix,barcode_from:barcode_from,barcode_to:barcode_to,whereabout:whereabout},
					success: function(response) {
						console.log(response);
						location.reload();
						//var lastid = JSON.parse(response);
						//window.location.href = "receivingassets/details/"+lastid;
					}
					});
					
		
			
			

}	
$(document).ready(function() {
    $('#example-datatable_ra').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );