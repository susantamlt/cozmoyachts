<?php class Payments_model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	public function get_payments_list($date='') {
		$tableName = 'users';
		$columns   = array(
			"$tableName.user_id",
			"$tableName.user_name",
			"$tableName.email",
			"$tableName.phone",
			"$tableName.type",
			"$tableName.status",
			"$tableName.image",
			"$tableName.last_login",
			"$tableName.created_at",
		);
		$indexId     = '$tableName.user_id';
		$columnOrder = "$tableName.user_id";
		$orderby     = "";
		$joinMe      = "";
		$condition   = "WHERE $tableName.status!='0' AND $tableName.type='2'";
		return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe, $condition, $orderby);
	}
}
