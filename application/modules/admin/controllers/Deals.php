<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Deals extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('deals_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('deals/list');
		$this->load->view('common/admin-bottom');
	}

	public function deals_list() {
		$result = $this->deals_model->get_deals_list();
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
				$row[4]= ucwords($row[4].'Pax');
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5].'Ft');
			}
			if($row[6]!=''){
				$row[6]= ucwords($row[6]);
			}
			if($row[7]!=''){
				if($row[7]==1){
					$row[7]= ucwords('Activate');
				} else {
					$row[7]= ucwords('Not Activate');
				}
			}
			if($row[8]!=''){
				$row[8]= date('jS M Y', strtotime($row[8]));
			}
			$row[9] = '<a href="'.base_url('admin/deals/deal_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/deals/deal_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function deal_add() {
		$data['ljp_website'] = $this->deals_model->get_ljp_website();
		$this->load->view('common/admin-top');
		$this->load->view('deals/dealadd',$data);
		$this->load->view('common/admin-bottom');
	}

	public function deals_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$_dataR = $this->deals_model->deals_save($data);
			if($_dataR==2){
				$_data['status'] = 0;
				$_data['msg'] = 'Already exits';
			} else if($_dataR==1){
				$_data['status'] = 1;
				$_data['msg'] = 'Successfully';
			} else if($_dataR==3){
				$_data['status'] = 1;
				$_data['msg'] = 'Update Successfully';
			} else {
				$_data['status'] = 0;
				$_data['msg'] = 'Faillure';
			}
		} else {
			$_data['status'] = 0;
			$_data['msg'] = 'Faillure';
		}
		echo json_encode($_data);
	}
	
	public function deal_view($id="") {
		$ljp_Data = $this->deals_model->get_ljp_ParticularDataView($id);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('deals/dealview',$data);
		$this->load->view('common/admin-bottom');
	}

	public function deal_edit($id="") {
		$data['ljp_website'] = $this->deals_model->get_ljp_website();
		$ljp_Data = $this->deals_model->get_ljp_ParticularDataView($id);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('deals/dealedit',$data);
		$this->load->view('common/admin-bottom');
	}

}