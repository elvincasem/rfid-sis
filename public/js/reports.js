function custom_report(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
		window.location.href = "purchaserequest_view/"+from+"/"+to;
	}
	
	
}

function custom_report_view(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
	window.location.href = "../../purchaserequest_view/"+from+"/"+to;
	}
}

function utilization_report(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
	window.location.href = "utilization_view/"+from+"/"+to;
	}
	
}

function utilization_report_view(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
	window.location.href = "../../utilization_view/"+from+"/"+to;
	}
	
}

function issued_report(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{	
	window.location.href = "issued_view/"+from+"/"+to;
	}
}

function issued_report_view(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
	window.location.href = "../../issued_view/"+from+"/"+to;
	}
	
}

function returns_report(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{	
	window.location.href = "returns_view/"+from+"/"+to;
	}
}

function returns_report_view(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
	window.location.href = "../../returns_view/"+from+"/"+to;
	}
	
}

function show_asset(){
	
	var eid = document.getElementById("eid").value;
	//var year = document.getElementById("year").value;
	
	
		window.location.href = "assetissued_view/"+eid;
	
	
	
}

function show_asset_view(){
	var from = document.getElementById("date1").value;
	var to = document.getElementById("date2").value;
	//var year = document.getElementById("year").value;
	if(from =="" && to ==""){
		alert("Please select date range");
	}else{
	window.location.href = "../../purchaserequest_view/"+from+"/"+to;
	}
}