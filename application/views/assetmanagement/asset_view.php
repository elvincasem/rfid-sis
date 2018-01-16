
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
								<h3 class="modal-title"><strong>Add Asset</strong></h3>
                                
                            </div> 
                            <div class="modal-body">
                                <div class="form-group">
						<label class="col-md-3 control-label text-right">Particulars</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="particulars"></textarea>
                        </div>	
						<label class="col-md-3 control-label text-right">Article</label>
                        <div class="col-md-7">
                           <select id="article" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							<?php
							foreach($article as $assetarticle):
							
							echo "<option value='".$assetarticle['articlename']."'>".$assetarticle['articlename']."</option>";
							
							endforeach;
							?>
							</select>
                        </div>	
						
						<label class="col-md-3 control-label text-right">Classification</label>
                        <div class="col-md-7">
                            <select id="classification" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							<?php
							foreach($classification as $classif):
							
							echo "<option value='".$classif['classification']."'>".$classif['classification']."</option>";
							
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
							<button type="button" id="savebutton" class="btn btn-effect-ripple btn-primary" onclick="saveasset();">Add Asset</button>
							
                                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
		
             <div class="col-lg-2">
			<select class="form-control" id="classificationfilter">
			<option value="ALL">ALL</option>
				<?php
					foreach($classification as $classlist):
						echo "<option value='".$classlist['classification']."'>".$classlist['classification']."</option>";
					endforeach;
				?>
			</select>
			
		</div>	
		<div class="col-lg-2">
			<button type="button" class="btn btn-primary" onclick="changefilter();">View</button>   
		</div>
<div class="row"></div>	
<div class="row">&nbsp;</div>	

	<div class="block full">
        <div class="block-title">
		<h5>Asset List</h5>
		
			<button type="button" id="adddelivery" class="pull-right btn btn-effect-ripple btn-primary" href="#adddeliverymodal" data-toggle="modal">Add Asset</button>
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr style="text-align:center;">
                        
                        <!-- <th style="width:100px;">Delivery ID</th>-->
                       <th>Particulars/Description</th>
					   <th style="width:300px;">Photo</th>
					   <th>Article</th>
                        <th>Classifications</th>
                        <th>QTY</th>
                        <!-- <th>Date Acquired</th>
                        <th>Assigned to</th> -->
                       
                        
						<th></th>
                    </tr>
                </thead>
                <tbody>
				<?php
				//$ch = curl_init($fileurl); 
				
				foreach ($assetlist as $asset_list):
				
					if($asset_list['equipcount']>=1){
						$dis = "disabled";
					}else{
						$dis = "";
					}
					
					
					$base = base_url();
		$fileurl = $base."uploads/".$asset_list['assetid'].".jpg";
		 $ch = curl_init($fileurl);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 404){
            
			$fileurl = $base."uploads/noimage.png";
        }else{
            
			//$fileurl;
        }
        
					
					
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX' >";
				
				//echo "<td><a href='receiving/details/".$rrlist['deliveryid']."'>".$rrlist['deliveryid']."</a></td>";
				echo "<td><a href='../../asset/details/".$asset_list['assetid']."'>".$asset_list['asset_particulars']."</a></td>";
				
				//echo "<td>".$asset_list['asset_classificatin']."</td>";
				echo "<td><a href='$fileurl' data-toggle='lightbox-image' title='".$asset_list['asset_particulars']."'> <img style='width:20%;' src='$fileurl'></a></td>";
				echo "<td>".$asset_list['asset_article']."</td>";
				//echo "<td>".mdate('%F %d, %Y',strtotime($asset_list['dateacquired']))."</td>";
				echo "<td>".$asset_list['asset_classification']."</td>";
				echo "<td>".$asset_list['equipcount']."</td>";
				
				
			
				echo "<td class='center'> 
					
										
					<button class='btn btn-danger notification' title='Delete User' id='notification' onClick='deleteasset(".$asset_list['assetid'].")' $dis><i class='fa fa-times'></i></button>
				</td>";
				echo "</tr>";
				
				endforeach;
				
				//curl_close($ch);
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


