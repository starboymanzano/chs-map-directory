<?php 
class User_model extends CI_Model {
		//Log user in
	public function login($username, $password) {
		//Validate
		$this->db->where('AdminUsername', $username);
		$this->db->where('AdminPassword', $password);
		$result = $this->db->get("admin");

		if($result->num_rows() == 1) {
			return $result->row(0)->AdminNo;
		} else {
			return false;
		}
	}

	public function show_username() {
		$query = $this->db->get_where('admin', array('AdminNo' => 1));
		return $query->row_array();
	}

	public function lastloggedin() {
		date_default_timezone_set("Asia/Manila");
		$today = date("Y-m-d H:i:s");
		$data = array(
			'AdminLastLogin' => $today
			);
		$this->db->where('AdminUsername', $this->input->post('username'));
		return $this->db->update('admin', $data);
	}
	
}
?>