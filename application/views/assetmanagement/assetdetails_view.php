
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
			<?php $this->load->view('inc/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
	   <div class="col-lg-12">
				<!-- Partial Responsive Block -->
				
<!-- Regular Modal -->
                <div id="editproperty" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header-tabs">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                                        <li class="active"><a href="#modal-tabs-home"><i class="fa fa-home"></i> Basic Info</a></li>
														<li><a href="#modal-tabs-users"><i class="fa fa-home"></i> Users</a></li>
														<li><a href="#modal-tabs-remarks"><i class="fa fa-home"></i> Remarks</a></li>
                                                        <li><a href="#modal-tabs-settings" data-toggle="tooltip" title="Settings"><i class="gi gi-settings"></i> Peripheral Details</a></li>
                                                    </ul>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="modal-tabs-home">
														<!-- basic info content -->
					<input type="hidden" id="equipno">
						<label class="col-md-2 control-label" for="state-normal">Property No</label>
                        <div class="col-md-3">
                            <input type="text" id="propertyno" class="form-control">
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Particulars</label>
                        <div class="col-md-5">
							<textarea class="form-control" id="particulars"></textarea>
                           
                        </div>
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Date Acquired</label>
                        <div class="col-md-3">
                            <input type="text" id="dateacquired" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Unit Price</label>
                        <div class="col-md-3">
                            <input type="text" id="unitprice" class="form-control" >
                        </div>
						
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Account Code</label>
                        <div class="col-md-3">
                            <input type="text" id="accountcode" class="form-control" >
                        </div>	
						<label class="col-md-2 control-label" for="state-normal">Service</label>
                        <div class="col-md-3">
                           <select id="service" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option></option>
							<option value="SERVICEABLE">SERVICEABLE</option>
							<option value="UNSERVICEABLE">UNSERVICEABLE</option>
							<option value="DISPOSED">DISPOSED</option>
							
						   </select>
                        </div>						
						
							
<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Tag No</label>
                        <div class="col-md-3">
                            <input type="text" id="inventorytag" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Supplier</label>
                        <div class="col-md-3">
                           <select id="supplierid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
						   <option></option>
							<?php
							foreach ($supplierlist as $supplier_list):
								
							
								echo "<option value='".$supplier_list['supplierID']."' $selectedsupplier>".$supplier_list['supName']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>
<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Barcode</label>
                        <div class="col-md-3">
                            <input type="text" id="barcode" class="form-control" >
                        </div>						
<div class="row">&nbsp;</div>				
<div class="row">&nbsp;</div>				
<label class="col-md-9 control-label" for="state-normal"></label>		
							 
<button type="button" class="btn btn-effect-ripple btn-primary" onclick="savebasic();">Save</button>
<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onclick="location.reload();">Close</button>
							
														
														</div>
														
														
														
<div class="tab-pane" id="modal-tabs-users">
<label class="col-md-2 control-label" for="state-normal">Issued To</label>
                        <div class="col-md-3">
                            <select id="issuedto" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." >
							 
				<option></option>
				<?php
									foreach($employeeslist as $employees):
									
										echo "<option value='".$employees['eid']."'>".$employees['fname']." ".$employees['lname']."</option>";
									endforeach;
								
							?>
				</select>
                        </div>
						<label class="col-md-2 control-label" for="state-normal">End User</label>
                        <div class="col-md-3">
							<input type="text" id="enduser" class="form-control">
                            
                        </div>
<div class="row"></div>
						
						
						
			<div class="row">&nbsp;</div>	
			<div class="row">&nbsp;</div>	
<!--
<table id="example-datatable" class="hidden table table-striped table-bordered table-vcenter">
			<thead>
				<tr>
					
					<th>Log</th>
				</tr>
			</thead>
		<tbody></tbody>
</table>			-->
			<div class="row">&nbsp;</div>				
			<label class="col-md-9 control-label" for="state-normal"></label>		
										 
			<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updateusertab();">Save</button>
			<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onClick="location.reload();">Close</button>

</div>
<div class="tab-pane" id="modal-tabs-remarks">
<label class="col-md-2 control-label" for="state-normal">Whereabout</label>
                        <div class="col-md-3">
                            <input type="text" id="whereabout" class="form-control" >
                        </div>	
		<div class="row">&nbsp;</div>					
<label class="col-md-2 control-label" for="state-normal">Remarks</label>
                        <div class="col-md-6">
                           <textarea class="form-control" id="remarks"></textarea>
                        </div>	
						
			<div class="row">&nbsp;</div>	
<!-- <table id="example-datatable2" class="table table-striped table-bordered table-vcenter">
			<thead>
				<tr>
					
					<th>Log</th>
				</tr>
			</thead>
		<tbody></tbody>
</table>	-->
			
			<div class="row">&nbsp;</div>				
			<label class="col-md-9 control-label" for="state-normal"></label>		
										 
			<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updateremarks();">Save</button>
			<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onClick="location.reload();">Close</button>

</div>
<div class="tab-pane" id="modal-tabs-settings">
<!-- peripheral details -->

	<label class="col-md-2 control-label" for="state-normal">Processor</label>
                        <div class="col-md-3">
                            <input type="text" id="processor" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">RAM</label>
                        <div class="col-md-3">
                            <input type="text" id="ram" class="form-control" >
                        </div>
						<div class="row"></div>
						<label class="col-md-2 control-label" for="state-normal">Hard Disk</label>
                        <div class="col-md-3">
                            <input type="text" id="harddisk" class="form-control" >
                        </div>
						<label class="col-md-2 control-label" for="state-normal">Operating System</label>
                        <div class="col-md-3">
                            <input type="text" id="operatingsystem" class="form-control" >
                        </div>
						
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Equipment S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="equipmentsn" class="form-control" >
                        </div>	
						<label class="col-md-2 control-label" for="state-normal">Processor S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="processorsn" class="form-control" >
                        </div>	
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Monitor S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="monitorsn" class="form-control" >
                        </div>	
						<label class="col-md-2 control-label" for="state-normal">Keyboard S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="keyboardsn" class="form-control" >
                        </div>	
<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Mouse S/N</label>
                        <div class="col-md-3">
                            <input type="text" id="mousesn" class="form-control" >
                        </div>	

						
						
						
						
						
			<div class="row">&nbsp;</div>				
			<div class="row">&nbsp;</div>				
			<label class="col-md-9 control-label" for="state-normal"></label>		
										 
			<button type="button" class="btn btn-effect-ripple btn-primary" onclick="updatepheriperal()">Save</button>
			<button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal" onClick="location.reload();">Close</button>

</div> <!-- end peripheral -->




                                                    </div>
                                                </div>
												
												<div class="row"></div>
                                                <div class="modal-footer">
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div>
                </div>

<!--end modal-->				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>Asset Details</h5>
					 <div class="btn-group pull-right">
							<a href="javascript:void(0)" data-toggle="dropdown" class="btn btn-primary dropdown-toggle hidden">Action <span class="caret"></span></a>
							<ul class="dropdown-menu text-left">
								<li>
									<a href="#" onclick="editrr();">
										<i class="fa fa-pencil pull-right"></i>
										Edit Delivery Details
									</a>
								</li>
								<li>
									<a href="#" onclick="updateinventory();">
										<i class="fa fa-pencil pull-right"></i>
										Update Inventory
									</a>
								</li>
								<li>
									<a href="#printinspection" data-toggle="modal">
										<i class="fa fa-cubes pull-right"></i>
										Print Inspection and Acceptance Report
									</a>
								</li>
								
								
							</ul>
						</div>
						
					 
				</div>
				
				<div class="form-group">
					<input type="hidden" id="assetid" name="state-normal" class="form-control" value="<?php echo $assetid;?>" >
					<label class="col-md-2 control-label" for="state-normal">Particulars</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="asset_particulars"><?php echo $assetdetails['asset_particulars'];?></textarea>
                        </div>
						<label class="col-md-1 control-label" for="state-normal">Article</label>
                        <div class="col-md-2">
						
                            <select id="articlename" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." id="articleid">
							<?php
							foreach ($article as $article_list):
								
							if($article_list['articlename']==$assetdetails['asset_article']){
									$selectedarticle = "selected='selected'";
								}else{
									$selectedarticle = "";
								}
								echo "<option value='".$article_list['articlename']."' $selectedarticle>".$article_list['articlename']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>
						
						
						
						<label class="col-md-1 control-label" for="state-normal">Classification</label>
                        <div class="col-md-2">
                            <select id="classification" name="example-select2" class="select-select2" id="classification" style="width: 100%;" data-placeholder="Choose one..">
							
							<option value=""></option>
				<?php
							foreach ($classification as $class_list):
								
							if($class_list['classification']==$assetdetails['asset_classification']){
									$selectedclass = "selected='selected'";
								}else{
									$selectedclass = "";
								}
								echo "<option value='".$class_list['classification']."' $selectedclass>".$class_list['classification']."</option>";
							
							endforeach;
							?>
						</select>
							
                        </div>
						
						
						<div class="row"></div>
						<!-- Dropzone Block -->
                                
                                    <!-- Dropzone Title -->

                                    <!-- END Dropzone Title -->

                                    <!-- Dropzone Content -->
                                    <!-- Dropzone.js, You can check out https://github.com/enyo/dropzone/wiki for usage examples -->
                                    
                                    <!-- END Dropzone Content -->
                              
                                <!-- END Dropzone Block -->
						<div class="row"></div>
						
						<label class="col-md-2 control-label" for="state-normal">Image</label>
						
						
						
                        <div class="col-md-3">
						<?php echo form_open_multipart('asset/do_upload');?> 
	   <form action = "" method = "">
		 <input type="hidden" id="fileid" name="fileid" value="<?php echo $assetid;?>">
		 <?php
			if($status=="yes"){
				echo "<img style='width:100%; float:left;' src='$fileurl'>";
			}
		 ?>
		 
		 
         <input type = "file" name = "assetimage" id = "assetimage" size = "20" /> 
        
         <input type = "submit" value = "upload"/> 
      </form> 
							
                        </div>
						
						<label class="col-sm-2 text-right control-label" for="state-normal">UNIT</label>
                        <div class="col-sm-2">
                            <select id="asset_unit" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." tabindex="0">
							
							<?php
							
							foreach ($unitofmeasure as $uom):
								if($uom['unit_name']==$assetdetails['asset_unit']){
									$selectedclass = "selected='selected'";
								}else{
									$selectedclass = "";
								}	
									echo "<option value='".$uom['unit_name']."' $selectedclass>".$uom['unit_name']."</option>";
			
							endforeach;
				
				?>
							</select>
                        </div>
						
						
						
						
						<div class="row"></div>
						<div class="col-md-2">
						</div>
						
						<div class="row"></div>
						 <div class="col-md-2 pull-right">
								<button id="savedrbutton" class="btn btn-primary" title="Save PR Details" onclick="updategroupasset();"><i class="fa fa-floppy-o"></i> Save</button>
						 </div>
						
						
						 
						   

                    </div>
				
				

				<div class="row"><br></div>
				
				<div class="row" id="suppliertabs">
				
				
		<!-- Block Tabs -->
		<div class="block full">
			<!-- Block Tabs Title -->
			<div class="block-title">
				<div class="block-options pull-right">
					<a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
				</div>
				<ul class="nav nav-tabs" data-toggle="tabs">
					<li class="active"><a href="#block-tabs-home">Delivery</a></li>
					
					<?php
					/*
					foreach ($canvasslist as $canvass_list):
		
							echo "<li><a href='#tab".$canvass_list['supplierid']."'>".$canvass_list['supName']."</a></li>";
	
					endforeach;
					*/
					?>
					
					
					
				</ul>
			</div>
			<!-- END Block Tabs Title -->

			<!-- Tabs Content -->
			<div class="tab-content">
				<div class="tab-pane active" id="block-tabs-home">
				
				<div class="table-responsive">
					 <table id="example-datatable3" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            
                                            <th>Property No.</th>
                                            <th>Particulars</th>
                                            <th>Date Acquired</th>
                                            <th>Unit Price</th>
                                            <th>Issued To</th>
                                            <th>End User</th>
                                            <th>Service</th>
                                           
											
                                            <th style="width: 120px;">Tag</th>
											<th style="width: 120px;">Supplier</th>
											<th style="width: 120px;">Barcode</th>
											<th style="width: 120px;">Delivery No</th>
                                            <th style="width: 100px;" class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									
			
				foreach ($equipments as $equiplist):
				
				echo "<tr class='odd gradeX'>";
				echo "<td>".$equiplist['propertyNo']."</td>";
				echo "<td><a href='#editproperty' data-toggle='modal' onclick='editequipment(".$equiplist['equipNo'].");'>".$equiplist['particulars']."</a></td>";
				echo "<td>".$equiplist['dateacquired']."</td>";
				echo "<td>".$equiplist['totalcost']."</td>";
				echo "<td>".$equiplist['issuedtoname']."</td>";
				echo "<td>".$equiplist['enduser']."</td>";
				echo "<td>".$equiplist['service']."</td>";
				//echo "<td>".$equiplist['whereabout']."</td>";
				//echo "<td>".$equiplist['remarks']."</td>";
				echo "<td>".$equiplist['inventorytag']."</td>";
				echo "<td>".$equiplist['supName']."</td>";
				echo "<td>".$equiplist['barcode']."</td>";
				echo "<td>".$equiplist['drno']."</td>";
			
				echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Edit' href='#editproperty' data-toggle='modal' onclick='editequipment(".$equiplist['equipNo'].");' disabled><i class='fa fa-pencil'></i></button>
					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteequipitem(".$equiplist['equipNo'].");'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				?>
									</tbody>
					</table>
					 </div>
				
				
					
				</div>
				
				
		<?php
		/*
		//tabs for suppliers
			foreach ($canvasslist as $canvass_list):
				$supplierid = $canvass_list['supplierid'];
				$suppliername = $canvass_list['supName'];
				
					echo "<div class='tab-pane' id='tab".$canvass_list['supplierid']."'>";
					$canvassitems = $this->purchaserequest_model->getcanvasslist_items($supplierid,$prid);
					echo "<h4>$suppliername Price List</h4>";
					echo "<button class='btn btn-danger notification pull-right' onClick='removesupplier(".$supplierid.")'><i class='fa fa-times'></i> Remove Supplier</button>";
					echo "<table id='supplier-".$canvass_list['supplierid']."' class='table table-striped table-bordered table-vcenter'>";
					echo "<thead>
                                        <tr>
                                            
                                            <th>QTY</th>
											<th style='width: 120px;'>Unit of Issue</th>
                                            <th style='width: 420px;'>DESCRIPTION</th>
											<th style='width: 120px;'>Unit Price</th>
											<th style='width: 120px;'>Total Price</th>
                                            <th style='width: 320px;' class='text-center'><i class='fa fa-flash'></i></th>
                                        </tr>
                                    </thead>";
						echo "<tbody>";	
						$totalamount2 = 0;
			foreach ($canvassitems as $canvass_items):	
				$amount2 = $canvass_items['qty'] * $canvass_items['unitprice'];	
				$totalamount2=$totalamount2+$amount2;				
									echo "<tr class='odd gradeX'>";
				echo "<td>".$canvass_items['qty']."</td>";
				echo "<td>".$canvass_items['unit']."</td>";
				echo "<td>".$canvass_items['description']."</td>";
				echo "<td style='width:210px;'><input type='text' style='width:80px;text-align:center;' value='".$canvass_items['unitprice']."' id='unitprice-".$canvass_items['aocid']."'> </td>";
				echo "<td>".number_format($amount2,2)."</td>";
				echo "<td class='center'> 
					
					<button  class='btn btn-primary' title='Save Price' onClick='updatecanvassprice(".$canvass_items['aocid'].",".$canvass_items['supplierid'].")'><i class='gi gi-floppy_saved'></i></button>
					
					
				</td>";
				endforeach;
			echo "</tbody>";
						
						
		echo "</table>";
		
		echo "<div class='row' id='totalamount".$canvass_items['supplierid']."'>
					<h4 class='sub-header'></h4>
					<div class='col-md-9'>
						<strong class='pull-right'><h2>Total Amount:";
		echo number_format($totalamount2,2);
			echo "</h2></strong></div></div>";
		
		echo "</div>";

endforeach;
			*/
		?>
				
				
				
				
			<!-- END Tabs Content -->
		</div>
		<!-- END Block Tabs -->
					 
				
				</div><!-- end row-->
				
				
				
				
			</div> <!-- end block -->
	   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->

