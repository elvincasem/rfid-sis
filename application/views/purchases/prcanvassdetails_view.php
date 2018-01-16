
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
				<!-- generate po modal -->
				<!-- Regular Modal Print PR-->
                <div id="generatepomodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Generate PO</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right" for="state-normal">PR No.</label>
                        <div class="col-sm-7">
                            <input type="text" id="prnomodal"  class="form-control" value="<?php echo $prmaindetails['prno'];?>" disabled>
                        </div>

						<label class="col-md-3 control-label text-right" for="state-normal">Mode of Procurement</label>
                        <div class="col-md-7">
                            
						<select id="modeofprocurementpo" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
						<option value="<?php echo $prmaindetails['modeofprocurement'];?>"><?php echo $prmaindetails['modeofprocurement'];?></option>
							
						</select>

                        </div>
						
						<div class="row"></div>
						<label class="col-md-3 control-label text-right" for="state-normal">Supplier</label>
                        <div class="col-md-7">
                            
						<select id="supplierpo" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
						<option value="<?php echo $awarded_supplier['supplierid'];?>"><?php echo $awarded_supplier['suppliername'];?></option>
							
						</select>
								
							
                        </div>
						
						<div class="row"></div>
		

						
						<label class="col-md-3 control-label text-right">PO Date</label>
                        <div class="col-md-7">
                            <input type="text" id="podate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>	
								
						
						<label class="col-md-3 control-label  text-right" for="state-normal">PO No.</label>
                        <div class="col-md-7">
                            <input type="text" id="pono" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>
						
												
						<div class="row"></div>		
						<label class="col-md-3 control-label  text-right" for="state-normal">Place of Delivery</label>
                        <div class="col-md-7">
                            <input type="text" id="placeofdelivery" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label  text-right" for="state-normal">Date of Delivery</label>
                        <div class="col-md-7">
                            <input type="text" id="dateofdelivery" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>		
						<label class="col-md-3 control-label  text-right" for="state-normal">Delivery Term</label>
                        <div class="col-md-7">
                            <input type="text" id="deliveryterm" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label  text-right" for="state-normal">Payment Term</label>
                        <div class="col-md-7">
                            <input type="text" id="paymentterm" name="state-normal" class="form-control" tabindex="0" value="">
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
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="addpo();">Add PO</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
				
					
				<!-- end generate po modal-->
				
				
				
				<!-- Regular Modal Print PR-->
                <div id="printprmodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="aprprintbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
               <style>

tr.noBorder td{
	border:0;
}
</style>

<table border="1" style="border:solid 2px; width:800px;">
	<tr style="border:10px;">
		<td colspan="6" style="text-align:center; border:1px;">
			<h1 style="line-height:1;">PURCHASE REQUEST</h1>
			<h2 style="line-height:1;"><?php echo $subheader;?></h2>
			
		</td>
	</tr>
	<tr><td colspan="6"></td></tr>
	
	<tr class="noBorder">
		<td colspan="2">Department: <u><?php echo $prmaindetails['department'];?></u></td>
		<td colspan="2">PR No.: <u><?php echo $prmaindetails['prno'];?></u></td>
		<td colspan="2">Date: <u><?php $pr_date = $prmaindetails['prdate']; echo mdate('%F %d, %Y',strtotime($pr_date));?></u></td>
	</tr>
	<tr  class="noBorder">
		<td colspan="2">Section: <u><?php echo $prmaindetails['section'];?></u></td>
		<td colspan="2">APR No.: <u><?php echo $prmaindetails['aprno'];?></u></td>
		<td colspan="2">Date: <u></u></td>
	</tr>
	<tr  class="noBorder">
		<td colspan="2"></td>
		<td colspan="2">SAI No.: <u></u></td>
		<td colspan="2">Date: <u></u></td>
	</tr>
	<tr  class="noBorder">
		<td colspan="2"></td>
		<td colspan="2">ALOBS No.: <u></u></td>
		<td colspan="2">Date: <u></u></td>
	</tr>
		
		
	<tr style="text-align:center;font-weight:bold;"><td>Quantity</td><td>Unit of Issue</td><td>Description</td><td>Stock No.</td><td>Estimated Unit Cost</td><td>Estimated Cost</td></tr>
	<!-- items here -->
	
	<?php
				$totalamount=0;
				foreach ($pr_list_items as $aprlistitems):
				$amount = $aprlistitems['qty'] * $aprlistitems['unitprice'];
				$totalamount=$totalamount+$amount;
				echo "<tr class='odd gradeX' style='text-align:center;'>";
				echo "<td>".$aprlistitems['qty']."</td>";
				echo "<td>".$aprlistitems['unit']."</td>";
				echo "<td>".$aprlistitems['description']."</td>";
				echo "<td>".$aprlistitems['itemid']."</td>";
				echo "<td style='width:210px;'>".$aprlistitems['unitprice']." </td>";
				echo "<td>".number_format($amount,2)."</td>";
				
				echo "</tr>";
				
				endforeach;
				
				?>
				
	<tr style="text-align:center;"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
	
	<tr style="text-align:center;"><td></td><td></td><td colspan="2">Total Amount</td><td></td><td><strong><?php echo number_format($totalamount,2);?></strong></td></tr>
	
	<tr><td colspan="6" style="padding:10px;">Purpose: <u><?php echo $prmaindetails['purpose'];?></u></td></tr>
	
	
	<tr style="text-align:center;font-weight:bold; text-align:left;">
		<td colspan="2">
		Signature:<br>
		Printed Name:<br>
		Designation:
		</td>
		<td colspan="2">
		Requested By:
		<br><br>
			<div style="text-align:center;">
				_________________________<br>
				<?php echo $prmaindetails['fname']." ".$prmaindetails['lname'];?><br>
				<?php echo $prmaindetails['designation'];?>
			</div>
		</td>
		
		<td colspan="2">
		Approved by:
		<br><br>
			<div style="text-align:center;">
				_________________________<br>
				<?php echo $approvedby;?>
			</div>
		</td>
	
	</tr>
	
	
	
