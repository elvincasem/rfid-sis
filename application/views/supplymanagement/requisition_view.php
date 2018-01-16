
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
								<h3 class="modal-title"><strong>Add Requisition</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
				<div class="form-group">
						<label class="col-md-3 control-label text-right">Date </label>
                        <div class="col-md-7">
                            <input type="text" id="rdate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>	
						<label class="col-md-3 control-label text-right">Requisition No:</label>
                        <div class="col-md-7">
                            <input type="text" id="rno" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label text-right">Requesting Official/Employee</label>
                        <div class="col-md-7">
						
                           <select id="requester_id" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
						<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
							</select>
                        </div>	
						<div class="row"></div>
						<label class="col-md-3 control-label text-right">Purpose:</label>
                        <div class="col-md-7">
							<textarea class="form-control" id="purpose"></textarea>
                        </div>
						<label class="col-md-3 control-label text-right">Warehouse</label>
												<div class="col-md-7">
												
												   <select id="warehouseid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
												   
				<?php
							foreach($warehouselist as $whouse):
							
								echo "<option value='".$whouse['warehouseid']."'>".$whouse['warehouse_name']."</option>";
							endforeach;
						
					?>
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
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="savereqeuisition();">Add Requisition</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>Supplier List</h5>
			<button type="button" id="addreq" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal" >Add Requisition</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable_req" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        
						<th>RIS No.</th>
                        <th>Date</th>
						<th>Requested By</th>
                        
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				$lastreq = "";
				foreach ($requisitionlist as $requisition_list):
				
				if($requisition_list['updatedcount']>=1){
					$dis = "disabled";
				}else{
					$dis ="";
				}
				
				echo "<tr class='odd gradeX' >";

				
				echo "<td><a href='requisition/details/".$requisition_list['reqid']."'>".$requisition_list['requisition_no']."</a></td>";
				echo "<td>".mdate('%F %d, %Y',strtotime($requisition_list['requisition_date']))."</td>";
				echo "<td>".$requisition_list['fname']." ".$requisition_list['lname']."</a></td>";
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleterequisition(".$requisition_list['reqid'].")' $dis><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				$lastreq =$requisition_list['requisition_no'];
				
				endforeach;
				
				?>

				
                    
                </tbody>
            </table>
			<input type="hidden" id="lastreq" value="<?php echo $lastreq;?>">
			
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


