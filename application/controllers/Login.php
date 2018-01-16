<?php

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->session;
	}
	
	public function index()
	{
		$uid = $this->session->userdata('uid');
		if ($uid !=''){
			header('Location:home');
		}else{
			$this->load->view('login/login_view');
		}
		

		
	}
	
	public function verify(){

		$username = $this->input->post('username');	
		$loginpassword = $this->input->post('login-password');	
		//$result = $this->db->get('contacts');
		//echo "SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')";
		
		$noofuser = $this->db->query("SELECT count(*) as noofuser FROM users WHERE username='$username' AND password =md5('$loginpassword')");
		$usercount = $noofuser->result_array();
		$count = $usercount[0]['noofuser'];
		
		
		if($count ==0){
			header('Location:../login');
		}else{
			
			$userinfo = $this->db->query("SELECT * FROM users WHERE username=".$this->db->escape($username)." AND password =md5(".$this->db->escape($loginpassword).")");
			$info = $userinfo->result_array();
			//$_SESSION['username'] = $info[0]['username'];
			//$_SESSION['userid'] = $info[0]['uid'];
			//$_SESSION['name'] = $info[0]['name'];
			
			$this->session->set_userdata('username', $info[0]['username']);
			$this->session->set_userdata('name', $info[0]['name']);
			$this->session->set_userdata('uid', $info[0]['uid']);
			$this->session->set_userdata('usertype', $info[0]['usertype']);
			$this->session->set_userdata('linkeid', $info[0]['linkeid']);
			//echo $this->session->userdata('name');
			header('Location:../home');
		}
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	public function logout(){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		//echo $two;
		$this->session->sess_destroy();
		header('Location:../login');
	}
	
	
}