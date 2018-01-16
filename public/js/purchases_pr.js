
function addpr(){
	
			$('#updatepr').prop("disabled", true);    
			$('#savepr').prop("disabled", false); 

		var lastpr = document.getElementById("lastpr").value;
		var year = new Date().getFullYear();
		//var prefix = "RIS";
	
		var splits = lastpr.split("-");
		var lastyear = splits[0].substring(0, 8);
		
		if(lastyear!=year){
			//start to 1
			
			var lastprno = 1;
		}else{
			var lastprno = parseInt(splits[1]);
		}
		
		var increment1 = lastprno+1;
		var strinc = increment1.toString();
		
		if(strinc.length==1){
			var zero ="00";
		}
		if(strinc.length==2){
			var zero ="0";
		}
		if(strinc.length==3){
			var zero ="";
		}
		/*if(strinc.length==4){
			var zero ="0";
		}
		if(strinc.length==5){
			var zero ="0";
		}
		if(strinc.length==6){
			var zero ="";
		}*/
		
		//if(increment1.length )
		
		
		var displayprno =year+"-"+zero+increment1;
		//alert (displayreqno);
		document.getElementById("prno").value = displayprno;
			
}


function savepr(){
	
			$('#saveapr').prop("disabled", true);    
			var prdate = document.getElementById("prdate").value;
			var aprno = document.getElementById("aprno").value;
			var prno = document.getElementById("prno").value;
			var department = document.getElementById("department").value;
			var section = document.getElementById("section").value;
			var purpose = document.getElementById("purpose").value;
			var modeofprocurement = document.getElementById("modeofprocurement").value;
			var eid = document.getElementById("eid").value;
			
			//check prno if empty
			if(prno==""){
				alert("PR No. is empty.");
			}else{
				//check duplicate aprno
				$.ajax({
				url: 'purchaserequest/checkprduplicate',
				type: 'post',
				data: {prno: prno},
				success: function(response) {
					//console.log(response);
					var lastid = JSON.parse(response);
					if(lastid.duplicate==0){
						
						$.ajax({
							url: 'purchaserequest/savepr',
							type: 'post',
							data: {prdate: prdate,aprno:aprno,prno:prno,department:department,section:section,purpose:purpose,modeofprocurement:modeofprocurement,eid:eid},
							success: function(response) {
								console.log(response);
								var lastid = JSON.parse(response);
								//var lastid = parseInt(convertresponse.lastid);
								//console.log(last);
								window.location.href = "purchaserequest/details/"+lastid;
							}
							});
					}else{
						
						alert("PR No. is already used.");
						$('#saveapr').prop("disabled", false);    
						
					}
				}
				});
				//saveapr
			}
			
			

}	

