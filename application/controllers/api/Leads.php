<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Leads extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('api/leads_model','leads');
	}

	public function lists() {
		$_hData = apache_request_headers();
		$_data['status']='true';
		if(isset($_hData['x-api-key']) && $_hData['x-api-key'] !=''){
			$apikey = $this->leads->authonticationKey($_hData['x-api-key']);
			if($apikey > 0){
				$result = $this->leads->listLeads($apikey);
				if(!empty($result)){
					$_data['status']='true';
					$_data['yachts']=$result;
				} else {
					$_data['status']='false';
					$_data['msg']='No packages available';
				}
			} else {
				$_data['status']='false';
				$_data['msg']='Wrong authontication key';
			}
		} else {
			$_data['status']='false';
			$_data['msg']='Authontication key missing';
		}
		echo json_encode($_data);
	}

	public function view() {
		$_hData = apache_request_headers();
		$_data['status']='true';
		if(isset($_hData['x-api-key']) && $_hData['x-api-key'] !=''){
			$apikey = $this->leads->authonticationKey($_hData['x-api-key']);
			if($apikey > 0){
				$data = $this->input->post();
				if(!isset($data['pak_id'])){$data['pak_id']='';}
				$this->load->library('form_validation');
				$this->form_validation->set_data($data);
				$this->form_validation->set_rules('pak_id', 'Package Id', 'required');
				if ($this->form_validation->run() == FALSE){
					$_data['status']='false';
					$_error2 = validation_errors();
					$_error1 = str_replace('</p>','',$_error2);
					$_error = str_replace('<p>','',$_error1);
					$_data['msg']=$_error;
				} else {
					$result = $this->leads->viewLeads($data['pak_id']);
					if(!empty($result)){
						$_data['status']='true';
						$_data['yachts']=$result[0];
					} else {
						$_data['status']='false';
						$_data['msg']='No packages details available';
					}
				}
			} else {
				$_data['status']='false';
				$_data['msg']='Wrong authontication key';
			}
		} else {
			$_data['status']='false';
			$_data['msg']='Authontication key missing';
		}
		echo json_encode($_data);
	}
}
