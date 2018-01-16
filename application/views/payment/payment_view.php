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
          
                        <!-- User Profile Row -->
                        <div class="row">
                            <div class="col-md-5 col-lg-4">
                                <div class="widget">
                                    <div class="widget-image widget-image">
                                        <img src="<?php echo $file_url;?>" alt="image">
                                        <div class="widget-image-content text-center" style="">
                                            <img src="<?php echo $file_url;?>" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-push">
                                         <!--   <h3 class="widget-heading text-light"><strong><?php echo $scholar_profile['firstname'];?> <?php echo $scholar_profile['middlename'];?>. <?php echo $scholar_profile['lastname'];?></strong></h3>
                                            <h5 class="widget-heading text-light-op"><em><?php echo $scholar_profile['course'];?></em></h5> -->
                                        </div>
                                    </div>
                                   <!-- <div class="widget-content widget-content-full border-bottom">
                                        <div class="row text-center">
                                            <div class="col-xs-6 push-inner-top-bottom border-right">
                                                <h3 class="widget-heading"><small>Status:<strong><?php //echo $scholar_profile['grantee_status'];?></strong></small></h3>
                                            </div>
                                            <div class="col-xs-6 push-inner-top-bottom">
                                                <h3 class="widget-heading"><small>Year Applied: <strong><?php //echo $scholar_profile['yearapplied'];?></strong> </small></h3>
                                            </div>
                                        </div>
                                    </div>
                    <div class="widget-content border-bottom">
                    <h4>Scholarship</h4>
                    <p>
                    Scholar Type: <strong><?php //echo $scholar_profile['typedescription'];?></strong>
                    <br>
                    Award Number: <strong><?php //echo $scholar_profile['awardnumber'];?></strong>
                    </p>
                    </div>
                   <div class="widget-content border-bottom">
                                        <h4>School</h4>
                                        <strong><?php //echo $scholar_profile['hei'];?></strong>
                    <br>
                    District: <strong><?php// echo $scholar_profile['congressionaldistrict'];?></strong>
                  </div>
                   <div class="widget-content border-bottom">
                                        <h4>About</h4>
                    <p>
                    Gender: <strong><?php //echo $scholar_profile['gender'];?></strong>
                    <br>
                    Address: <strong><?php //echo $scholar_profile['barangay'];?>
                     <br>
                     <?php// echo $scholar_profile['towncity'];?>
                     <br>
                     <?php //echo $scholar_profile['province'];?>
                     <br>
                     <?php //echo $scholar_profile['zipcode'];?></strong>
                     <br>
                     Date of Birth: <strong><?php //echo $scholar_profile['dateofbirth'];?></strong>
                     <br>
                     Place of Birth: <strong><?php //echo $scholar_profile['placeofbirth'];?></strong>
                     <br>
                     Civil Status: <strong><?php //echo $scholar_profile['civilstatus'];?></strong>
                     <br>
                     <?php //echo $scholar_profile->barangay;?>
                                    </p>   
                  </div>-->
                                    
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8">
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                      <li class="active"><a href="#profile-gallery">Student Info</a></li>
                       <li ><a href="#profile-activity">Payments</a></li>
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
      <!-- Voucher -->
  <div class="tab-pane" id="voucher">
    <div class="timeline block-content-full">
         <div class="block">
                            <!-- Table Styles Title -->
                            <div class="block-title clearfix">
                                <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
                                
                                
                                <h2><span class="hidden-xs">Registration List</span></h2> 

                <a href="#modal-voucher" class="btn btn-effect-ripple btn-primary hidden" data-toggle="modal" onclick="">Add Voucher</a>
                            </div>                                      
                               
                                    <input type="hidden" id="dbstudid" value="<?php echo $studentdetails['dbstudid'];?>">
                                    <input type="hidden" name="rfidr" id="rfidr" class="form-control" placeholder="RFID" disabled value="<?php echo $studentdetails['rfID'];?>">
                                    <input type="hidden" name="sidr" id="sidr" class="form-control" placeholder="Student ID" disabled value="<?php echo $studentdetails['studID'];?>">
                                  

                                    <h4> Registration Details</h4>
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
                                     <button type="button" onClick="addregistration()" id="addregstudentbutton" class="btn btn-primary">Add Registration</button>
