<?php

class Receivingassets extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		//$this->load->model('asset_model');
		$this->load->model('settings_model');
		$this->load->model('receivingassets_model');
		$this->load->helper('date');
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
			'recevingassetsclass' => 'active',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => '',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Receiving Asset',
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
            'jsfile' => 'purchases_rr_assets.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		$data['rr_list'] = $this->receivingassets_model->get();
		$data['aprlist'] = $this->receivingassets_model->getaprlist();
		$data['polist'] = $this->receivingassets_model->getpolist();
		$data['supplierlist'] = $this->receivingassets_model->getsupplierlist();

		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/receivingassets_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		
		$data['deliveryid'] = $id;
		
		$data['aprlist'] = $this->receivingassets_model->getaprlist();
		$data['polist'] = $this->receivingassets_model->getpolist();
		$data['supplierlist'] = $this->receivingassets_model->getsupplierlist();

		$data['dr_asset_list_items'] = $this->receivingassets_model->get_list_asset($id);
		
		$data['deliverydetails'] = $this->receivingassets_model->getdeliverydetails($id);
		
		$data['assetlist'] = $this->receivingassets_model->getassetlist();
		$data['unitofmeasure'] = $this->receivingassets_model->unitofmeasure();
		
		$data['article'] = $this->settings_model->articlelist();
		$data['classification'] = $this->settings_model->classificationlist();
		$data['receivingcol1'] = $this->receivingassets_model->getcustomreport("RECEIVING","COLUMN1");
		$data['receivingcol2'] = $this->receivingassets_model->getcustomreport("RECEIVING","COLUMN2");
		//print_r($data['dr_asset_list_items']);
		//display delivery
		$this->load->view('inc/header_view');
		$this->load->view('assetmanagement/receivingassetsdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function deletedelivery(){
		$deliveryid = $this->input->post('deliveryid');
		$this->db->delete('equipments_receiving', array('deliveryid' => $deliveryid));
		$this->db->delete('equipments_receiving', array('deliveryid' => $deliveryid));
		
	}
	
	public function updateunitprice(){
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$unitprice = $this->input->post('unitprice');
		
		$this->receiving_model->updateunitprice($deliveryitemsid,$unitprice);
	}
	
	public function getitemlist(){
		
		$items = $this->receiving_model->getitemlist();
		$tokens = array();
		foreach($items as $items_array){
			$tokens[] = $items_array['itemNo'] . "-". $items_array['description'];
		}
		echo json_encode($tokens);

	}
	
	public function getitemunit(){
		$itemid = $this->input->post('itemid');
				
		$rows = $this->receiving_model->getitemunitlist($itemid);
		$conversioncount = $this->receiving_model->checkconvertion($itemid);
		//echo $conversioncount;
		if($conversioncount>0){
			$conversionunits = $this->receiving_model->conversionunit($itemid);
			//$sqlselect2 = "SELECT equiv_unit,base_qty,base_unit FROM items_buom where itemNo=$itemid";
			//$stmt2 = $conn->prepare($sqlselect2);
			//$stmt2->execute();
			//$additional = $stmt2->fetchAll(PDO::FETCH_ASSOC);
			
			//$conn = null;
			$merge = array_merge($rows, $conversionunits); 
			echo json_encode($merge);
		}
		else{
			echo json_encode($rows);
			//print_r($rows[0]);
			//echo json_encode($rows);
			//echo $sqlselect;
			//$conn = null;
		}

		
	}
	
	
	public function addassetreceived(){
		
		$deliveryid = $this->input->post('deliveryid');
		$assetid = $this->input->post('assetid');
		$itemunit = $this->input->post('itemunit');
		$itemqty = $this->input->post('itemqty');
		//$article = $this->input->post('article');
		$unitprice = $this->input->post('unitprice');
		//$classification = $this->input->post('classification');
		//$particulars = $this->input->post('particulars');
		
		
		$this->receivingassets_model->additem($deliveryid,$assetid,$itemunit,$itemqty,$unitprice);
		
		
	}
	
	public function deletedritem(){
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$this->db->delete('equipments_receiving_items', array('deliveryitemsid' => $deliveryitemsid));
		
		
		
	}
	
	public function savedelivery(){
		
		$receiveddate = $this->input->post('receiveddate');
		$drno = $this->input->post('drno');
		$aprid = $this->input->post('aprid');
		$poid = $this->input->post('poid');
		$supplierid = $this->input->post('supplierid');
		$invoiceno = $this->input->post('invoiceno');
				
		
		$this->receivingassets_model->adddelivery($receiveddate,$drno,$aprid,$poid,$supplierid,$invoiceno);
		
		
	}
	public function updatedelivery(){
		
		$receivedate = $this->input->post('receiveddate');
		$drno = $this->input->post('drno');
		$aprid = $this->input->post('aprid');
		$poid = $this->input->post('poid');
		$supplierid = $this->input->post('supplierid');
		$deliveryid = $this->input->post('deliveryid');
		$status = $this->input->post('status');
		$invoiceno = $this->input->post('invoiceno');

		$this->receivingassets_model->updatedelivery($receivedate,$drno,$aprid,$poid,$supplierid,$deliveryid,$status,$invoiceno);

		
	}
	
	public function addtoasset(){
		
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		
		$this->receivingassets_model->addtoasset($deliveryitemsid);
	}
	public function addtoassetbarcode(){
		
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$prefix = $this->input->post('prefix');
		$barcode_from = $this->input->post('barcode_from');
		$barcode_to = $this->input->post('barcode_to');
		$whereabout = $this->input->post('whereabout');
		
		$this->receivingassets_model->addtoassetbarcode($deliveryitemsid,$prefix,$barcode_from,$barcode_to,$whereabout);
	}
	

}