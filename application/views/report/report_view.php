
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
        <h5>Print LogBook</h5>
        <hr>
        
        <h4>Filtering Option</h4>
        
		<form method="post" action="report">
           <!-- <div class = 'col-sm-3'>
        
                <select class="custom-select form-control" id="yrlvlr" name="yrlvlr">
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
                                    </select>
            </div>
            <div class = 'col-sm-3'>
                <input type="text" class="form-control" id = "section"  name = "section" placeholder="Section">
            </div>
            <div class = 'col-sm-3'>
               <input type="text" id="to" name="to" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="TO: yyyy-mm-dd">
            </div>-->
            <div class = 'col-sm-3'>
                <label>Date:<input type="text" id="fdate" name="fdate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" style="margin-left:0px;" placeholder="yyyy-mm-dd" value="<?php echo $datefilter;?>"></label>
				 
				 
            </div>
			
			<div class = 'col-sm-3'>
			
			</div>

			
        <button type="submit" class='btn btn-success notification' title='Filter Report' style="margin-left:5%;"> Filter</button>
        </form>
        <br>
            <?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <button class='btn btn-primary' title='Edit Student'  onClick='printDiv()'  data-toggle='modal' data-target='#exampleModal3'><i class='fa fa-print'> PRINT </i></button>
       
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">

                <thead>
				
				
                    <tr>
                        <th>RFID</th>
                        <th>Student ID</th>
			<th>Name</th>
			<th>Date & Time In</th>
                     
                    </tr>
					
					
                </thead>
                <tbody>
                 <?php
                
                foreach ($filterlist as $filter):
               
			   
                echo "<tr class='odd gradeX'>";
                echo "<td>".$filter['rfID']."</td>";
                echo "<td>".$filter['studID']."</td>";
	        echo "<td>".$filter['fname']." ".$filter['mname']." ".$filter['lname']."</td>";
                echo "<td>".$filter['DateTimeIN']."</td>";
				
	
		
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
   

                        
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