</div>


                         
                                            </div>
                                        </div>
                                        <!-- END Voucher -->
                  
                  
                  
                  
                                        <!-- Payments -->
                                        <div class="tab-pane" id="profile-activity">
                                            <div class="timeline block-content-full">
          <div class="block">
                            <!-- Table Styles Title -->
                            <div class="block-title clearfix">
                                <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
                                <h2><span class="hidden-xs">Payment List</span></h2>
                            </div>   

                            <h4>Payment Details</h4>    
                            
                            
                            <input type="text" id="orno" name="orno" class="form-control" placeholder="OR NO."><br>   
                            <input type="text" id="paydate" name="paydate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="Payment Date"><br>      
                            <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount"><br><textarea type="text" id="appliedto" name="appliedto" class="form-control" placeholder="Applied To:"></textarea><br> 

                            <button type="submit" onClick="addpayment()" class="btn btn-primary">Add Payment</button>                    

                             
          </div>

        

                         
                                            </div>
                                            
                                       
                           </div>
                                        <!-- END Activity -->


                                        <!-- Gallery -->
          <div class="tab-pane active" id="profile-gallery">

          
    

            <div class="row">   

                <div class="form-group">
                  <label class="col-md-3 control-label" for="state-normal">RFID</label>
                  <div class="col-md-8">
				   <input type="hidden" id="dbstudidd" value="<?php echo $studentdetails['dbstudid'];?>">
                    <input type="text" id="rfid"  class="form-control" value="<?php echo $studentdetails['rfID'];?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label" for="state-normal">STUDENT ID</label>
                  <div class="col-md-8">
                    <input type="text" id="sid"  class="form-control" value="<?php echo $studentdetails['studID'];?>">
                  </div>
                </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="state-normal">Contact Name *</label>
                  <div class="col-md-6">
                  <input type="text" id="lname" class="form-control" placeholder="Lastname" value="<?php echo $studentdetails['lname'];?>">
                  <input type="text" id="fname" class="form-control" placeholder="Firstname" value="<?php echo $studentdetails['fname'];?>">
                  <input type="text" id="mname" class="form-control" placeholder="Middlename" value="<?php echo $studentdetails['mname'];?>">
              </div>
            </div>
            <div class="row"></div> 
            
                 
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Date of Birth</label>
              <div class="col-md-8">
                <input type="text" id="bday"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo $studentdetails['bdate'];?>">
                
              </div>
            </div>
            
         
            
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Gender</label>
              
              <?php
                if($studentdetails['gender']=="FEMALE"){
                  $selectedf = "checked='checked'";
                  $selectedm = "";
                }else{
                  $selectedm = "checked='checked'";
                  $selectedf = "";
                }
              
              ?>
              <div class="col-md-8">
                <label class="radio-inline" for="example-inline-radio1">
                <input type="radio" id="gender" name="gender" value="MALE" <?php echo $selectedm;?>> Male
              </label>
              <label class="radio-inline" for="example-inline-radio2">
                <input type="radio" id="gender" name="gender" value="FEMALE" <?php echo $selectedf;?>> Female
              </label>
              
                
              </div>
            </div>
            <div class="row"></div>
            
            <div class="row"></div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Student Address</label>
              <div class="col-md-8">
                <input type="text" id="sadd" class="form-control" value="<?php echo $studentdetails['studAddress'];?>">
                
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Guardian</label>
              <div class="col-md-8">
                <input type="text" id="guardian" class="form-control" value="<?php echo $studentdetails['guardian'];?>">
                
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Guardian Address</label>
              <div class="col-md-8">
                <input type="text" id="guardianadd" class="form-control" value="<?php echo $studentdetails['guardianAddress'];?>">
                
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Guardian CP</label>
              <div class="col-md-8">
                <input type="text" id="gcp" class="form-control" value="<?php echo $studentdetails['guardianCP'];?>">
                
              </div>
            </div>
            
         
            
            <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Status</label>
              <div class="col-md-8">
               
				
				<select id="statuss" class="form-control">
					<option><?php echo $studentdetails['status'];?></option>
					<option value="ACTIVE">ACTIVE</option>
					<option value="INACTIVE">INACTIVE</option>
					<option value="GRADUATED">GRADUATED</option>
					<option value="TRANSFERRED">TRANSFERRED</option>
				</select>
                  
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Grade</label>
              <div class="col-md-8">
				
                <input type="hidden" id="current_student_grade" class="form-control" value="<?php echo $studentdetails['student_grade'];?>">
                <input type="text" id="student_grade" class="form-control" value="<?php echo $studentdetails['student_grade'];?>">
                  
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Section</label>
              <div class="col-md-8">
			  
				 
                <input type="text" id="sectiond" class="form-control" value="<?php echo $studentdetails['section'];?>">
                  
              </div>
            </div>
			
			 <div class="form-group">
              <label class="col-md-3 control-label" for="state-normal">Scholarship</label>
              <div class="col-md-8">
               
				
				<select id="esc" class="form-control">
				    <option><?php echo $studentdetails['ESC'];?></option>
					<option value="ESC">ESC</option>
					<option value="NO">NO</option>
				</select>
                  
              </div>
            </div>
           
            
           
            
       
              <div class="col-md-8">
                <button type="button" class="btn btn-primary" onclick="savegranteeinfo(<?php echo $studid;?>)">Update</button> 
              </div>

          </div>
            
                </div>

                <!-- end tab content -->
                      
                                            
                                        </div>
                                        <!-- END Gallery -->

                                        <!-- Followers -->
                    <div class="tab-pane" id="profile-followers">
                                            <div class="block-full">
                                                

                                            </div>
                                        </div>
                                        <!-- END Followers -->
                                    </div>
                                    <!-- END Tabs Content -->


                                </div>

                            </div>
                               <div class="row">
           <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        <th>OR NO</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Applied TO:</th>
                        <th></th>
                    </tr>
                    
                </thead>
                <tbody>
                <?php
                
                foreach ($paymentlist as $payment):
               
                echo "<tr class='odd gradeX'>";
                echo "<td>".$payment['orno']."</td>";
                echo "<td>".$payment['paymentDate']."</td>";
                echo "<td>".$payment['amount']."</td>";
                echo "<td>".$payment['status']."</td>";
                echo "<td class='center'>";
               
               
                
                echo "<button class='btn btn-primary' title='Edit Student'  onClick='editpayment(".$payment['pid'].")'  data-toggle='modal' data-target='#paymentmodal'><i class='fa fa-edit'></i></button>
                     <button class='btn btn-danger notification' title='Delete Payment' id='notification' onClick='deletepayment(".$payment['pid'].")'><i class='fa fa-times'></i></button>
                     
                    </td>";

                


                echo "</tr>";
                echo "</tr>";
                endforeach;
                
                ?>
                
                
                
                
                    
                </tbody>
            </table>
        </div>
      </div>
                        </div>
                        <!-- END User Profile Row -->

                    </div>
                    <!-- END Page Content -->
          
          
          
