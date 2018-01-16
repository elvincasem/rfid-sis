
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
                                                <select id="eid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   
						<?php
									foreach($employeeslist as $employees):
									if($employees['eid']==$eid){
											$selectedeid = "selected='selected'";
									}else{
											$selectedeid = "";
									}
										echo "<option value='".$employees['eid']."' $selectedeid>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
							</select>
                                            </div>
											<div class="row">&nbsp;</div>
										
											
											
											
											
											
											
                                        </div>
                                        
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="show_asset_view();">Generate</button>
                                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Datepicker Content -->
                                </div>
                                <!-- END Datepicker Block -->
							
		<div class="block full">
        <div class="block-title">
			
			<h5>Asset Assigned</h5>
			<a type="button" class="hidden pull-right btn btn-md btn-primary" href="<?=base_url()?>reports/purchaserequestdownload/<?php //echo $datefrom;?>/<?php //echo $dateto;?>">Export Result XLS</a>
			
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						
                        <th>Particulars</th>
						<th>Article</th>
                        <th>Property No.</th>
                        <th>Issued to</th>
                        <th>End User</th>
                        
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($propertylist as $property_list):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				
				
				//echo "<td>".mdate('%F %d, %Y',strtotime($aprlist['aprdate']))."</td>";
				echo "<td>".$property_list['particulars']."</td>";
				echo "<td>".$property_list['article']."</td>";
				echo "<td>".$property_list['propertyNo']."</td>";
				echo "<td>".$property_list['issuedtoname']."</td>";
				echo "<td>".$property_list['enduser']."</td>";
				
			
				
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
       
