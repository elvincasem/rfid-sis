function filter(){
	alert("me");
	var yrlvlr = document.getElementById("yrlvlr").value;
	var section = document.getElementById("section").value;
	var to = document.getElementById("to").value;
	var from = document.getElementById("from").value;
	alert(yrlvlr);
	alert(section);
	alert(to);
	alert(from);
	
	$.ajax({
		url: 'report/printlogbook',
		type: 'post',
		data: {yrlvlr : yrlvlr, section:section, to:to, from:from},
		success: function(response) {
			
			 var data = JSON.parse(response);
			 for(var ctr=0;ctr<data.length; ctr++){
			 console.log(data[ctr].rfID);
			 //window.location.reload();
			}
		} 
	});

}


  function printDiv() {
       var divToPrint = document.getElementById('example-datatable');
    	var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
   }