function deletepr(id){
	
	var r = confirm("Are your sure you want to delete this Purchase Request?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: 'purchaserequest/deletepr',
                    type: 'post',
                    data: {prid: id},
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

function deletepritem(id){
	//alert(id);
	var r = confirm("Are your sure you want to delete this item?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deletepritem',
                    type: 'post',
                    data: {pritemsid: id},
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


function savepritem(){
	
        
		var item = document.getElementById("itemlist").value;
		var itemqty = document.getElementById("itemqty").value;
		var itemunit = document.getElementById("itemunit").value;

		
		var itemid = parseInt(item);
		
		//alert(itemid);
		if(isNaN(itemid)){
			var itemidnew = "";
			var prid = document.getElementById("prid").value;
			var description = document.getElementById("itemlist").value;
			var unit = document.getElementById("itemunit").value;
			var unitcost = "0.00";
			//save new item description
			$.ajax({
				
							url: '../savepritem',
							type: 'post',
							data: {itemid: itemidnew,itemqty:itemqty,prid:prid,description:description,unit:unit,unitcost:unitcost},
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
		}else{
			//get item details
		$.ajax({
                    url: '../getitemdetails',
                    type: 'post',
                    data: {itemid: itemid},
                    success: function(response) {
						//add item to database
						var prid = document.getElementById("prid").value;
						var data = JSON.parse(response);
						var description = data.description;
						var unit = itemunit;
						var unitcost = data.unitCost;
						$.ajax({
							url: '../savepritem',
							type: 'post',
							data: {itemid: itemid,itemqty:itemqty,prid:prid,description:description,unit:unit,unitcost:unitcost},
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
		
	
}



$("#itemqty").keypress(function (e) {
    if (e.which == 13) {
		//alert("test");
		savepritem();
		
    }
});
$("#itemlist").keypress(function (e) {
	 if (e.which == 13) {
		  //$('select').first().focus();
		 //alert("test");
		  //$('#idOfFirstSelect').focus();
        $("#itemqty").focus();
		//savepritem();	
		
    }
	
});

function saveunitprice(pritemsid){
	var unitprice = document.getElementById("unitprice-"+pritemsid).value;
	//var availability = document.getElementById("availability-"+apritemsid).value;
	//alert(unitprice);
	$.ajax({
		url: '../updateunitprice',
		type: 'post',
		data: {pritemsid: pritemsid,unitprice:unitprice},
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


function saveallprices(prid){
	//var unitprice = document.getElementById("unitprice-"+pritemsid).value;
	//var availability = document.getElementById("availability-"+apritemsid).value;
	//alert(unitprice);
	$.ajax({
		url: '../getpritemsid',
		type: 'post',
		data: {prid: prid},
		success: function(response) {
			data = JSON.parse(response);
			console.log(data);
			
			for(var ctr=0;ctr<data.length; ctr++){
				//alert(data.pritemsid);
				var unitprice = document.getElementById("unitprice-"+data[ctr].pritemsid).value;
				var pritems_id = data[ctr].pritemsid;
				//alert(unitprice);
				
				$.ajax({
				url: '../updateallprices',
				type: 'post',
				data: {pritemsid: pritems_id, unitprice:unitprice},
				success: function(response) {
						console.log(response);
				}
				});
				
			}	
			/* 
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			$('#totalamount').load(document.URL +  ' #totalamount');
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			*/
		}
	});
	$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
	setTimeout(function(){
		location.reload();
	},1000);
	
	//$('#general-table').load(document.URL +  ' #general-table');
}

function saveallpricescanvass(prid,supplier_id){
	//var unitprice = document.getElementById("unitprice-"+pritemsid).value;
	//var availability = document.getElementById("availability-"+apritemsid).value;
	//alert(unitprice);
	$.ajax({
		url: '../../getaocid',
		type: 'post',
		data: {prid: prid,supplier_id:supplier_id},
		success: function(response) {
			data = JSON.parse(response);
			console.log(data);
			
			for(var ctr=0;ctr<data.length; ctr++){
				//alert(data.pritemsid);
				var unitprice = document.getElementById("unitprice-"+data[ctr].aocid).value;
				var aocparticular = document.getElementById("aocparticular-"+data[ctr].aocid).value;
				var aoc_id = data[ctr].aocid;
				//alert(unitprice);
				
				$.ajax({
				url: '../../updateallpricescanvass',
				type: 'post',
				data: {aocid: aoc_id, unitprice:unitprice},
				success: function(response) {
						console.log(response);
				}
				});
				
			}	
			/* 
			//location.reload();
			$('#general-table').load(document.URL +  ' #general-table');
			$('#totalamount').load(document.URL +  ' #totalamount');
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
			*/
		}
	});
	$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
	setTimeout(function(){
		location.reload();
	},1000);
	
	//$('#general-table').load(document.URL +  ' #general-table');
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
function printcanvass()
{
	var DocumentContainer = document.getElementById('canvassprintbody');
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
function printabstract()
{
	var DocumentContainer = document.getElementById('printabstractbody');
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

function addsupplier(){
	
			
			var supplierid = document.getElementById("supplierid").value;
			var prid = document.getElementById("prid").value;

			$.ajax({
				url: '../addsupplier',
				type: 'post',
				data: {supplierid: supplierid,prid:prid},
				success: function(response) {
					//console.log(response);
					//do something
					//$('#suppliertabs').load(document.URL +  ' #suppliertabs');
					 location.reload();
					 /*
					 //console.log(response);
					var lastid = JSON.parse(response);
					//var lastid = parseInt(convertresponse.lastid);
					//console.log(last);
					window.location.href = "purchaserequest/details/"+lastid;
					*/
			}
			});
			

}	

function updatecanvassprice(aocid,supplierid){
	var unitprice = document.getElementById("unitprice-"+aocid).value;
	var aocparticular = document.getElementById("aocparticular-"+aocid).value;
	//var availability = document.getElementById("availability-"+apritemsid).value;
	//alert(unitprice);
	
	//alert(unitprice);
	$.ajax({
		url: '../../updatecanvassprice',
		type: 'post',
		data: {aocid: aocid,unitprice:unitprice,aocparticular:aocparticular},
		success: function(response) {
			console.log(response);
			location.reload();
			/*
		setTimeout(function () { $('#block-tabs-home').load(document.URL + '#block-tabs-home');
			$('#totalamount'+supplierid).load(document.URL +  ' #totalamount'+supplierid); }, 30); */
			//$('#block-tabs-home').load(document.URL + '#block-tabs-home');
			
			$.bootstrapGrowl('<h4><strong>Success!</strong></h4> <p>Item Updated!</p>', {
				type: 'success',
				delay: 3000,
				allow_dismiss: true,
				offset: {from: 'top', amount: 20}
			});
		}
	});
	
	//$('#general-table').load(document.URL +  ' #general-table');
}
function removesupplier(id){
	//alert(id);
	var r = confirm("Are your sure you want to delete this supplier?");
    if (r == true) {
        //alert ("You pressed OK!");
		var person = prompt("Please enter Administrator Password");
		if (person =='superadmin') {
		$.ajax({
                    url: '../deletesupplier',
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

function awardsupplier(){
	
			
			var awardedsupplier = document.getElementById("awardedsupplier").value;
			var awardreason = document.getElementById("awardreason").value;
			var prid = document.getElementById("prid").value;

			$.ajax({
				url: '../awardsupplier',
				type: 'post',
				data: {awardedsupplier: awardedsupplier,awardreason:awardreason,prid:prid},
				success: function(response) {
					//do something
					//$('#suppliertabs').load(document.URL +  ' #suppliertabs');
					 location.reload();
			}
			});
			

}	

function editpr(){
	
			$('#department').prop("disabled", false);    
			$('#aprdate').prop("disabled", false);    
			$('#aprno').prop("disabled", false);    
			$('#aprdate').prop("disabled", false);    
			$('#section').prop("disabled", false);    
			$('#prno').prop("disabled", false);    
			$('#prdate').prop("disabled", false);    
			$('#purpose').prop("disabled", false);    
			$('#modeofprocurement').prop("disabled", false);    
			$('#eid').prop("disabled", false);    
			$('#saveprdetails').prop("disabled", false);    
			$('#prstatus').prop("disabled", false);    
			
}

function saveprdetails1(){
	//alert("2");
			
			var department = document.getElementById("department").value;
			var prid = document.getElementById("prid").value;
			var aprno = document.getElementById("aprno").value;
			var aprdate = document.getElementById("aprdate").value;
			var section = document.getElementById("section").value;
			var prno = document.getElementById("prno").value;
			var prdate = document.getElementById("prdate").value;
			var purpose = document.getElementById("purpose").value;
			var modeofprocurement = document.getElementById("modeofprocurement").value;
			var eid = document.getElementById("eid").value;
			var prstatus = document.getElementById("prstatus").value;

			$.ajax({
				url: '../saveprdetails',
				type: 'post',
				data: {prid: prid,department:department,aprno:aprno,aprdate:aprdate,section:section,prno:prno,prdate:prdate,purpose:purpose,modeofprocurement:modeofprocurement,eid:eid,prstatus:prstatus},
				success: function(response) {
					//do something
					//$('#suppliertabs').load(document.URL +  ' #suppliertabs');
					 location.reload();
			}
			});
			

}

function generatepo(){
			
	
}

function addpo(){
			var podate = document.getElementById("podate").value;
			var prid = document.getElementById("prid").value;
			var pono = document.getElementById("pono").value;
			var placeofdelivery = document.getElementById("placeofdelivery").value;
			var dateofdelivery = document.getElementById("dateofdelivery").value;
			var deliveryterm = document.getElementById("deliveryterm").value;
			var paymentterm = document.getElementById("paymentterm").value;
			var prnomodal = document.getElementById("prnomodal").value;
			var modeofprocurementpo = document.getElementById("modeofprocurementpo").value;
			var supplierpo = document.getElementById("supplierpo").value;
			
			
			

			
			if(supplierpo == ""){
				alert("Please select Awarded Supplier");
			}
			else if(pono==""){
				alert("Please fill up PO No.");
			}

			else{
				
				$.ajax({
				url: '../checkpono',
				type: 'post',
				data: {pono:pono},
				success: function(response) {
					var duplicatepo = response;
					if(duplicatepo>=1){
						alert("Duplicate PO No.")
					}else{
						$.ajax({
						url: '../addpo',
						type: 'post',
						data: {podate: podate,prid:prid,pono:pono,placeofdelivery:placeofdelivery,dateofdelivery:dateofdelivery,deliveryterm:deliveryterm,paymentterm:paymentterm,prnomodal:prnomodal,modeofprocurementpo:modeofprocurementpo,supplierpo:supplierpo},
						success: function(response) {
							
							//var lastid = JSON.parse(response);
							
							//alert(response);
							window.location.href = "../../purchaseorder/details/"+response;
						}
						});
						
					}
				}
				});
				
				
			}
			
	
}	

$(document).ready(function() {
    $('#example-datatable_pr').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );