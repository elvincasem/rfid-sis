
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
								<h3 class="modal-title"><strong>Add PAR</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">PAR Date</label>
                        <div class="col-md-7">
                            <input type="text" id="pardate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>
						<label class="col-md-3 control-label  text-right" for="state-normal">PAR No.</label>
                        <div class="col-md-7">
                           <input type="text" id="parno" name="state-normal" class="form-control" tabindex="0" value="">
						</div>
						
						<label class="col-md-3 control-label text-right">Employee/Office</label>
                        <div class="col-md-7">
						
                           <select id="eid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
						<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
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
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="savepar();">Add PAR</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>PAR List</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal">Add PAR</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                       <th>Date</th>
					   <th>PAR No.</th>
                        <th>Employee/Office</th>
                        
                        <!-- <th>Date Acquired</th>
                        <th>Assigned to</th> -->
                       
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($parlist as $par_list):
				
					
				echo "<tr class='odd gradeX' >";
				
				//echo "<td>".$rrlist['deliveryid']."</a></td>";
				echo "<td><a href='par/details/".$par_list['parid']."'>".mdate('%F %d, %Y',strtotime($par_list['pardate']))."</a></td>";
				echo "<td><a href='par/details/".$par_list['parid']."'>".$par_list['parno']."</a></td>";
				
				//echo "<td>".$asset_list['asset_classificatin']."</td>";
				
				//echo "<td>".mdate('%F %d, %Y',strtotime($asset_list['dateacquired']))."</td>";
				echo "<td>".$par_list['fname']." ".$par_list['lname']."</td>";
				
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deletepar(".$par_list['parid'].")' ><i class='fa fa-times'></i></button>
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


