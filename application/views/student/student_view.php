            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                
				
				<!--rightsidebar here-->
				<?php //$this->load->view('rightsidebar_view'); ?>
				
                <!--main sidebar here -->
				
				<?php 
				if($_SESSION['usertype']=='admin'){
					$this->load->view('leftsidebar_view'); 
				}else{
					$this->load->view('leftsidebar_staff_view'); 
				}
				
				
				?>

                <!-- Main Container -->
                <div id="main-container">
                   <?php $this->load->view('subheader_view'); ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- First Row -->
                        <div class="row">
                            <!-- Simple Stats Widgets -->
                           
                            <div class="col-sm-4">
                                <a href="#" onclick="addnewstudent();" class="widget" data-toggle="modal" data-target="#exampleModal3">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="gi gi-user text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                           
                                        </h2>
                                        <span class="text-muted">Add New Student Information</span>
                                    </div>
                                </a>
                              
                            
                            </div>
                            <!-- Modal -->
                            <div class="modal" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Add Student </h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="modal-title">Student Details</h4>
                                    <input type="hidden" id="dbstudid">
                                    <input type="text" name="rfid" id="rfid" class="form-control" placeholder="RFID"><br>
                                    <input type="text" name="sid" id="sid" class="form-control" placeholder="Student ID"><br>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Lastname"><br>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Firstname"><br>
                                    <input type="text" name="mname" id="mname" class="form-control" placeholder="Middlename"><br> 
                                    <select id="gender" name="gender" class="form-control" style="color:#999999;" Placeholder="GENDER">
										<option value="" selected>Gender</option>
										<option value="MALE">MALE</option>
										<option value="FEMALE">FEMALE</option>
										
									</select><br>
									<!-- <input type="date" name="bday" id="bday" class="form-control" placeholder="Birthday"> -->
									 <input type="text" id="bday" name="bday" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
									<br>
                                    <input type="text" name="sadd" id="sadd" class="form-control" placeholder="Student Address"><br>
                                    <input type="text" name="guardian" id="guardian" class="form-control" placeholder="Guardian"><br>
                                    <input type="text" name="guardianadd" id="guardianadd" class="form-control" placeholder="Guardian Address"><br>
                                    <input type="text" name="gcp" id="gcp" class="form-control" placeholder="Guardian CP"><br>
									
                                    <select id="status" class="form-control" style="color:#999999;">
										
										<option value="ACTIVE">Status</option>
										<option value="ACTIVE">ACTIVE</option>
										<option value="INACTIVE">INACTIVE</option>
										<option value="GRADUATED">GRADUATED</option>
										<option value="TRANSFERRED">TRANSFERRED</option>
										
								   </select><br>
								   
								   
								  
								   <input type="text" name="grade" id="grade" class="form-control" placeholder="Grade"><br>
								   
								    <select class="form-control" id="sectionad" style="color:#999999;">
									
									<option>Section</option>
				
									<?php
				 
									foreach ($filtersection as $filtersec):
               
                
										echo "<option value='" .$filtersec['section']. "'>".$filtersec['section']."</option>";
				  
				
									endforeach;
                
										?>
									</select><br>
									
									<select id="escc" class="form-control" style="color:#999999;">
									
										<option>Scholarship</option>
										<option value="ESC">ESC</option>
										<option value="NO">NO</option>
									
									</select>
								  
                                       <br>



                                  </div>
                                  <div class="modal-footer">
                                    
                                    <button type="button" onclick="addstudents();" id="addstudentbutton" class="btn btn-primary">Add Student</button>
                                    <!--<button type="button" onclick="updatestudent();" id="updatestudentbutton" class="btn btn-primary" disabled>Update</button>-->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--modal-->


                             <!-- Modal -->
                            <div class="modal" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Upload Photo</h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <form action="<?php echo site_url('student/upload')?>" id="form_uploadadvertisementusera" method="post" class="form-horizontal" onsubmit="return false;" >
                                       <input type="hidden" id="dbstudids">
                                      

                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="example-file-input">Student Photo</label>
                                           <div class="col-md-9">
                                               <input type="file" id="advertisementphotousera" name="advertisementphotousera">
                                           </div>
                                       </div>
                                        
                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="example-file-input"></label>
                                           <div class="col-md-8">
                                            <div class="progress progress-striped active" id="adprogress" style="display: none;">
                                            <div class="progress-bar progress-bar-info" id="progress-bar-adusera" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 5%">5%</div>
                                            </div>
                                            <ul class="toggle-menu">
                                            </ul>
                                            </div>
                                       </div>
                                        
                                   </form>
                                   
                                 
                            
                                  </div>
                                  <div class="modal-footer">
                                      <center><button type="button" class="btn btn-effect-ripple btn-primary" onclick="uploadadvertisementusera();" id="uploadadvertisementbtnusera">Upload Photo</button>
                                      <button type="button" class="btn btn-effect-ripple btn-primary" onclick="saveadvertisementusera();" id="savedadvertisementbtnusera" disabled>Save Photo</button></center>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--modal-->


                        
                           
							
							<div class="row">
							
							</div>
							 
                        </div>
