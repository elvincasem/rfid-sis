
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

                      
                            
							<div class="row">
							</div>
							  <!-- Datepicker Block -->
                                <div class="block">
                                    <!-- Datepicker Title -->
                                    <div class="block-title">
                                        
                                        <h2>Filter</h2>
                                    </div>
                                    <!-- END Datepicker Title -->

                                    <!-- Datepicker Content -->
                                    <form action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                                        <!-- Datepicker for Bootstrap (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://eternicode.github.io/bootstrap-datepicker -->
                                        <div class="form-group">
										<label class="col-md-3 control-label" for="example-daterange1">Date Range</label>
                                            <div class="col-md-7">
                                                <div class="input-group input-daterange" data-date-format="yyyy-mm-dd">
                                                    <input type="text" id="date1" name="example-daterange1" class="form-control" placeholder="From" value="<?php echo $datefrom;?>">
                                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                                    <input type="text" id="date2" name="example-daterange2" class="form-control" placeholder="To" value="<?php echo $dateto;?>">
                                                </div>
                                            </div>
											<div class="row">&nbsp;</div>
										
											
											
											
											
											
											
                                        </div>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="utilization_report_view();">Generate</button>
                                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Datepicker Content -->
                                </div>
                                <!-- END Datepicker Block -->
							
		<div class="block full">
        <div class="block-title">
			
			<h5>Utilization Report</h5>
			<a type="button" class="pull-right btn btn-md btn-primary" href="<?=base_url()?>reports/utilizationdownload/<?php echo $datefrom;?>/<?php echo $dateto;?>">Export Result XLS</a>
			
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						
                        <th>Item</th>
						<th>Requesting Employee</th>
                        <th>Number of Items Requested</th>
                        <th>Unit Cost</th>
                        <th>Total Cost</th>
                       
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($rislist as $ris):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				
				
				//echo "<td>".mdate('%F %d, %Y',strtotime($aprlist['aprdate']))."</td>";
				echo "<td>".$ris['description']."</td>";
				echo "<td>".$ris['requester']."</td>";
				echo "<td>".$ris['qty']."</td>";
				echo "<td>".$ris['unitCost']."</td>";
				echo "<td>".$ris['totalcost']."</td>";
				//echo "<td>".mdate('%F %d, %Y',strtotime($aprlist['receivedate']))."</td>";
			
				
				echo "</tr>";
				
				endforeach;
				
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
						


                        
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
