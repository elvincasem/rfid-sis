
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
<input type="hidden" id="typeaheadvalue" value="<?php echo $typeahead;?>">
	
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
                <div id="printaprmodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="aprprintbody">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <table border="1" style="border:solid 1px;">
	<tr >
		
		<td style="width:100px;" colspan="1" rowspan="2">NAME & ADDRESS OF REQUESTING AGENCY</td>
		<td style="width:500px; padding:15px;" rowspan="2" colspan="3">
		<?php echo $agencyname;?>
		</td>
		<td style="width:100px;">AGENCY ACCT. CODE</td>
		<td style="width:100px;"><?php echo $agencyaccountcode;?></td>
		
		
		
	</tr>
	<tr  style="width:350px;"><td colspan="2">AGENCY CONTROL No.</td></tr>
	<tr>
		<td style="width:100px;text-align:center;font-weight:bold;font-size:26px;" colspan="4" >AGENCY PROCUREMENT REQUEST</td>
		<td colspan="2">PS APR. No.: <strong><?php echo $aprmaindetails['aprno'];?></strong></td>
	</tr>
	<tr>
		<td colspan="6">
			<div style="text-align:right;float:right;margin-right:50px;"><span style="border-bottom:1px solid;"><?php $apr_date = $aprmaindetails['aprdate']; echo mdate('%F %d, %Y',strtotime($apr_date));?></span><br>Date Prepared </div>
			To: <?php echo $procurement;?>
		<div style="text-align:center">ACTION REQUESTED ON THE ITEM(S) LISTED BELOW</div>
		<div style="text-align:left">( )<span style="margin-left:20px;">Please furnish us with the Price Estimate (for office equipment/furniture & supplementary items)</span></div>
		<div style="text-align:left">( )<span style="margin-left:20px;">Please purchase for our agency the equipment/furniture/supplementary items per your Price Estimate</span></div>
		<div style="text-align:left"><span style="margin-left:20px;">(PS RAD No. ________________________Attached) dated _________________________</span></div>
		<div style="text-align:left">( )<span style="margin-left:20px;">Please issue common-user supplies/materials per PS Price List as of</span></div>
		<div style="text-align:left">( )<span style="margin-left:20px;">Please issue Certificate of Price Reasonableness</span></div>
		<div style="text-align:left">( )<span style="margin-left:20px;">Please furnish us with our latest/updated Price List</span></div>
		<div style="text-align:left">( )<span style="margin-left:20px;">Others (Specify) ______________________________________________________________________________</span></div>
		<div style="text-align:left"><span style="margin-left:20px;"> ______________________________________________________________________________________________</span></div>
		
		
		</td>
	</tr>
	<tr ><td></td></tr>
	<tr style="text-align:center;font-weight:bold;"><td>ITEM No.</td><td>ITEM and DESCRIPTION/<br>SPECIFICATIONS/STOCK No.</td><td>QUANTITY</td><td>UNIT</td><td>UNIT PRICE</td><td>AMOUNT</td></tr>
	<!-- items here -->
	<?php
				$totalamount=0;
				foreach ($apr_list_items as $aprlistitems):
				
				$amount =$aprlistitems['qty'] * $aprlistitems['unitprice'];
				$totalamount +=$amount;
				
				echo "<tr style='text-align:center;'>
				<td>".$aprlistitems['itemid']."</td>
				<td>".$aprlistitems['description']."</td>
				<td>".$aprlistitems['qty']."</td>
				<td>".$aprlistitems['unit']."</td>
				<td>".$aprlistitems['unitprice']."</td>
				<td>".number_format($amount,2)."</td></tr>";
				
				
				endforeach;
				
				?>
	
	
	
	<tr style="text-align:center;"><td></td><td></td><td colspan="2">Total Amount</td><td></td><td><?php echo number_format($totalamount,2);?></td></tr>
	
	<tr style="text-align:center;"><td></td><td colspan="4">NOTE: ALL SIGNATURES MUST BE OVER PRINTED NAME</td><td></td></tr>
	
	<tr style="text-align:center;font-weight:bold; text-align:left;">
		<td colspan="2">
		STOCKS REQUESTED ARE CERTIFIED<BR> TO BE WITHIN APPROVED PROGRAM
			<br><br>
			<div style="text-align:center;">
				<?php echo $aprcol1;?>
			</div>
		</td>
		<td colspan="2">
		FUNDS CERTIFIED AVAILABLE
		<br><br>
			<div style="text-align:center;">
				<?php echo $aprcol2;?>
			</div>
		</td>
		
		<td colspan="2">
		APPROVED:
		<br><br>
			<div style="text-align:center; width:290px">
				<?php echo $aprcol3;?>
			</div>
		</td>
	
	</tr>
	
	<tr><td colspan="6"><br>( ) FUNDS DEPOSITED WITH PS  ( ) ___________ CHECK NO. _________________ IN THE AMOUNT OF:
