function savesupplier(){
	
	$('#savesupplierbutton').prop("disabled", true);    
	var suppliername = document.getElementById("suppliername").value;
	var address = document.getElementById("address").value;
	var contactno = document.getElementById("contactno").value;
	var products = document.getElementById("products").value;
	var email = document.getElementById("email").value;
	var tin = document.getElementById("tin").value;
	
	$.ajax({
		url: 'suppliers/savesupplier',
		type: 'post',
		data: {suppliername: suppliername,address:address,contactno:contactno,products:products,email:email,tin:tin},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}

function deletesupplier(id){
	
	var r = confirm("Are your sure you want to delete this supplier?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'suppliers/deletesupplier',
                    type: 'post',
                    data: {supplierid: id},
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

function addsupplierbutton(){
	
			$('#savesupplierbutton').prop("disabled", false); 
			$('#updatebutton').prop("disabled", true);
			
			document.getElementById("supplierid").value = "";
			document.getElementById("suppliername").value = "";
			document.getElementById("address").value = "";
			document.getElementById("contactno").value = "";
			document.getElementById("products").value = "";
			document.getElementById("email").value = "";
			document.getElementById("tin").value = "";
	
}
function editsupplier(supplierid){
	$('#savesupplierbutton').prop("disabled", true); 
	$('#updatebutton').prop("disabled", false); 
	
	$.ajax({
		url: 'suppliers/editsupplier',
		type: 'post',
		data: {supplierid: supplierid},
		success: function(response) {
			
			var data = JSON.parse(response);
			console.log(data);
			document.getElementById("supplierid").value = data.supplierID;
			document.getElementById("suppliername").value = data.supName;
			document.getElementById("address").value = data.address;
			document.getElementById("contactno").value = data.contactNo;
			document.getElementById("products").value = data.products;
			document.getElementById("email").value = data.email;
			document.getElementById("tin").value = data.TIN;
			
			
			
		}
	});
	
	
}

function updatesupplier(){
	
	var supplierid = document.getElementById("supplierid").value;
	
	var suppliername = document.getElementById("suppliername").value;
	var address = document.getElementById("address").value;
	var contactno = document.getElementById("contactno").value;
	var products = document.getElementById("products").value;
	var email = document.getElementById("email").value;
	var tin = document.getElementById("tin").value;
	
	
	$.ajax({
		url: 'suppliers/updatesupplier',
		type: 'post',
		data: {supplierid:supplierid,suppliername: suppliername,address:address,contactno:contactno,products:products,email:email,tin:tin},
		success: function(response) {
			console.log(response);
			location.reload();
			
		}
	});
	
}