</table>


                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							
                                <button type="button" id="saveapr" class="btn btn-effect-ripple btn-primary" onclick="printapr();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				<!-- Regular Modal Print Canvass-->
                <div id="printcanvassmodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="canvassprintbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
               
<div style="font-family:Arial;font-size:12px;">
	<div style="float:left;width:0%;position:relative;left:40px;"><img width="100" src="<?=base_url();?>public/img/ched_logo.png"></div>
	<?php echo $canvassheader;?>

<br><br>
<strong>CIRCULAR PROPOSAL NO.</strong>
<br><br>
<div style="margin-left:80px;">This Office desires to purchase the articles listed for delivery within 5 working days after award of bid.</div>
<br>

<table border="1" style="border:solid 2px; width:100%;">
	<tr style="text-align:center;font-weight:bold;">
		<td>ITEM NO.</td>
		<td>QTY</td>
		<td>UNIT</td>
		<td width="400">PARTICULARS</td>
		<td>UNIT PRICE</td>
		<td>TOTAL PRICE</td>
	</tr>
	
	<?php
				
				foreach ($pr_list_items as $aprlistitems):
				
				echo "<tr class='odd gradeX' style='text-align:center;'>";
				echo "<td>".$aprlistitems['itemid']."</td>";
				echo "<td>".$aprlistitems['qty']."</td>";
				echo "<td>".$aprlistitems['unit']."</td>";
				echo "<td style='text-align:left;'>".$aprlistitems['description']."</td>";
				echo "<td></td>";
				echo "<td></td>";
				
				echo "</tr>";
				
				endforeach;
				
				?>
				
	
	<tr style="text-align:center;">
		<td colspan="6">xxx Nothing Follows xxx</td>
	</tr>
	
</table>
<br>
<div>
	<span style="margin-left:90px;">&nbsp;</span>Please quote your prices in the blank under the column (unit price) and returned same sealed envelope, plainly marked (Quotation for Bidded Materials) to the Property Unit. CHED HERO I, San Fernando, La Union. Your quotations together with those of other bidders will be opened on _______________ in the presence of the COA Representative.
</div>
<br>
<div style="margin-left:500px;">
	Very Truly yours,
	<br><br>
	<?php echo $canvasssignature;?>
	
</div>
<br>
<div>
	<span style="margin-left:90px;">&nbsp;</span>Please quote your prices in the blank under the column (unit price) and returned same sealed envelope, plainly marked (Quotation for Bidded Materials) to the Property Unit. CHED HERO I, San Fernando, La Union. Your quotations together with those of other bidders will be opened on _______________ in the presence of the COA Representative.
</div>
<br>
<br>
<br>
<div style="margin-left:500px;font-weight:bold;">
	___________________
	<br>
	BIDDERR'S SIGNATURE
	
