
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
                                <h3 class="modal-title"><strong>Add User</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="uid" name="state-normal" class="form-control" >
                        <label class="col-md-3 control-label" for="state-normal">Username*</label>
                        <div class="col-md-7">
                            <input type="text" id="username" name="state-normal" class="form-control" tabindex="0" >
                        </div>
						
						<label class="col-md-3 control-label" for="state-normal">Password*</label>
                        <div class="col-md-7">
                            <input type="password" id="password" name="state-normal" class="form-control" tabindex="0" >
                        </div>
						
						<label class="col-md-3 control-label" for="state-normal">Name*</label>
                        <div class="col-md-7">
                            <input type="text" id="user_name" name="state-normal" class="form-control" tabindex="0" >
                        </div>
						
						<label class="col-md-3 control-label" for="state-normal">User Type</label>
                        <div class="col-md-7">
                            <select id="usertype" name="example-select" class="form-control" size="1" tabindex="0" >
                                <option value="staff">Staff</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="saveuser" class="btn btn-effect-ripple btn-primary" onclick="saveuser();">Save</button>
								<button type="button" id="updateuser" class="btn btn-effect-ripple btn-primary" onclick="updateuser();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
			
			 <!-- Regular Modal change password -->
                <div id="changepassword" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Change password</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="uid" name="state-normal" class="form-control" >
                        <label class="col-md-3 control-label" for="state-normal">New Password</label>
                        <div class="col-md-7">
                            <input type="password" id="newpassword" name="state-normal" class="form-control" tabindex="0" >
                        </div>
						
						

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                
								<button type="button" id="updateuser" class="btn btn-effect-ripple btn-primary" onclick="updatepassword();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
				
				<!-- Regular Linked Employee -->
                <div id="linkemployee" class="modal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3 class="modal-title"><strong>Change password</strong></h3>
                            </div>
                            <div class="modal-body">
                                
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->
                <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
					<input type="hidden" id="linkuid" name="state-normal" class="form-control" >
                        <label class="col-md-3 control-label" for="state-normal">New Password</label>
                        <div class="col-md-7">
                           <select id="linkeid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
						<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
							</select>
                        </div>
						
						

                    </div>
                    
                </form>
                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
                                
								<button type="button" id="updateuser" class="btn btn-effect-ripple btn-primary" onclick="updatelinkeid();">Update</button>
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->
            
	<div class="block full">
        <div class="block-title">
		<h5>Users List</h5>
			<button type="button" id="adduser" class="pull-right btn btn-effect-ripple btn-primary" href="#addusermodal" data-toggle="modal" onclick="adduser();">Add User</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>Username</th>
						<th>Name</th>
						<th>Account Type</th>
						<th>Linked Employee</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($users_list as $users):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				echo "<td>".$users['username']."</td>";
				echo "<td>".$users['name']."</td>";
				echo "<td>".$users['usertype']."</td>";
				if($users['linkeid']==0){
					$linkedeid = "All";
				}else{
					$linkedeid = $users['fname']." ".$users['lname'];
				}
				echo "<td>".$linkedeid."</td>";
			
			
				echo "<td class='center'>";
				if($linkedeid!="All"){
					echo " <button class='btn btn-primary' title='Edit User'  onClick='linkeidmodal(".$users['uid'].")'  data-toggle='modal' data-target='#linkemployee'><i class='fa fa-user'></i></button> ";
				}
				
				
				echo "<button class='btn btn-primary' title='Edit User'  onClick='edituser(".$users['uid'].")'  data-toggle='modal' data-target='#addusermodal'><i class='fa fa-edit'></i></button>
					<button class='btn btn-warning' title='Change Password' onClick='changepassword(".$users['uid'].")'  data-toggle='modal' data-target='#changepassword'><i class='gi gi-rotation_lock'></i></button>
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteuser(".$users['uid'].")'><i class='fa fa-times'></i></button>
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


