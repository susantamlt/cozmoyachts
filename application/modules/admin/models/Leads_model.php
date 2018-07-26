<?php class Leads_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_Leads_list($date='') {
		$org_id = $this->session->userdata('sales_org_id');
		$tableName = 'leads';
		$tableName1 = 'website';
		$tableName2 = 'package';
		$columns   = array(
			"$tableName.lead_id",
			"$tableName.client_name",
			"$tableName.primary_phone",
			"$tableName.email",
			"$tableName1.web_name",
			"$tableName2.package_name",
			"$tableName.date_of_trip",
			"$tableName.time_of_trip",
			"$tableName.no_of_pax",
			"$tableName.created_at",
		);
		$indexId     = '$tableName.lead_id';
		$columnOrder = "$tableName.lead_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.web_id=$tableName.web_id left join $tableName2 on $tableName2.pak_id=$tableName.pak_id";
		$condition   = "";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function Leads_client_save($date='') {
		$this->db->select('lead_id');
		$this->db->from('leads');
		$this->db->where('primary_phone',$date['primary_phone']);
		$this->db->where('email',$date['email']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('leads',$date);
			$id = $this->db->insert_id();
		} else {
			$id = $datas[0]['lead_id'];
		}
		return $id;
	}

	public function leads_save($date='') {
		$id = 0;
		$this->db->select('lead_id');
		$this->db->from('leads');
		$this->db->where('primary_phone',$date['primary_phone']);
		$this->db->where('email',$date['email']);
		$datas = $this->db->get()->result_array();
		if(empty($datas) || (isset($date['lead_id']) && $datas[0]['lead_id'] == $date['lead_id'])){
			if(isset($date['lead_id']) && $date['lead_id']!=''){
				$id = 3;
				$_id = $date['lead_id'];
				unset($date['lead_id']);
				$this->db->where('lead_id',$_id);
				$this->db->update('leads', $date);
			} else { 
				$this->db->insert('leads',$date);
				$id = 1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}

	public function leadsimport_save($date='') {
		$this->db->select('lead_id');
		$this->db->from('leads');
		$this->db->where('primary_phone',$date['primary_phone']);
		$this->db->where('email',$date['email']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('leads',$date);
			$rut = 1;
		} else {
			$rut = 0;
		}
		return $rut;
	}

	public function get_ljp_ParticularData($id='') {
		$this->db->select('*');
		$this->db->from('leads');
		$this->db->where('lead_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function get_ljp_ParticularDataView($id='') {
		$this->db->select('l.*,w.web_name,w.web_url,p.package_name');
		$this->db->from('leads as l');
		$this->db->join('website as w','w.web_id = l.web_id','left');
		$this->db->join('package as p','p.pak_id = l.pak_id','left');
		$this->db->where('l.lead_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function get_ljp_country() {
		$this->db->select('country_code,country_name');
		$this->db->from('country');
		$datas = $this->db->get()->result_array();
		$dataCountry = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCountry[$_data['country_code']] = $_data['country_name'];
		endforeach;
		return $dataCountry;
	}


	
	public function get_ljp_package() {
		$this->db->select('pak_id,package_name,type');
		$this->db->from('package');
		$this->db->where('pak_status','1');
		$datas = $this->db->get()->result_array();
		$dataCountry = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCountry[$_data['pak_id']] = $_data['package_name'].' - '.$_data['type'];
		endforeach;
		return $dataCountry;
	}

	public function get_ljp_website() {
		$this->db->select('web_id,web_name');
		$this->db->from('website');
		$datas = $this->db->get()->result_array();
		$dataCountry = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCountry[$_data['web_id']] = $_data['web_name'];
		endforeach;
		return $dataCountry;
	}

	public function getPackageId($date='') {
		if($date!=''){
			$this->db->select('pak_id');
			$this->db->from('package');
			$this->db->like('package_name',$date);
			$datas = $this->db->get()->result_array();
			if(!empty($datas)){
				return $datas[0]['pak_id'];
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}
}