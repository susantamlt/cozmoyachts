<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Customers extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->helper('file');
		$this->load->library('upload');
		$this->load->model('customers_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('customer/list');
		$this->load->view('common/admin-bottom');
	}

	public function customers_list() {
		$result = $this->customers_model->get_customers_list();
		$aaData = array();
		foreach($result['aaData'] as $row){
			if($row[1]!=''){
				$row[1]= ucwords($row[1]);
			}
			if($row[2]==''){
				$row[2]= '';
			}
			if($row[3]!=''){
				$row[3]= ucwords($row[3]);
			}
			if($row[4]!=''){
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= date('jS M Y', strtotime($row[6]));
			}
			if($row[7]!=''){
				$row[7]= date('jS M Y', strtotime($row[7]));
			}
			$row[8] = '<a href="'.base_url('admin/customers/customer_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/customers/customer_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function customer_add() {
		$data['ljp_country'] = $this->customers_model->get_ljp_country();
		$data['ljp_website'] = $this->customers_model->get_ljp_website();
		$this->load->view('common/admin-top');
		$this->load->view('customer/customeradd',$data);
		$this->load->view('common/admin-bottom');
	}

	public function customersimport() {
		$data['ljp_website'] = $this->customers_model->get_ljp_website();
		$this->load->view('common/admin-top');
		$this->load->view('customer/customerimport',$data);
		$this->load->view('common/admin-bottom');
	}
	
	public function customersformat() {
		$this->load->helper('download');
		$list[] = array( 'Name','email','phone','phone2','address','country code','birthdate');
		$fp = fopen('php://output', 'w');
		foreach ($list as $fields) {
			fputcsv($fp, $fields);
		}

		$data = file_get_contents('php://output'); 
		$name = 'customersformat.csv';
		// Build the headers to push out the file properly.
		header('Pragma: public');     // required
		header('Expires: 0');         // no cache
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Cache-Control: private',false);
		header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
		header('Content-Transfer-Encoding: binary');
		header('Connection: close');
		exit();
		force_download($name, $data);
		fclose($fp);
	}
	
	public function customersimport_save() {
		$_data = $this->input->post();
		$handle = fopen($_FILES['documentfile']['tmp_name'],"r");
		$i=0;$j=0;$k=0;
		$csv = array();
		while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
			$csv[$k]['user_name']= $data[0];
			$csv[$k]['web_id']= $_data['web_id'];
			$csv[$k]['email']= $data[1];
			$csv[$k]['phone']= $data[2];
			$csv[$k]['phone2']= $data[3];
			$csv[$k]['address']= $data[4];
			$csv[$k]['country_code']= $data[5];
			$csv[$k]['birthdate']= date('Y-m-d',strtotime($data[6]));
			$csv[$k]['type']= '2';
			$csv[$k]['status']= '2';
			$csv[$k]['user_code']= strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(10,100)));
			$time = strtotime(date('y-m-d H:i:s')) + rand(100,999);
			$csv[$k]['activation_key']= strtoupper(md5($time));
			$k++;
		}
		fclose($handle);
		$header = $csv[0];
		unset($csv[0]);
		if(!empty($csv)){	
		 $msg = '';		
			foreach ($csv as $kCsv => $VCsv) {
				$vhbds = $this->validationMethod($VCsv);
				if ($vhbds['status']==0){
					$val3 = $vhbds['msg'];
					$val2 = str_replace('<p>', '', $val3);
					$val1 = str_replace('<\/p>', '', $val2);
					$val = str_replace('\n', ',', $val1);
					$msg = explode(',', $val);
					$j++;
				} else {
					$return = $this->customers_model->customersimport_save($VCsv);
					if($return > 0){
						$i++;
					} else {
						$j++;
					}
				}
			}
		}
		$return = array('status'=>'1','tcount'=>$k-1,'scount'=>$i,'fcount'=>$j,'msg'=>$msg);
		echo json_encode($return);
	}

	public function validationMethod($data='') {
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('user_name', 'Username', 'required|regex_match[/^([a-zA-Z ])+$/i]');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|regex_match[/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/]');
		$this->form_validation->set_rules('phone','Phone','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
		$this->form_validation->set_rules('phone2','Phone2','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
		$this->form_validation->set_rules('address','address','required');
		$this->form_validation->set_rules('country_code','Country Code','required|max_length[2]|regex_match[/^([A-Z])+$/i]');
		//$this->form_validation->set_rules('birthdate','Date of birth','required|regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');		
		if ($this->form_validation->run() == FALSE){
			$_error2 = validation_errors();
			$_error1 = str_replace('</p>','',$_error2);
			$_error = str_replace('<p>','',$_error1);
			return array('status'=>0,'msg'=>$_error);
		} else {
			return array('status'=>1,'msg'=>'');
		}
	}

	public function customer_view($id="") {
		$data['ljp_country'] = $this->customers_model->get_ljp_country();
		$data['ljp_website'] = $this->customers_model->get_ljp_website();
		$data['ljp_Data'] = $this->customers_model->get_ljp_ParticularDataView($id);
		$this->load->view('common/admin-top');
		$this->load->view('customer/customerview',$data);
		$this->load->view('common/admin-bottom');
	}
	public function customer_edit($id="") {
		$data['ljp_country'] = $this->customers_model->get_ljp_country();
		$data['ljp_website'] = $this->customers_model->get_ljp_website();
		$ljp_Data = $this->customers_model->get_ljp_ParticularData($id);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('customer/costomeredit',$data);
		$this->load->view('common/admin-bottom');
	}

	public function customers_save() {
		$data = $this->input->post();
		if(!empty($data)){
			if(isset($_FILES['image']) && !empty($_FILES['image'])){
				$config = array(
					'upload_path' => FCPATH.'assets'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR,
					'allowed_types' => "jpeg|jpg|png|gif",
					'overwrite' => TRUE,
					'encrypt_name' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				);
				$fname = $_FILES['image']['name'];
				$_ext = explode('.',$fname);
				$ext = end($_ext);
				$config['file_name'] = strtotime(date('y-m-d H:i:s')).'.'.$ext;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {
					$_data['status'] = 0;
					$_data['message'] = $this->upload->display_errors();
				} else {
					$redata = $this->upload->data();
					$data['image'] = 'user/'.$redata['file_name'];
				}
			}
			$_dataR = $this->customers_model->customers_save($data);
			if($_dataR==2){
				$_data['status'] = 0;
				$_data['msg'] = 'The data already exits';
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
			$_data['msg'] = 'Failure';
		}
		echo json_encode($_data);
	}
}