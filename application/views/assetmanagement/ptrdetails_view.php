
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">

	
	<!--rightsidebar here-->
	<?php //$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
	<?php $this->load->view('leftsidebar_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
		<div id="page-content">
			<?php $this->load->view('inc/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
	   <div class="col-lg-12">
				<!-- Partial Responsive Block -->
				<!-- Regular Modal -->
                <div id="addassetmodal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Add Asset</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">Particulars</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="particulars"></textarea>
                        </div>	
						<label class="col-md-3 control-label text-right">Article</label>
                        <div class="col-md-7">
                           <select id="article" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							<option value="Laptop">Laptop</option>
							
							
							</select>
                        </div>	
						
						<label class="col-md-3 control-label text-right">Classification</label>
                        <div class="col-md-7">
                            <select id="classification" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							<option value="Books">Books</option>
							<option value="Semi-Expendable">Semi-Expendable</option>
							<option value="Communication Equipment">Communication Equipment</option>
							<option value="Firefighting Equipment">Firefighting Equipment</option>
							<option value="Furniture and Fixtures">Furniture and Fixtures</option>
							<option value="IT Equipment and Softwares">IT Equipment and Softwares</option>
							<option value="Medical and Dental Laboratory">Medical and Dental Laboratory</option>
							<option value="Motor Vehicle">Motor Vehicle</option>
							<option value="Office Equipment">Office Equipment</option>
							<option value="Other Machineries and Equipment">Other Machineries and Equipment</option>
							<option value="Office Building">Office Building</option>
							
							</select>
                        </div>	
						
						
	
								
						<div class="row"></div>
							
					</div>
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="saveasset();">Add Asset</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				
	<!-- generate ptr modal -->
				<!-- Regular Modal Print PR-->
                <div id="printptrfulldetails" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="fulldetailsbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
              <style>

tr.noBorder td{
	border:0;
}

table { page-break-inside:auto }
   tr    { page-break-inside:avoid; page-break-after:auto }
@media print {
    thead { display: table-header-group; }
    tfoot { display: table-footer-group; }
}
@media screen {
    /*thead { display: block; }
    tfoot { display: block; }*/
}
</style>

<div style="text-align:right;">Appendix 71</div>
<div style="text-align:center;font-weight:bold;">PROPERTY TRANSFER REPORTS</div>
<br>
<div>Entity Name:__________________________________<span style="margin-left:100px;"></span><span>Fund Cluster:_________________</span></div><br>


<table border="1" style="border:solid 1px; width:800px;">

	<tr style="text-align:left;font-weight:bold;">
	<td colspan="4">From Accountable Officer/Agency/Fund Cluster: <u><?php echo $ptrdetails['fromoffice'];?></u><br>
	To Accountable Officer/Agency/Fund Cluster:  <u><?php echo $ptrdetails['tooffice'];?></u></td>

	
	<td colspan="2">PTR No.:  <u><?php echo $ptrdetails['ptrno'];?></u><br>
	Date:  <u><?php echo mdate('%F %d, %Y',strtotime($ptrdetails['ptrdate']));?></u></td>
	
	</tr>
	
	<tr style="text-align:left;font-weight:bold;">
	<td colspan="6">Transfer Type: <u><?php echo $ptrdetails['transfertype'];?></u></td>

	
	
	
	</tr>
</table>
<table border="1" style="border:solid 1px; width:800px;">
	
<thead>
		
	<tr style="border-right:solid 1px;text-align:center;font-weight:bold;">
	<td style="width:90px;">Date Acquired</td>
	<td>Property No</td>
	<td>Description</td>
	<td>Amount</td>
	<td>Condition of PPE</td>
	
	
	</tr>
</thead>
	<tbody>
	<!-- items here -->
	<?php
	$itemcount = 1;
foreach ($ptritems as $ptritems_list):
				
				echo "<tr class='odd gradeX'>";
				echo "<td>$itemcount</td>";
				echo "<td>".$ptritems_list['propertyNo']."</td>";
				echo "<td>".$ptritems_list['particulars']."<br>".
						"SN: ".$ptritems_list['equipsn']."<br>".
						"OS: ".$ptritems_list['operatingsystem']."<br>".
						"Processor: ".$ptritems_list['processor']."<br>".
						"Memory: ".$ptritems_list['ram']."<br>".
						"Hard Disk: ".$ptritems_list['hd']."<br>".
						"Remarks: ".$ptritems_list['remarks']."<br>".
						"Supplier: ".$ptritems_list['supName']."<br>".
						"Address: ".$ptritems_list['address']."<br>".
						"Delivery No: ".$ptritems_list['drno']."<br>".
						
				"</td>";
				echo "<td>".number_format($ptritems_list['totalcost'],2)."</td>";
				echo "<td></td>";
				echo "</tr>";
				
				$itemcount++;
				
				endforeach;
				
				/*
				if($itemcount <28){
					for($ctr=$itemcount;$ctr<=32;$ctr++){
						echo "<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td>
						</tr>";
					}
				}*/
				?>
	</tbody>
	<!-- ff -->
	<tfoot>
	<tr><td colspan="6" style="text-align:left;font-weight:regular;line-height:30px;">

	Reason for Transfer: <?php echo $ptrdetails['transferreason'];?>
	</td></tr>
	
	<tr>
	<td colspan="6">
	
	<span style="width:10%;float:left;"></span>
	<span style="width:30%;float:left;margin-left:100px">Approved by:</span>
	<div style="width:20%;float:left;">Released/Issued by:</div>
	<div style="width:30%;float:left;margin-left:40px;">Received by:</div>
	
	</td>
	
	
	</tr>
	<tr>
	<td colspan="6">
	
	<span style="width:10%;float:left;">Signature<br>Printed Name:<br>Designation:<br>Date:</span>
	<span style="width:30%;float:left;text-align:center;"><br><?php echo $column1;?></span>
	<div style="width:30%;float:left;"><br><?php echo $column2;?></div>
	<div style="width:30%;float:left;"><br><br>____________________________</div>
	
	</td>
	
	
	</tr>
	
	<tfoot>
	
	
	
</table>




                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
								Blank Space: <input placeholder="28" type="text" id="blankspace">
								<button type="button" id="blankspacebutton" class="btn btn-effect-ripple btn-primary" onclick="addblankspace();" ><i class="fa fa-print"></i> Add</button>
								
                                <button type="button" id="printpo" class="btn btn-effect-ripple btn-primary" onclick="printptrfulldetails();" ><i class="fa fa-print"></i> Print</button>
                               
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->			
				
				
				
				
				
				
				
				
				
				<!-- generate po modal -->
				<!-- Regular Modal Print PR-->
                <div id="printpar" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="printbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
              <style>

tr.noBorder td{
	border:0;
}

table { page-break-inside:auto }
   tr    { page-break-inside:avoid; page-break-after:auto }
@media print {
    thead { display: table-header-group; }
    tfoot { display: table-footer-group; }
}
@media screen {
    /*thead { display: block; }
    tfoot { display: block; }*/
}
</style>

<div style="text-align:right;">Appendix 71</div>
<div style="text-align:center;font-weight:bold;">PROPERTY TRANSFER REPORTS</div>
<br>
<div>Entity Name:__________________________________<span style="margin-left:100px;"></span><span>Fund Cluster:_________________</span></div><br>


<table border="1" style="border:solid 1px; width:800px;">

	<tr style="text-align:left;font-weight:bold;">
	<td colspan="4">From Accountable Officer/Agency/Fund Cluster: <u><?php echo $ptrdetails['fromoffice'];?></u><br>
	To Accountable Officer/Agency/Fund Cluster:  <u><?php echo $ptrdetails['tooffice'];?></u></td>

	
	<td colspan="2">PTR No.:  <u><?php echo $ptrdetails['ptrno'];?></u><br>
	Date:  <u><?php echo mdate('%F %d, %Y',strtotime($ptrdetails['ptrdate']));?></u></td>
	
	</tr>
	
	<tr style="text-align:left;font-weight:bold;">
	<td colspan="6">Transfer Type: <u><?php echo $ptrdetails['transfertype'];?></u></td>

	
	
	
	</tr>
</table>
<table border="1" style="border:solid 1px; width:800px;">
	
<thead>
		
	<tr style="border-right:solid 1px;text-align:center;font-weight:bold;">
	<td style="width:90px;">Date Acquired</td>
	<td>Property No</td>
	<td>Description</td>
	<td>Amount</td>
	<td>Condition of PPE</td>
	
	
	</tr>
</thead>
	<tbody>
	<!-- items here -->
	<?php
	$itemcount = 1;
foreach ($ptritems as $ptritems_list):
				
				echo "<tr class='odd gradeX'>";
				echo "<td>$itemcount</td>";
				echo "<td>".$ptritems_list['propertyNo']."</td>";
				echo "<td>".$ptritems_list['particulars']."</td>";
				echo "<td>".number_format($ptritems_list['totalcost'],2)."</td>";
				echo "<td></td>";
				echo "</tr>";
				
				$itemcount++;
				
				endforeach;
				
				if($itemcount <28){
					for($ctr=$itemcount;$ctr<=32;$ctr++){
						echo "<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td>
						</tr>";
					}
				}
				?>
	</tbody>
	<!-- ff -->
	<tfoot>
	<tr><td colspan="6" style="text-align:left;font-weight:regular;line-height:30px;">

	Reason for Transfer: <?php echo $ptrdetails['transferreason'];?>
	</td></tr>
	
	<tr>
	<td colspan="6">
	
	<span style="width:10%;float:left;"></span>
	<span style="width:30%;float:left;margin-left:100px">Approved by:</span>
	<div style="width:20%;float:left;">Released/Issued by:</div>
	<div style="width:30%;float:left;margin-left:40px;">Received by:</div>
	
	</td>
	
	
	</tr>
	<tr>
	<td colspan="6">
	
	<span style="width:10%;float:left;">Signature<br>Printed Name:<br>Designation:<br>Date:</span>
	<span style="width:30%;float:left;text-align:center;"><br><?php echo $column1;?></span>
	<div style="width:30%;float:left;"><br><?php echo $column2;?></div>
	<div style="width:30%;float:left;"><br><br>____________________________</div>
	
	</td>
	
	
	</tr>
	
	<tfoot>
	
	
	
</table>




                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							
                                <button type="button" id="printpo" class="btn btn-effect-ripple btn-primary" onclick="printpar();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>Delivery Details</h5>
					 <div class="btn-group pull-right">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li class="hidden">
									<a href="#" onclick="editrr();">
										<i class="fa fa-pencil pull-right"></i>
										Edit Delivery Details
									</a>
								</li>
								
								<li>
									<a href="#printpar" data-toggle="modal">
										<i class="fa fa-cubes pull-right"></i>
										Print PTR
									</a>
								</li>
								<li>
									<a href="#printptrfulldetails" data-toggle="modal">
										<i class="fa fa-cubes pull-right"></i>
										Print PTR (Full Details)
									</a>
								</li>
								
								
								
							</ul>
						</div>
						
					 
				</div>
				<form action="#" method="post" class="form-horizontal" onsubmit="return false;">
				<div class="form-group">
					<input type="hidden" id="ptrid" name="state-normal" class="form-control" value="<?php echo $ptrid;?>" >
					
						<label class="col-md-2 control-label" for="state-normal">From:</label>
                        <div class="col-md-3">
                            <input type="text" id="fromoffice" class="form-control" value="<?php echo $ptrdetails['fromoffice'];?>">
                        </div>
						
						<label class="col-md-1 control-label" for="state-normal">PTR No.</label>
                        <div class="col-md-2">
                            <input type="text" id="ptrno" class="form-control" value="<?php echo $ptrdetails['ptrno'];?>">
                        </div>
						
						<label class="col-md-1 control-label" for="state-normal">PTR Date</label>
                        <div class="col-md-2">
                            <input type="text" id="ptrdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $ptrdetails['ptrdate'];?>">
                        </div>
						
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">To:</label>
                        <div class="col-md-3">
                            <input type="text" id="tooffice" class="form-control" value="<?php echo $ptrdetails['tooffice'];?>">
                        </div>
						
						<label class="col-md-1 control-label" for="state-normal">Transfer Type:</label>
                        <div class="col-md-2">
                            <input type="text" id="transfertype" class="form-control" value="<?php echo $ptrdetails['transfertype'];?>">
                        </div>
						
						<label class="col-md-1 control-label" for="state-normal">Reason for transfer:</label>
                        <div class="col-md-3">
							<textarea class="form-control" id="transferreason"><?php echo $ptrdetails['transferreason'];?></textarea>
                            
                        </div>
						
						<div class="row"></div>
						 <div class="col-md-2 pull-right">
								<button id="savedrbutton" class='btn btn-primary' title='Save PTR Details' onclick="updateptrdetails();"><i class="fa fa-floppy-o"></i> Update</button>
						 </div>
						
						
						 
						   

                    </div>
				</form>
				
				
				
				<h4 class="sub-header"></h4>
				<div class="row">
			
					<div class="form-group">
					
						<label class="col-sm-1 control-label text-right" for="state-normal">Asset</label>
						
						<div class="col-sm-6" id="item_list_form">
							
							<select id="equipno" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." onChange="showasset_unit()">
							<option></option>
							<?php
							
							foreach ($propertylist as $property):
				
									echo "<option value='".$property['equipNo']."'>".$property['propertyNo'].' '.$property['particulars']."</option>";
			
							endforeach;
							
							?>
							
							</select>
							
						</div>
						
						<div class="row">&nbsp;</div>
						<div class="row">&nbsp;</div>
						<label class="col-sm-1 text-right control-label" for="state-normal">UNIT</label>
                        <div class="col-sm-2">
                            <input type="text" id="itemunit" value="" disabled class="form-control">
                        </div>
						<label class="col-sm-1 text-right control-label" for="state-normal">QTY</label>
                        <div class="col-sm-1">
                            <input type="number" id="itemqty" name="state-normal" class="form-control" tabindex="0" value="1" tabindex="2" disabled>
                        </div>
						<input type="hidden" id="assetid">
						
							
						
						<div class="row"></div>
						<div class="col-sm-8">
						<button id="additemreceived" class="btn btn-primary pull-right" onclick="addpropertytolistptr();"><i class="fa fa-plus"></i> Add to List</button>
						
						</div>
						
						
						
						
						
					</div>
					
					
	
				</div>
				<div class="row"><br></div>
				
				<div class="row" id="suppliertabs">
				
				
		<!-- Block Tabs -->
		<div class="block full">
			<!-- Block Tabs Title -->
			<div class="block-title">
				<div class="block-options pull-right">
					<a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
				</div>
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#block-tabs-home">Item List</a></li>
					
					<?php
					/*
					foreach ($canvasslist as $canvass_list):
		
							echo "<li><a href='#tab".$canvass_list['supplierid']."'>".$canvass_list['supName']."</a></li>";
	
					endforeach;
					*/
					?>
					
					
					
				</ul>
			</div>
			<!-- END Block Tabs Title -->

			<!-- Tabs Content -->
			<div class="tab-content">
				<div class="tab-pane active" id="block-tabs-home">
				
				<div class="table-responsive">
					 <table id="general-table" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            
                                            <th>QTY</th>
											<!-- <th style="width: 120px;">Unit</th>-->
											<th style="width: 120px;">Property No</th>
											<th style="width: 420px;">DESCRIPTION</th>
                                            
											<!--<th style="width: 120px;">Date Acquired</th> -->
											<th style="width: 120px;">Amount</th>
                                            <th style="width: 320px;" class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									
				
				foreach ($ptritems as $ptritems_list):
				
				echo "<tr class='odd gradeX'>";
				echo "<td>1</td>";
				echo "<td>".$ptritems_list['propertyNo']."</td>";
				//echo "<td>".$ptritems_list['asset_unit']."</td>";
				echo "<td>".$ptritems_list['particulars']."</td>";
				
				//echo "<td>".$drlistitems['unitcost']."</td>";
				//echo "<td style='width:210px;'>".mdate('%F %d, %Y',strtotime($ptritems_list['dateacquired']))."</td>";
				echo "<td>".number_format($ptritems_list['totalcost'],2)."</td>";
				//echo "<td><select class='form-control' id='availability-".$aprlistitems['pritemsid']."'><option value='".$aprlistitems['availability']."'>".$aprlistitems['availability']."</option><option value='NO'>NO</option><option value='YES'>YES</option></select> </td>";
				
			
				echo "<td class='center'> 
					
					
					
					<button class='btn btn-danger notification ' title='Delete User' id='notification' onClick='deleteptritem(".$ptritems_list['ptritemsid'].");'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				?>
									</tbody>
					</table>
					 </div>
				
				
					
				</div>
				
				
		<?php
		/*
		//tabs for suppliers
			foreach ($canvasslist as $canvass_list):
				$supplierid = $canvass_list['supplierid'];
				$suppliername = $canvass_list['supName'];
				
					echo "<div class='tab-pane' id='tab".$canvass_list['supplierid']."'>";
					$canvassitems = $this->purchaserequest_model->getcanvasslist_items($supplierid,$prid);
					echo "<h4>$suppliername Price List</h4>";
					echo "<button class='btn btn-danger notification pull-right' onClick='removesupplier(".$supplierid.")'><i class='fa fa-times'></i> Remove Supplier</button>";
					echo "<table id='supplier-".$canvass_list['supplierid']."' class='table table-striped table-bordered table-vcenter'>";
					echo "<thead>
                                        <tr>
                                            
                                            <th>QTY</th>
											<th style='width: 120px;'>Unit of Issue</th>
                                            <th style='width: 420px;'>DESCRIPTION</th>
											<th style='width: 120px;'>Unit Price</th>
											<th style='width: 120px;'>Total Price</th>
                                            <th style='width: 320px;' class='text-center'><i class='fa fa-flash'></i></th>
                                        </tr>
                                    </thead>";
						echo "<tbody>";	
						$totalamount2 = 0;
			foreach ($canvassitems as $canvass_items):	
				$amount2 = $canvass_items['qty'] * $canvass_items['unitprice'];	
				$totalamount2=$totalamount2+$amount2;				
									echo "<tr class='odd gradeX'>";
				echo "<td>".$canvass_items['qty']."</td>";
				echo "<td>".$canvass_items['unit']."</td>";
				echo "<td>".$canvass_items['description']."</td>";
				echo "<td style='width:210px;'><input type='text' style='width:80px;text-align:center;' value='".$canvass_items['unitprice']."' id='unitprice-".$canvass_items['aocid']."'> </td>";
				echo "<td>".number_format($amount2,2)."</td>";
				echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Save Price' onClick='updatecanvassprice(".$canvass_items['aocid'].",".$canvass_items['supplierid'].")'><i class='gi gi-floppy_saved'></i></button>
					
					
				</td>";
				endforeach;
			echo "</tbody>";
						
						
		echo "</table>";
		
		echo "<div class='row' id='totalamount".$canvass_items['supplierid']."'>
					<h4 class='sub-header'></h4>
					<div class='col-md-9'>
						<strong class='pull-right'><h2>Total Amount:";
		echo number_format($totalamount2,2);
			echo "</h2></strong></div></div>";
		
		echo "</div>";

endforeach;
			*/
		?>
				
				
				
				
			<!-- END Tabs Content -->
		</div>
		<!-- END Block Tabs -->
					 
				
				</div><!-- end row-->
				
				
				
				
			</div> <!-- end block -->
	   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->

