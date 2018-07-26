<?php class Customers_model extends CI_Model
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

	public function saveCustomer($date='') {
		$id = 0;
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('email',$date['email']);
		$this->db->where('phone',$date['phone']);
		$datas = $this->db->get()->result_array();
		if(empty($datas)){
			$date['birthdate']= date('Y-m-d',strtotime($date['birthdate']));
			if(isset($date['password']) && $date['password']!=''){
				$date['password'] = md5($date['password']);
			}
			$date['user_code']= strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(10,100)));
			$date['activation_key']= strtoupper(md5(strtotime(date('y-m-d H:i:s')) + rand(100,999)));
			$this->db->insert('users',$date);
			$id = 1;
		} else {
			$date['birthdate']= date('Y-m-d',strtotime($date['birthdate']));
			if(isset($date['password']) && $date['password']!=''){
				$date['password'] = md5($date['password']);
			}
			$id = 2;
			$_id = $date['user_id'];
			unset($date['user_id']);
			$this->db->where('user_id',$_id);
			$this->db->update('users', $date);
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