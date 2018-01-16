
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
                <div id="addpomodal" class="modal bg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                           <div class="modal-header">
								
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h3 class="modal-title"><strong>Generate PO</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
								
						<label class="col-md-3 control-label text-right">PO Date</label>
                        <div class="col-md-7">
                            <input type="text" id="podate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>	
								
						
						<label class="col-md-3 control-label  text-right" for="state-normal">PO No.</label>
                        <div class="col-md-7">
                            <input type="text" id="pono" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>
						
						<label class="col-md-3 control-label  text-right" for="state-normal">PR No.</label>
                        <div class="col-md-7">
                            <select id="prno" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option></option>
						
						</select>
                        </div>
						

						<label class="col-md-3 control-label text-right" for="state-normal">Mode of Procurement</label>
                        <div class="col-md-7">
                            
						<select id="modeofprocurement" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
							<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
							<!-- display APR No. -->
						<option value="DIRECT CONTRACTING">DIRECT CONTRACTING</option>
						<option value="DIRECT CONTRACTING (LIMITED TIME OF COMPLETION)
">DIRECT CONTRACTING (LIMITED TIME OF COMPLETION)
</option>
						<option value="EMERGENCY PURCHASE">EMERGENCY PURCHASE</option>
						<option value="LIMITED SOURCE BIDDING">LIMITED SOURCE BIDDING</option>
						<option value="NEGOTIATED PROCUREMENT">NEGOTIATED PROCUREMENT</option>
						<option value="REPEAT ORDER">REPEAT ORDER</option>
						<option value="SELECTIVE BIDDING">SELECTIVE BIDDING</option>
						<option value="SHOPPING">SHOPPING</option>
						<option value="SHOPPING (SMALL VALUE EQUIPMENT)">SHOPPING (SMALL VALUE EQUIPMENT)</option>
						<option value="SMALL VALUE PROCUREMENT">SMALL VALUE PROCUREMENT</option>
						</select>
								
							
                        </div>						
						<div class="row"></div>		
						<label class="col-md-3 control-label  text-right" for="state-normal">Place of Delivery</label>
                        <div class="col-md-7">
                            <input type="text" id="pono" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label  text-right" for="state-normal">Date of Delivery</label>
                        <div class="col-md-7">
                            <input type="text" id="podate" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>">
                        </div>		
						<label class="col-md-3 control-label  text-right" for="state-normal">Delivery Term</label>
                        <div class="col-md-7">
                            <input type="text" id="pono" name="state-normal" class="form-control" tabindex="0" value="">
                        </div>	
						<label class="col-md-3 control-label  text-right" for="state-normal">Payment Term</label>
                        <div class="col-md-7">
                            <input type="text" id="pono" name="state-normal" class="form-control" tabindex="0" value="">
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
							<button type="button" class="btn btn-effect-ripple btn-primary" onclick="addsupplier();">Add PO</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
            
	<div class="block full">
        <div class="block-title">
		<h5>PO List</h5>
			<button type="button" id="addapr" class="pull-right btn btn-effect-ripple btn-primary hidden" href="#addpomodal" data-toggle="modal" onclick="addpo();">Add PO</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable_po" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
                        
                        <th>PO No.</th>
						<th>PR No.</th>
                        <th>Supplier</th>
                        <th>Mode of Procurement</th>
						<th>PO Date.</th>
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($po_list as $polist):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				
				echo "<td><a href='purchaseorder/details/".$polist['poid']."'>".$polist['pono']."</a></td>";
				echo "<td>".$polist['prno']."</td>";
				
				echo "<td>".$polist['supplierid']."</td>";
				echo "<td>".$polist['modeofprocurement']."</td>";
				echo "<td>".mdate('%F %d, %Y',strtotime($polist['podate']))."</td>";
				
			
				echo "<td class='center'> 
					
					<button class='hidden btn btn-primary' title='Edit APR'  onClick='editpr(".$polist['poid'].")'  data-toggle='modal' data-target='#addusermodal'><i class='fa fa-edit'></i></button>
					
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deletepo(".$polist['poid'].")'><i class='fa fa-times'></i></button>
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


