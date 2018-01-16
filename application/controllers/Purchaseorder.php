<?php

class Purchaseorder extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('purchaseorder_model');
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Purchases',
			'purchasesclass' => 'active',
			'aprclass' => '',
			'prclass' => '',
			'poclass' => 'active',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
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
			'subnavtitle' => 'Purchase Order',
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
            'jsfile' => 'purchases_po.js'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		//show apr list
		$data['po_list'] = $this->purchaseorder_model->get();
		//$data['apr_list'] = $this->purchaserequest_model->getaprlist();
		//display apr
		$this->load->view('inc/header_view');
		$this->load->view('purchases/po_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['poid'] = $id;
		//$data['apr_list'] = $this->purchaserequest_model->getaprlist();
		//$data['unitofmeasure'] = $this->purchaserequest_model->getunitofmeasure();
		//$data['suppliers'] = $this->purchaserequest_model->getsuppliers();
		
		//get canvas suppliers
		//$data['canvasslist'] = $this->purchaserequest_model->getcanvasslist($id);
		
		$data['pomaindetails'] = $this->purchaseorder_model->getpomaindetails($id);
		//show apr list
		//$data['pr_list_items'] = $this->purchaserequest_model->get_list_items($id);

		$data['poitems'] = $this->purchaseorder_model->getpoitems($id);
		$data['subheader'] = $this->purchaseorder_model->getcustomreport("PO","SUBHEADER");
		$data['posignature'] = $this->purchaseorder_model->getcustomreport("PO","POSIGNATURE");
		$data['footercol1'] = $this->purchaseorder_model->getcustomreport("PO","COLUMN1");
		$data['footercol2'] = $this->purchaseorder_model->getcustomreport("PO","COLUMN2");
		
		//display apr
		$this->load->view('inc/header_view');
		$this->load->view('purchases/podetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function deletepo(){
		$poid = $this->input->post('poid');
		$this->db->delete('purchase_po', array('poid' => $poid));
		$this->db->delete('purchase_po_items', array('poid' => $poid));
		
	}
	
	public function updateunitprice(){
		$poitemsid = $this->input->post('poitemsid');
		$unitprice = $this->input->post('unitprice');
		
		$this->purchaseorder_model->updateunitprice($poitemsid,$unitprice);
	}
	
	public function updatewords(){
		$poid = $this->input->post('poid');
		$amountinwords = $this->input->post('amountinwords');
		
		$this->purchaseorder_model->updatewords($poid,$amountinwords);
	}
	

}