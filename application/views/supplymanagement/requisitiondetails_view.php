
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
<input type="hidden" id="reqid" value="<?php echo $reqid;?>">
	
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
                <div id="printreqmodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="reqprintbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                
				<div style="text-align:right;">Annex G-9</div>
				<table border="3" style="width:100%">
	<tr>
		<td colspan="6" style="text-align:center;">
			<h1>REQUISITION AND ISSUE SLIP</h1>
			<h3><i>Commission on Higher Education</i></h3>
		</td>
	
	</tr>
	
			
		
	
	<tr>
		<td colspan="2" style="text-align:center;"><br>
		Division:_________________________<br><br>
		Office: __________________________<br>
		</td>
		<td colspan="1" style="text-align:center;">
		Responsible Center <br><br>Code ___________
		</td>
		<td colspan="3" style="text-align:left;">
		<span style="text-align:left;">RIS NO. <strong><?php echo $reqdetails['requisition_no'];?> </strong></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: <strong><?php  echo mdate('%F %d, %Y',strtotime($reqdetails['requisition_date']));?></strong><br><br>
		SAI No. ______________   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ___________
		</td>
		
	
			
	
		
	</tr>
	

	
	</table>
	
	<table border="1" style="width:100%;">
	<td colspan="6">
			<center><strong>Requisition</strong><span style="padding-left:440px;">&nbsp;</span> <strong>Stock Available</strong><span style="padding-left:100px;">&nbsp;</span> <strong>Issuance</strong></center>
		</td></tr>
	</div>
	</table>
	
   <table border="1" style="width:100%;">
   
   </tr>
	
   <tr>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Stock No:
		</td>
		<td colspan="1" style="text-align:center;">
		Unit
		</td>
		<td colspan="1" style="text-align:center;">
		Description
		</td>
		<td colspan="1" style="text-align:center;">
		Quantity
		</td>
		<td colspan="1" style="text-align:center;">
		Yes
		</td>
		<td colspan="1" style="text-align:center;">
		No
		</td>
		<td colspan="1" style="text-align:center;">
		Quantity
		</td>
		<td colspan="1" style="text-align:center;">
		Remarks
		</td>
	

	
   
	</tr>	
	
	
<?php
								
	
	foreach ($reqitems as $req_items) {
		$idescription = $req_items['description'];
		$iunit = $req_items['unit'];
		$iqty = $req_items['qty'];
		$reqitemsid = $req_items['reqitemsid'];
		
		echo "<tr>";
		echo "<td colspan='1' style='text-align:center;vertical-align:top;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$iunit</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$idescription</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$iqty</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";
		echo "</tr>";
	}
	?>
	
	
	
	
	
	
	
	
	 <tr>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
		<td colspan="1" style="text-align:center;">
		<h1></h1>
		</td>
	
	
	
   
	</tr>	
	
	</table>
	
	
	<table border="1" style="width:100%;">
		<td colspan="6" style="text-align:left;">
		<br><br>
		Purpose:<u><?php echo $reqdetails['purpose'];?></u>
		</td>
	</table>
		
	<table border="1" style="width:100%;">
	
	 <tr>
		
		
		
	
	
		
		<td colspan="2" style="text-align:center;vertical-align:top;">
		Requested by:
		<br>
		<br>
		<br>
		<strong><?php echo $reqdetails['fname']." ".$reqdetails['lname'];?></strong>
		<br>
		<strong><?php echo $reqdetails['designation']?></strong>
		<br>
		Date: <strong><?php echo mdate('%F %d, %Y',strtotime($reqdetails['requisition_date']));?></strong>
		</td>
		
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Approved by:
		<br>
		<br>
		<br>
		<strong>&nbsp;<strong>_______________________________</strong>&nbsp;</strong>
		<br>
		
		</td>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Issued by:
		<br>
		<br>
		<br>
		<strong>_______________________________</strong>
		<br>
		
		</td>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Received by:
<br><br><br>
		<strong>________________</strong>
		</td>
		
	
	
	
   
	</tr>	
	
	
	</table>		
				
				
				
				
				
				
				
				
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							 
                                <button type="button" id="saveapr" class="btn btn-effect-ripple btn-primary" onclick="printreq();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->


