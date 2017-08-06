<?php 
Class Student_model extends CI_Model {

	public function upcoming_announce($id = FALSE) {

		if ($id === FALSE) {
			$this->db->order_by('upcoming_announcement.AnnStartTime', 'ASC');
			$this->db->join('announcement_type', 'upcoming_announcement.TypeID = announcement_type.TypeID');
			$query = $this->db->get('upcoming_announcement');
			return $query->result_array();
		}
		$this->db->order_by('upcoming_announcement.AnnStartTime', 'ASC');
		$this->db->join('announcement_type', 'upcoming_announcement.TypeID = announcement_type.TypeID');
		$query = $this->db->get_where('upcoming_announcement', array('AnnID' => $id));
		return $query->row_array();
	}


	public function past_announce($id = FALSE) {

		if ($id === FALSE) {
			$this->db->order_by('past_announcement.AnnEndTime', 'DESC');
			$this->db->join('announcement_type', 'past_announcement.TypeID = announcement_type.TypeID');
			$query = $this->db->get('past_announcement');
			return $query->result_array();
		}
		$this->db->order_by('past_announcement.AnnEndTime', 'DESC');
		$this->db->join('announcement_type', 'past_announcement.TypeID = announcement_type.TypeID');
		$query = $this->db->get_where('past_announcement', array('AnnID' => $id));
		return $query->row_array();
	}

	public function upcoming_limit($id = FALSE) {
		if ($id === FALSE) {
			$this->db->limit(10);
			$this->db->order_by('upcoming_announcement.AnnStartTime', 'ASC');
			$this->db->join('announcement_type', 'upcoming_announcement.TypeID = announcement_type.TypeID');
			$query = $this->db->get('upcoming_announcement');
			return $query->result_array();
		}
		$this->db->limit(10);
		$this->db->order_by('upcoming_announcement.AnnStartTime', 'ASC');
		$this->db->join('announcement_type', 'upcoming_announcement.TypeID = announcement_type.TypeID');
		$query = $this->db->get_where('upcoming_announcement', array('AnnID' => $id));
		return $query->row_array();

	}


	public function past_limit($id = FALSE) {
		if ($id === FALSE) {
			$this->db->limit(5);
			$this->db->order_by('past_announcement.AnnEndTime', 'DESC');
			$this->db->join('announcement_type', 'past_announcement.TypeID = announcement_type.TypeID');
			$query = $this->db->get('past_announcement');
			return $query->result_array();
		}
		$this->db->limit(5);
		$this->db->order_by('past_announcement.AnnEndTime', 'DESC');
		$this->db->join('announcement_type', 'past_announcement.TypeID = announcement_type.TypeID');
		$query = $this->db->get_where('past_announcement', array('AnnID' => $id));
		return $query->row_array();
	}

	function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('school_establishment');
        //filter data by searched keywords
        if(!empty($params['search']['searchQuery'])){
            $this->db->like('EstName',$params['search']['searchQuery']);
        }
        //sort data by ascending or desceding order
        if(!empty($params['search']['sortBy'])){
            $this->db->order_by('EstName',$params['search']['sortBy']);
        }else{
            $this->db->order_by('EstID','desc');
        }
        //set start and limit
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        //get records
        $query = $this->db->get();
        //return fetched data
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }


}

