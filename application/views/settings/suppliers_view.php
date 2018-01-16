
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
                <div id="adddeliverymodal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="addsupplierbutton();">&times;</button>
								<h3 class="modal-title"><strong>Add Supplier</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
								<input type="hidden" id="supplierid">
						<label class="col-md-3 control-label text-right">Supplier Name</label>
                        <div class="col-md-7">
                            <input type="text" id="suppliername" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label text-right">Address</label>
                        <div class="col-md-7">
							<textarea id="address"class="form-control" tabindex="0"></textarea>
                           
                        </div>	
						<label class="col-md-3 control-label text-right">Contact No.</label>
                        <div class="col-md-7">
							<textarea id="contactno"class="form-control" tabindex="0"></textarea>
                            
                        </div>	
						<label class="col-md-3 control-label text-right">Products</label>
                        <div class="col-md-7">
							<textarea id="products" class="form-control" tabindex="0"></textarea>
                           
                        </div>
						<label class="col-md-3 control-label text-right">Email</label>
                        <div class="col-md-7">
                            <input type="text" id="email" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>
						<label class="col-md-3 control-label text-right">TIN</label>
                        <div class="col-md-7">
                            <input type="text" id="tin" name="state-normal" class="form-control col-xs-1" tabindex="0" value="">
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
							<button type="button" id="savesupplierbutton" class="btn btn-effect-ripple btn-primary" onclick="savesupplier();">Add Supplier</button>
							<button type="button" id="updatebutton" class="btn btn-effect-ripple btn-primary" onclick="updatesupplier();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>Supplier List</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal" onclick="addsupplierbutton();">Add Supplier</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        <th>Suppliername</th>
						<th>Address</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>TIN#</th>
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($supplierlist as $sup_list):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX' >";
				
				//echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				echo "<td><a href='#".$sup_list['supplierID']."'>".$sup_list['supName']."</a></td>";
				
				echo "<td>".$sup_list['address']."</td>";
				echo "<td>".$sup_list['contactNo']."</td>";
				echo "<td>".$sup_list['email']."</td>";
				echo "<td>".$sup_list['TIN']."</td>";
				//echo "<td>".mdate('%F %d, %Y',strtotime($rrlist['receivedate']))."</td>";
				
			
				echo "<td class='center'> 
					
					<button data-toggle='modal' data-target='#adddeliverymodal' class='btn btn-primary' title='Edit Supplier'  onClick='editsupplier(".$sup_list['supplierID'].")'><i class='fa fa-edit'></i></button> 					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deletesupplier(".$sup_list['supplierID'].")'><i class='fa fa-times'></i></button>
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


