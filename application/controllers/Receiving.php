<?php

class Receiving extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('receiving_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Purchases',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => 'active',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => 'active',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Receiving',
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
            'jsfile' => 'purchases_rr.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;

		$data['rr_list'] = $this->receiving_model->get();
		$data['aprlist'] = $this->receiving_model->getaprlist();
		$data['polist'] = $this->receiving_model->getpolist();
		$data['prlist'] = $this->receiving_model->getprlist();
		$data['supplierlist'] = $this->receiving_model->getsupplierlist();
		$data['warehouselist'] = $this->receiving_model->getwarehouselist();

		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/rr_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['deliveryid'] = $id;
		$data['aprlist'] = $this->receiving_model->getaprlist();
		$data['polist'] = $this->receiving_model->getpolist();
		$data['prlist'] = $this->receiving_model->getprlist();
		$data['supplierlist'] = $this->receiving_model->getsupplierlist();
		
		

		$data['dr_list_items'] = $this->receiving_model->get_list_items($id);
		$data['deliverydetails'] = $this->receiving_model->getdeliverydetails($id);
		$data['warehouselist'] = $this->receiving_model->getwarehouselist();
		$warehouseid_current = $data['deliverydetails']['warehouseid'];
		$data['wh_itemlist'] = $this->receiving_model->getitemlist($warehouseid_current);
		
		//display delivery
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/rrdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function deletedelivery(){
		$deliveryid = $this->input->post('deliveryid');
		$this->db->delete('purchase_receiving', array('deliveryid' => $deliveryid));
		$this->db->delete('purchase_receiving_items', array('deliveryid' => $deliveryid));
		
	}
	
	public function updateunitprice(){
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$unitprice = $this->input->post('unitprice');
		
		$this->receiving_model->updateunitprice($deliveryitemsid,$unitprice);
	}
	
	public function getitemlist($warehouseid){
		
		$items = $this->receiving_model->getitemlist($warehouseid);
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
	public function getitemprice(){
		
		$itemid = $this->input->post('itemid');
		if($itemid==0){
			echo "NONE";
		}else{
			$unitcost = $this->receiving_model->getitempricelist($itemid);
			echo $unitcost;
		}
		
		
	}
	
	
	public function additemreceived(){
		
		$deliveryid = $this->input->post('deliveryid');
		$drno = $this->input->post('drno');
		$itemid = $this->input->post('itemid');
		$itemqty = $this->input->post('itemqty');
		$itemunit = $this->input->post('itemunit');
		$unitcost = $this->input->post('unitcost');
		$warehouseid = $this->input->post('warehouseid');
		
		
		$this->receiving_model->additem($deliveryid,$drno,$itemid,$itemqty,$itemunit,$unitcost,$warehouseid);
		
		
	}
	
	public function deletedritem(){
		$deliveryitemsid = $this->input->post('deliveryitemsid');
		$this->db->delete('purchase_receiving_items', array('deliveryitemsid' => $deliveryitemsid));
		
		
		
	}
	
	public function savedelivery(){
		
		$receiveddate = $this->input->post('receiveddate');
		$drno = $this->input->post('drno');
		$aprid = $this->input->post('aprid');
		$poid = $this->input->post('poid');
		$prid = $this->input->post('prid');
		$supplierid = $this->input->post('supplierid');
		$invoiceno = $this->input->post('invoiceno');
		$warehouseid = $this->input->post('warehouseid');
				
		
		$this->receiving_model->adddelivery($receiveddate,$drno,$aprid,$poid,$supplierid,$invoiceno,$warehouseid,$prid);
		
		
	}
	public function updatedelivery(){
		
		$receivedate = $this->input->post('receiveddate');
		$drno = $this->input->post('drno');
		$aprid = $this->input->post('aprid');
		$poid = $this->input->post('poid');
		$prid = $this->input->post('prid');
		$supplierid = $this->input->post('supplierid');
		$deliveryid = $this->input->post('deliveryid');
		$status = $this->input->post('status');
		$invoiceno = $this->input->post('invoiceno');
		$warehouseid = $this->input->post('warehouseid');
		$purpose = $this->input->post('purpose');

		$this->receiving_model->updatedelivery($receivedate,$drno,$aprid,$poid,$supplierid,$deliveryid,$status,$invoiceno,$warehouseid,$purpose,$prid);

		
	}
	
	public function updatedeliveryinventory(){
		$deliveryid = $this->input->post('deliveryid');

		$this->receiving_model->updatedeliveryinventory($deliveryid);
	}
	

}