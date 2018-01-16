<?php

class Panellabels extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('dashboard_model');
		  $this->data = array(
            'title' => 'Projects List',
			'projectclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'reports_issuetypeclass' => ''
			
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$this->load->view('inc/header_view');
		$this->load->view('label/panellabel_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	

	
	
}