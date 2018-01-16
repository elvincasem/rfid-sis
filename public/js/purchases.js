
function addapr(){
	
			$('#updateapr').prop("disabled", true);    
			$('#saveproject').prop("disabled", false);    
			//document.getElementById("aprdate").value ="";
			//document.getElementById("aprno").value="";

			//setTimeout(function () { $("#aprno").focus(); }, 30);
}


function saveapr(){
	
			$('#saveapr').prop("disabled", true);    
			var aprdate = document.getElementById("aprdate").value;
			var aprno = document.getElementById("aprno").value;
			
			
			//check duplicate aprno
			$.ajax({
			url: 'apr/checkaprduplicate',
			type: 'post',
			data: {aprno: aprno},
			success: function(response) {
				//console.log(response);
				var lastid = JSON.parse(response);
				if(lastid.duplicate==0){
					
					$.ajax({
						url: 'apr/saveapr',
						type: 'post',
						data: {aprdate: aprdate,aprno:aprno},
						success: function(response) {
							console.log(response);
							var lastid = JSON.parse(response);
							//var lastid = parseInt(convertresponse.lastid);
							//console.log(last);
							window.location.href = "apr/details/"+lastid;
						}
						});
				}else{
					
					alert("APR No. is already used.");
					$('#saveapr').prop("disabled", false);    
					
				}
			}
			});
			//saveapr
			

}	

function deleteapr(id){
	
	var r = confirm("Are your sure you want to delete this APR?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'apr/deleteapr',
                    type: 'post',
                    data: {aprid: id},
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

function deleteapritem(id){
	
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deleteapritem',
                    type: 'post',
                    data: {aprid: id},
                    success: function(response) {
						console.log(response);
						//location.reload();
						$('#general-table').load(document.URL +  ' #general-table');
                    }
                });
		}else{
			alert("Invalid Password");
		}
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function saveapritem(){
	//alert('enter key is pressed');
		var item = document.getElementById("itemlist").value;
		var itemqty = document.getElementById("itemqty").value;
		var itemid = parseInt(item);
		//get item details
		$.ajax({
                    url: '../getitemdetails',
                    type: 'post',
                    data: {itemid: itemid},
                    success: function(response) {
						//add item to database
						var aprid = document.getElementById("aprid").value;
						var data = JSON.parse(response);
						var description = data.description;
						var unit = data.unit;
						var unitcost = data.unitCost;
						$.ajax({
							url: '../saveapritem',
							type: 'post',
							data: {itemid: itemid,itemqty:itemqty,aprid:aprid,description:description,unit:unit,unitcost:unitcost},
							success: function(response) {
								console.log(response);
								$('#general-table').load(document.URL +  ' #general-table');
								document.getElementById("itemlist").value="";
								document.getElementById("itemqty").value="1";
								$("#itemlist").focus(); 
								
								
								//$("#itemlist").focus(); 
								//setTimeout(function () { $("#itemlist").focus(); }, 20);
								//location.reload();
							},
							error: function(e){
								alert("error");
							}
						});
                    }
		});
}


$("#itemqty").keypress(function (e) {
    if (e.which == 13) {
        
			saveapritem();
		
    }
});
$("#itemlist").keypress(function (e) {
	 if (e.which == 13) {
        //alert('enter key is pressed');
		var item = document.getElementById("itemlist").value;
		var itemqty = document.getElementById("itemqty").value;
		var itemid = parseInt(item);
		//get item details
		$.ajax({
                    url: '../getitemdetails',
                    type: 'post',
                    data: {itemid: itemid},
                    success: function(response) {
						//add item to database
						var aprid = document.getElementById("aprid").value;
						var data = JSON.parse(response);
						var description = data.description;
						var unit = data.unit;
						var unitcost = data.unitCost;
						$.ajax({
							url: '../saveapritem',
							type: 'post',
							data: {itemid: itemid,itemqty:itemqty,aprid:aprid,description:description,unit:unit,unitcost:unitcost},
							success: function(response) {
								console.log(response);
								$('#general-table').load(document.URL +  ' #general-table');
								document.getElementById("itemlist").value="";
								document.getElementById("itemqty").value="1";
								$("#itemlist").focus(); 
								
								
								//$("#itemlist").focus(); 
								//setTimeout(function () { $("#itemlist").focus(); }, 20);
								//location.reload();
							},
							error: function(e){
								alert("error");
							}
						});
                    }
		});
			
		
    }
	
});

function saveunitprice(apritemsid){
	var unitprice = document.getElementById("unitprice-"+apritemsid).value;
	var availability = document.getElementById("availability-"+apritemsid).value;
	//alert(unitprice);
	$.ajax({
		url: '../updateunitprice',
		type: 'post',
		data: {apritemsid: apritemsid,unitprice:unitprice,availability:availability},
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

function aprpreview(){
	
	//get values
}

function printapr()
{
	var DocumentContainer = document.getElementById('aprprintbody');
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
