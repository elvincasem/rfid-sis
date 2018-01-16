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
                           
                          

                   
							
							<div class="row">
							
							</div>
							 
                        </div>

						
    <div class="block full">
        <div class="block-title">
        <h5>Send SMS To Many</h5>
        
            <?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
          <h4>Filtering Option</h4>
        <div class='row'>
            <div class = 'col-sm-3'>
            
			<form method="post">
                <select class="custom-select form-control" name="fgrade">
                                      <option selected>Choose Year Level</option>
                                      <option value="Prep">PREP</option>
                                      <option value="K">KINDER</option>
                                      <option value="G1">GRADE I</option>
                                      <option value="G2">GRADE II</option>
                                      <option value="G3">GRADE III</option>
                                      <option value="G4">GRADE IV</option>
                                      <option value="G5">GRADE V</option>
                                      <option value="G6">GRADE VI</option>
                                      <option value="G7">GRADE VII</option>
                                      <option value="G8">GRADE VIII</option>
                                      <option value="G9">GRADE IX</option>
                                      <option value="G10">GRADE X</option>
                                      <option value="G11">GRADE XII</option>
                                      <option value="G12">GRADE XI</option>
                                    </select>

            </div>
            <div class = 'col-sm-3'>
			    <select class="form-control" name="fsection">
				
				<option>Section</option>
				
				 <?php
				 
				  foreach ($filtersection as $filtersec):
               
                
                  echo "<option value='" .$filtersec['section']. "'>".$filtersec['section']."</option>";
				  
				  
				
				 endforeach;
                
                ?>
               </select>
			   
			
			   
            </div>
            <div class = 'col-sm-3'>
                <button type='submit' class='btn btn-success notification' title='Filter Report'>Filter</button>
            </div>
			
		
		</form>   
			   

		 
        </div>
            <br>
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">

                <thead>
                    <tr>
                        <th>RFID</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Guardian Name</th>
                        <th>Guardian CP No.</th>


                        
                    </tr>
                </thead>
                <tbody>
                
				<?php
                
                foreach ($guardiandetails as $contact):
               
                echo "<tr class='odd gradeX'>";
                echo "<td>".$contact['rfID']."</td>";
                echo "<td>".$contact['studID']."</td>";
                echo "<td>".$contact['fname']." ".$contact['mname']." ".$contact['lname']."</td>";
                echo "<td>".$contact['guardian']."</td>";
                echo "<td>".$contact['guardianCP']."</td>";

  
        
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

									
                                    <h4 class="modal-title">Message</h4>
                                  
                                     
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
       