</div>
<br><br><br>
<div style="margin-left:500px;font-weight:bold;">
	___________________
	<br>
	BUSINESS ENTERPRISE
	
</div>

</div>

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							
                                <button type="button" id="saveapr" class="btn btn-effect-ripple btn-primary" onclick="printcanvass();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				
				
				<!-- Regular Modal print abstract -->
                <div id="printabstractmodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="printabstractbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
              <style>
tr td{
 border:thin 1px;
}
</style>
<div style="font-family:Times;font-size:16px;border: solid 1px;">
	
	<p style="text-align:center;">
		<?php echo $canvassheader;?>
		<h2 style="text-align:center;">ABSTRACT OF CANVASS</h2>
	</p>

<br>
<div style="line-height:30px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Canvass opened today ___________________________________________________________________ in the Office of the Resident Auditor, _______________________________________________________.</div>
<br>

<table border="1" style="border:solid 2px; width:100%;">
	<tr style="text-align:center;font-weight:bold;">
		<td  rowspan="2">ITEM NO.</td>
		<td  rowspan="2">QTY</td>
		<td  rowspan="2">UNIT</td>
		<td  rowspan="2" width="300">ARTICLES</td>
		<td colspan="3">BIDDER'S QUOTATION</td>
		
		
	</tr>
	<tr>
	<?php
				foreach ($canvasslist as $canvass_list):
	
						echo "<td style='text-align:center;font-weight:bold;'>".$canvass_list['supName']."</td>";

				endforeach;
				
				?>

	</tr>
	<?php
				
				foreach ($pr_list_items as $aprlistitems):
				
				echo "<tr class='odd gradeX' style='text-align:center;'>";
				echo "<td>".$aprlistitems['itemid']."</td>";
				echo "<td>".$aprlistitems['qty']."</td>";
				echo "<td>".$aprlistitems['unit']."</td>";
				echo "<td style='text-align:left;'>".$aprlistitems['description']."</td>";
					$itemid_frompr = $aprlistitems['pritemsid'];
					$prid_frompr = $aprlistitems['prid'];
					$quoted_totalcost = $this->purchaserequest_model->quotetotalcost($itemid_frompr,$prid_frompr);
					
					foreach ($quoted_totalcost as $qt):
						echo "<td>".number_format($qt['estimatedcost'],2)."</td>";
					endforeach;
				
			
				echo "</tr>";
				
				endforeach;
				
				?>
		
	<tr style="text-align:center;font-weight:bold;">
		<td colspan="4">Total</td>
		<?php
			//get totalamount
				
					
					foreach ($get_totalamount as $gt):
						echo "<td>".number_format($gt['totalestimatedcost'],2)."</td>";
					endforeach;
		
		?>
		
		
	</tr>
	
	<tr style="text-align:center;">
		<td colspan="7">xxx Nothing Follows xxx</td>
	</tr>
	
</table>
<br>
<div>
	<span style="margin-left:90px;">&nbsp;</span>I HEREBY CERTIFY to the correctness of the above quoted prices in our presence.
</div>
<br>
<div style="margin-left:500px;">
	
	<?php echo $canvasssignature;?>
	
</div>
<br>
<div>
AWARD is given to: <u> <?php echo  $prmaindetails['supName'];?></u><br>Reason: <u><?php echo  $prmaindetails['awardreason'];?></u>
</div>
<br>
<br>

	
		<?php echo $signatories;?>


<br>
<br>
<br>
<div style="text-align:center;font-size:16px;">
	<?php echo $headofoffice;?>
	<br>
</div>


