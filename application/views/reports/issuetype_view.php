
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
                        <!-- First Row -->
                        <div class="row">
                            <!-- Simple Stats Widgets -->
                            <div class="col-sm-6 col-lg-3">
                                <a href="#" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background">
                                            <i class="gi gi-building text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3">
                                            <strong><span data-toggle="counter" data-to=""><?php 
										echo $totalprojects['totalproj'];
										?></span></strong>
                                        </h2>
                                        <span class="text-muted">Projects </span>
                                    </div>
                                </a>
								
								
                            </div>
							
							<!-- 
                            <div class="col-sm-6 col-lg-3">
                                <a href="javascript:void(0)" class="widget">
                                    <div class="widget-content widget-content-mini text-right clearfix">
                                        <div class="widget-icon pull-left themed-background-success">
                                            <i class="gi gi-user text-light-op"></i>
                                        </div>
                                        <h2 class="widget-heading h3 text-success">
                                            <strong><span data-toggle="counter" data-to="<?php 
										//echo $totalcontacts->totalcontact;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Contacts</span>
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
										//echo $totalprograms->programtotal;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Active Programs</span>
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
										//echo $totalpermits->permitstotal;
										?>"></span></strong>
                                        </h2>
                                        <span class="text-muted">Permits & Recognition</span>
                                    </div>
                                </a>
                            </div>
							-->
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
							 <div class="col-lg-6">
                                <!-- Partial Responsive Block -->
                                <div class="block">
                                    <!-- Partial Responsive Title -->
                                    <div class="block-title">
                                        <h2>QTY Total by Issue Type</h2>
                                    </div>
                                    <!-- END Partial Responsive Title -->

                                    <!-- Partial Responsive Content -->
                                    <table class="table table-striped table-borderless table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Issue</th>
                                                <th>Total QTY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
			<?php
				foreach ($totalissuecount as $totalissue):
				
				echo "<tr>";
				echo "<td>".$totalissue['rp_issuetype']."</td>";
				echo "<td>".$totalissue['noofqty']."</td></tr>";
				
				endforeach;
				?>
											
											
											
                                        </tbody>
                                    </table>
                                    <!-- END Partial Responsive Content -->
                                </div>
                                <!-- END Partial Responsive Block -->
                            </div>
							
							<div class="col-lg-6">
                                <!-- Partial Responsive Block -->
                                <div class="block">
                                    <!-- Partial Responsive Title -->
                                    <div class="block-title">
                                        <h2>Group Responsible Total</h2>
                                    </div>
                                    <!-- END Partial Responsive Title -->

                                    <!-- Partial Responsive Content -->
                                    <table class="table table-striped table-borderless table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Group</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											foreach ($groupresponsible as $group):
											
											echo "<tr>";
											echo "<td>".$group['rp_groupresponsible']."</td>";
											echo "<td>".$group['totalgroupcount']."</td></tr>";
											
											endforeach;
											?>
																		
											
											
                                        </tbody>
                                    </table>
                                    <!-- END Partial Responsive Content -->
                                </div>
                                <!-- END Partial Responsive Block -->
                            </div>
							
                            <!-- END Simple Stats Widgets -->
                        </div>
                        <!-- END First Row -->

						


                        
                    </div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
