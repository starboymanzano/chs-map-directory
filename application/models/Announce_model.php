<?php 
Class Announce_model extends CI_Model {

	public function auto_delete() {
		date_default_timezone_set("Asia/Manila");
		$date = date("Y M-d h:i A", strtotime('-1 day'));
		$date_for_delete = date("Y M-d h:i A", strtotime('-365 day'));
		$this->db->query("INSERT INTO  past_announcement SELECT * FROM upcoming_announcement WHERE AnnEndTime  < '".$date."'"); 
		$this->db->query("DELETE FROM upcoming_announcement WHERE AnnEndTime < '".$date."'");
    }
		
	public function get_announce($id = FALSE, $limit = FALSE, $offset = FALSE) {
		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		if ($id === FALSE) {
			$this->db->order_by('upcoming_announcement.AnnEndTime', 'asc');
			$this->db->join('announcement_type', 'upcoming_announcement.TypeID = announcement_type.TypeID');
			$query = $this->db->get('upcoming_announcement');
			return $query->result_array();
		}

		$this->db->order_by('upcoming_announcement.AnnEndTime', 'asc');
		$this->db->join('announcement_type', 'upcoming_announcement.TypeID = announcement_type.TypeID');
		$query = $this->db->get_where('upcoming_announcement', array('AnnID' => $id));
		return $query->row_array();
	}

	public function add_announce() {
		$data = array(
			'AnnTitle' => $this->input->post('title'),
			'AnnDesc' => $this->input->post('desc'),
			'AnnOrganizer' => $this->input->post('organizer'),
			'TypeID' => $this->input->post('type'),
			'AnnVenue' => $this->input->post('venue'),
			'AnnStartTime' =>  $this->input->post('starttime'),
			'AnnEndTime' =>  $this->input->post('endtime'),
			);
		return $this->db->insert('upcoming_announcement', $data);
	}

	public function update_announce($id = 0) {
		date_default_timezone_set("Asia/Manila");
		$today = date('Y-m-d h:i:s');
		$data = array(
			'AnnTitle' => $this->input->post('title'),
			'AnnDesc' => $this->input->post('desc'),
			'AnnOrganizer' => $this->input->post('organizer'),
			'TypeID' => $this->input->post('type'),
			'AnnVenue' => $this->input->post('venue'),
			'AnnStartTime' => $this->input->post('starttime'),
			'AnnEndTime' => $this->input->post('endtime'),
			'AnnDateModified' => $today,
			);
          $this->db->where('AnnID', $id);
          return $this->db->update('upcoming_announcement', $data);
	}

	public function delete_announce($id) {
		$this->db->where('AnnID', $id);
		return $this->db->delete('upcoming_announcement');
	}

	public function get_pastAnnounce($id = FALSE, $limit = FALSE, $offset = FALSE) {
		if ($limit) {
			$this->db->limit($limit, $offset);
		}

		if ($id === FALSE) {
			$this->db->order_by('past_announcement.AnnStartTime', 'ASC');
			$this->db->join('announcement_type', 'past_announcement.TypeID = announcement_type.TypeID');
			$query = $this->db->get('past_announcement');
			return $query->result_array();
		}

		$this->db->order_by('past_announcement.AnnStartTime', 'ASC');
		$this->db->join('announcement_type', 'past_announcement.TypeID = announcement_type.TypeID');
		$query = $this->db->get_where('past_announcement', array('AnnID' => $id));
		return $query->row_array();
	}

	public function get_types() {
		$this->db->order_by('TypeName');
		$query = $this->db->get('announcement_type');
		return $query->result_array();
	}

	public function get_types_row($id) {
		$query = $this->db->get_where('announcement_type', array('TypeID' => $id));
		return $query->row_array();
	}

	public function add_announceType() {
		$data = array(
			'TypeName' => $this->input->post('typename')
			);
		return $this->db->insert('announcement_type', $data);
	}

	public function update_announceType($id = 0) {
		$data = array(
			'TypeName' => $this->input->post('typename')
			);
		$this->db->where('TypeID', $id);
		return $this->db->update('announcement_type', $data);
	}

	public function delete_announceType($id) {
		$this->db->where('TypeID', $id);
		return $this->db->delete('announcement_type');
	}

}
?>