</div>



                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							
                                <button type="button"  class="btn btn-effect-ripple btn-primary" onclick="printabstract();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				
				
				
				<!-- Regular Modal supplier -->
                <div id="suppliermodal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Add Supplier</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-sm-3 text-right control-label" for="state-normal">Select Supplier</label>
							<div class="col-md-7">
							
								<select id="supplierid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." tabindex="0">
								<option></option>
								<?php
								foreach ($suppliers as $supplier_list):
					
										echo "<option value='".$supplier_list['supplierID']."'>".$supplier_list['supName']."</option>";
				
								endforeach;
					
					?>
								</select>
							
							</div>
							
					</div>
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="addsupplier();">Add Supplier</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				
				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>Purchase Request Details</h5>
					 <div class="btn-group pull-right hidden">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li>
									<a href="#" onclick="editpr();">
										<i class="fa fa-pencil pull-right"></i>
										Edit PR Details
									</a>
								</li>
								<li>
									<a href="#suppliermodal" data-toggle="modal">
										<i class="fa fa-cubes pull-right"></i>
										Add Supplier
									</a>
								</li>
								<li>
									<a href="#printprmodal" data-toggle="modal" onclick="aprpreview(<?php echo $prid;?>);">
										<i class="fa fa-print pull-right"></i>
										Print PR
									</a>
								</li>
								<li>
									<a href="#printcanvassmodal" data-toggle="modal">
										<i class="fa fa-print pull-right"></i>
										Print Canvass
									</a>
								</li>
								<li>
									<a href="#printabstractmodal" data-toggle="modal">
										<i class="fa fa-print pull-right"></i>
										Print Abstract of Canvass
									</a>
								</li>
								
							</ul>
						</div>
						
					 
				</div>
				<form action="#" method="post" class="form-horizontal" onsubmit="return false;">
				<div class="form-group">
					<input type="hidden" id="prid" name="state-normal" class="form-control" value="<?php echo $prid;?>" >
					
						<label class="col-md-2 control-label" for="state-normal">Department</label>
                        <div class="col-md-2">
                            <input type="text" id="department" class="form-control" value="<?php echo $prmaindetails['department'];?>" disabled>
                        </div>
						
						<label class="col-md-2 control-label" for="state-normal">APR No.</label>
                        <div class="col-md-2">
                            <select id="aprno" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
							
							
				<?php
							echo "<option value='".$prmaindetails['aprno']."'>".$prmaindetails['aprno']."</option>";
							foreach ($apr_list as $apurchaserequest):
				
									echo "<option value='".$apurchaserequest['aprno']."'>".$apurchaserequest['aprno']."</option>";
			
							endforeach;
				
				?>
						</select>
							
                        </div>
						
						<label class="col-md-2 control-label" for="state-normal">Date</label>
                        <div class="col-md-2">
                            <input type="text" id="aprdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $prmaindetails['aprdate'];?>" disabled>
                        </div>
						
						<label class="col-md-2 control-label" for="state-normal">Section</label>
                        <div class="col-sm-2">
                            <input type="text" id="section"  class="form-control"  value="<?php echo $prmaindetails['section'];?>" disabled>
                        </div>
						
						<label class="col-md-2 control-label" for="state-normal">PR No.</label>
                        <div class="col-sm-2">
                            <input type="text" id="prno"  class="form-control" value="<?php echo $prmaindetails['prno'];?>" disabled>
                        </div>
						
						<label class="col-md-2 control-label" for="state-normal">Date</label>
                        <div class="col-md-2">
                            <input type="text" id="prdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $prmaindetails['prdate'];?>" disabled>
                        </div>
						
                        <label class="col-md-2 control-label" for="state-normal">Purpose</label>
                        <div class="col-md-4">
                           <textarea id="purpose" class="form-control" disabled><?php echo $prmaindetails['purpose'];?></textarea>
                        </div>
						<div class="row">&nbsp;</div>
						<label class="col-md-2 control-label" for="state-normal">Mode of Procurement</label>
						
                        <div class="col-md-3">
                           <select id="modeofprocurement" class="select-select2" style="width: 120%;" data-placeholder="Choose one.." tabindex="0" disabled>
						   
						   <option value="<?php echo $prmaindetails['modeofprocurement'];?>"><?php echo $prmaindetails['modeofprocurement'];?></option>
	
						   <option value="DIRECT CONTRACTING">DIRECT CONTRACTING</option>
							<option value="DIRECT CONTRACTING (LIMITED TIME OF COMPLETION)">DIRECT CONTRACTING (LIMITED TIME OF COMPLETION)</option>
							<option value="EMERGENCY PURCHASE">EMERGENCY PURCHASE</option>
						
							<option value="LIMITED SOURCE BIDDING">LIMITED SOURCE BIDDING</option>
							<option value="NEGOTIATED PROCUREMENT">NEGOTIATED PROCUREMENT</option>
							<option value="REPEAT ORDER">REPEAT ORDER</option>
							<option value="SELECTIVE BIDDING">SELECTIVE BIDDING</option>
							<option value="SHOPPING">SHOPPING</option>
							<option value="SHOPPING (SMALL VALUE EQUIPMENT)">SHOPPING (SMALL VALUE EQUIPMENT)</option>
							<option value="SMALL VALUE PROCUREMENT">SMALL VALUE PROCUREMENT   
							</option>

						   </select>
								
                        </div>
						<div class="row">&nbsp;</div>
						<label class="col-md-2 control-label" for="state-normal">Employee/Office</label>
						
                        <div class="col-md-3">
                            <select id="eid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
						   
						<?php
									foreach($employeeslist as $employees):
									if($prmaindetails['requestedby']==$employees['eid']){
										$selected = "selected='selected'";
									}else{
										$selected = "";
									}
										echo "<option $selected value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
							</select>
								
                        </div>
						<div class="row">&nbsp;</div>
						<label class="col-md-2 control-label" for="state-normal">Status</label>
						
                        <div class="col-md-3">
                            <select id="prstatus" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
								 <option value="<?php echo $prmaindetails['prstatus'];?>"><?php echo $prmaindetails['prstatus'];?></option>
								<option value="PENDING">PENDING</option>
								<option value="APPROVED">APPROVED</option>
								<option value="CANCELLED">CANCELLED</option>
							</select>
								
                        </div>
						<div class="row"></div>
						 <div class="col-md-2 pull-right">
								<button id="saveprdetails" class='btn btn-primary' title='Save PR Details' onclick="saveprdetails1();" disabled><i class="fa fa-floppy-o"></i> Save</button>
						 </div>
						<br>
						<h4 class="sub-header hidden"></h4>
							<div class="row hidden">
								<label class="col-md-2 control-label" for="state-normal">Purchase Order</label>
								 <div class="col-md-3" >
								 <a href="../../purchaseorder/details/<?php echo $getrelatedpo['poid'];?>"><?php echo $getrelatedpo['pono'];?></a>
								 <?php
									if($getrelatedpo['pono']==null){
										if($prmaindetails['prstatus']=="APPROVED"){
											$buttonstatus = "";
										}else{
											$buttonstatus = "disabled";
										}
										
										echo "<button class='btn btn-primary' title='Save Price' href='#generatepomodal' data-toggle='modal' onclick='generatepo();' $buttonstatus><i class='fa fa-refresh'></i> Generate PO</button>";
									}
								 ?>
								 
								 </div>
							</div>
						<h4 class="sub-header hidden"></h4>
		<div class="hidden">
						<label class="col-md-2 control-label hidden" for="state-normal">Awarded Supplier</label>
                        <div class="col-md-3">
                           <select id="awardedsupplier" class="select-select2" style="width: 120%;" data-placeholder="Choose one.." tabindex="0">
								
								<?php
									if($prmaindetails['awardedsupplier']==0){
										
										echo "<option value='0'>NONE</option>";
									}
								?>
								
								<?php
								foreach ($suppliers_added as $supplier_list2):
										if($supplier_list2['supplierid']==$prmaindetails['awardedsupplier']){
											$select_option = "selected='selected'";
											$awarded_supplier2 = $supplier_list2['supName'];
											
										}else{
											$select_option = "";
										}
										echo "<option $select_option value='".$supplier_list2['supplierid']."'>".$supplier_list2['supName']."</option>";
				
								endforeach;
					
					?>
						   </select>
						  
                        </div>
						
						
						<!-- column 2 -->
						<label class="col-md-3 control-label" for="state-normal">Suppliers</label>
                        <div class="col-md-3">
							<ul>
								<?php
								foreach ($suppliers_added as $supplier_list2):

										echo "<li><a href='../canvass/".$prid."/".$supplier_list2['supplierid']."'>".$supplier_list2['supName']."</a></li>";
				
								endforeach;
					
					?>
							</ul>
						</div>
						
						<!-- end column 2 -->
						
						
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Reason</label>
                        <div class="col-md-4">
                           <textarea id="awardreason" class="form-control"><?php echo $prmaindetails['awardreason'];?></textarea>
						   <button class='btn btn-primary' title='Save Price' onclick="awardsupplier();"><i class="fa fa-floppy-o"></i> Save Supplier</button>
                        </div>
						 
						   

                    </div>
				</form>
				
				
			</div><!-- end hidden -->	
				<h4 class="sub-header"></h4>
				<div class="row hidden">
			
					<div class="form-group">
					<label class="col-sm-1 text-right control-label" for="state-normal">UNIT</label>
                        <div class="col-md-2">
                            <select id="itemunit" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." tabindex="0">
							<?php
							foreach ($unitofmeasure as $uom):
				
									echo "<option value='".$uom['unit_name']."'>".$uom['unit_name']."</option>";
			
							endforeach;
				
				?>
							</select>
                        </div>
						<label class="col-md-1 control-label text-right" for="state-normal">Select Items</label>
						<div class="col-md-4" id="item_list_form">
							
							<input type="text" id="itemlist" name="example-typeahead" class="form-control input-typeahead" autocomplete="off" placeholder="Search Item.." tabindex="0">
						</div>
						
						<label class="col-sm-1 text-right control-label" for="state-normal">QTY</label>
                        <div class="col-md-1">
                            <input type="number" id="itemqty" name="state-normal" class="form-control" tabindex="0" value="1" tabindex="2">
                        </div>
						<button class='btn btn-primary' title='Save Price' onclick="savepritem();"><i class="fa fa-plus"></i> Add Item</button>
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
											<th style="width: 120px;">Unit of Issue</th>
                                            <th style="width: 420px;">DESCRIPTION</th>
                                            <th style="width: 420px;">Particular</th>
                                            <th style="width: 120px;">Stock No.</th>
											<th style="width: 120px;">Estimated Unit Cost</th>
											<th style="width: 120px;">Estimated Cost</th>
                                            <th style="width: 320px;" class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
				$totalamount=0;
				foreach($pr_aoc_items as $supplier_items):
					$amount = $supplier_items['qty'] * $supplier_items['unitprice'];
					$totalamount=$totalamount+$amount;
				
				echo "<tr class='odd gradeX'>";
				echo "<td>".$supplier_items['qty']."</td>";
				echo "<td>".$supplier_items['unit']."</td>";
				echo "<td>".$supplier_items['description']."</td>";
				echo "<td><input id='aocparticular-".$supplier_items['aocid']."' type='text' value='".$supplier_items['aocparticular']."' class='form-control'></td>";
				echo "<td>".$supplier_items['itemid']."</td>";
				echo "<td style='width:210px;'><input type='text' style='width:80px;text-align:center;' value='".$supplier_items['unitprice']."' id='unitprice-".$supplier_items['aocid']."'> </td>";
				echo "<td>".number_format($amount,2)."</td>";
				//echo "<td><select class='form-control' id='availability-".$aprlistitems['pritemsid']."'><option value='".$aprlistitems['availability']."'>".$aprlistitems['availability']."</option><option value='NO'>NO</option><option value='YES'>YES</option></select> </td>";
				
			
				echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Save Price' onClick='updatecanvassprice(".$supplier_items['aocid'].",".$supplier_items['supplierid'].")'><i class='gi gi-floppy_saved'></i></button>
					
					<button class='btn btn-danger notification' title='Delete item' id='notification' onClick='deletepritem(".$supplier_items['aocid'].")'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				
				
				/*
				
				foreach ($pr_list_items as $aprlistitems):
				$amount = $aprlistitems['qty'] * $aprlistitems['unitprice'];
				$totalamount=$totalamount+$amount;
				echo "<tr class='odd gradeX'>";
				echo "<td>".$aprlistitems['qty']."</td>";
				echo "<td>".$aprlistitems['unit']."</td>";
				echo "<td>".$aprlistitems['description']."</td>";
				echo "<td>".$aprlistitems['itemid']."</td>";
				echo "<td style='width:210px;'><input type='text' style='width:80px;text-align:center;' value='".$aprlistitems['unitprice']."' id='unitprice-".$aprlistitems['pritemsid']."'> </td>";
				echo "<td>".number_format($amount,2)."</td>";
				//echo "<td><select class='form-control' id='availability-".$aprlistitems['pritemsid']."'><option value='".$aprlistitems['availability']."'>".$aprlistitems['availability']."</option><option value='NO'>NO</option><option value='YES'>YES</option></select> </td>";
				
			
				echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Save Price' onClick='saveunitprice(".$aprlistitems['pritemsid'].")'><i class='gi gi-floppy_saved'></i></button>
					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deletepritem(".$aprlistitems['pritemsid'].")'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				*/
				?>
				<tr><td colspan="7"><button class="pull-right btn btn-primary notification" title="Save Price" id="notification" onClick="saveallpricescanvass(<?php echo $prid.",".$supplier_id;?>)"><i class="gi gi-floppy_saved"></i> Save All Prices</button></td></tr>
									</tbody>
					</table>
					 </div>
				
				
					<div class="row" id="totalamount">
					<h4 class="sub-header"></h4>
					<div class="col-md-9">
						<strong class="pull-right"><h2>Total Amount: <?php echo number_format($totalamount,2);?></h2></strong>
					</div>
					</div>
				</div>
				
				
		<?php
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


