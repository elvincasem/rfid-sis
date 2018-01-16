
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
            <button class='btn btn-primary' title='add announcement'  onClick='displayann()' data-toggle='modal' data-target='#addannouncements'>Add Announcement</button>
            <br>
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">

                <thead>
                    <tr>
                        <th>RefNo</th>
                        <th>Announcement/Message</th>


                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                  <?php
                
                foreach ($announcementlist as $announce):
               
                echo "<tr class='odd gradeX'>";
                echo "<td>".$announce['refNo']."</td>";
                echo "<td>".$announce['message']."</td>";

                echo "<td class='center'>";
               
               
                
                echo "<button class='btn btn-primary' title='Edit Announcement'  onClick='displayannounce(".$announce['refNo'].")'  data-toggle='modal' data-target='#addannouncements'><i class='fa fa-edit'></i></button>
                      <button class='btn btn-danger' title='Delete Announcement'  onClick='deleteannounce(".$announce['refNo'].")'  data-toggle='modal' data-target='#displaysend'><i class='fa fa-trash'></i></button>
                    
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
                    <div class="modal" id="addannouncements" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Add Anouncement</h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   
                                    <input type="hidden" id="refNo">
                                    <input type="text" id="dateito" name="dateito" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" value ="<?php echo date('Y-m-d')?>">

                                    <h4 class="modal-title"> Message</h4>
                                  
                                     
                                            <textarea id="message" name="message" rows="7" class="form-control" placeholder="Write your message.."></textarea>
                                      



                                  </div>
                                  <br>
                                  <div class="modal-footer">
                                    
                                    <button type="button" onClick="sendsms()" id="sendsms" class="btn btn-primary">Send Announcement</button>
                                   <button type="button" onclick="updatestudent();" id="updatestudentbutton" class="btn btn-primary" disabled>Update</button>
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
       
