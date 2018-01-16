
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
								<h3 class="modal-title"><strong>Add Delivery</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">Supplier</label>
                        <div class="col-md-7">
                            <select id="supplierid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option value=""></option>
							<?php
							foreach ($supplierlist as $supplier_list):
							
								echo "<option value='".$supplier_list['supplierID']."'>".$supplier_list['supName']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>	
						
						<label class="col-md-3 control-label text-right">Received Date</label>
                        <div class="col-md-7">
                            <input type="text" id="receiveddate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>	
						
						<label class="col-md-3 control-label  text-right" for="state-normal">Receipt No.</label>
                        <div class="col-md-7">
                           <input type="text" id="drno" name="state-normal" class="form-control" tabindex="0" value="">
						</div>
						
						<label class="col-md-3 control-label  text-right" for="state-normal">Invoice No.</label>
                        <div class="col-md-7">
                           <input type="text" id="invoiceno" name="state-normal" class="form-control" tabindex="0" value="">
						</div>
						
						<label class="col-md-3 control-label  text-right" for="state-normal">APR No.</label>
                        <div class="col-md-7">
                            <select id="aprid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option value=""></option>
							<?php
							foreach ($aprlist as $apr_list):
							
								echo "<option value='".$apr_list['aprid']."'>".$apr_list['aprno']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>
						<label class="col-md-3 control-label  text-right" for="state-normal">PR No.</label>
                        <div class="col-md-7">
                            <select id="prid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option value=""></option>
							<?php
							foreach ($prlist as $pr_list):
							
								echo "<option value='".$pr_list['prid']."'>".$pr_list['prno']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>
						<label class="col-md-3 control-label  text-right" for="state-normal">PO No.</label>
                        <div class="col-md-7">
                            <select id="poid" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option value=""></option>
							<?php
							foreach ($polist as $po_list):
							
								echo "<option value='".$po_list['poid']."'>".$po_list['pono']."</option>";
							
							endforeach;
							?>
							</select>
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
							<button type="button" id="addbutton" class="btn btn-effect-ripple btn-primary" onclick="savedelivery();">Add Delivery</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>PO List</h5>
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal" onclick="adddelivery();">Add Delivery</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable_rr" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                        <th>Delivery ID</th>
                        <th>Delivery Receipt</th>
						<th>APR No.</th>
                        <th>PO No.</th>
                        <th>Received Date</th>
                        <th>Warehouse</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($rr_list as $rrlist):
				
				if($rrlist['updatedcount']>=1){
					$dis = "disabled";
				}else{
					$dis = "";
				}
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX' style='text-align:center;'>";
				
				echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['drno']."</a></td>";
				
				echo "<td>".$rrlist['aprno']."</td>";
				echo "<td>".$rrlist['pono']."</td>";
				echo "<td>".mdate('%F %d, %Y',strtotime($rrlist['receivedate']))."</td>";
				echo "<td>".$rrlist['warehouse_name']."</td>";
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deletedelivery(".$rrlist['deliveryid'].")'  $dis><i class='fa fa-times'></i></button>
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


