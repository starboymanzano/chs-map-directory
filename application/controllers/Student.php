<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('student_model');
		$this->perPage = 5;
	}
	
	public function index() {
		$data['title'] = 'Home - Caloocan High School Directory';
		$data['profile'] = $this->profile_model->get_profile();
		$data['upcome'] = $this->student_model->upcoming_announce(FALSE);
		$data['pass'] = $this->student_model->past_announce(FALSE);
		$this->announce_model->auto_delete();
		$this->load->view('template/header', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}

	public function maps() {
		$data = array();

		//total rows count
		$totalRec = count($this->student_model->getRows());

		//pagination configuration
		$config['target'] = '#establist';
		$config['base_url'] = base_url().'student/ajaxPaginationData';
		$config['total_rows'] = $totalRec;
		$config['per_page'] = $this->perPage;
		$config['link_func'] = 'searchFilter';
		$this->ajax_pagination->initialize($config);

		//get the establishment list
		$data['establishment'] = $this->student_model->getRows(array('limit'=>$this->perPage));

		$data['title'] = 'Map - Caloocan High School Directory';
		$data['modal_title'] = "School Events & Announcements";
		$data['upcome'] = $this->student_model->upcoming_limit(FALSE);
		$data['pass'] = $this->student_model->past_limit(FALSE);
		$this->announce_model->auto_delete();
		$this->load->view('template/header', $data);
		$this->load->view('maps', $data);
		$this->load->view('template/footer_map');
	}

	function ajaxPaginationData() {
		$conditions = array();

		//calc offset number
		$page = $this->input->post('page');
		if(!$page) {
			$offset = 0;
		} else {
			$offset = $page;
		}

		//set conditions for search
		$searchQuery = $this->input->post('searchQuery');
		$sortBy = $this->input->post('sortBy');
		if(!empty($searchQuery)){
			$conditions['search']['searchQuery'] = $searchQuery;
		}
		if(!empty($sortBy)){
			$conditions['search']['sortBy'] = $sortBy;
		}

		//total rows count
		$totalRec = count($this->student_model->getRows($conditions));

		//pagination configurations
		$config['target'] = '#establist';
		$config['base_url'] = base_url().'student/ajaxPaginationData';
		$config['total_rows'] = $totalRec;
		$config['per_page'] = $this->perPage;
		$config['link_func'] = 'searchFilter';
		$this->ajax_pagination->initialize($config);

		//set start and limit
		$conditions['start'] = $offset;
		$conditions['limit'] = $this->perPage;

		//get establishment data
		$data['establishment'] = $this->student_model->getRows($conditions);

		//load the view
		$this->load->view('ajax-pagination-data',$data, false);
	}

	public function announcement_main() {
		$data['title'] = "School Events & Announcements";
		$data['upcome'] = $this->student_model->upcoming_announce(FALSE);
		$data['pass'] = $this->student_model->past_announce(FALSE);
		$this->announce_model->auto_delete();
		$this->load->view('template/header', $data);
		$this->load->view('announcement_main', $data);
		$this->load->view('template/footer_announcement');
	}

	public function help_tutorial() {
		$data['title'] = "Help/Tutorial";
		$this->load->view('template/header', $data);
		$this->load->view('help', $data);
		$this->load->view('template/footer_announcement');

	}


}
?>