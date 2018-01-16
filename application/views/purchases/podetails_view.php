
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
<!-- <input type="hidden" id="typeaheadvalue" value="<?php //echo $typeahead;?>"> -->
	
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
	
	<!-- Regular Modal Print PR-->
                <div id="printpomodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								
                                
                            </div> 
                            <div class="modal-body" id="poprintbody">
                                
								
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
			<h1 style="line-height:1;">PURCHASE ORDER</h1>
			<h2 style="line-height:1;"><?php echo $subheader;?></h2>
			
		</td>
	</tr>
	<tr><td colspan="6"></td></tr>
	
	<tr class="noBorder">
		<td colspan="3">Supplier: <u><?php echo $pomaindetails['supName'];?></u></td>
		<td colspan="3">P.O. No.: <u><?php echo $pomaindetails['pono'];?></u></td>
		
	</tr>
	<tr  class="noBorder">
		<td colspan="3"  width="400">Address.: <u><?php echo $pomaindetails['address'];?></u></td>
		
		<td colspan="3">Date: <u><?php echo mdate('%F %d, %Y',strtotime($pomaindetails['podate']));?></u></td>
		
	</tr>
	<tr class="noBorder">
	<td colspan="3"></td>
		
	<td colspan="3">Mode of Procurement: <u><?php echo $pomaindetails['modeofprocurement'];?></u></td>
	</tr>
	<tr>
		<td colspan="6" style="padding:10px;">
		 Gentlemen:<br><br>
		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please furnish this office the following articles subject to the terms and conditions contained herein:
		</td>
	</tr>
	
<tr>
		<td colspan="3">Place of Delivery: <u><?php echo $pomaindetails['placeofdelivery'];?></u></td>
		<td colspan="3">Delivery Term: <u><?php echo $pomaindetails['deliveryterm'];?></u></td>
		
	</tr>
	<tr  class="noBorder">
		<td colspan="3"  width="400">Date of Delivery: <u><?php echo $pomaindetails['dateofdelivery'];?></u></td>
		
		<td colspan="3">Payment Term: <u><?php echo $pomaindetails['paymentterm'];?></u></td>
		
	</tr>
	
		
	<tr style="text-align:center;font-weight:bold;">
	<td style="width:50px;">Item No.</td>
	<td style="width:50px;">Quantity</td>
	<td style="width:50px;">Unit</td>
	<td>Description</td>
	
	<td>Unit Cost</td>
	<td>Amount</td>
	</tr>
	<!-- items here -->
	
	<?php
$item_no = 1;
$totalamount=0;

foreach ($poitems as $poitemlist):
$amount = $poitemlist['qty'] * $poitemlist['unitprice'];
$totalamount=$totalamount+$amount;
	echo "<tr>";
	echo "<td style='text-align:center;'>".$item_no."</td>";
	echo "<td style='text-align:center;'>".$poitemlist['qty']."</td>";
	echo "<td style='text-align:center;'>".$poitemlist['unit']."</td>";
	echo "<td>".$poitemlist['description']."</td>";
	echo "<td style='text-align:center;'>".number_format($poitemlist['unitprice'],2)."</td>";
	echo "<td style='text-align:center;'>".number_format($amount,2)."</td>";
	
	echo "</tr>";

	$item_no++;
endforeach;

?>
	
	<tr style="text-align:center;">
	
	<td colspan="6"> xxx Nothing Follows xxx</td>
	</tr>
	<tr ><td colspan="5" style="text-align:left;">(Total Amount in Words)<div style="text-align:center;"><?php echo $pomaindetails['amountinwords'];?></div></div></td><td style="text-align:right;font-weight:bold;">P <?php echo number_format($totalamount,2);?></td></tr>
	
	<tr><td colspan="6" style="padding:10px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In case of failure to make the full delivery within the time specified above, a penalty of on-tenth (1/10) of one (1) percent of every day of delay shall be imposed.
	
	<div style="text-align:center;float:left;margin-top:40px;">
				<div style="text-align:left;font-weight:bold;">Conforme:</div><br>
				
				_________________________<br>
				
				(Signature over printed name)<br><br>
				_________________________<br>
				
				(Date)
			</div>
	<div style="text-align:center;margin-left:400px;">
				<div style="text-align:left;font-weight:bold;">Very truly yours,</div><br>
				<?php echo $posignature;?>
			</div>
	
	</td></tr>
	
	
	<tr style="text-align:center;font-weight:bold; text-align:left;">
		<td colspan="2">
		Requisitioning Office/Department:
		<br><br>
			<div style="text-align:center;width:250px;">
			<div style="margin-bottom:-15px;font-weight:bold;"></div>
				<?php echo $footercol1;?>
			</div>
		</td>
		<td colspan="2">
		Funds Available:
		<br><br>
			<div style="text-align:center;">
			<div style="margin-bottom:-15px;font-weight:bold;"></div>
				<?php echo $footercol2;?>
			</div>
		</td>
		
		<td colspan="2">
		<br>
		Amount: _____________________
		<br><br>
		<div>ALOBS No.: __________________</div>
			
		</td>
	
	</tr>
	
	
	
