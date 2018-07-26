<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Packages extends MX_Controller 
{
	public function __construct(){
		parent::__construct();
		$this->lang->load('data');
		$this->load->model('packages_model');
		modules::run('login/login/is_admin_logged_in');
	}

	public function index() {		
		$this->load->view('common/admin-top');
		$this->load->view('package/list');
		$this->load->view('common/admin-bottom');
	}

	public function packages_list() {
		$result = $this->packages_model->get_packages_list();
		$inclusions = $this->packages_model->get_ljp_inclusions();
		$waterSport = $this->packages_model->get_ljp_waterSports();
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
				$inVal = '';
				$incvalue = explode(',',$row[4]);
				foreach ($incvalue as $ik => $iv) {
					if($inVal!=''){
						$inVal = $inVal.' , '.$inclusions[$iv];
					} else {
						$inVal = $inclusions[$iv];
					}
				}
				$row[4] = $inVal;
			}
			if($row[5]!=''){
				$inVal1 = '';
				$waterSport1 = explode(',',$row[5]);
				foreach ($waterSport1 as $wsk => $wsv) {
					if($inVal1!=''){
						$inVal1 = $inVal1.' , '.$waterSport[$wsv];
					} else {
						$inVal1 = $waterSport[$wsv];
					}
				}
				$row[5] = $inVal1;
			}
			if($row[6]!=''){
				if($row[6]==1){
					$row[6]= ucwords('Activate');
				} else {
					$row[6]= ucwords('Not Activate');
				}
			}
			if($row[7]!=''){
				$row[7]= date('jS M Y', strtotime($row[7]));
			}
			$row[8] = '<a href="'.base_url('admin/packages/package_view/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-eye-open" ></i></a>&nbsp;&nbsp;<a href="'.base_url('admin/packages/package_edit/').$row[0].'" title="View Record" data-toggle="tooltip"><i class="glyphicon glyphicon-edit" ></i></a>';
			$row[0] = '<input type="checkbox" id="checkbox-1-' . intval($row[0]) . '" class="checkbox1 regular-checkbox" name="regular-checkbox" value="' . $row[0] . '"/><label for="checkbox-1-' . intval($row[0]) . '"></label>';
			$aaData[] = $row;
		}
		$result['aaData'] = $aaData;
		print_r(json_encode($result));
	}

	public function package_add() {
		$data['ljp_website'] = $this->packages_model->get_ljp_website();
		$data['ljp_inclusions'] = $this->packages_model->get_ljp_inclusions();
		$data['ljp_watersports'] = $this->packages_model->get_ljp_waterSports();
		$this->load->view('common/admin-top');
		$this->load->view('package/packageadd',$data);
		$this->load->view('common/admin-bottom');
	}
	public function packages_save() {
		$data = $this->input->post();
		if(!empty($data)){
			$_dataR = $this->packages_model->packages_save($data);
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
	
	public function package_view($id="") {
		$ljp_Data = $this->packages_model->get_ljp_ParticularDataView($id);
		$ljp_inclusions = $this->packages_model->get_ljp_inclusions();
		$ljp_watersports = $this->packages_model->get_ljp_waterSports();
		if($ljp_Data[0]['inclusion']!=''){
			$inVal = '';
			$incvalue = explode(',',$ljp_Data[0]['inclusion']);
			foreach ($incvalue as $ik => $iv) {
				if($inVal!=''){
					$inVal = $inVal.' , '.$ljp_inclusions[$iv];
				} else {
					$inVal = $ljp_inclusions[$iv];
				}
			}
			$ljp_Data[0]['inclusion'] = $inVal;
		}
		if($ljp_Data[0]['water_sports']!=''){
			$inVal1 = '';
			$waterSport1 = explode(',',$ljp_Data[0]['water_sports']);
			foreach ($waterSport1 as $wsk => $wsv) {
				if($inVal1!=''){
					$inVal1 = $inVal1.' , '.$ljp_watersports[$wsv];
				} else {
					$inVal1 = $ljp_watersports[$wsv];
				}
			}
			$ljp_Data[0]['water_sports'] = $inVal1;
		}
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('package/packageview',$data);
		$this->load->view('common/admin-bottom');
	}
	public function package_edit($id="") {
		$data['ljp_website'] = $this->packages_model->get_ljp_website();
		$data['ljp_inclusions'] = $this->packages_model->get_ljp_inclusions();
		$data['ljp_watersports'] = $this->packages_model->get_ljp_waterSports();
		$ljp_Data = $this->packages_model->get_ljp_ParticularDataView($id);
		$data['ljp_Data'] = $ljp_Data;
		$this->load->view('common/admin-top');
		$this->load->view('package/packageedit',$data);
		$this->load->view('common/admin-bottom');
	}

}