
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
                           
                          

                        
                              
							
							
                               <!--  <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-success">
                                            <i class="gi gi-user text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-success">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $totalitems['totalitems'];
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Office Supply</span>
                                    </div>
                                </a>
                            </div>
							
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-warning">
                                            <i class="gi gi-list text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-warning">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $lowstock['totallow'];
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Low on Supply</span>
                                    </div>
                                </a>
                            </div>
							
                       <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-danger">
                                            <i class="gi gi-file text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-danger">
                                            <strong><span data-toggle="counter" data-to="<?php 
										echo $totalreq['totalrequisition'];
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Total Requisition</span>
                                    </div>
                                </a>
                            </div>-->
							
							<!--<div class="col-sm-6">
                                        <a href="javascript:void(0)" class="widget">
                                            <div class="widget-content themed-background-info text-light-op">
                                                <i class="fa fa-fw fa-chevron-right"></i> <strong>Satisfied with the Service Received</strong>
                                            </div>
                                            <div class="widget-content themed-background-muted text-center">
                                                <i class="fa fa-thumbs-o-up fa-3x text-info"></i>
												<h3>Strongly Agree</h3>
                                            </div>
                                            <div class="widget-content text-center">
                                                <strong><h2><span data-toggle="counter" data-to="<?php 
										//echo $totalstrongly->totalstrong;
										?>"></span> / <?php 
										//echo $totalsatisfied->totalsatisfied;
										?></strong></h2>
                                            </div>
                                        </a>
							</div> -->
							
							<div class="row">
							
							</div>
							 
                        </div>
                        <!-- END First Row 
					<div class="row">
					
						<div class="widget">
		<div class="widget-content border-bottom">
			<span class="pull-right text-muted"></span>
                                        Details
			</div>
			<div class="widget-content border-bottom themed-background-muted">
				<input type="hidden" id="chartvalues" value='<?php echo$dashboardchart;?>'>
				<input type="hidden" value="<?php echo date('Y');?>" id="currentyear">
						
				<div class="block">
					<div style="text-align:center;">
						<div id="chart-container" ></div>
					</div>
				</div>
			</div>
                                    
		</div>
					</div>-->
						
    <div class="block full">
        <div class="block-title">
        <h5>Registration List</h5>
            
            <?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>RFID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Registration Date</th>
                        <th>Year Level</th>
                        <th>Section</th>
                        <th>School Year</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                
                foreach ($registrationlist as $registraions):
               
                echo "<tr class='odd gradeX'>";
                echo "<td>".$registraions['rfID']."</td>";
                echo "<td>".$registraions['studID']."</td>";
                echo "<td>".$registraions['fname']." ".$registraions['mname']." ".$registraions['lname']."</td>";
                echo "<td>".$registraions['regDate']."</td>";
                echo "<td>".$registraions['yrLevel']."</td>";
                echo "<td>".$registraions['section']."</td>";
                echo "<td>".$registraions['sy']."</td>";
                echo "<td class='center'>";
               
               
                
                echo "<button class='btn btn-primary' title='Edit Registration'  onClick='editregistration(".$registraions['dbstudid'].")'  data-toggle='modal' data-target='#displayregistration'><i class='fa fa-edit'></i></button>
                     <button class='btn btn-danger notification' title='Delete Registration' id='notification' onClick='deleteregistration(".$registraions['refNo'].")'><i class='fa fa-times'></i></button>
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
                    <div class="modal" id="displayregistration" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Register Student </h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="modal-title">Registration Data</h4>
                                    <input type="hidden" id="dbstudidr">
                                    <input type="text" name="rfidr" id="rfidr" class="form-control" placeholder="RFID" disabled><br>
                                    <input type="text" name="sidr" id="sidr" class="form-control" placeholder="Student ID" disabled><br>
                                    <input type="text" name="fullnamer" id="fullnamer" class="form-control" placeholder="Full Name" disabled><br>
                                    <input type="text" name="addressr" id="addressr" class="form-control" placeholder="Address" disabled><br><br>

                                    <h4 class="modal-title"> Registration Details</h4>
                                     <input type="text" id="regdater" name="regdater" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd"><br>
                                    <select class="custom-select form-control" id="yrlvlr">
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
                                    <input type="text" name="sectionr" id="sectionr" class="form-control" placeholder="Section"><br>
                                    <input type="text" name="syr" id="syr" class="form-control" placeholder="School Year"><br><br>



                                  </div>
                                  <div class="modal-footer">
                                    
                                    <button type="button" onClick="updateregistration()" id="registerstudentbutton" class="btn btn-primary">Update Registration</button>
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
       