</table>


                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							
                                <button type="button" id="printpo" class="btn btn-effect-ripple btn-primary" onclick="printpo();" ><i class="fa fa-print"></i> Print</button>
								
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
	
	
	
	
	
			<div class="block full">
				<div class="block-title">
				
					<h5>Purchase Order Details</h5>
					 <div class="btn-group pull-right">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li>
									<a href="#" onclick="editpo();">
										<i class="fa fa-pencil pull-right"></i>
										Edit PO Details
									</a>
								</li>
								
								<li>
									<a href="#printpomodal" data-toggle="modal">
										<i class="fa fa-print pull-right"></i>
										Print PO
									</a>
								</li>
								
								
								
							</ul>
						</div>
						
					 
				</div>
				<form action="#" method="post" class="form-horizontal" onsubmit="return false;">
				<div class="form-group">
					<input type="hidden" id="poid" name="state-normal" class="form-control" value="<?php echo $poid;?>" >
					
						<label class="col-md-2 control-label" for="state-normal">P.O. No.</label>
                        <div class="col-md-2">
                            <input type="text" id="pono" class="form-control" value="<?php echo $pomaindetails['pono'];?>" disabled>
                        </div>
						<label class="col-md-3 control-label" for="state-normal">PO Date</label>
                        <div class="col-md-2">
                            <input type="text" id="podate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $pomaindetails['podate'];?>" disabled>
                        </div>
						
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Mode of Procurement</label>
                        <div class="col-sm-3">
                            <input type="text" id="modeofprocurement"  class="form-control"  value="<?php echo $pomaindetails['modeofprocurement'];?>" disabled>
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Purchase Request</label>
								 <div class="col-md-3" ><a href="../../purchaserequest/details/<?php echo $pomaindetails['prid'];?>"><?php echo $pomaindetails['prno'];?></a>
								 
								 </div>
						<div class="row"></div>
						
						
						<label class="col-md-2 control-label" for="state-normal">Place of Delivery:</label>
                        <div class="col-md-3">
                             <input type="text" id="placeofdelivery"  class="form-control" value="<?php echo $pomaindetails['placeofdelivery'];?>" disabled>
							
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Delivery Term:</label>
                        <div class="col-md-3">
                             <input type="text" id="deliveryterm"  class="form-control" value="<?php echo $pomaindetails['deliveryterm'];?>" disabled>
							
                        </div>
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Date of Delivery:</label>
                        <div class="col-md-3">
                              <input type="text" id="dateofdelivery" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $pomaindetails['dateofdelivery'];?>" disabled>
							
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Payment Term:</label>
                        <div class="col-md-3">
                             <input type="text" id="paymentterm"  class="form-control" value="<?php echo $pomaindetails['paymentterm'];?>" disabled>
							
                        </div>
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Supplier</label>
                        <div class="col-md-3">
                             <input type="text" id="suppliername"  class="form-control" value="<?php echo $pomaindetails['supName'];?>" disabled>
							
                        </div>
						
						<div class="row"></div>
						 <div class="col-md-2 pull-right">
								<button id="saveprdetails" class='btn btn-primary' title='Save PR Details' onclick="saveprdetails1();" disabled><i class="fa fa-floppy-o"></i> Save</button>
						 </div>
						<br>
						<h4 class="sub-header"></h4>
							<div class="row">
								<label class="col-md-2 control-label" for="state-normal">Purchase Request</label>
								 <div class="col-md-3" ><a href="../../purchaserequest/details/<?php echo $pomaindetails['prid'];?>"><?php echo $pomaindetails['prno'];?></a>
								 
								 </div>
							</div>
							


                    </div>
				</form>
				
				<div class="row"><br></div>
				
				<div class="row" id="suppliertabs">
				
				
		<!-- Block Tabs -->
		<div class="block full">
			<!-- Block Tabs Title -->
			<div class="block-title">
				
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#block-tabs-home">Item List</a></li>
					
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
                                            <th>Item No.</th>
											<th style="width: 120px;">Unit</th>
                                            <th>Quantity</th>
                                            <th style="width: 420px;">DESCRIPTION</th>
											<th style="width: 120px;">Unit Cost</th>
											<th style="width: 120px;">Amount</th>
                                            <th style="width: 320px;" class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$item_no = 1;
$totalamount=0;

foreach ($poitems as $poitemlist):
$amount = $poitemlist['qty'] * $poitemlist['unitprice'];
$totalamount=$totalamount+$amount;
	echo "<tr>";
	echo "<td>".$item_no."</td>";
	echo "<td>".$poitemlist['unit']."</td>";
	echo "<td>".$poitemlist['qty']."</td>";
	echo "<td>".$poitemlist['description']."</td>";
	
	echo "<td style='width:210px;'><input type='text' style='width:80px;text-align:center;' value='".$poitemlist['unitprice']."' id='unitprice-".$poitemlist['poitemsid']."'> </td>";
	echo "<td>".number_format($amount,2)."</td>";
	echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Save Price' onClick='savepounitprice(".$poitemlist['poitemsid'].")'><i class='gi gi-floppy_saved'></i></button>
					
					
				</td>";
	echo "</tr>";

	$item_no++;
endforeach;

?>
									
				
									</tbody>
					</table>
					 </div>
				
				
					<div class="row" id="totalamount">
					<h4 class="sub-header"></h4>
					<div class="col-md-9">
						<strong class="pull-right"><h2>Total Amount: <?php echo number_format($totalamount,2);?></h2></strong>
					</div>
					<div class="col-md-10">
						<strong class="pull-right"><h4>Amount in words: </h4><textarea id="amountinwords" class="form-control" style="width:500px;"><?php echo $pomaindetails['amountinwords'];?></textarea></strong>
						<div class="row"></div>
						<button  class="btn btn-primary pull-right" title="Save Price" onClick="savewords(<?php echo $poid;?>);"><i class="gi gi-floppy_saved"></i> Save</button>
					</div>
					</div>
				</div>
				
				
		
				
				
				
				
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


