<?php class Bookings_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_bookings_list($date='') {
		$tableName = 'booking';
		$tableName1 = 'website';
		$tableName2 = 'package';
		$tableName3 = 'users';
		$columns   = array(
			"$tableName.booking_id",
			"$tableName.order_id",
			"$tableName1.web_name",
			"$tableName3.user_name",
			"$tableName2.package_name",
			"$tableName.total_amount",
			"$tableName.payment_status",
			"$tableName.booking_status",
			"$tableName.created_at",
		);
		$indexId     = '$tableName.booking_id';
		$columnOrder = "$tableName.booking_id";
		$orderby     = "";
		$joinMe      = "left join $tableName1 on $tableName1.web_id=$tableName.web_id left join $tableName2 on $tableName2.pak_id=$tableName.pak_id left join $tableName3 on $tableName3.user_id=$tableName.user_id";
		$condition   = "";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}

	public function bookings_save($date='') {
		$id['id'] = 0;
		$id['oid'] = 0;
		$id['bid'] = 0;
		if(isset($date['booking_id']) && $date['booking_id']!=''){
			$id['id'] = 3;
			$_id = $date['booking_id'];
			$id['oid'] = $_id;
			$id['bid'] = $_id;
			unset($date['booking_id']);
			$this->db->where('booking_id',$_id);
			$this->db->update('booking', $date);
		} else { 
			$this->db->insert('booking',$date);
			$nid = $this->db->insert_id();
			$id['oid'] = $nid;
			$id['bid'] = $nid;
			if($nid > 0){
				$nData['order_id'] = $nid;
				$this->db->where('booking_id',$nid);
				$this->db->update('booking', $nData);
				$id['id'] = 1;
			} else {
				$id['id'] = 0;
			}			
		}
		return $id;
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

	public function get_ljp_ParticularDataView($id='') {
		$this->db->select('b.*,w.web_name,u.user_name,p.package_name');
		$this->db->from('booking as b');
		$this->db->join('website as w','w.web_id=b.web_id','left');
		$this->db->join('package as p','p.pak_id=b.pak_id','left');
		$this->db->join('users as u','u.user_id=b.user_id','left');
		$this->db->where('b.booking_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function get_ljp_ParticularDataEdit($id='') {
		$this->db->select('b.*,w.web_name,u.user_name,p.package_name,l.email');
		$this->db->from('booking as b');
		$this->db->join('website as w','w.web_id=b.web_id','left');
		$this->db->join('package as p','p.pak_id=b.pak_id','left');
		$this->db->join('users as u','u.user_id=b.user_id','left');
		$this->db->join('leads as l','l.lead_id=b.lead_id','left');
		$this->db->where('b.booking_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function getUserList($value='') {
		$this->db->select('u.user_id,u.user_name,w.web_name');
		$this->db->from('users as u');
		$this->db->join('website as w','w.web_id=u.web_id','left');		
		$this->db->where('u.type','2');
		$this->db->where('u.status','1'); 
		$datas = $this->db->get()->result_array();
		$dataUsers = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataUsers[$_data['user_id']] = $_data['user_name'].' - '.$_data['web_name'];
		endforeach;
		return $dataUsers;
	}

	public function getLeadUser($date='') {
		$this->db->select('u.email');
		$this->db->from('users as u');
		if(isset($date['emailid']) && $date['emailid']!=''){		
			$this->db->where('u.email',$date['emailid']);
		} else {
			$this->db->where('u.user_id',$date['user_id']);
		}
		$datas = $this->db->get()->result_array();
		if(!empty($datas)){
			return $datas[0]['email'];
		} else {
			return $date['emailid'];
		}
	}

	public function existingEmail($date='') {
		$this->db->select('u.email');
		$this->db->from('users as u');
		$this->db->where('u.email',$date['email']);
		$datas = $this->db->get()->result_array();
		if(!empty($datas)){
			return $datas;
		} else {
			return array();
		}
	}

	public function getLeadList($date='') {
		$this->db->select('l.lead_id,l.client_name,l.email,w.web_name');
		$this->db->from('leads as l');
		$this->db->join('website as w','w.web_id=l.web_id','left');		
		$this->db->where('l.email',$date['email']);
		$this->db->where('l.lead_status','new'); 
		$datas = $this->db->get()->result_array();
		$dataUsers = array(''=>'--Select One--');
		foreach($datas as $_data):
			$dataUsers[$_data['lead_id']] = $_data['client_name'].' - '.$_data['web_name'];
		endforeach;
		return $dataUsers;
	}

	public function getExitingLead($date='') {
		$this->db->select('l.pak_id,l.no_of_pax,l.date_of_trip,l.time_of_trip,l.time_of_trip,l.web_id');
		$this->db->from('leads as l');
		$this->db->join('package as p','p.pak_id=l.pak_id','left');
		$this->db->join('website as w','w.web_id=l.web_id','left');
		$this->db->where('l.lead_id',$date['lead_id']);
		$datas = $this->db->get()->result_array();
		if(!empty($datas)){
			if($datas[0]['date_of_trip'] !='null'){
                $datas[0]['date_of_trip'] = date('m/d/Y', strtotime($datas[0]['date_of_trip']));
            }
            if($datas[0]['time_of_trip'] !='null'){
                $datas[0]['time_of_trip'] = date('h:i a', strtotime($datas[0]['time_of_trip']));
            }
			return $datas[0];
		} else {
			return array();
		}
	}

	public function saveUsers($date='') {
		$this->db->select('u.user_id,u.user_name as name,u.email,u.phone,u.country_code');
		$this->db->from('users as u');
		if($date['user_id'] > 0 && is_numeric($date['user_id'])){
			$this->db->where('u.user_id',$date['user_id']);
		} else {
			$this->db->where('u.email',$date['user_id']);
		}
		$datas = $this->db->get()->result_array();
		if(!empty($datas)){
			return $datas[0];
		} else {
			$reverse = array_reverse(explode(',',$date['address']));
			$ndata = array(
				'web_id'=>$date['web_id'],
				'user_name'=>$date['name'],
				'phone'=>$date['phone'],
				'email'=>$date['user_id'],
				'address'=>$date['address'],
				'country_code'=>$reverse[1],
				'type'=>'2',
				'status'=>'2',
				'user_code'=>strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(10,100))),
				'activation_key'=>strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(100,999)))
			);
			$this->db->insert('users',$ndata);
			$nid = $this->db->insert_id();
			return array('user_id'=>$nid,'name'=>$date['name'],'email'=>$date['user_id'],'phone'=>$date['phone'],'country_code'=>$reverse[1]);
		}
	}
}