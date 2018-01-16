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

function savewords(poid){
	var amountinwords = document.getElementById("amountinwords").value;
	$.ajax({
		url: '../updatewords',
		type: 'post',
		data: {poid: poid,amountinwords:amountinwords},
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

$(document).ready(function() {
    $('#example-datatable_po').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );