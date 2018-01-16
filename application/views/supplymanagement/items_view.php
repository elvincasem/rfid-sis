
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
                <div id="adddeliverymodal" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Add Item</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">Item Description</label>
                        <div class="col-md-7">
							<textarea  class="form-control" id="itemdescription"></textarea>
                        </div>
						<label class="col-md-3 control-label text-right">Unit</label>
                        <div class="col-md-7">
                           <select id="unitofmeasure"  class="form-control">
								<?php
									foreach($unitlist as $unit_list):
									
										echo "<option value='".$unit_list['unit_name']."'>".$unit_list['unit_name']."</option>";
									endforeach;
								
								?>
						   </select>
                        </div>	
						<label class="col-md-3 control-label text-right">Unit Cost</label>
                        <div class="col-md-7">
                            <div class="input-group">
								<span class="input-group-addon">₱</span>
								<input type="text" id="unitcost" name="example-input1-group1" class="form-control" placeholder="0.00">
							</div>
                        </div>	
						<label class="col-md-3 control-label text-right">Category</label>
                        <div class="col-md-7">
                           <select id="category"  class="form-control">
							
							<?php
									foreach($itemcategorylist as $item_category):
									
										echo "<option value='".$item_category['category_value']."'>".$item_category['category_value']."</option>";
									endforeach;
								
								?>
						   </select>
                        </div>	
						
						<label class="col-md-3 control-label text-right" for="example-select2">Supplier</label>
                        <div class="col-md-7">
							<select id="supplierid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <?php
									foreach($supplierlist as $suppliers):
									
										echo "<option value='".$suppliers['supplierID']."'>".$suppliers['supName']."</option>";
									endforeach;
								
								?>
                                                </select>
                          
                        </div>	
						<label class="col-md-3 control-label text-right">Brand</label>
                        <div class="col-md-7">
                            <input type="text" id="brand" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
							
						<label class="col-md-3 control-label  text-right" for="state-normal">Warehouse</label>
                        <div class="col-md-7">
                            <select id="warehouseid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							
							<?php
							foreach ($warehouselist as $warehouses):
							
								echo "<option value='".$warehouses['warehouseid']."'>".$warehouses['warehouse_name']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>		
						<div class="row"></div>
							
					</div>
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="saveitembutton" class="btn btn-effect-ripple btn-primary" onclick="saveitem();">Add Item</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
		
		<!-- Regular Modal -->
                <div id="filterdownload" class="modal bg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Download Excel</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						
						
							
						<label class="col-md-3 control-label  text-right" for="state-normal">Warehouse</label>
                        <div class="col-md-7">
                            <select id="warehouseidmodal" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							
							<?php
							foreach ($warehouselist as $warehouses):
							
								echo "<option value='".$warehouses['warehouseid']."'>".$warehouses['warehouse_name']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>		
						<div class="row"></div>
							
					</div>
								
								<!-- Input States Block -->
            <div class="block">
                

                <!-- Input States Content -->

                <!-- END Input States Content -->
            </div>
            <!-- END Input States Block -->
								
								
								
                            </div>
                            <div class="modal-footer">
							<button type="button" id="saveitembutton" class="btn btn-effect-ripple btn-primary" onclick="downloaditem();">Download</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>Items</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal" >Add Item</button>
			&nbsp;&nbsp;
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#filterdownload" data-toggle="modal" >Download Items</button>&nbsp;&nbsp;
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        <th>Item No.</th>
						<th>Description</th>
                        <th>Inventory QTY</th>
                        <th>Unit</th>
                        <th>Cost</th>
                        <!-- <th>Assigned to</th> -->
                        <th>Category</th>
                        <th>Warehouse</th>
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($itemslist as $items_list):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX' >";
				
				//echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				echo "<td>".$items_list['itemNo']."</a></td>";
				
				echo "<td><a href='items/details/".$items_list['itemNo']."'>".$items_list['description']."</a></td>";
				echo "<td>".$items_list['inventory_qty']."</td>";
				echo "<td>".$items_list['unit']."</td>";
				//echo "<td>".mdate('%F %d, %Y',strtotime($items_list['dateacquired']))."</td>";
				echo "<td>".$items_list['unitCost']."</td>";
				echo "<td>".$items_list['category']."</td>";
				echo "<td>".$items_list['warehouse_name']."</td>";
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete Item' id='notification' onClick='deleteitem(".$items_list['itemNo'].")'><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


