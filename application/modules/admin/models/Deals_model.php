<?php class Deals_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_deals_list($date='') {
		$tableName = 'package';
		$tableName1 = 'website';
		$tableName2 = 'users';
		$columns   = array(
			"$tableName.pak_id",
			"$tableName.package_name",
			"$tableName1.web_name",
			"$tableName.price",
			"$tableName.no_pax",
			"$tableName.yacht_size",
			"$tableName.cabins",
			"$tableName.pak_status",
			"$tableName.created_at",
		);
		$indexId     = "$tableName.pak_id";
		$columnOrder = "$tableName.pak_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.web_id=$tableName.web_id";
		$condition   = "WHERE $tableName.pak_status!='' AND $tableName.type='Deals'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
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

	public function deals_save($date='') {
		$id = 0;
		$this->db->select('pak_id');
		$this->db->from('package');
		$this->db->where('package_name',$date['package_name']);
		$datas = $this->db->get()->result_array();
		if(empty($datas) || (isset($date['pak_id']) && $datas[0]['pak_id'] == $date['pak_id'])){
			if(isset($date['pak_id']) && $date['pak_id']!=''){
				$id = 3;
				$_id = $date['pak_id'];
				unset($date['pak_id']);
				$this->db->where('pak_id',$_id);
				$this->db->update('package', $date);
			} else { 
				$this->db->insert('package',$date);
				$id = 1;
			}
		} else {
			$id = 2;
		}
		return $id;
	}

	public function get_ljp_ParticularDataView($id='') {
		$this->db->select('p.*,w.web_name');
		$this->db->from('package as p');
		$this->db->join('website as w','w.web_id=p.web_id','left');
		$this->db->where('p.pak_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}
}