<br><br>	__________________________________________________________(P ______________________) ENCLOSED.<br><br></td></tr>
	
</table>
PS FORM No. 001
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
				
				
				
				
				
				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>Agency Procurement Request Details</h5>
					<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-primary" href="#printaprmodal" data-toggle="modal" onclick="aprpreview(<?php echo $aprid;?>);"><i class="fa fa-print"></i> Print APR</button>
				</div>
				<form action="#" method="post" class="form-horizontal" onsubmit="return false;">
				<div class="form-group">
					<input type="hidden" id="aprid" name="state-normal" class="form-control" value="<?php echo $aprid;?>" >.
						<label class="col-md-3 control-label" for="state-normal">APR Date</label>
                        <div class="col-md-2">
                            <input type="text" id="aprdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $aprmaindetails['aprdate'];?>" disabled>
                        </div>
						
                        <label class="col-md-3 control-label" for="state-normal">APR No.</label>
                        <div class="col-md-2">
                            <input type="text" id="aprno" name="state-normal" class="form-control" tabindex="0" value="<?php echo $aprmaindetails['aprno'];?>" disabled>
                        </div>

                    </div>
				</form>
				
				
				
				<h4 class="sub-header"></h4>
				<div class="row">
			
					<div class="form-group">
						<label class="col-md-3 control-label text-right" for="state-normal">Select Items</label>
						<div class="col-md-4" id="item_list_form">
							
							<input type="text" id="itemlist" name="example-typeahead" class="form-control input-typeahead" autocomplete="off" placeholder="Search Item..">
						</div>
						
						<label class="col-sm-1 text-right control-label" for="state-normal">QTY</label>
                        <div class="col-md-1">
                            <input type="number" id="itemqty" name="state-normal" class="form-control" tabindex="0" value="1">
                        </div>
						
						<button class='btn btn-primary' title='Save Price' onclick="saveapritem();"><i class="fa fa-plus"></i> Add Item</button>
					</div>
					
					
	
				</div>
				<div class="row"><br></div>
				
				<div class="row">
					 <div class="table-responsive">
					 <table id="general-table" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            
                                            <th>Item No.</th>
                                            <th style="width: 420px;">ITEM and DESCRIPTION/<br>SPECIFICATIONS/STOCK No.</th>
                                            <th style="width: 120px;">QUANTITY</th>
											<th style="width: 120px;">UNIT</th>
											<th style="width: 120px;">UNIT PRICE</th>
											<th style="width: 120px;">AMOUNT</th>
											<th style="width: 120px;">Availability</th>
                                            <th style="width: 320px;" class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
				$totalamount=0;
				foreach ($apr_list_items as $aprlistitems):
				$amount = $aprlistitems['qty'] * $aprlistitems['unitprice'];
				$totalamount +=$amount;
				echo "<tr class='odd gradeX'>";
				echo "<td>".$aprlistitems['itemid']."</td>";
				echo "<td>".$aprlistitems['description']."</td>";
				echo "<td>".$aprlistitems['qty']."</td>";
				echo "<td>".$aprlistitems['unit']."</td>";
				echo "<td style='width:210px;'><input type='text' style='width:80px;text-align:center;' value='".$aprlistitems['unitprice']."' id='unitprice-".$aprlistitems['apritemsid']."'> </td>";
				echo "<td>".number_format($amount,2)."</td>";
				echo "<td><select class='form-control' id='availability-".$aprlistitems['apritemsid']."'><option value='".$aprlistitems['availability']."'>".$aprlistitems['availability']."</option><option value='NO'>NO</option><option value='YES'>YES</option></select> </td>";
				
			
				echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Save Price' onClick='saveunitprice(".$aprlistitems['apritemsid'].")'><i class='gi gi-floppy_saved'></i></button>
					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteapritem(".$aprlistitems['apritemsid'].")'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				?>
									</tbody>
					</table>
					 </div>
				
				</div>
				
				<div class="row" id="totalamount">
				<h4 class="sub-header"></h4>
				<div class="col-md-9"">
					<strong class="pull-right"><h2>Total Amount: <?php echo number_format($totalamount,2);?></h2></strong>
				</div>
				</div>
				
				
			</div> <!-- end block -->
	   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


