<?php class Leads_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function authonticationKey($date='') {
		$this->db->select('web_id');
		$this->db->from('website');
		$this->db->where('authentication_key',$date);
		$datas = $this->db->get()->row_array();
		if(!empty($datas)){
			return $datas['web_id'];
		} else {
			return 0;
		}
	}

	public function listLeads($date='') {
		$this->db->select('*');
		$this->db->from('package');
		$this->db->where('web_id ',$date);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function viewLeads($date='') {
		$this->db->select('*');
		$this->db->from('package');
		$this->db->where('pak_id ',$date);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function saveLeads($date='') {
		$id = 0;
		$this->db->select('pak_id');
		$this->db->from('package');
		$this->db->where('package_name',$date['package_name']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$this->db->insert('package',$date);
			$id = 1;
		} else {
			$id = 2;
			$_id = $datas[0]['pak_id'];
			unset($date['pak_id']);
			$this->db->where('pak_id',$_id);
			$this->db->update('package', $date);
		}
		return $id;
	}

	public function validateDateTime($dateStr, $format) {
        $valid = 1;
        foreach ($format as $key => $value) {
            $newdate = ucwords($dateStr);
            $find4Digits = array();
            preg_match('/[0-9]{4}/', $newdate, $find4Digits);
            $date = \DateTime::createFromFormat($value, $newdate);
            if($date && ($date->format($value) === $newdate)){
                $mydate = (array)$date;
                $_dateofBirth = date('Y-m-d',strtotime($mydate['date']));
                $_dateofBirthArray = explode('-', $_dateofBirth);
                $dbcurrentDateYear = date('Y');
                if(!empty($find4Digits)){
                    $actualDate = date($value,strtotime($mydate['date']));
                } elseif($_dateofBirthArray[0] > $dbcurrentDateYear){
                    $_actualDate = $_dateofBirthArray[0] - 100;
                    $_actualDate1 = $_actualDate.'-'.$_dateofBirthArray[1].'-'.$_dateofBirthArray[2];
                    $actualDate = date(str_replace("y","Y",$value),strtotime($_actualDate1));
                } else {
                    $actualDate = date($value,strtotime($mydate['date']));
                }
                return array('status'=>1,'date'=>$actualDate,'format'=>$value);
            } else {
                $valid = 0;
            }
        }
        return array('status'=>$valid,'date'=>$newdate,'format'=>'');
    }
}