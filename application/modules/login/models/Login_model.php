<?php class Login_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function login($data='') {
		$result_ary = array();
		if(!empty($data)){
            //$conditions = array('email'=>$data["emailid"],'password'=>md5($data["password"]),'type'=>$data["type"]);
			$conditions = array('email'=>$data["emailid"],'password'=>md5($data["password"]));
			$this->db->select('*');
        	$this->db->where($conditions);
        	$login = $this->db->get('users');
        	$row = $login->row_array();
        	if($login->num_rows() > 0 ) {
        		if(in_array($row['status'], array('1','2'))){
					$result_ary['status'] = 'success';
					$result_ary['msg'] = 'Logged in successfully';
					$result_ary['user_type'] = $row['type'];
					$loggedin_data = $this->get_logged_user_data($row);
					$this->session->set_userdata($loggedin_data);
				} else {
					$result_ary['status'] = 'blocked';
					$result_ary['msg'] = 'Profile is Blocked';
				}
        	} else {
				$result_ary['status'] = 'failure';
				$result_ary['msg'] = 'Login failed. Please try again later';
        	}
		} else {
			$result_ary['status'] = 'failure';
			$result_ary['msg'] = 'Login failed. Please try again later';
		}
		return $result_ary;
	}

	public function logout($id='') {
		$logintime = array('last_login' => date('Y-m-d H:i:s'));
		if($id != '') {
			$this->db->where('user_id', $id);
			$this->db->update('users', $logintime);
		}
	}

	function get_logged_user_data($row){
        if($row['type']==0){
            $loggedin_data['is_sadmin_logged_in'] = TRUE;
            $loggedin_data['sadmin_user_id'] = $row['user_id'];
            $loggedin_data['sadmin_user_name'] = $row['user_name'];
            $loggedin_data['sadmin_email'] = $row['email'];
            $loggedin_data['sadmin_phone'] = $row['phone'];
            $loggedin_data['sadmin_image'] = $row['image'];
            $loggedin_data['sadmin_type'] = $row['type'];
            $loggedin_data['sadmin_user_code'] = $row['user_code'];
            $loggedin_data['sadmin_last_login'] = $row['last_login'];
        }elseif($row['type']==1){
            $loggedin_data['is_admin_logged_in'] = TRUE;
            $loggedin_data['admin_user_id'] = $row['user_id'];
            $loggedin_data['admin_user_name'] = $row['user_name'];
            $loggedin_data['admin_email'] = $row['email'];
            $loggedin_data['admin_phone'] = $row['phone'];
            $loggedin_data['admin_image'] = $row['image'];
            $loggedin_data['admin_type'] = $row['type'];
            $loggedin_data['admin_user_code'] = $row['user_code'];
            $loggedin_data['admin_last_login'] = $row['last_login'];
        }elseif($row['type']==1){
            $loggedin_data['is_user_logged_in'] = TRUE;
            $loggedin_data['user_user_id'] = $row['user_id'];
            $loggedin_data['user_user_name'] = $row['user_name'];
            $loggedin_data['user_email'] = $row['email'];
            $loggedin_data['user_phone'] = $row['phone'];
            $loggedin_data['user_image'] = $row['image'];
            $loggedin_data['user_type'] = $row['type'];
            $loggedin_data['user_user_code'] = $row['user_code'];
            $loggedin_data['user_last_login'] = $row['last_login'];
        }
        return $loggedin_data;
    }
}