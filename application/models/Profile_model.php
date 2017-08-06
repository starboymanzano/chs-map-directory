<?php 
class Profile_model extends CI_Model {
	
	public function get_profile() {
		$query = $this->db->get_where('school_profile', array('SchoolSeqNo' => 1));
		return $query->row_array();
	}

	public function update_profile() {
		$data = array(
			'SchoolTelNo' => $this->input->post('school_telno'),
			'SchoolFaxNo' => $this->input->post('school_faxno'),
			'SchoolEmail' => $this->input->post('school_emailadd')
			);
		$this->db->where('SchoolSeqNo', 1);
		return $this->db->update('school_profile', $data);
	}

}
?>