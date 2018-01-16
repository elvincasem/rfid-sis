
function addapr(){
	
			$('#updateapr').prop("disabled", true);    
			$('#saveproject').prop("disabled", false);    
			
}

function saveitem(){
	
	$('#saveitembutton').prop("disabled", true);    
	var itemdescription = document.getElementById("itemdescription").value;
	var unitofmeasure = document.getElementById("unitofmeasure").value;
	var unitcost = document.getElementById("unitcost").value;
	var category = document.getElementById("category").value;
	var supplierid = document.getElementById("supplierid").value;
	var brand = document.getElementById("brand").value;
	var warehouseid = document.getElementById("warehouseid").value;
	
	$.ajax({
		url: 'items/saveitem',
		type: 'post',
		data: {itemdescription: itemdescription,unitofmeasure:unitofmeasure,unitcost:unitcost,category:category,supplierid:supplierid,brand:brand,warehouseid:warehouseid},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}

function deleteitem(id){
	
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'items/deleteitem',
                    type: 'post',
                    data: {itemno: id},
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

function updateitem(){
	
	$('#saveitembutton').prop("disabled", true);    
	var unitcost = document.getElementById("unitcost").value;
	var itemno = document.getElementById("itemno").value;
	
	var description = document.getElementById("description").value;
	var category = document.getElementById("category").value;
	var brand = document.getElementById("brand").value;
	var supplierid = document.getElementById("supplierid").value;
	var unit = document.getElementById("unitofmeasure").value;
	
	$.ajax({
		url: '../updateitem',
		type: 'post',
		data: {itemno:itemno,unitcost: unitcost,description:description,category:category,brand:brand,supplierid:supplierid,unit:unit},
		success: function(response) {
			console.log(response);
			//location.reload();
			
		}
	});
	
}

function uploadimage(){
	
	//$('#saveitembutton').prop("disabled", true);    
	var unitcost = document.getElementById("itemimage").value;
	//var itemno = document.getElementById("itemno").value;
	
	$.ajax({
		url: '../do_upload',
		type: 'post',
		data: {itemno:itemno,unitcost: unitcost},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}

function downloaditem(){
	
	    
	var warehouseid = document.getElementById("warehouseidmodal").value;
	//alert(warehouseid);
	window.location.href = 'items/downloaditem/'+warehouseid;
	/*
	$.ajax({
		url: 'items/downloaditem/'+warehouseid,
		type: 'post',
		//data: {warehouseid: warehouseid},
		success: function(response) {
			//console.log(response);
			//location.reload();
			
		}
	});*/
	
}