<!-- Regular Modal -->
                <div id="printreqmodalwithprice" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="reqprintbodywithprice">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                
				<div style="text-align:right;">Annex G-9</div>
				<table border="3" style="width:100%">
	<tr>
		<td colspan="6" style="text-align:center;">
			<h1>REQUISITION AND ISSUE SLIP</h1>
			<h3><i>Commission on Higher Education</i></h3>
		</td>
	
	</tr>
	
			
		
	
	<tr>
		<td colspan="2" style="text-align:center;"><br>
		Division:_________________________<br><br>
		Office: __________________________<br>
		</td>
		<td colspan="1" style="text-align:center;">
		Responsible Center <br><br>Code ___________
		</td>
		<td colspan="3" style="text-align:left;">
		<span style="text-align:left;">RIS NO. <strong><?php echo $reqdetails['requisition_no'];?> </strong></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: <strong><?php  echo mdate('%F %d, %Y',strtotime($reqdetails['requisition_date']));?></strong><br><br>
		SAI No. ______________   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: ___________
		</td>
		
	
			
	
		
	</tr>
	

	
	</table>
	
	<table border="1" style="width:100%;">
	<td colspan="6">
			<center><strong>Requisition</strong><span style="padding-left:440px;">&nbsp;</span> <strong>Stock Available</strong><span style="padding-left:100px;">&nbsp;</span> <strong>Issuance</strong></center>
		</td></tr>
	</div>
	</table>
	
   <table border="1" style="width:100%;">
   
   </tr>
	
   <tr>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Stock No:
		</td>
		<td colspan="1" style="text-align:center;">
		Unit
		</td>
		<td colspan="1" style="text-align:center;">
		Description
		</td>
		<td colspan="1" style="text-align:center;">
		Quantity
		</td>
		<td colspan="1" style="text-align:center;">
		Price
		</td>
		<td colspan="1" style="text-align:center;">
		Total Amount
		</td>
		
	

	
   
	</tr>	
	
	
<?php
								
	$grandtotal = 0;
	foreach ($reqitems as $req_items) {
		$idescription = $req_items['description'];
		$iunit = $req_items['unit'];
		$iqty = $req_items['qty'];
		$reqitemsid = $req_items['reqitemsid'];
		$unitcost = $req_items['unitCost'];
		$totalamount = $req_items['unitCost']*$req_items['qty'];
		
		echo "<tr>";
		echo "<td colspan='1' style='text-align:center;vertical-align:top;'>
		<h1></h1></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$iunit</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$idescription</strong></td>";
		echo "<td colspan='1' style='text-align:center;'>
		<strong>$iqty</strong></td>";
		echo "<td colspan='1' style='text-align:right;'>
		".number_format($unitcost,2)."</td>";
		echo "<td colspan='1' style='text-align:right;'>
		".number_format($totalamount,2)."</td>";
		echo "<td colspan='1' style='text-align:center;'>
		<h1></h1></td>";

		echo "</tr>";
		
		$grandtotal = $grandtotal + $totalamount;
	}
	
	?>
	<tr><td></td><td></td><td></td><td></td><td></td><td style='text-align:right;'><?php echo number_format($grandtotal,2);?></td><td></td></tr>
									</tbody>
	
	
	
	
	
	
	
	 
	
	</table>
	
	
	<table border="1" style="width:100%;">
		<td colspan="6" style="text-align:left;">
		<br><br>
		Purpose:<u><?php echo $reqdetails['purpose'];?></u>
		</td>
	</table>
		
	<table border="1" style="width:100%;">
	
	 <tr>
		
		
		
	
	
		
		<td colspan="2" style="text-align:center;vertical-align:top;">
		Requested by:
		<br>
		<br>
		<br>
		<strong><?php echo $reqdetails['fname']." ".$reqdetails['lname'];?></strong>
		<br>
		<strong><?php echo $reqdetails['designation']?></strong>
		<br>
		Date: <strong><?php echo mdate('%F %d, %Y',strtotime($reqdetails['requisition_date']));?></strong>
		</td>
		
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Approved by:
		<br>
		<br>
		<br>
		<strong>&nbsp;<strong>_______________________________</strong>&nbsp;</strong>
		<br>
		
		</td>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Issued by:
		<br>
		<br>
		<br>
		<strong>_______________________________</strong>
		<br>
		
		</td>
		
		
		<td colspan="1" style="text-align:center;vertical-align:top;">
		Received by:
