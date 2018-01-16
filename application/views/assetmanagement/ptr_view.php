
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
								<h3 class="modal-title"><strong>Add PTR</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">PTR Date</label>
                        <div class="col-md-7">
                            <input type="text" id="ptrdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>
						<label class="col-md-3 control-label  text-right" for="state-normal">PTR No.</label>
                        <div class="col-md-7">
                           <input type="text" id="ptrno" name="state-normal" class="form-control" tabindex="0" value="">
						</div>
						
						<label class="col-md-3 control-label  text-right" for="state-normal">From:</label>
                        <div class="col-md-7">
                           <input type="text" id="ptrfrom" name="state-normal" class="form-control" tabindex="0" value="">
						</div>
						
						<label class="col-md-3 control-label  text-right" for="state-normal">To:</label>
                        <div class="col-md-7">
                           <input type="text" id="ptrto" name="state-normal" class="form-control" tabindex="0" value="">
						</div>
						
						<label class="col-md-3 control-label text-right">Transfer Type</label>
                        <div class="col-md-7">
						
                           <select id="ptrtransfertype" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
							<option value="DONATION">DONATION</option>
							<option value="REASSIGNMENT">REASSIGNMENT</option>
							<option value="RELOCATE">RELOCATE</option>
							<option value="OTHERS">OTHERS</option>
							</select>
                        </div>	
						<label class="col-md-3 control-label  text-right" for="state-normal"></label>
						<div class="col-md-7">
                           <input type="text" id="ptrothers" name="state-normal" class="form-control" tabindex="0" value="" placeholder="Other transfer type">
						</div>
						
						<label class="col-md-3 control-label  text-right" for="state-normal">Reason for Transfer:</label>
                        <div class="col-md-7">
                           <textarea id="reasonfortransfer" class="form-control"></textarea>
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
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="saveptr();">Add ICS</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>PTR List</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal">Add PTR</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                       <th>Date</th>
					   <th>PTR No.</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Transfer Type</th>
                        
                        <!-- <th>Date Acquired</th>
                        <th>Assigned to</th> -->
                       
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($ptrlist as $ptr_list):
				
					
				echo "<tr class='odd gradeX' >";
				
				//echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				echo "<td><a href='ptr/details/".$ptr_list['ptrid']."'>".mdate('%F %d, %Y',strtotime($ptr_list['ptrdate']))."</a></td>";
				echo "<td><a href='ptr/details/".$ptr_list['ptrid']."'>".$ptr_list['ptrno']."</a></td>";
				
				//echo "<td>".$asset_list['asset_classificatin']."</td>";
				
				//echo "<td>".mdate('%F %d, %Y',strtotime($asset_list['dateacquired']))."</td>";
				echo "<td>".$ptr_list['fromoffice']."</td>";
				echo "<td>".$ptr_list['tooffice']."</td>";
				echo "<td>".$ptr_list['transfertype']."</td>";
				
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteptr(".$ptr_list['ptrid'].")' ><i class='fa fa-times'></i></button>
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


