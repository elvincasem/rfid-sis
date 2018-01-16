
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
                <div id="addusermodal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Agency Procurement Request</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="uid" name="state-normal" class="form-control" >
                        <label class="col-md-3 control-label" for="state-normal">APR Date</label>
                        <div class="col-md-7">
                            <input type="text" id="aprdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>
						
						<label class="col-md-3 control-label" for="state-normal">APR No.</label>
                        <div class="col-md-7">
                            <input type="text" id="aprno" name="state-normal" class="form-control" tabindex="0" value="<?php echo date("Y-");?>">
                        </div>


                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="saveapr" class="btn btn-effect-ripple btn-primary" onclick="saveapr();">Save</button>
								<button type="button" id="updateapr" class="btn btn-effect-ripple btn-primary" onclick="updateapr();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
		
            
	<div class="block full">
        <div class="block-title">
			
			<h5>PR List</h5>
			<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-primary" href="#addusermodal" data-toggle="modal" onclick="addapr();">Add APR</button>
			
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						<th>APR No.</th>
                        <th>APR Date</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($apr_list as $apurchaserequest):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				
				echo "<td><a href='apr/details/".$apurchaserequest['aprid']."'>".$apurchaserequest['aprno']."</a></td>";
				echo "<td>".mdate('%F %d, %Y',strtotime($apurchaserequest['aprdate']))."</td>";
				
			
				echo "<td class='center'> 
					
					<button class='hidden btn btn-primary' title='Edit APR'  onClick='edituser(".$apurchaserequest['aprid'].")'  data-toggle='modal' data-target='#addusermodal'><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteapr(".$apurchaserequest['aprid'].")'><i class='fa fa-times'></i></button>
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


