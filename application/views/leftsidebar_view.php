<!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="<?=base_url()?>home" class="sidebar-title sidebar-nav-mini-hide">
						<img src="<?=base_url()?>public/img/rfid.jpg" width="20%">
						<strong>RFID UIR</strong>
                            
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
								<li>
                                    <a href="<?=base_url()?>home"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
								<li class="<?php echo $settingsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Maintenance</span></a>
                                    <ul>
                                        <li >
                                            <a class="<?php echo $studentclass;?>" href="<?=base_url()?>student" ><i class="gi gi-pencil sidebar-nav-icon"></i>Student</a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li class="<?php echo $itemsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tools</span></a>
                                     <ul>
                                        <li >
                                            <a class="<?php echo $smsoneclass;?>" href="<?=base_url()?>sms_one" ><i class="gi gi-pencil sidebar-nav-icon"></i>Send SMS One by One</a>
                                        </li>
                                       <!-- <li >
                                            <a class="<?php echo $createannouncementclass;?>" href="<?=base_url()?>create_announcement" ><i class="gi gi-pencil sidebar-nav-icon"></i>Create Announcement</a>
                                        </li>
                                        <li >
                                            <a class="<?php echo $sendmanyclass;?>" href="<?=base_url()?>sms_many" ><i class="gi gi-pencil sidebar-nav-icon"></i>Send Sms To Many</a>
                                        </li>
                                      -->
                                        
                                    </ul>
                                </li>
                                <li class="<?php echo $suppliersclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Reports</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a  class="<?php echo $reportclass;?>" href="<?=base_url()?>report" ><i class="gi gi-inbox sidebar-nav-icon"></i>Print Logbook</a>
                                        </li>
                                    </ul>
                                </li>

                               
                                <li class="<?php echo $inventoryclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">About</span></a>
                                    <ul>
                                        <li>
                                            <a  class="<?php echo $aboutclass;?>" href="<?=base_url()?>about" ><i class="gi gi-inbox sidebar-nav-icon"></i>About The System</a>
                                        </li>
                                    </ul>
                                </li>
								<!-- Settings-->
                                <!--
								<li class="<?php echo $settingsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Messages</span></a>
                                    <ul>
										<li>
                                            <a  class="<?php echo $customizereportclass;?>" href="<?=base_url()?>customreport" ><i class="gi gi-pencil sidebar-nav-icon"></i>Compose</a>
                                        </li>
										<li>
                                            <a  class="<?php echo $warehouseclass;?>" href="<?=base_url()?>warehouse" ><i class="gi gi-inbox sidebar-nav-icon"></i>Inbox</a>
                                        </li>
										<li>
                                            <a class="<?php echo $suppliersclass;?>" href="<?=base_url()?>suppliers" ><i class="fa fa-share sidebar-nav-icon"></i>Sent</a>
                                        </li>
									
										<li>
                                            <a  class="<?php echo $employeesclass;?>" href="<?=base_url()?>employees" ><i class="gi gi-file sidebar-nav-icon"></i>Drafts</a>
                                        </li>
										<li>
                                            <a  class="<?php echo $userssubclass;?>" href="<?=base_url()?>users" ><i class="gi gi-ban sidebar-nav-icon"></i>Spam</a>
                                        </li>
                                        <li>
                                            <a  class="<?php echo $userssubclass;?>" href="<?=base_url()?>users" ><i class="gi gi-bin sidebar-nav-icon"></i>Trash</a>
                                        </li>
										
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>employees" ><i class="gi gi-settings sidebar-nav-icon"></i>Settings</a>
                                        </li>
										
										
									</ul>
								</li>
                                <li class="<?php echo $settingsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Contacts</span></a>
                                    <ul>
                                        <li>
                                            <a  class="<?php echo $customizereportclass;?>" href="<?=base_url()?>customreport" ><i class="gi gi-user sidebar-nav-icon"></i>Names</a>
                                        </li>
                                        <li>
                                            <a  class="<?php echo $warehouseclass;?>" href="<?=base_url()?>warehouse" ><i class="gi gi-multipleuser sidebar-nav-icon"></i>Groups</a>
                                        </li>
                                    </ul>
                                </li>
								-->
															
										
                            </ul>
							
							
							
                            <!-- END Sidebar Navigation -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        
                        <div class="text-center">
                            
                            <small> &copy; <a href="http://www.evenlyten.com" target="_blank">RFID with SMS</a><br>Developed by Evenly Ten Web Solutions</small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->