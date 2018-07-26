<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Country extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
	}
	
	public function statelist() {
		$this->load->model('country_model');
		$data = $this->input->post();
		$result = $this->country_model->statelist($data);
		if(!empty($result) && count($result)>1){
			$_data['status'] = 1;
			$_data['state'] = $result;
		} else {
			$_data['status'] = 0;
			$_data['state'] = '';
		}
		echo json_encode($_data);
	}
	
	public function citylist() {
		$this->load->model('country_model');
		$data = $this->input->post();
		$result = $this->country_model->citylist($data);
		if(!empty($result) && count($result)>1){
			$_data['status'] = 1;
			$_data['city'] = $result;
		} else {
			$_data['status'] = 0;
			$_data['city'] = '';
		}
		echo json_encode($_data);
	}
	
	public function ziplist() {
		$this->load->model('country_model');
		$data = $this->input->post();
		$result = $this->country_model->ziplist($data);
		if(!empty($result) && count($result)>1){
			$_data['status'] = 1;
			$_data['zip'] = $result;
		} else {
			$_data['status'] = 0;
			$_data['zip'] = '';
		}
		echo json_encode($_data);
	}
}
