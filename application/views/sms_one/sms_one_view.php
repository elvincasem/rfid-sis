
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
        <h5>Send SMS One by One</h5>
        
            <?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
       
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">

                <thead>
                    <tr>
                        <th>RFID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Gender</th>
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
                echo "<td>".$students['fname']." ".$students['mname']." ".$students['lname']."</td>";
                echo "<td>".$students['gender']."</td>";
                 echo "<td>".$students['guardianCP']."</td>";
                echo "<td class='center'>";
               
               
                
                echo "<button class='btn btn-primary' title='Edit Student'  onClick='displaysms(".$students['dbstudid'].")'  data-toggle='modal' data-target='#displaysend'><i class='fa fa-envelope'></i></button>
                    
                    </td>";

                


                echo "</tr>";
                echo "</tr>";
                endforeach;
                
                ?>
               
               
                </tbody>
            </table>


        </div>


        </div>
        <br>
        
    </div>
    <!-- Modal -->
                    <div class="modal" id="displaysend" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Send SMS</h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="modal-title">Student Data</h4>
                                    <input type="hidden" id="dbstudid">
                                    <input type="text" name="rfidr" id="rfidr" class="form-control" placeholder="RFID" disabled><br>
                                    <input type="text" name="sidr" id="sidr" class="form-control" placeholder="Student ID" disabled><br>
                                    <input type="text" name="fullnamer" id="fullnamer" class="form-control" placeholder="Full Name" disabled><br>
                                    <input type="text" name="addressr" id="addressr" class="form-control" placeholder="Address" disabled><br><br>

                                    <h4 class="modal-title">Message</h4>
                                     <input type="text" id="cpno" name="cpno" class="form-control" placeholder="contact"><br>
									
                                     
                                            <textarea id="message" name="message" rows="7" class="form-control" placeholder="Write your message.."></textarea>
									 <input type="hidden" id="sent" name="sent" class="form-control" placeholder="Contact" value="YES">
                                      



                                  </div>
                                  <br>
                                  <div class="modal-footer">
                                    
                                    <button type="button" onClick="sendsms()" id="sendsms()" class="btn btn-primary">Send SMS</button>
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
       