<br><br><br>
		<strong>________________</strong>
		</td>
		
	
	
	
   
	</tr>	
	
	
	</table>		
				
				
				
				
				
				
				
				
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							 
                                <button type="button" id="saveapr" class="btn btn-effect-ripple btn-primary" onclick="printreqwithprice();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
								
				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>Requisition Details</h5>
					<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-success" href="#printaprmodal" data-toggle="modal" onclick="updateinventory(<?php echo $reqid;?>);"> Update Inventory</button> 
					&nbsp;
					<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-primary" href="#printreqmodalwithprice" data-toggle="modal" ><i class="fa fa-print"></i> Print w/ Price</button> 
					<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-primary" href="#printreqmodal" data-toggle="modal" ><i class="fa fa-print"></i> Print Requisition</button> 
					
					<button type="button"  class="btn btn-effect-ripple btn-primary pull-right" onclick="location.reload();" ><i class="fa fa-refresh"></i> Refresh</button>
					
				</div>
				
				<div class="row">
				<div class="col-sm-4">
                                <!-- Block -->
                                <div class="block">
                                    <!-- Block Title -->
                                    <div class="block-title">
                                        <h2>Details</h2>
										<h2 class="pull-right"><a href="#" onclick="editreq();">Edit</a> | <a href="#" onclick="updatereqdetails();">Save</a>
										
										</h2>
                                    </div>
									
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
                                    
			Requisition No.
			<div>
				<input type="text" id="requisition_no" name="state-normal" class="form-control" tabindex="0" value="<?php echo $reqdetails['requisition_no'];?>" disabled>
			</div>
			Request Date
			<div>
				<input type="text" id="rdate"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  value="<?php echo $reqdetails['requisition_date'];?>" disabled>
				
			</div>	
			Requested by:
			<div>
				<select id="employeeid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." disabled>
							 
				<?php echo "<option>".$reqdetails['fname']." ".$reqdetails['lname']."</option>";?>
				<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
				</select>
			</div>				
			Status
			<div>
				<select id="status" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." disabled>
							 
				<?php echo "<option>".$reqdetails['requisition_status']."</option>";?>
				<option value="NONE">NONE</option>
				<option value="CANCELLED">CANCELLED</option>
				</select>
			</div>	

			Purpose
			<div>
				<textarea class="form-control" tabindex="0" id="purpose" disabled><?php echo $reqdetails['purpose'];?></textarea>
			</div>
			Warehouse
			<div>
				<select id="warehouseid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." disabled>
							 
				<?php echo "<option value='".$reqdetails['warehouseid']."'>".$reqdetails['warehouse_name']."</option>";?>
				<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
				</select>
			</div>	
			Added by:
			<div>
				<strong><?php echo $reqdetails['name'];?></strong>
			</div>				
			Logtime:
			<div>
				<strong><?php echo $reqdetails['logtime'];?></strong>
			</div>				
									
									
									
                                    <!-- END Block Content -->
                                </div>
                                <!-- END Block -->
                            </div>
							
							
				<div class="col-sm-8">
                                <!-- Block -->
                                <div class="block">
                                    <!-- Block Title -->
                                    <div class="block-title">
                                        <h2>Item List</h2>
                                    </div>
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
									
						<div>
							
							 <select id="itemid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." onchange="showitemunit();">
							 <option></option>
							 <?php
								foreach ($itemlist as $item_list):
								
									echo "<option value='".$item_list['itemNo']."'>".$item_list['itemNo']."-".$item_list['description']."</option>";
								endforeach;
							 
							 ?>
							 </select>
							 <div class="row">
							  <div class="row"></div>
							   <div class="row"></div>
							 <div class="col-lg-3">
                                   Unit:
								 <div style="">
								 <select class="form-control" id="itemunit">
									
								 </select>
								 </div>
								 
								 
								 
								 
							</div>
<div class="col-lg-3">
								 Stock QTY:
								 <input type="number" id="inventory_qty" class="form-control" placeholder="1" value="0" disabled>
								 
								</div>
							
								<div class="col-lg-3">
								 QTY:
								 <input type="number" id="itemqty" class="form-control" placeholder="1" value="1" >
								 
								</div>
								
								 <button class="btn btn-primary" title="Save Price" onclick="additemreq();" style="margin-top:20px;"><i class="fa fa-plus"></i> Add Item</button>
								 
								 <div class="row"></div>
							 
							</div>
						</div>
						
						<br>
						<table id="general-table" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            
                                            <th  style="width: 500px;">Item Description</th>
                                            <th  style="width: 220px;">Unit</th>
                                            <th style="width: 120px;">Quantity</th>
                                            <th style="width: 120px;">Price</th>
                                            <th style="width: 120px;">Amount</th>

                                            <th class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									
									<?php
									$grandtotal =0;
									foreach ($reqitems as $req_items):
									$totalamount = $req_items['unitCost']*$req_items['qty'];
									echo "<tr>";
									echo "<td>".$req_items['description']."</td>";
									echo "<td>".$req_items['unit']."</td>";
									echo "<td>".$req_items['qty']."</td>";
									echo "<td>".number_format($req_items['unitCost'],2)."</td>";
									echo "<td style='text-align:right;'>".number_format($totalamount,2)."</td>";
									if($req_items['update_status']==1){
										$dis = "disabled";
									}else{
										$dis ="";
									}
									echo "<td class='center'> 
					
							
										
										<button class='btn btn-danger notification' title='Delete item' id='notification' onClick='deletereqitem(".$req_items['reqitemsid'].")'  $dis><i class='fa fa-times'></i></button>
									</td>";
									echo "</tr>";
									
									$grandtotal = $grandtotal + $totalamount;
									
									endforeach;
									?>
									
									
									<tr><td></td><td></td><td></td><td></td><td style='text-align:right;'><?php echo number_format($grandtotal,2);?></td><td></td></tr>
									</tbody>
						</table>
						
						
						
						
                                    <p></p>
                                    <!-- END Block Content -->
                                </div>
                                <!-- END Block -->
				</div>			
				
</div>
				
				
				
				
				<h4 class="sub-header"></h4>
				<div class="row">
			
					
					
					
	
				</div> <!-- end row -->
				<div class="row"><br></div>
				
				
				
			</div> <!-- end block -->
	   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


