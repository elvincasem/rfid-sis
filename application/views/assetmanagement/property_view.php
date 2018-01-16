
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
                <div id="editproperty" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header-tabs">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                                        <li class="active"><a href="#modal-tabs-home"><i class="fa fa-home"></i> Basic Info</a></li>
														<li><a href="#modal-tabs-users"><i class="fa fa-home"></i> Users</a></li>
														<li><a href="#modal-tabs-remarks"><i class="fa fa-home"></i> Remarks</a></li>
                                                        <li><a href="#modal-tabs-settings" data-toggle="tooltip" title="Settings"><i class="gi gi-settings"></i> Peripheral Details</a></li>
                                                    </ul>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="modal-tabs-home">
														<!-- basic info content -->
					<input type="hidden" id="equipno">
						<label class="col-md-2 control-label" for="state-normal">Property No</label>
                        <div class="col-md-3">
                            <input type="text" id="propertyno" class="form-control">
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Particulars</label>
                        <div class="col-md-5">
							<textarea class="form-control" id="particulars"></textarea>
                           
                        </div>
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Date Acquired</label>
                        <div class="col-md-3">
                            <input type="text" id="dateacquired" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Unit Price</label>
                        <div class="col-md-3">
                            <input type="text" id="unitprice" class="form-control" >
                        </div>
						
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Account Code</label>
                        <div class="col-md-3">
                            <input type="text" id="accountcode" class="form-control" >
                        </div>	
						<label class="col-md-2 control-label" for="state-normal">Service</label>
                        <div class="col-md-3">
                           <select id="service" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option></option>
							<option value="SERVICEABLE">SERVICEABLE</option>
							<option value="UNSERVICEABLE">UNSERVICEABLE</option>
							<option value="DISPOSED">DISPOSED</option>
							
						   </select>
                        </div>						
						
							
<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Tag No</label>
                        <div class="col-md-3">
                            <input type="text" id="inventorytag" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Supplier</label>
                        <div class="col-md-3">
                           <select id="supplierid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   <option></option>
							<?php
							foreach ($supplierlist as $supplier_list):
								
							
								echo "<option value='".$supplier_list['supplierID']."' $selectedsupplier>".$supplier_list['supName']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>
<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Barcode</label>
                        <div class="col-md-3">
                            <input type="text" id="barcode" class="form-control" >
                        </div>						
<div class="row">&nbsp;</div>				
<div class="row">&nbsp;</div>				
<label class="col-md-9 control-label" for="state-normal"></label>		
							 
<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savebasic();">Save</button>
<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onclick="location.reload();">Close</button>
							
														
														</div>
														
														
														
<div class="tab-pane" id="modal-tabs-users">
<label class="col-md-2 control-label" for="state-normal">Issued To</label>
                        <div class="col-md-3">
                            <select id="issuedto" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." >
							 
				<option></option>
				<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
				</select>
                        </div>
						<label class="col-md-2 control-label" for="state-normal">End User</label>
                        <div class="col-md-3">
							<input type="text" id="enduser" class="form-control">
                            
                        </div>
<div class="row"></div>
						
						
						
			<div class="row">&nbsp;</div>	
			<div class="row">&nbsp;</div>	
<!--
<table id="example-datatable" class="hidden table table-striped table-bordered table-vcenter">
			<thead>
				<tr>
					
					<th>Log</th>
				</tr>
			</thead>
		<tbody></tbody>
</table>			-->
			<div class="row">&nbsp;</div>				
			<label class="col-md-9 control-label" for="state-normal"></label>		
										 
			<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updateusertab();">Save</button>
			<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onClick="location.reload();">Close</button>

</div>
<div class="tab-pane" id="modal-tabs-remarks">
<label class="col-md-2 control-label" for="state-normal">Whereabout</label>
                        <div class="col-md-3">
                            <input type="text" id="whereabout" class="form-control" >
                        </div>	
		<div class="row">&nbsp;</div>					
