<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('api/customers_model','customers');
	}

	public function create() {
		$_hData = apache_request_headers();
		$_data['status']='true';
		if(isset($_hData['x-api-key']) && $_hData['x-api-key'] !=''){
			$apikey = $this->customers->authonticationKey($_hData['x-api-key']);
			if($apikey > 0){
				$data = $this->input->post();
				if(!isset($data['user_name'])){$data['user_name']='';}
				if(!isset($data['email'])){$data['email']='';}
				if(!isset($data['password'])){$data['password']='';}
				if(!isset($data['phone'])){$data['phone']='';}
				if(!isset($data['phone2'])){$data['phone2']='';}
				if(!isset($data['address'])){$data['address']='';}
				if(!isset($data['country_code'])){$data['country_code']='';}
				if(!isset($data['birthdate'])){$data['birthdate']='';}
				$this->load->library('form_validation');
				$this->form_validation->set_data($data);
				$this->form_validation->set_rules('user_name', 'Username', 'required|regex_match[/^([a-zA-Z ])+$/i]');
				$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|regex_match[/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/]');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
				$this->form_validation->set_rules('phone','Phone','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
				$this->form_validation->set_rules('phone2','Phone2','min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
				$this->form_validation->set_rules('address','address','required');
				$this->form_validation->set_rules('country_code','Country Code','required|max_length[2]|regex_match[/^([A-Z])+$/i]');
				$this->form_validation->set_rules('birthdate','Date of Bith','required');
				if ($this->form_validation->run() == FALSE){
					$_data['status']='false';
					$_error2 = validation_errors();
					$_error1 = str_replace('</p>','',$_error2);
					$_error = str_replace('<p>','',$_error1);
					$_data['msg']=$_error;
				}
				$nData = array('web_id'=>$apikey,'user_name'=>$data['user_name'],'email'=>$data['email'],'password'=>$data['password'],'phone'=>$data['phone'],'address'=>$data['address'],'country_code'=>$data['country_code'],'birthdate'=>$data['birthdate'],'image'=>'user/user.png','type'=>'2');
				if(isset($data['phone2'])){
					$nData['phone2'] = $data['phone2'];
				}
				if($nData['birthdate'] !=''){
					$format = array('Y-m-d','Y/m/d','Y m d','m/d/Y','m-d-Y','m d Y','d-m-Y','d/m/Y','d m Y');
					$validBirthDate = $this->customers->validateDateTime($nData['birthdate'],$format);
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
						$nData['birthdate'] = $day.'-'.$month.'-'.$Year;
					} else {
						$_data['status']='false';
						$_data['msg'].='Date of birth not valid or valid format (Y-m-d)';
					}
				}

				if($_data['status']=='true'){
					$result = $this->customers->saveCustomer($nData);
					if($result > 1){
						$_data['status']='false';
						$_data['msg']='User already exist';
					} else if($result > 0 && $result <= 1){
						$_data['status']='true';
						$_data['msg']='User create successfully';
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
}
