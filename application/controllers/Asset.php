<?php

class Asset extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('asset_model');
		$this->load->model('receivingassets_model');
		$this->load->model('settings_model');
		$this->load->model('employees_model');
		$this->load->helper('date');
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->helper(array('form', 'url'));
		//view module
		 $this->data = array(
            'title' => 'Asset Management',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => 'active',
			'recevingassetsclass' => '',
			'assetclass' => 'active',
			'propertyclass' => '',
			'supplymanagementclass' => '',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Asset',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'assetmanagement_asset.js'
			);
	}
	
	public function index()
	{
		
		header('Location: asset/filter/all');
		
	}
	public function filter($filter)
	{
		$data = $this->data;
		
		$js = $this->js;

		//echo $filter;
		$filter_value = urldecode($filter);
		$data['assetlist'] = $this->asset_model->getassetlist($filter_value);
		$data['article'] = $this->settings_model->articlelist();
		$data['classification'] = $this->settings_model->classificationlist();
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/asset_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['assetid'] = $id;
		
		$base = base_url();
		$fileurl = $base."uploads/".$id.".jpg";
		 $ch = curl_init($fileurl);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code == 404){
            $data['status'] = "no";
			$data['fileurl'] = "";
        }else{
            $data['status'] = "yes";
			$data['fileurl'] = $fileurl;
        }
        curl_close($ch);

		$data['unitofmeasure'] = $this->receivingassets_model->unitofmeasure();
		$data['assetdetails'] = $this->asset_model->getassetdetails($id);
		$data['article'] = $this->settings_model->articlelist();
		$data['classification'] = $this->settings_model->classificationlist();
		$data['equipments'] = $this->asset_model->getequipment($id);
		$data['supplierlist'] = $this->asset_model->getsupplierlist();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		//print_r($data['supplierlist']);
		//display asset
		$data['subnavtitle'] =$data['assetdetails']['asset_particulars'];
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/assetdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	
	public function saveasset(){
		
		$particulars = $this->input->post('particulars');
		$article = $this->input->post('article');
		$classification = $this->input->post('classification');

		$this->asset_model->addasset($particulars,$article,$classification);
		
		
	}
	public function deleteasset(){
		$assetid = $this->input->post('assetid');
		$this->db->delete('assets', array('assetid' => $assetid));
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}
	public function deleteequip(){
		$equipno = $this->input->post('equipno');
		
		
		//update status receiving asset
		
		$this->asset_model->updatereceiving($equipno );
		
		//delete
		$this->db->delete('equipments', array('equipNo' => $equipno));
		$this->db->delete('equipments_details', array('equipNo' => $equipno));
		
		
		
		
		//get all equipments with the assetid and delete equipmentsdetails
		//$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}
	
	
	
	
	public function getesinglequipment($equipno){
		
		$equipment = $this->asset_model->getsingleequipment($equipno);

		echo json_encode($equipment);
	}
	
	
	public function updateproperty(){
		
		$equipno = $this->input->post('equipno');
		$propertyno = $this->input->post('propertyno');
		$particulars = $this->input->post('particulars');
		$dateacquired = $this->input->post('dateacquired');
		$unitprice = $this->input->post('unitprice');
		$accountcode = $this->input->post('accountcode');
		$barcode = $this->input->post('barcode');
		$service = $this->input->post('service');
		$supplierid = $this->input->post('supplierid');
		$inventorytag = $this->input->post('inventorytag');

		$this->asset_model->updateproperty($equipno,$propertyno,$particulars,$dateacquired,$unitprice,$accountcode,$barcode,$service,$supplierid,$inventorytag);
		
		
	}
	public function updateusertab(){
		
		$equipno = $this->input->post('equipno');
		$issuedto = $this->input->post('issuedto');
		$enduser = $this->input->post('enduser');
		

		$this->asset_model->updateusertab($equipno,$issuedto,$enduser);
		
		
	}
	public function updateremarks(){
		
		$equipno = $this->input->post('equipno');
		$whereabout = $this->input->post('whereabout');
		$remarks = $this->input->post('remarks');
		

		$this->asset_model->updateremarks($equipno,$whereabout,$remarks);
		
		
	}
	public function updatepheriperal(){
		
		$equipno = $this->input->post('equipno');
		$processor = $this->input->post('processor');
		$ram = $this->input->post('ram');
		$harddisk = $this->input->post('harddisk');
		$operatingsystem = $this->input->post('operatingsystem');
		$equipmentsn = $this->input->post('equipmentsn');
		$processorsn = $this->input->post('processorsn');
		$monitorsn = $this->input->post('monitorsn');
		$keyboardsn = $this->input->post('keyboardsn');
		$mousesn = $this->input->post('mousesn');
		

		$this->asset_model->updatepheriperal($equipno,$processor,$ram,$harddisk,$operatingsystem,$equipmentsn,$processorsn,$monitorsn,$keyboardsn,$mousesn);
		
		
	}
	
	public function do_upload() { 
		 $fileid = $this->input->post('fileid');
		 //$newfilename = $fileid."jpg";
         $config['upload_path']   = './uploads/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
         $config['max_size']      = 5000; 
         $config['max_width']     = 4000; 
         $config['max_height']    = 4000;  
         $config['overwrite']    = true;  
         $config['file_name']    = $fileid.".jpg";  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('assetimage')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
         }
			
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            //$this->load->view('upload_success', $data); 
			header('Location:details/'.$fileid);
         } 
      }  
	public function updategroupasset(){
		
		$assetid = $this->input->post('assetid');
		$particulars = $this->input->post('particulars');
		$articlename = $this->input->post('articlename');
		$classification = $this->input->post('classification');
		$asset_unit = $this->input->post('asset_unit');
		

		$this->asset_model->updategroupasset($assetid,$particulars,$articlename,$classification,$asset_unit);
		
		
	}

}