<!-- Regular Modal -->
      <div id="modal-regular" class="modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="modal-title"><strong>Add Payment Details</strong></h3>
            </div>
            <div class="modal-body">
              
              <div>
                                <!-- Input States Block -->
                                <div class="block">
                                    

                                    <!-- Input States Content -->
                                    <form action="page_forms_components.html" method="post" class="form-horizontal" onsubmit="return false;">
                  <input type="hidden" id="spaymentid">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Semester</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="semester">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        </select>
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">School Year</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="schoolyear">
                        <option value="2012-2013">2012-2013</option>
                        <option value="2013-2014">2013-2014</option>
                        <option value="2014-2015">2014-2015</option>
                        <option value="2015-2016">2015-2016</option>
                        <option selected="selected" value="2016-2017">2016-2017</option>
                        <option value="2017-2018">2017-2018</option>
                        <option value="2018-2019">2018-2019</option>
                        <option value="2019-2020">2019-2020</option>
                        <option value="2020-2021">2020-2021</option>
                        
                        </select>
                                            </div>
                                        </div>
                    <div class="form-group hidden">
                                            <label class="col-md-3 control-label" for="state-normal">Fund Cluster</label>
                                            <div class="col-md-6">
                                               <input type="text" name="state-normal" class="form-control" id="fundclusterpayment">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Payment Date</label>
                                            <div class="col-md-6">
                                              <input type="text" id="checkdate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Check #</label>
                                            <div class="col-md-6">
                                               <input type="text" name="state-normal" class="form-control" id="checkno">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Amount</label>
                                            <div class="col-md-6">
                                                <input type="text" name="state-normal" class="form-control" id="amount">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Particulars</label>
                                            <div class="col-md-6">
                                                
                        <input type="text" name="state-normal" class="form-control" id="particulars">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Remarks</label>
                                            <div class="col-md-6">
                                                
                        <textarea class="form-control" id="remarks"></textarea>
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">CY</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="cy">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        
                        
                        </select>
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Mode of Payment</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="payment_mode">
                        <option value="ATM">ATM</option>
                        <option value="Payroll">Payroll</option>
                        <option value="Check">Check</option>
                        
                        </select>
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Status</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="status">
                        <option value="Available">Available</option>
                        <option value="Released">Released</option>
                        <option value="Staled">Staled</option>
                        <option value="Pending">Pending</option>
                        <option value="Cancelled">Cancelled</option>
                        
                        
                        </select>
                                            </div>
                                        </div>
                    
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Release Date</label>
                                            <div class="col-md-6">
                                            <input type="text" id="releasedate" name=	"example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="state-normal">Date Added</label>
                                            <div class="col-md-6">
                                                <input type="text" name="state-normal" class="form-control" id="dateadded" disabled>
                                            </div>
                                        </div>
                                        
                                        
                                    </form>
                                    <!-- END Input States Content -->
                                </div>
                                <!-- END Input States Block -->
              
              
              
            </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-effect-ripple btn-primary" onclick="savepayment(<?php echo $scholar_profile['scholarid'];?>);" id="savebutton">Save</button>
              <button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatepayment();" id="updatebutton" disabled>Update</button>
              <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" id="paymentclosebutton">Close</button>
            </div>-->
          </div>
        </div>
      </div>
      <!-- END Regular Modal -->        

    </div>
      <!-- END Modal -->     

	<!-- Edit Payment Modal -->
                    <div class="modal" id="paymentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <center><h3 class="modal-title" id="exampleModal3Label">Edit Payment</h3></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 class="modal-title">Student Data</h4>
				 
                                   <label>OR No.</label>
								   <input type="text" id="ornox" name="orno" class="form-control" value=""><br>
							<label>Payment Date</label>								   
                            <input type="text" id="paydatex" name="paydate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" value=""><br>  
							<label>Amount</label>	
                            <input type="text" id="amountx" name="amount" class="form-control" value=""><br>
							<label>Applied to:</label>	
							<textarea type="text" id="appliedtox" name="appliedto" class="form-control"> <?php echo $payment['status'];?></textarea><br> 
							<input type="hidden" id="edit_pid">
							<br>
							 <button type="button" class="btn btn-primary" onclick="updatepayment()" style="float:right:">Update</button> 

                           



                                  </div>
                                  <br>
                                  <div class="modal-footer">
                                    

                                      
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--modal-->