<?php class Country_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function statelist($date='') {
		$this->db->select('state_code,state');
		$this->db->from('states');
		$this->db->where('country_code',$date['country_code']);
		$datas = $this->db->get()->result_array();
		$dataState = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataState[$_data['state_code']] = $_data['state'];
		endforeach;
		return $dataState;
	}

	public function citylist($date='') {
		$this->db->select('city_id,city');
		$this->db->from('cities');
		$this->db->where('state_code',$date['state_code']);
		$this->db->order_by('city','ASC');
		$datas = $this->db->get()->result_array();
		$dataCity = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCity[$_data['city_id']] = $_data['city'];
		endforeach;
		return $dataCity;
	}

	public function ziplist($date='') {
		$this->db->select('city_id,zip,state_code,county');
		$this->db->from('cities_extended');
		$this->db->where('city',$date['city']);
		$this->db->where('state_code',$date['state_code']);
		$this->db->order_by('zip','ASC');
		$datas = $this->db->get()->result_array();
		$dataCity = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataCity[$_data['zip']] = $_data['zip'];
		endforeach;
		return $dataCity;
	}
}