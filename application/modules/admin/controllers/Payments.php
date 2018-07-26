<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('payment/list');
		$this->load->view('common/admin-bottom');
	}

	public function payments_list() {
		$this->load->model('payments_model');
		$result = $this->payments_model->get_payments_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$row[3]= ucwords($row[3]);
			}
			if($row[4]!=''){
				$row[4]= ucwords('User');
			}
			if($row[5]!=''){
				if($row[5]==1){
					$row[5]= ucwords('Activate');
				} else {
					$row[5]= ucwords('Not Activate');
				}
			}
			if($row[6]!=''){
				$row[6]= '<img src="'.config_item('assets_dir').'users/'.$row[6].'" alt="'.$row[1].'" width="50" />';
			}
			if($row[7]!=''){
				$row[7]= date('jS M Y', strtotime($row[7]));
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('admin/payments/payment_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/payments/payment_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function payments_add() {
		$this->load->view('common/admin-top');
		$this->load->view('payments/list');
		$this->load->view('common/admin-bottom');
	}
}