<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('api/packages_model','packages');
	}

	public function create() {
		$_hData = apache_request_headers();
		$_data['status']='true';
		if(isset($_hData['x-api-key']) && $_hData['x-api-key'] !=''){
			$apikey = $this->packages->authonticationKey($_hData['x-api-key']);
			if($apikey > 0){
				$data = $this->input->post();
				if(!isset($data['package_name'])){$data['package_name']='';}
				if(!isset($data['water_sports'])){$data['water_sports']='';}
				if(!isset($data['inclusion'])){$data['inclusion']='';}
				if(!isset($data['yacht_details'])){$data['yacht_details']='';}
				if(!isset($data['date'])){$data['date']='';}
				$this->load->library('form_validation');
				$this->form_validation->set_data($data);
				$this->form_validation->set_rules('package_name', 'Package Name', 'required|regex_match[/^([a-zA-Z ])+$/i]');
				$this->form_validation->set_rules('water_sports','Water Sports','required');
				$this->form_validation->set_rules('inclusion','Inclusion','required');
				$this->form_validation->set_rules('yacht_details','Yacht Details','required');
				$this->form_validation->set_rules('date','Date of Bith','required');
				if ($this->form_validation->run() == FALSE){
					$_data['status']='false';
					$_error2 = validation_errors();
					$_error1 = str_replace('</p>','',$_error2);
					$_error = str_replace('<p>','',$_error1);
					$_data['msg']=$_error;
				}
				$watersports = $this->packages->waterSports($data['water_sports']);
				$inclusion = $this->packages->inclusion($data['inclusion']);
				$nData = array('web_id'=>$apikey,'package_name'=>$data['package_name'],'water_sports'=>implode(',', $watersports),'inclusion'=>implode(',', $inclusion),'yacht_details'=>$data['yacht_details'],'date'=>$data['date'],'pak_status'=>'1');
				if(isset($data['fb'])){
					$nData['fb'] = $data['fb'];
				}
				if(isset($data['insta'])){
					$nData['insta'] = $data['insta'];
				}
				if($nData['date'] !=''){
					$format = array('Y-m-d','Y/m/d','Y m d','m/d/Y','m-d-Y','m d Y','d-m-Y','d/m/Y','d m Y');
					$validBirthDate = $this->packages->validateDateTime($nData['date'],$format);
					if($validBirthDate['status'] > 0){
						$_format1 = str_replace(array("-","/"," "),'-',$validBirthDate['format']);
						$_format = explode('-',$_format1);
						$_date1 = str_replace(array("-","/"," "),'-',$validBirthDate['date']);
						$_date = explode('-',$_date1);
						$day='';
						$month='';
						$Year='';
						if($_format[0]=='m'){$month = $_date[0];} else if($_format[0]=='Y'){$Year = $_date[0];} else {$day = $_date[0];}
						if($_format[1]=='d'){$day = $_date[1];} else if($_format[1]=='Y'){$Year = $_date[1];} else {$month = $_date[1];}
						if($_format[2]=='m'){$month = $_date[2];} else if($_format[2]=='d'){$day = $_date[2];} else {$Year = $_date[2];}
						$nData['date'] = $day.'-'.$month.'-'.$Year;
					} else {
						$_data['status']='false';
						$_data['msg'].='Date of birth not valid or valid format (Y-m-d)';
					}
				}
				if($_data['status']=='true'){
					$result = $this->packages->savePackages($nData);
					if($result > 1){
						$_data['status']='false';
						$_data['msg']='Package already exist';
					} else if($result > 0 && $result <= 1){
						$_data['status']='true';
						$_data['msg']='User Package successfully';
					} else {
						$_data['status']='false';
						$_data['msg']='failure';
					}
				}
			} else {
				$_data['status']='false';
				$_data['msg']='Wrong authontication key ';
			}
		} else {
			$_data['status']='false';
			$_data['msg']='Authontication key missing';
		}
		echo json_encode($_data);
	}

	public function lists() {
		$_hData = apache_request_headers();
		$_data['status']='true';
		if(isset($_hData['x-api-key']) && $_hData['x-api-key'] !=''){
			$apikey = $this->packages->authonticationKey($_hData['x-api-key']);
			if($apikey > 0){
				$result = $this->packages->listPackages($apikey);
				if(!empty($result)){
					$_data['status']='true';
					$_data['packages']=$result;
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
			$apikey = $this->packages->authonticationKey($_hData['x-api-key']);
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
					$result = $this->packages->viewPackages($data['pak_id']);
					if(!empty($result)){
						$_data['status']='true';
						$_data['packages']=$result[0];
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
