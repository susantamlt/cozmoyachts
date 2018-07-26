<?php class Todos_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_todos_list($date='') {
		$tableName = 'todo';
		$columns   = array(
			"$tableName.todo_id",
			"$tableName.msg",
			"$tableName.notification_date",
			"$tableName.create_date",
			"$tableName.status",
		);
		$indexId     = '$tableName.todo_id';
		$columnOrder = "$tableName.todo_id";
		$orderby     = "";
		$condition   = "";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $condition, $orderby);
	}

	public function todos_save($date='') {		
		if(isset($date['todo_id']) && $date['todo_id']!=''){
			$id = 3;
			$_id = $date['todo_id'];
			unset($date['todo_id']);
			$this->db->where('todo_id',$_id);
			$this->db->update('todo', $date);
		} else { 
			$this->db->insert('todo',$date);
			$id = 1;
		}
		return $id;
	}

	public function get_ljp_ParticularData($id='') {
		$this->db->select('*');
		$this->db->from('todo');
		$this->db->where('todo_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

	public function notification($date=''){
		$this->db->select('todo_id,msg,notification_date,todo_time');
		$this->db->from('todo');
		$this->db->where('user_id',$date['user_id']);
		$this->db->where('status','1');
		$this->db->where('notification_date',date("Y-m-d"));
		$data = $this->db->get()->result_array();
		return $data;
	}
	public function get_ljp_ParticularData_notification($id='') {
		if($id!='' && $id > 0){
			$date['status']='0';
			$this->db->where('todo_id',$id);
			$this->db->update('todo', $date);
		}
		$this->db->select('*');
		$this->db->from('todo');
		$this->db->where('todo_id',$id);
		$datas = $this->db->get()->result_array();
		return $datas;
	}

}