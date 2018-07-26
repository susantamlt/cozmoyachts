<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Leads extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		modules::run('login/login/is_sales_logged_in');
	}

	public function index() {		
		$this->load->view('common/sales-top');
		$this->load->view('leads/list');
		$this->load->view('common/sales-bottom');
	}

	public function leads_list_m() {
		$this->load->model('leads_model');
		$result = $this->leads_model->get_Leads_listm();
		$leadcat = $this->config->item('ljp_leadcats');
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$ValArray = explode(',', $row[3]);
				$catVal = '';
				foreach ($ValArray as $vk => $vAv) {
					if($catVal!=''){
						$catVal = $catVal.', '.$leadcat[$vAv];
					} else {
						$catVal = $leadcat[$vAv];
					}
				}
				$row[3]= ucwords($catVal);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= ucwords($row[6]);
			}
			if($row[7]!=''){
				$row[7]= ucwords($row[7]);
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('sales/leads/leads_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/leads/leads_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function leads_list_a() {
		$this->load->model('leads_model');
		$result = $this->leads_model->get_Leads_lista();
		$leadcat = $this->config->item('ljp_leadcats');
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]!=''){
				$row[2]= ucwords($row[2]);
			}
			if($row[3]!=''){
				$ValArray = explode(',', $row[3]);
				$catVal = '';
				foreach ($ValArray as $vk => $vAv) {
					if($catVal!=''){
						$catVal = $catVal.', '.$leadcat[$vAv];
					} else {
						$catVal = $leadcat[$vAv];
					}
				}
				$row[3]= ucwords($catVal);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= ucwords($row[6]);
			}
			if($row[7]!=''){
				$row[7]= ucwords($row[7]);
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('sales/leads/leads_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('sales/leads/leads_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function leads_add() {
		$this->load->model('leads_model');
		$data['ljp_leadcat'] = $this->config->item('ljp_leadcats');
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsadd',$data);
		$this->load->view('common/sales-bottom');
	}

	public function leads_edit($id="") {
		$this->load->model('leads_model');
		$data['ljp_leadcat'] = $this->config->item('ljp_leadcats');
		$ljp_Data = $this->leads_model->get_ljp_ParticularData($id);
		$data['ljp_Data'] = $ljp_Data;
		$data['ljp_industry'] = $this->leads_model->get_ljp_industry($ljp_Data[0]['cat_id']);
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsedit',$data);
		$this->load->view('common/sales-bottom');
	}

	public function leads_view($id="") {
		$this->load->model('leads_model');
		$data['ljp_Data'] = $this->leads_model->get_ljp_ParticularDataView($id);
		$this->load->view('common/sales-top');
		$this->load->view('leads/leadsview',$data);
		$this->load->view('common/sales-bottom');
	}

	public function leads_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('leads_model');
			$_data['client_id'] = $this->leads_model->leads_save($data);
			$_data['status'] = 1;
			$_data['msg'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function leads_client_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('leads_model');
			$_data['client_id'] = $this->leads_model->leads_client_save($data);
			$_data['ljp_clients'] = $this->leads_model->get_ljp_clients();
			$_data['status'] = 1;
			$_data['msg'] = 'Successful';
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}

	public function indtype() {
		$data = $this->input->post();
		if(!empty($data)){
			$this->load->model('leads_model');
			$_data['status'] = 1;
			$_data['indtype'] = $this->leads_model->indtype($data);
		} else {
			$_data['status'] = 0;
			$_data['indtype'] = '';
		}
		echo json_encode($_data);
	}
}