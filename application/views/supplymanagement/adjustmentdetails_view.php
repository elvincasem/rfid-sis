
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
<input type="hidden" id="adjustmentid" value="<?php echo $adjustmentid;?>">
	
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
				
				
				
			<div class="block full">
				<div class="block-title">
				
					<h5>Requisition Details</h5>
					<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-success" href="#printaprmodal" data-toggle="modal" onclick="updateinventory(<?php echo $adjustmentid;?>);"> Update Inventory</button> 
					&nbsp;
					
					<button type="button"  class="btn btn-effect-ripple btn-primary pull-right" onclick="location.reload();" ><i class="fa fa-refresh"></i> Refresh</button>
					
				</div>
				
				<div class="row">
				<div class="col-sm-4">
                                <!-- Block -->
                                <div class="block">
                                    <!-- Block Title -->
                                    <div class="block-title">
                                        <h2>Details</h2>
										
										<!-- <h2 class="pull-right"><a href="#" onclick="editreq();">Edit</a> | <a href="#" onclick="updatereqdetails();">Save</a>
										-->
										</h2>
                                    </div>
									
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
                                    
			Adjustment ID
			<div>
				<input type="text" id="requisition_no" name="state-normal" class="form-control" tabindex="0" value="<?php echo $adjustmentdetails['adjustmentid'];?>" disabled>
			</div>
			Date
			<div>
				<input type="text" id="rdate"  class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  value="<?php echo $adjustmentdetails['adj_time_stamp'];?>" disabled>
				
			</div>	
			
			Warehouse
			<div>
				<select id="warehouseid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." disabled>
							 
				<?php echo "<option value='".$adjustmentdetails['warehouseid']."'>".$adjustmentdetails['warehouse_name']."</option>";?>
				
				</select>
			</div>	
				
									
									
									
                                    <!-- END Block Content -->
                                </div>
                                <!-- END Block -->
                            </div>
							
							
				<div class="col-sm-8">
                                <!-- Block -->
                                <div class="block">
                                    <!-- Block Title -->
                                    <div class="block-title">
                                        <h2>Item List</h2>
                                    </div>
                                    <!-- END Block Title -->

                                    <!-- Block Content -->
									
						<div>
							
							 <select id="itemid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose item.." onchange="showitemunit();">
							 <option></option>
							 <?php
								foreach ($itemlist as $item_list):
								
									echo "<option value='".$item_list['itemNo']."'>".$item_list['itemNo']."-".$item_list['description']."</option>";
								endforeach;
							 
							 ?>
							 </select>
							 <div class="row">
							  <div class="row"></div>
							   <div class="row"></div>
							 <div class="col-lg-3">
                                   Unit:
								 <div style="">
								 <select class="form-control" id="itemunit" disabled>
									
								 </select>
								 </div>
								 
								 
								 
								 
							</div>
<div class="col-lg-3">
								 Stock QTY:
								 <input type="number" id="inventory_qty" class="form-control" placeholder="1" value="0" disabled>
								 
								</div>
							<div class="row"></div>
							<div class="col-lg-3">
                                   Unit:
								 <div style="">
								 <select class="form-control" id="adjfunction">
									<option value="ADD">ADD (+)</option>
									<option value="MINUS">MINUS (-)</option>
									
								 </select>
								 </div>
								 
								
							</div>
							
								<div class="col-lg-3">
								 QTY:
								 <input onKeyUp="updatenewqty();" onchange="updatenewqty();" type="number" id="adjustmentqty" class="form-control" placeholder="0" >
								 
								</div>
								<div class="col-lg-3">
								 New QTY:
								 <input type="number" id="newqty" class="form-control" placeholder="1" disabled>
								 
								</div>
								
								
								 <button class="btn btn-primary" title="Save Price" onclick="additemadj();" style="margin-top:20px;"><i class="fa fa-plus"></i> Add Item</button>
								 
								 <div class="row"></div>
							 
							</div>
						</div>
						
						<br>
						<table id="general-table" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            
                                            <th  style="width: 500px;">Item Description</th>
                                            <th  style="width: 220px;">Unit</th>
                                            <th style="width: 120px;">Quantity</th>
                                            <th style="width: 120px;">Action</th>
                                            <th style="width: 120px;">Price</th>
                                            <th style="width: 120px;">Amount</th>

                                            <th class="text-center"><i class="fa fa-flash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									
									<?php
									$grandtotal =0;
									foreach ($adjitems as $adjitems_list):
									$totalamount = $adjitems_list['unitCost']*$adjitems_list['qty'];
									echo "<tr>";
									echo "<td>".$adjitems_list['description']."</td>";
									echo "<td>".$adjitems_list['unit']."</td>";
									echo "<td>".$adjitems_list['qty']."</td>";
									echo "<td>".$adjitems_list['action']."</td>";
									echo "<td>".number_format($adjitems_list['unitCost'],2)."</td>";
									echo "<td style='text-align:right;'>".number_format($totalamount,2)."</td>";
									if($adjitems_list['update_status']==1){
										$dis = "disabled";
									}else{
										$dis ="";
									}
									echo "<td class='center'> 
					
							
										
										<button class='btn btn-danger notification' title='Delete item' id='notification' onClick='deleteadjitem(".$adjitems_list['adjustmentitemsid'].")'  $dis><i class='fa fa-times'></i></button>
									</td>";
									echo "</tr>";
									
									$grandtotal = $grandtotal + $totalamount;
									
									endforeach;
									?>
									
									
									<tr><td></td><td></td><td></td><td></td><td style='text-align:right;'><?php echo number_format($grandtotal,2);?></td><td></td></tr>
									</tbody>
						</table>
						
						
						
						
                                    <p></p>
                                    <!-- END Block Content -->
                                </div>
                                <!-- END Block -->
				</div>			
				
</div>
				
				
				
				
				<h4 class="sub-header"></h4>
				<div class="row">
			
					
					
					
	
				</div> <!-- end row -->
				<div class="row"><br></div>
				
				
				
			</div> <!-- end block -->
	   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


