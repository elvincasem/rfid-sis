<?php

class Adjustment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('adjustment_model');
		$this->load->model('items_model');
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
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Adjustment List',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => 'active',
			'customizereportclass' => '',
			'warehouseclass' => ''
			
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'supply_adjustment.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		
		
		$data['adjustmentlist'] = $this->adjustment_model->getadjustment();
		//print_r($data['adjustmentlist']);
		//$data['employeeslist'] = $this->employees_model->getemployeeslist();
		$data['warehouselist'] = $this->adjustment_model->getwarehouse();

		//print_r($data['employeeslist']);
		
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/adjustment_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['adjustmentid'] = $id;

		$data['adjustmentdetails'] = $this->adjustment_model->adjustmentdetails($id);
		//$requisition_no =$data['reqdetails']['requisition_no'];
		$adj_warehouseid = $data['adjustmentdetails']['warehouseid'];
		$data['warehouselist'] = $this->adjustment_model->getwarehouse();
		$data['itemlist'] = $this->adjustment_model->getitemlist($adj_warehouseid);
		$data['adjitems'] = $this->adjustment_model->getadjitems($id);
		/*$data['employeeslist'] = $this->employees_model->getemployeeslist();
		*/
		$this->load->view('inc/header_view');
		$this->load->view('supplymanagement/adjustmentdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function saveadjustment(){
		$purpose = $this->input->post('purpose');
		$warehouseid = $this->input->post('warehouseid');
		
		$this->adjustment_model->saveadj($purpose,$warehouseid);
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

	public function additemadj(){
		
		$itemid = $this->input->post('itemid');
		$itemqty = $this->input->post('adjustmentqty');
		$itemunit = $this->input->post('itemunit');
		$adjfunction = $this->input->post('adjfunction');
		$adjustmentid = $this->input->post('adjustmentid');
		
		$this->adjustment_model->additemadj($adjustmentid,$itemid,$itemunit,$itemqty,$adjfunction);
	}
	
	public function deleteadjitem(){
		$adjustmentitemsid = $this->input->post('adjustmentitemsid');
		$this->db->delete('adjustment_items', array('adjustmentitemsid' => $adjustmentitemsid));
		//$sql = "DELETE from adjustment_items where adjustmentitemsid='".$adjustmentitemsid."'";
		//echo $sql;
		//$this->db->query($sql);
		
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
		$item_unit = $this->adjustment_model->showitemunit($itemid);
		
		echo json_encode($item_unit);
	}

	public function updateinventory(){
		
		$adjustmentid = $this->input->post('adjustmentid');
		$this->adjustment_model->updateinventory($adjustmentid);
		
		
	}

	

}