<div class="form-group col-md-6">
							<label class="col-md-1 control-label" for="state-normal">Type</label>
							<form method='post'>
								<div class="col-md-3">
								<select id="sfilter" name="sfilter" class="form-control" style="height:30px;width:150px;">
                                                <?php echo "<option value='$selectedstatus'>$selectedstatus</option>";?>
						<option value='ACTIVE'>ACTIVE</option>
						<option value='INACTIVE'>INACTIVE</option>
						<option value='ALL'>ALL</option>
		</select>



								
							</div>
								<div class="col-md-2">
<button type="submit" class="btn btn-primary">View</button>
</form>	 
</div>
							
				</div>

<div class="row"></div>
                
				
    <div class="block full">


        <div class="block-title">
        <h5>Student List</h5>
            
           
        </div>
        <div class="table-responsive">
		
		
		
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
			
			
			
                <thead>
				
				
				
                    <tr>
                        <th>RFID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Gender</th>
						<th>Status</th>
                        <th>Guardian CP</th>
                        <th></th>
                    </tr>
                    
                </thead>
                <tbody>
                <?php
				
				
				
                
                foreach ($studentlist as $students):
               
                echo "<tr class='odd gradeX'>";
                echo "<td>".$students['rfID']."</td>";
                echo "<td>".$students['studID']."</td>";
                echo "<td><a href='student/details/".$students['dbstudid']."'>".$students['fname']." ".$students['mname']." ".$students['lname']."</a></td>";
                echo "<td>".$students['gender']."</td>";
				echo "<td>".$students['status']."</td>";
                 echo "<td>".$students['guardianCP']."</td>";
                echo "<td class='center'>";
               
               
                
                echo "<a href='student/details/".$students['dbstudid']."'><button class='btn btn-primary' title='Edit Student'><i class='fa fa-edit'></i></button></a>
                     <button class='btn btn-danger notification' title='Delete Student' id='notification' onClick='deletestudent(".$students['dbstudid'].")'><i class='fa fa-times'></i></button>
                     <button  data-toggle='modal' onClick='displaystudent(".$students['dbstudid'].")' data-target='#register' class='btn btn-success notification' title='Register Student' id='notification'><i class='fa fa-user'></i></button>
                      <button  data-toggle='modal' onClick='displaystudent(".$students['dbstudid'].")' data-target='#upload' class='btn btn-primary notification' title='Upload Photo' id='notification'><i class='fa fa-upload'></i></button>
                    </td>";

                


                echo "</tr>";
                echo "</tr>";
                endforeach;
                
                ?>
                
                
                
                
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
                            <div class="modal" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Register Student </h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="modal-title"> Student Data</h4>
                                    <input type="hidden" id="dbstudids">
                                    <input type="text" name="rfids" id="rfids" class="form-control" placeholder="RFID"><br>
                                    <input type="text" name="sids" id="sids" class="form-control" placeholder="Student ID"><br>
                                    <input type="text" name="fullnames" id="fullnames" class="form-control" placeholder="Full Name"><br>
                                    <input type="text" name="addresss" id="addresss" class="form-control" placeholder="Address"><br><br>

                                    <h4 class="modal-title"> Registration Details</h4>
                                     <input type="text" id="regdate" name="regdate" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd"><br>
                                    <select class="custom-select form-control" id="yrlvl">
                                      <option selected>Choose Year Level</option>
                                      <option value="PREP">PREP</option>
                                      <option value="KINDER">KINDER</option>
                                      <option value="GRADE I">GRADE I</option>
                                      <option value="GRADE II">GRADE II</option>
                                      <option value="GRADE III">GRADE III</option>
                                      <option value="GRADE IV">GRADE IV</option>
                                      <option value="GRADE V">GRADE V</option>
                                      <option value="GRADE VI">GRADE VI</option>
                                      <option value="GRADE VII">GRADE VII</option>
                                      <option value="GRADE VII">GRADE VII</option>
                                      <option value="GRADE IX">GRADE IX</option>
                                      <option value="GRADE X">GRADE X</option>
                                      <option value="GRADE XI">GRADE XI</option>
                                      <option value="GRADE XI">GRADE XI</option>
                                    </select><br>
                                    <input type="text" name="section" id="section" class="form-control" placeholder="Section"><br>
                                    <input type="text" name="sy" id="sy" class="form-control" placeholder="School Year"><br><br>



                                  </div>
                                  <div class="modal-footer">
                                    
                                    <button type="button" onClick="registerstudent()" id="registerstudentbutton" class="btn btn-primary">Register Student</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--modal-->

                        
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
