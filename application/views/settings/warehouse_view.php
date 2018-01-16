
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
								<h3 class="modal-title"><strong>Add Warehouse</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">Warehouse Name</label>
                        <div class="col-md-7">
                            <input type="text" id="warehousename" name="state-normal" class="form-control" tabindex="0" value="">
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
							<button type="button" id="savesupplierbutton" class="btn btn-effect-ripple btn-primary" onclick="savewarehouse();">Add Warehouse</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>Warehouse List</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal">Add Warehouse</button>
			<?php //print_r($heidirectory);?>
        </div>
          <!-- Messages -->
                                <div class="block-content-full">
                                    <table class="table table-borderless table-striped table-vcenter remove-margin">
                                        <tbody>
                                            <!-- Use the first row as a prototype for your column widths -->
                                            <tr>
                                                <td class="td-label td-label-muted text-center" style="width: 5%;">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center" style="width: 7%;">
                                                    <img src="img/placeholders/avatars/avatar8.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4>
                                                        <a href="javascript:void(0)" class="text-dark"><strong>Product updates</strong></a>
                                                    </h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs text-center" style="width: 30px;">
                                                    <i class="fa fa-paperclip fa-2x text-muted"></i>
                                                </td>
                                                <td class="hidden-xs text-right text-muted" style="width: 120px;"><em>just now</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-danger text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>New friend request</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs">
                                                    <i class="fa fa-paperclip fa-2x text-muted"></i>
                                                </td>
                                                <td class="hidden-xs text-right text-muted"><em>15 min ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-success text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4>
                                                        <a href="javascript:void(0)" class="text-dark"><strong>New project details</strong></a>
                                                    </h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>40 min ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-success text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>Hi admin</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>1 hour ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-warning text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>Balance changed</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>2 hours ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-info text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>Just wanted to say hi</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>5 hours ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-info text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>Building a new website</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>10 hours ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-danger text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4>
                                                        <a href="javascript:void(0)" class="text-dark"><strong>Your subscription was updated</strong></a>
                                                    </h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs">
                                                    <i class="fa fa-paperclip fa-2x text-muted"></i>
                                                </td>
                                                <td class="hidden-xs text-right text-muted"><em>2 days ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-danger text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>A great opportunity</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>1 week ago</em></td>
                                            </tr>
                                            <tr>
                                                <td class="td-label td-label-success text-center">
                                                    <label class="csscheckbox csscheckbox-primary"><input type="checkbox"><span></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <img src="img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle">
                                                </td>
                                                <td>
                                                    <h4><a href="javascript:void(0)" class="text-dark"><strong>Account Activation</strong></a></h4>
                                                    <span class="text-muted">This is the preview text of this message..</span>
                                                </td>
                                                <td class="hidden-xs"></td>
                                                <td class="hidden-xs text-right text-muted"><em>2 weeks ago</em></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END Messages -->
                            </div>
                            <!-- END Message List -->
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        <th>Suppliername</th>
						
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($warehouselist as $wh_list):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX' >";
				
				//echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				//echo "<td><a href='receiving/details/".$sup_list['supplierID']."'>".$sup_list['supName']."</a></td>";
				
				echo "<td>".$wh_list['warehouse_name']."</td>";
				//echo "<td>".$sup_list['contactNo']."</td>";
				//echo "<td>".$sup_list['email']."</td>";
				//echo "<td>".$sup_list['TIN']."</td>";
				//echo "<td>".mdate('%F %d, %Y',strtotime($rrlist['receivedate']))."</td>";
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete Warehouse' id='notification' onClick='deletewarehouse(".$wh_list['warehouseid'].")'><i class='fa fa-times'></i></button>
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


