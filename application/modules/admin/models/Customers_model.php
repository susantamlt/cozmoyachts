<?php class Customers_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_customers_list($date='') {
		$tableName = 'users';
		$tableName1 = 'website';
		$tableName2 = 'country';
		$columns   = array(
			"$tableName.user_id",
			"$tableName.user_name",
			"$tableName.email",
			"$tableName.phone",
			"$tableName1.web_name",
			"$tableName2.country_name",
			"$tableName.created_at",
		);
		$indexId     = '$tableName.user_id';
		$columnOrder = "$tableName.user_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.web_id=$tableName.web_id left join $tableName2 on $tableName2.country_code=$tableName.country_code";
		$condition   = "WHERE $tableName.status!='0' AND $tableName.type='2'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
	
	public function get_ljp_ParticularDataView($id='') {
		$this->db->select('u.*,w.web_name,w.web_url,c.country_name');
		$this->db->from('users as u');
		$this->db->join('website as w','w.web_id = u.web_id','left');
		$this->db->join('country as c','c.country_code = u.country_code','left');
		$this->db->where('u.user_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
	public function get_ljp_ParticularData($id='') {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function customers_save($date='') {
		$id = 0;
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('email',$date['email']);
		$this->db->where('phone',$date['phone']);
		$datas = $this->db->get()->result_array();

		if(empty($datas) || (isset($date['user_id']) && $datas[0]['user_id']==$date['user_id'])){
			$date['birthdate']= date('Y-m-d',strtotime($date['birthdate']));
			if(isset($date['password']) && $date['password']!=''){
				$date['password'] = md5($date['password']);
			}
			if(isset($date['user_id']) && $date['user_id']!=''){
				$id = 3;
				$_id = $date['user_id'];
				unset($date['user_id']);
				$this->db->where('user_id',$_id);
				$this->db->update('users', $date);
			} else {
				$date['user_code']= strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(10,100)));
				$date['activation_key']= strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(100,999)));
				$this->db->insert('users',$date);
				$id = 1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}

	public function customersimport_save($date='') {
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('email',$date['email']);
		$this->db->or_where('phone',$date['phone']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('users',$date);
			$rut = 1;
		} else {
			$rut = 0;
		}
		return $rut;
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
}
