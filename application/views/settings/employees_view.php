
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
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Add Item</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">Employee Number</label>
                        <div class="col-md-7">
                            <input type="text" id="empno" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<div class="row"></div>
						<label class="col-md-3 control-label text-right">Last Name</label>
                        <div class="col-md-7">
                            <input type="text" id="lname" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label text-right">First Name</label>
                        <div class="col-md-7">
                            <input type="text" id="fname" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label text-right">Middle Name</label>
                        <div class="col-md-7">
                            <input type="text" id="mname" name="state-normal" class="form-control col-xs-1" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label text-right">Extension</label>
                        <div class="col-md-7">
                            <input type="text" id="extension" name="state-normal" class="form-control col-xs-1" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label text-right">Designation</label>
                        <div class="col-md-7">
                            <input type="text" id="designation" name="state-normal" class="form-control col-xs-1" tabindex="0" value="">
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
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="saveemployee();">Save Employee</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>Employee List</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal">Add Item</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        
						<th>Name</th>
                        <th>Designation</th>
						<th>Employee ID</th>
                        
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($employeeslist as $employees_list):
				
				echo "<tr class='odd gradeX' >";

				
				echo "<td><a href='#".$employees_list['eid']."'>".$employees_list['fname']." ".$employees_list['lname']."</a></td>";
				echo "<td>".$employees_list['designation']."</td>";
				echo "<td>".$employees_list['empNo']."</a></td>";
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteemployee(".$employees_list['eid'].")'><i class='fa fa-times'></i></button>
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


