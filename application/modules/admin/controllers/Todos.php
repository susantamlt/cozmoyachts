<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Todos extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('todos_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {
		$this->load->view('common/admin-top');
		$this->load->view('todos/list');
		$this->load->view('common/admin-bottom');
	}
	public function todos_list() {
		$result = $this->todos_model->get_todos_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[4]!=''){
				if($row[4]==0){
					$row[4]= ucwords('Read');
				} else {
					$row[4]= ucwords('Unread');
				}
			}
			if($row[3]!=''){
				$row[3]= date('jS M Y', strtotime($row[3]));
			}
			if($row[2]!=''){
				$row[2]= date('jS M Y', strtotime($row[2]));
			}
			$row[5] = '<a href="'.base_url('admin/todos/todos_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/todos/todos_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}
	public function todos_add() {
		$this->load->view('common/admin-top');
		$this->load->view('todos/todosadd');
		$this->load->view('common/admin-bottom');
	}
	public function todos_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$_dataR = $this->todos_model->todos_save($data);
			if($_dataR==2){
				$_data['status'] = 0;
				$_data['msg'] = ' The data already exits';
			} else if($_dataR==1){
				$_data['status'] = 1;
				$_data['msg'] = 'The data successfully insert';
			} else if($_dataR==3){
				$_data['status'] = 1;
				$_data['msg'] = 'The data update Successfully';
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

	public function todos_view($id="") {
		$data['ljp_Data'] = $this->todos_model->get_ljp_ParticularData($id);
		$this->load->view('common/admin-top');
		$this->load->view('todos/todosview',$data);
		$this->load->view('common/admin-bottom');
	}

	public function todos_edit($id="") {
		$ljp_Data = $this->todos_model->get_ljp_ParticularData($id);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('todos/todosedit',$data);
		$this->load->view('common/admin-bottom');
	}

	public function notification() {
		$data = $this->input->post();
		if(!empty($data)){
			$_datas= $this->todos_model->notification($data);
			if(!empty($_datas)){
				foreach ($_datas as $dk => $_data) {
					$_datas[$dk]['notification_date'] = date('jS M Y', strtotime($_data['notification_date']));
					$_datas[$dk]['todo_time'] = date('h:i a', strtotime($_data['todo_time']));
				}
				$return = array('status'=>'1','datas'=>$_datas);
			} else {
				$return = array('status'=>'0','datas'=>'');
			}
		} else {
			$return = array('status'=>'0','datas'=>'');
		}
		echo json_encode($return);
	}


	public function view_edit($id=""){
		$data['ljp_Data'] = $this->todos_model->get_ljp_ParticularData_notification($id);
		$this->load->view('common/admin-top');
		$this->load->view('todos/todosview',$data);
		$this->load->view('common/admin-bottom');
	}
}