<label class="col-md-2 control-label" for="state-normal">Remarks</label>
                        <div class="col-md-6">
                           <textarea class="form-control" id="remarks"></textarea>
                        </div>	
						
			<div class="row">&nbsp;</div>	
<!-- <table id="example-datatable2" class="table table-striped table-bordered table-vcenter">
			<thead>
				<tr>
					
					<th>Log</th>
				</tr>
			</thead>
		<tbody></tbody>
</table>	-->
			
			<div class="row">&nbsp;</div>				
			<label class="col-md-9 control-label" for="state-normal"></label>		
										 
			<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updateremarks();">Save</button>
			<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onClick="location.reload();">Close</button>

</div>
<div class="tab-pane" id="modal-tabs-settings">
<!-- peripheral details -->

	<label class="col-md-2 control-label" for="state-normal">Processor</label>
                        <div class="col-md-3">
                            <input type="text" id="processor" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">RAM</label>
                        <div class="col-md-3">
                            <input type="text" id="ram" class="form-control" >
                        </div>
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Hard Disk</label>
                        <div class="col-md-3">
                            <input type="text" id="harddisk" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Operating System</label>
                        <div class="col-md-3">
                            <input type="text" id="operatingsystem" class="form-control" >
                        </div>
						
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Equipment S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="equipmentsn" class="form-control" >
                        </div>	
						<label class="col-md-2 control-label" for="state-normal">Processor S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="processorsn" class="form-control" >
                        </div>	
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Monitor S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="monitorsn" class="form-control" >
                        </div>	
						<label class="col-md-2 control-label" for="state-normal">Keyboard S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="keyboardsn" class="form-control" >
                        </div>	
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Mouse S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="mousesn" class="form-control" >
                        </div>	

						
						
						
						
						
			<div class="row">&nbsp;</div>				
			<div class="row">&nbsp;</div>				
			<label class="col-md-9 control-label" for="state-normal"></label>		
										 
			<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatepheriperal()">Save</button>
			<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onClick="location.reload();">Close</button>

</div> <!-- end peripheral -->




                                                    </div>
                                                </div>
												
												<div class="row"></div>
                                                <div class="modal-footer">
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                </div>

<!--end modal-->		
		
            
	<div class="block full">
        <div class="block-title">
		<h5>Asset List</h5>
		<button type="button" id="saveitembutton" class="pull-right btn btn-effect-ripple btn-primary" onclick="downloadproperty();">Download </button>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary hidden" href="#adddeliverymodal" data-toggle="modal" onclick="addasset();">Add Asset</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        <th>Property No.</th>
						<th>Article</th>
                        <th>Particulars</th>
                        <th>Date Acquired</th>
                        <!-- <th>Assigned to</th> -->
                        <th>Classification</th>
                        <th>Barcode</th>
                        <th>Delivery No</th>
                        <th>Whereabout</th>
                        <th>Issued To</th>
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($equipments as $equipment_list):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX' >";
				
				//echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				echo "<td><a href='#".$equipment_list['equipNo']."'>".$equipment_list['propertyNo']."</a></td>";
				
				echo "<td>".$equipment_list['article']."</td>";
				echo "<td><a href='#editproperty' data-toggle='modal' onclick='editequipment(".$equipment_list['equipNo'].");'>".$equipment_list['particulars']."</td>";
				echo "<td>".mdate('%F %d, %Y',strtotime($equipment_list['dateacquired']))."</td>";
				echo "<td>".$equipment_list['classification']."</td>";
				echo "<td>".$equipment_list['barcode']."</td>";
				echo "<td>".$equipment_list['drno']."</td>";
				echo "<td>".$equipment_list['whereabout']."</td>";
				echo "<td>".$equipment_list['fname']." ".$equipment_list['lname']."</td>";
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification hidden' title='Delete User' id='notification' onClick='deletedelivery(".$equipment_list['equipNo'].")'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


