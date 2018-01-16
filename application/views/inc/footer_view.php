        </div>
        <!-- END Page Wrapper -->
		
	  <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?=base_url()?>public/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url()?>public/js/vendor/bootstrap.min.js"></script>
		
		<!-- Load and execute javascript code used only in this page -->
		<script src="<?=base_url()?>public/js/pages/uiTables.js"></script>
		<script>$(function(){ UiTables.init(); });</script>
		

		
        <script src="<?=base_url()?>public/js/plugins.js"></script>
        <script src="<?=base_url()?>public/js/app.js"></script>

		<!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url()?>public/js/pages/readyDashboard.js"></script>
       
		
		<script src="<?=base_url()?>public/js/custom.js"></script>
		
		<script src="<?=base_url()?>public/js/pages/uiWidgets.js"></script>
		<script src="<?=base_url()?>public/js/plugins/dropzone.js"></script>
 
		<!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url()?>public/js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>
 
 
 
       <?php
		if($title=='Dashboard'){
			echo "<script>startwidget();</script>";
			echo " <script>$(function(){ ReadyDashboard.init(); });</script>";
		}
		if($jsfile!=null){
			
			echo "<script src='".base_url()."public/js/$jsfile'></script>";
		}
		?>
		
		<?php
/*Loading of javascript from project_details controller*/
/*if(isset($scripts))
{
    foreach($scripts as $script)
    {
        echo $script;
    }
}*/
?>

    </body>
</html>