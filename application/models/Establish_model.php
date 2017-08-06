<?php 
class Establish_model extends CI_Model {

	public function get_estabs($limit = FALSE, $offset = FALSE) {
		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		$query = $this->db->get('school_establishment');
		return $query->result_array();

	}

	public function get_estab_info($id = FALSE) {
		if ($id === FALSE) {
			$query = $this->db->get('school_establishment');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('school_establishment', array('EstID' => $id));
		return $query->row_array();
	}

	public function set_estab_info($id = 0) {
		$data = array(
			'EstDesc' => $this->input->post('description'),
			'EstWalkTime' => $this->input->post('walktime'),
			'EstDistance' => $this->input->post('distance')
			);
		$this->db->where('EstID', $id);
		return $this->db->update('school_establishment', $data);
	}

	public function delete_estab_info($id) {
		date_default_timezone_set("Asia/Manila");
		$today = date("Y-m-d H:i:s");
		$data = array(
			'EstDesc' => NULL,
			'EstWalkTime' => NULL,
			'EstDistance' => NULL,
			'EstDateModified' => $today
			);
		$this->db->where('EstID', $id);
		return $this->db->update('school_establishment', $data);
	}

	public function dateModified() {
		date_default_timezone_set("Asia/Manila");
		$today = date("Y-m-d H:i:s");
		$data = array(
			'EstDateModified' => $today
			);
		$this->db->where('EstID', $this->input->post('temp_id'));
		return $this->db->update('school_establishment', $data);	
	}

}
?>