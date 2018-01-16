<?php

class Requisition extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('requisition_model');
		$this->load->model('employees_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Supply Management',
			'purchasesclass' => '',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => 'active',
			'settingsclass' => '',
			'requisitionclass' => 'active',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Item List',
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
            'jsfile' => 'supply_requisition.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		
		
		$data['requisitionlist'] = $this->requisition_model->getrequisitionlist();
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$data['warehouselist'] = $this->requisition_model->getwarehouse();

		//print_r($data['employeeslist']);
		
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/requisition_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['reqid'] = $id;

		$data['reqdetails'] = $this->requisition_model->requisitiondetails($id);
		$requisition_no =$data['reqdetails']['requisition_no'];
		$requisition_warehouseid = $data['reqdetails']['warehouseid'];
		$data['warehouselist'] = $this->requisition_model->getwarehouse();
		$data['itemlist'] = $this->requisition_model->getitemlist($requisition_warehouseid);
		$data['reqitems'] = $this->requisition_model->getreqitems($requisition_no);
		$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/requisitiondetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function saverequisition(){
		$rdate = $this->input->post('rdate');
		$rno = $this->input->post('rno');
		$requester_id = $this->input->post('requester_id');
		$purpose = $this->input->post('purpose');
		$warehouseid = $this->input->post('warehouseid');
		$this->requisition_model->savereq($rdate,$rno,$requester_id,$purpose,$warehouseid);
	}
	
	public function updatequisitiondetails(){
		$rdate = $this->input->post('rdate');
		$rno = $this->input->post('rno');
		$requester_id = $this->input->post('requester_id');
		$purpose = $this->input->post('purpose');
		$status = $this->input->post('status');
		$reqid = $this->input->post('reqid');
		$warehouseid = $this->input->post('warehouseid');
		$this->requisition_model->updatereq($rdate,$requester_id,$purpose,$status,$reqid,$warehouseid);
	}

	public function additemreq(){
		
		$itemid = $this->input->post('itemid');
		$itemqty = $this->input->post('itemqty');
		$itemunit = $this->input->post('itemunit');
		$requisition_no = $this->input->post('requisition_no');
		$reqid = $this->input->post('reqid');
		
		$this->requisition_model->additemreq($requisition_no,$itemid,$itemunit,$itemqty,$reqid);
	}
	
	public function deletereqitem(){
		$reqitem = $this->input->post('reqitem');
		$sql = "DELETE from requisition_items where reqitemsid='".$reqitem."'";
		$this->db->query($sql);
		
	}
	public function deleterequisition(){
		$reqid = $this->input->post('reqid');
		//$reqno = $this->input->post('reqno');
		$this->db->delete('requisition_details', array('reqid' => $reqid));
		$this->db->delete('requisition_items', array('reqid' => $reqid));
		
		
		//$this->db->delete('requisition_items', array('reqitemsid' => $reqitem));
		//$sql = "DELETE from requisition_items where reqitemsid='".$reqitem."'";
		//$this->db->query($sql);
		
	}
	
	public function showitemunit(){
		
		$itemid = $this->input->post('itemid');
		$item_unit = $this->requisition_model->showitemunit($itemid);
		
		echo json_encode($item_unit);
	}

	public function updateinventory(){
		
		$reqid = $this->input->post('reqid');
		$this->requisition_model->updateinventory($reqid);
		
		
	}

	

}