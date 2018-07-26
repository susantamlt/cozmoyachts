<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
        $this->lang->load('data');
        $this->load->helper('url');
        $this->load->model('Login_model');
	}

	public function index() {
		$data['info_msg'] = 'Please Login below';
		$data['type'] = 'admin';
		$data['go_to_url'] = '';
		$this->load->view('login/login', $data);
	}

	public function userlogin() {
		$_data = $this->input->post();
		if(!empty($_data)){
			$this->load->model('Login_model');
			$res = $this->Login_model->login($_data);
			if($res['status'] == 'failure') {
				$data['errmsg'] =  'Invalid Login id or Password.';
				$data['status'] = 0;
			} elseif($res['status'] == 'blocked') {
				$data['errmsg'] = 'Your Profile is Blocked.';
				$data['status'] = 0;
			} elseif($res['status'] == 'deleted') {
				$data['errmsg'] = 'Your Profile is Deleted.';
				$data['status'] = 0;
			} else {
				switch($res['user_type']) {
					case 0: $go_to = 'sadmin/dashboard'; break;
					case 1: $go_to = 'admin/dashboard';  break;
					case 2: $go_to = 'users/dashboard'; break;
					default: $go_to = 'sadmin/dashboard'; break; 
				}
				$data['info_msg'] = 'Successfully logged in.';
				$data['status'] = 1;
				$data['go_to'] = $go_to;
			}
		} else {
			$data['errmsg'] =  'Invalid Login id or Password.';
			$data['status'] = 0;
		}
		echo json_encode($data);
	}

	public function register() {
		$data['info_msg'] = 'Please Register below';
		$data['go_to_url'] = '';
		$this->load->view('login/register', $data);
	}

	function user_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['user_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_user_logged_in', 'user_user_id','user_user_name','user_email','user_last_login','user_phone','user_image');
		$go_to = 'users';
		$this->session->unset_userdata($array_items);
		$array_item['user_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function admin_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['admin_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_admin_logged_in', 'admin_user_id','admin_user_name','admin_email','admin_last_login','admin_phone','admin_image');
		$go_to = 'admin';
		$this->session->unset_userdata($array_items);
		$array_item['admin_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	function sadmin_logout(){
		$this->load->model('Login_model');
		$user_id = $_SESSION['sadmin_user_id'];
		$this->Login_model->logout($user_id);
		$array_items = array('is_sadmin_logged_in', 'sadmin_user_id','sadmin_user_name','sadmin_email','sadmin_last_login','sadmin_phone','sadmin_image');
		$go_to = 'sadmin';
		$this->session->unset_userdata($array_items);
		$array_item['sadmin_type'] = '';
		$this->session->set_userdata($array_item);
		redirect($go_to);
	}

	// Check user login status
	function is_user_logged_in() {
		if ($this->session->userdata('is_user_logged_in') == true && $this->session->userdata('user_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_user_logged_in', 'user_user_id','user_user_name','user_email','user_last_login','user_phone','user_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 2;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_admin_logged_in() {
		if ($this->session->userdata('is_admin_logged_in') == true && $this->session->userdata('admin_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_admin_logged_in', 'admin_user_id','admin_user_name','admin_email','admin_last_login','admin_phone','admin_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 1;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}

	function is_sadmin_logged_in() {
		if ($this->session->userdata('is_sadmin_logged_in') == true && $this->session->userdata('sadmin_user_id') != '') {
			return true;
		} else {
			$array_items = array('is_sadmin_logged_in', 'sadmin_user_id','sadmin_user_name','sadmin_email','sadmin_last_login','sadmin_phone','sadmin_image');
			$this->session->unset_userdata($array_items);
			$data['info_msg'] = 'Please Login below';
			$data['type'] = 0;
			$data['go_to_url'] = uri_string();
			$this->load->view('login/login', $data);
			exit();
		}
	}	
}
