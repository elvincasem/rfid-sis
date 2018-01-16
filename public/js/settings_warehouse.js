function savewarehouse(){
	
	$('#savesupplierbutton').prop("disabled", true);    
	var warehousename = document.getElementById("warehousename").value;
	
	
	$.ajax({
		url: 'warehouse/savewarehouse',
		type: 'post',
		data: {warehousename: warehousename},
		success: function(response) {
			//console.log(response);
			location.reload();
			
		}
	});
	
}

function deletewarehouse(id){
	
	var r = confirm("Are your sure you want to delete this warehouse?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'warehouse/deletewarehouse',
                    type: 'post',
                    data: {warehouseid: id},
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