
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


<div style="float:left;width:0%;position:relative;left:60px;"><img width="100" src="<?=base_url();?>public/img/ched_logo.png"></div>
<div style="text-align:center;font-weight:bold;font-size:18px;"><?php echo $header;?></div>
<br>
<br>
<br>
<div>RRE No: <u><?php echo $rremaindetails['rreno'];?></u><span style="margin-left:100px;"></span><span>RRE Date: <u><?php echo $rremaindetails['rredate'];?></u></span></div><br>
<div style="margin-left:100px;font-weight:bold;">THIS IS TO ACKNOWLEDGE RECEIPT OF THE EQUIPMENT</div>

<table border="1" style="border:solid 1px; width:800px;">
	
<thead>
		
	<tr style="border-right:solid 1px;text-align:center;font-weight:bold;">
		<th>Item No.</th>
		<th style="width: 420px;text-align:center;">DESCRIPTION</th>
		<th style="width: 50px;text-align:center;">QTY</th>
		<th style="width: 220px;text-align:center;">PAR No./ICS No.</th>
		<th style="width: 420px;text-align:center;">End-User/Office</th>
		<th style="width: 420px;text-align:center;">Remarks</th>

	
	
	</tr>
</thead>
	<tbody>
	<!-- items here -->
	<?php
									
				$itemno = 1;
				foreach ($rreitems as $rreitems_list):
				
				echo "<tr class='odd gradeX' style='text-align:center;'>";
				echo "<td>$itemno</td>";
				echo "<td>".$rreitems_list['particulars']."</td>";
				echo "<td>1</td>";
				echo "<td>".$rreitems_list['paricsno']."</td>";
				echo "<td>".$rreitems_list['enduseroffice']."</td>";
				echo "<td>".$rreitems_list['rre_remarks']."</td>";

				echo "</tr>";
				$itemno++;
				endforeach;
				
				?>
	</tbody>
	<!-- ff -->
	<tfoot>
	<tr><td colspan="6" style="text-align:center;font-weight:regular;line-height:30px;">

	This is to cancel property Acknowledgement Recipt(PAR) Inventory Custodian Slip (IC) signed by<br>
	__________________ dated _______________
	</td></tr>
	
	<tr>
	<td colspan="7">
	
	<span style="width:10%;float:left;"></span>
	<span style="width:40%;float:left;margin-left:100px">ABOVE STATED EQUIPMENT RECEIVED BY:</span>
	<div style="width:30%;float:left;">RRE RECEIVED BY:</div>
	
	</td>
	
	
	</tr>
	<tr>
	<td colspan="7">
	
	
	<span style="width:10%;float:left;text-align:center;">&nbsp;</span>
	<div style="width:30%;float:left;">_________________________________<br><?php echo $column1;?><br>Date:  _____________________</div>
	<div style="width:50%;float:left;text-align:center;">_________________________________<br>(END-USER)<br>Date: _____________________</div>
	
	</td>
	
	
	</tr>
	
	<tfoot>
	
	
	
</table>




                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
								
								
                                <button type="button" id="printpo" class="btn btn-effect-ripple btn-primary" onclick="printptrfulldetails();" ><i class="fa fa-print"></i> Print</button>
                               
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->			
				
				
				
				
				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>RRE Details</h5>
					 <div class="btn-group pull-right">
							<button class="btn btn-success" href="#" onclick="javascript:location.reload();">
										Refresh
									</button>
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								
									
							
								
								<li class="hidden">
									<a href="#printpar" data-toggle="modal">
										<i class="fa fa-cubes pull-right"></i>
										Print PTR
									</a>
								</li>
								<li>
									<a href="#printptrfulldetails" data-toggle="modal">
										<i class="fa fa-cubes pull-right"></i>
										Print RRE
									</a>
								</li>
								
								
								
							</ul>
						</div>
						
					 
				</div>
				<form action="#" method="post" class="form-horizontal" onsubmit="return false;">
				<div class="form-group">
					<input type="hidden" id="rreid" name="state-normal" class="form-control" value="<?php echo $rreid;?>" >
					
						<label class="col-md-2 control-label" for="state-normal">RRE No:</label>
                        <div class="col-md-3">
                            <input type="text" id="rreno" class="form-control" value="<?php echo $rremaindetails['rreno'];?>">
                        </div>
						
						
						
						<label class="col-md-1 control-label" for="state-normal">RRE Date</label>
                        <div class="col-md-2">
                            <input type="text" id="rredate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $rremaindetails['rredate'];?>">
                        </div>
						
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">End User:</label>
                        <div class="col-md-3">
                            <input type="text" id="rreenduser" class="form-control" value="<?php echo $rremaindetails['rre_enduser'];?>">
                        </div>
						
						
						<div class="row"></div>
						 <div class="col-md-2 pull-right">
								<button id="savedrbutton" class='btn btn-primary' title='Save RRE Details' onclick="updaterredetails();"><i class="fa fa-floppy-o"></i> Update</button>
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
						<div class="row">&nbsp;</div>
						<label class="col-sm-1 text-right control-label" for="state-normal">PAR/ICS</label>
                        <div class="col-sm-2">
                            <input type="text" id="parics" name="state-normal" class="form-control" tabindex="0" tabindex="2">
                        </div>
						<label class="col-md-1 text-right control-label" for="state-normal">End User:</label>
                        <div class="col-md-3">
                            <input type="text" id="rreenduser_item" class="form-control" value="<?php echo $rremaindetails['rre_enduser'];?>">
                        </div>
						<label class="col-md-1 text-right control-label" for="state-normal">Remarks</label>
                        <div class="col-md-3">
							<textarea id="rre_remarks" class="form-control"></textarea>
                            
                        </div>
						<input type="hidden" id="assetid">
						
							
						
						<div class="row"></div>
						<div class="col-sm-12">
						<button id="additemreceived" class="btn btn-primary pull-right" onclick="addpropertytolistrre();"><i class="fa fa-plus"></i> Add to List</button>
						
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
                                            
                                            <th>Item No.</th>
											<!-- <th style="width: 120px;">Unit</th>-->
											
											<th style="width: 420px;">DESCRIPTION</th>
											<th style="width: 50px;">QTY</th>
                                            <th style="width: 120px;">PAR No./ICS No.</th>
                                            <th style="width: 420px;">End-User/Office</th>
                                            <th style="width: 420px;">Remarks</th>
                                            <th style="width: 320px;" class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									
				$itemno = 1;
				foreach ($rreitems as $rreitems_list):
				
				echo "<tr class='odd gradeX'>";
				echo "<td>$itemno</td>";
				echo "<td>".$rreitems_list['particulars']."</td>";
				echo "<td>1</td>";
				echo "<td>".$rreitems_list['paricsno']."</td>";
				echo "<td>".$rreitems_list['enduseroffice']."</td>";
				echo "<td>".$rreitems_list['rre_remarks']."</td>";
				
				echo "<td class='center'> 
					
					
					
					<button class='btn btn-danger notification ' title='Delete' id='notification' onClick='deleterreitem(".$rreitems_list['rreitemsid'].");'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				$itemno++;
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

