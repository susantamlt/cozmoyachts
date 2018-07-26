<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Leads extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('leads_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {
		$this->load->view('common/admin-top');
		$this->load->view('leads/list');
		$this->load->view('common/admin-bottom');
	}

	public function leads_list() {
		$result = $this->leads_model->get_Leads_list();
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
				$row[4]= ucwords($row[4]);
			}
			if($row[5]!=''){
				$row[5]= ucwords($row[5]);
			}
			if($row[6]!=''){
				$row[6]= date('jS M Y', strtotime($row[6]));
			}
			$row[7] = '<a href="'.base_url('admin/leads/leads_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/leads/leads_edit/').$row[0].'" title="Edit Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function leads_add() {
		$data['ljp_package'] = $this->leads_model->get_ljp_package();
		$data['ljp_website'] = $this->leads_model->get_ljp_website();
		$this->load->view('common/admin-top');
		$this->load->view('leads/leadsadd',$data);
		$this->load->view('common/admin-bottom');
	}

	public function leadsimport() {
		$data['ljp_website'] = $this->leads_model->get_ljp_website();
		$this->load->view('common/admin-top');
		$this->load->view('leads/leadsimport',$data);
		$this->load->view('common/admin-bottom');
	}

	public function leads_edit($id="") {
		$data['ljp_package'] = $this->leads_model->get_ljp_package();
		$data['ljp_website'] = $this->leads_model->get_ljp_website();
		$ljp_Data = $this->leads_model->get_ljp_ParticularData($id);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('leads/leadsedit',$data);
		$this->load->view('common/admin-bottom');
	}

	public function leads_view($id="") {
		$data['ljp_Data'] = $this->leads_model->get_ljp_ParticularDataView($id);
		$this->load->view('common/admin-top');
		$this->load->view('leads/leadsview',$data);
		$this->load->view('common/admin-bottom');
	}

	public function leadsimport_save($value='') {
		$_data = $this->input->post();
		$handle = fopen($_FILES['documentfile']['tmp_name'],"r");
		$i=0;$j=0;$k=0;
		$csv = array();
		while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
			$csv[$k]['user_id']= $_data['user_id'];
			$csv[$k]['web_id']= $_data['web_id'];
			$csv[$k]['pak_id']= $this->leads_model->getPackageId($data[6]);
			$csv[$k]['client_name']= $data[0];
			$csv[$k]['primary_phone']= $data[1];
			$csv[$k]['secondarys_phone']= $data[2];
			$csv[$k]['email']= $data[3];
			$csv[$k]['date_of_trip']= date('Y-m-d',strtotime($data[4]));
			$csv[$k]['time_of_trip']= date('H:i:s',strtotime($data[5]));
			$csv[$k]['no_of_pax']= $data[7];
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
					$return = $this->leads_model->leadsimport_save($VCsv);
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

	public function leadsformat($value='') {
		$this->load->helper('download');
		$list[] = array( 'client name','primary phone','secondarys phone','email','date of trip','time of trip','package','no of pax',);
		$fp = fopen('php://output', 'w');
		foreach ($list as $fields) {
			fputcsv($fp, $fields);
		}

		$data = file_get_contents('php://output'); 
		$name = 'leadsformat.csv';
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

	public function validationMethod($data='') {
		$this->load->library('form_validation');
		$this->form_validation->set_data($data);
		$this->form_validation->set_rules('client_name', 'Client Name', 'required|regex_match[/^([a-zA-Z0-9 ])+$/i]');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|regex_match[/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/]');
		$this->form_validation->set_rules('primary_phone','Primary Phone','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
		$this->form_validation->set_rules('secondarys_phone','Secondary Phone','required|min_length[7]|max_length[10]|regex_match[/^([0-9])+$/i]');
		$this->form_validation->set_rules('no_of_pax','No Of Pax','required|regex_match[/^([0-9])+$/i]');
		/*$this->form_validation->set_rules('birthday','Date of birth','required|regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
		$this->form_validation->set_rules('date_of_trip','Date of trip','required|regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
		$this->form_validation->set_rules('time_of_trip','Time of Trip','required|regex_match[/^(2[0-3]|[01]?[0-9]):([0-5]?[0-9]):([0-5]?[0-9])$/]');*/
		if ($this->form_validation->run() == FALSE){
			$val = json_encode(validation_errors()) ;
			$return = array('status'=>'0','msg'=>$val);
			return $return;
		}  else {
			$return = array('status'=>'1');
			return $return;
		}
	}

	public function leads_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$_dataR = $this->leads_model->leads_save($data);
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
}