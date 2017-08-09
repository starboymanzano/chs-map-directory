<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	//Login user
	public function login()
	{
		//Check login
		if($this->session->userdata('logged_in')) {
			redirect('admin/profile');		
		}

		$data['title'] = "Administrator Login";
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/login');
			$this->load->view('admin/template/footer');
		} else {
			//Get username
			$username = $this->input->post('username');
			//Get and encrypt the password
			$password = md5($this->input->post('password'));
			//Login user
			$user_id = $this->user_model->login($username, $password);
			//Automatic logged date
			$this->user_model->lastloggedin();
			// Create session
			if($user_id){
				$user_data = array(
					'AdminNo' => $user_id,
					'AdminUsername' => $username,
					'logged_in' => true
					);
				$this->session->set_userdata($user_data);
				// Set message
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');
				redirect('admin/profile');		
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Incorrect Username or Password');
				redirect('admin/login');
			}
		}
	}

	public function logout() {
		//Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('AdminNo');
		$this->session->unset_userdata('AdminUsername');
		//Set message
		$this->session->set_flashdata('user_loggedout', 'You are now logged out');
		redirect('admin/login');
	}

	public function profile() {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = "School Profile";
		$data['profile'] = $this->profile_model->get_profile();
		$data['admin'] = $this->user_model->show_username();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/school_profile', $data);
		$this->load->view('admin/template/footer');
	}

	public function update() {
		$success = $this->profile_model->update_profile();
		if($success) {
			$this->session->set_flashdata('profile_updated','School Profile has been updated');
			redirect('admin/profile');
		}
	}

	public function establishment($offset = 0) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		//Pagination config
		$config['base_url'] = base_url() . 'admin/establishment/';
		$config['total_rows'] = $this->db->count_all('school_establishment');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['attributes'] = array(
			'class' => 'pagination-link'
			);
		//Initialize Pagination
		$this->pagination->initialize($config);
		$data['title'] = "School Establishments";
		$data['estabs'] = $this->establish_model->get_estabs($config['per_page'], $offset);
		$data['admin'] = $this->user_model->show_username();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/school_establishment', $data);
		$this->load->view('admin/template/footer');
	}

	public function view_establishment($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['est_info'] = $this->establish_model->get_estab_info($id);
		$data['admin'] = $this->user_model->show_username();

		if (empty($data['est_info'])) {
			show_404();
		}
		
		$data['title'] = $data['est_info']['EstName'];
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view', $data);
		$this->load->view('admin/template/footer');
	}

	public function edit_establishment($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = 'Edit Information';
		$data['est_info'] = $this->establish_model->get_estab_info($id);
		$data['admin'] = $this->user_model->show_username();

		if (empty($id)) {
			show_404();
		}

		$this->form_validation->set_rules('est_name', 'Establishment Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('walktime', 'Walk Time', 'required');
		$this->form_validation->set_rules('distance', 'Distance', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/edit', $data);
			$this->load->view('admin/template/footer');
		} else {
			$this->establish_model->set_estab_info($id);
			$this->session->set_flashdata('establishment_updated', 'School Establishment has been updated');
			//Date modified
			$this->establish_model->dateModified();
			redirect(base_url() . 'admin/establishment/view/' . $id);
		}	
	}

	public function delete_establishmentInfo($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		if(empty($id)) {
			show_404();
		}

		$this->establish_model->get_estab_info($id);
		$this->establish_model->delete_estab_info($id);
		$this->session->set_flashdata('establishment_cleared', 'Establishment Information has been cleared');
		redirect(base_url() . 'admin/establishment/view/' . $id);
	}

	public function announcements($offset = 0) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		//Pagination config
		$config['base_url'] = base_url() . 'admin/announcements/';
		$config['total_rows'] = $this->db->count_all('upcoming_announcement');
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['attributes'] = array(
			'class' => 'pagination-link'
			);
		//Initialize Pagination
		$this->pagination->initialize($config);
		$data['admin'] = $this->user_model->show_username();
		$data['title'] = "School Events & Announcements";
		$data['announce'] = $this->announce_model->get_announce(FALSE, $config['per_page'], $offset);
		$this->announce_model->auto_delete();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/school_announcement', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_announcement() {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = 'Add Announcements';
		$data['announce'] = $this->announce_model->get_types();
		$data['admin'] = $this->user_model->show_username();
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('desc','Description','required');
		$this->form_validation->set_rules('organizer','Organizer','required');
		$this->form_validation->set_rules('type','Type','required');
		$this->form_validation->set_rules('venue','Venue','required');
		$this->form_validation->set_rules('starttime','Start Time','required');
		$this->form_validation->set_rules('endtime','End Time','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/add_announcement', $data);
			$this->load->view('admin/template/footer');
			$this->session->set_flashdata('required_fields', 'Please complete all required fields');
		} else {
			$this->announce_model->add_announce();
			//Set message
			$this->session->set_flashdata('announce_added', 'School announcement has been added');
			redirect('admin/announcements');
		}
	}

	public function view_announcement($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['ann_info'] = $this->announce_model->get_announce($id);
		$data['admin'] = $this->user_model->show_username();

		if (empty($data['ann_info'])) {
			show_404();
		}

		$data['title'] = $data['ann_info']['AnnTitle'];
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_announcement', $data);
		$this->load->view('admin/template/footer');
	}

	public function edit_announcement($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = 'Edit Announcement';
		$data['ann_info'] = $this->announce_model->get_announce($id);
		$data['announce'] = $this->announce_model->get_types();
		$data['admin'] = $this->user_model->show_username();

		if (empty($id)) {
			show_404();
		}

		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('desc','Description','required');
		$this->form_validation->set_rules('organizer','Organizer','required');
		$this->form_validation->set_rules('type','Type','required');
		$this->form_validation->set_rules('venue','Venue','required');
		$this->form_validation->set_rules('starttime','Start Time','required');
		$this->form_validation->set_rules('endtime','End Time','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/edit_announcement', $data);
			$this->load->view('admin/template/footer');
		} else {
			$this->announce_model->update_announce($id);
			$this->session->set_flashdata('announce_updated', 'School announcement has been updated');
			redirect(base_url() . 'admin/announcements/view/'. $id);
		}
	}

	public function delete_announcement($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		if(empty($id)) {
			show_404();
		}

		$this->announce_model->delete_announce($id);
		$this->session->set_flashdata('announce_deleted', 'School announcement has been deleted');
		redirect(base_url() . 'admin/announcements/view/');
	}

	public function past_announcements($offset = 0) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		//Pagination config
		$config['base_url'] = base_url() . 'admin/past_announcements/';
		$config['total_rows'] = $this->db->count_all('past_announcement');
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['attributes'] = array(
			'class' => 'pagination-link'
			);
		//Initialize Pagination
		$this->pagination->initialize($config);
		$data['admin'] = $this->user_model->show_username();
		$data['title'] = "Past Announcements";
		$data['announce'] = $this->announce_model->get_pastAnnounce(FALSE, $config['per_page'], $offset);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/past_announcement', $data);
		$this->load->view('admin/template/footer');
	}

	public function announcement_type() {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['admin'] = $this->user_model->show_username();
		$data['title'] = "Announcement Type List";
		$data['typos'] = $this->announce_model->get_types();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/announcement_type', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_announcementType() {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = 'Add Type';
		$data['admin'] = $this->user_model->show_username();
		$this->form_validation->set_rules('typename','Type','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/add_type', $data);
			$this->load->view('admin/template/footer');
		} else {
			$this->announce_model->add_announceType();
			//Set message
			$this->session->set_flashdata('type_added', 'Type has been added');
			redirect('admin/announcements/types');
		}
	}

	public function edit_announcementType($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = 'Edit Type';
		$data['typename'] = $this->announce_model->get_types_row($id);
		$data['admin'] = $this->user_model->show_username();

		if (empty($id)) {
			show_404();
		}

		$this->form_validation->set_rules('typename','Type','required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/edit_type', $data);
			$this->load->view('admin/template/footer');
		} else {
			$this->announce_model->update_announceType($id);
			$this->session->set_flashdata('type_updated', 'Type has been updated');
			redirect(base_url() . 'admin/announcements/types');
		}	
	}

	public function delete_announcementType($id = NULL) {
		//Check login
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		if(empty($id)) {
			show_404();
		}

		$this->announce_model->delete_announceType($id);
		$this->session->set_flashdata('type_deleted', 'Announcement Type has been deleted');
		redirect(base_url() . 'admin/announcements/types');
	}

	public function settings() {
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = "Change Administrator Name";
		$data['admin'] = $this->user_model->show_username();
		$this->form_validation->set_rules('full_name','Admin name','required');
		$this->form_validation->set_rules('current_pw','Current Password','required');
 		$this->form_validation->set_rules('confirm_pw','Confirm Password','required|matches[current_pw]');

 		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/admin_settings', $data);
			$this->load->view('admin/template/footer');
		} else {
			$sql = $this->db->select("*")->from("admin")->where("AdminUsername",$this->session->userdata("AdminUsername"))->get();
			foreach($sql->result() as $my_info) {
				$db_password = $my_info->AdminPassword;
				$db_id = $my_info->AdminNo;
			}

			if (md5($this->input->post("current_pw")) == $db_password) {
				$full_name = $this->input->post("full_name");
				$this->db->query("UPDATE admin SET `AdminFullName` = '$full_name' WHERE `AdminNo` ='$db_id'") or die(mysql_error());
				$this->session->set_flashdata("name_changed","Admin name successfully changed");
	 			  redirect(base_url() . 'admin/settings' );
			} else {
				$this->session->set_flashdata("name_error","Incorrect Password");
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/admin_settings', $data);
				$this->load->view('admin/template/footer');
			}
		}
	}

	public function change_password() {
		if(!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		$data['title'] = "Change Password";
		$data['admin'] = $this->user_model->show_username();
		$this->form_validation->set_rules('current_pw','Current Password','required');
 		$this->form_validation->set_rules('new_pw','New Password','required|max_length[20]|min_length[6]|trim');
 		$this->form_validation->set_rules('conf_pw','Confirm Password','required|matches[new_pw]');

 		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/change_pw', $data);
			$this->load->view('admin/template/footer');
		} else {
			$sql = $this->db->select("*")->from("admin")->where("AdminUsername",$this->session->userdata("AdminUsername"))->get();

			foreach($sql->result() as $my_info) {
				$db_password = $my_info->AdminPassword;
				$db_id = $my_info->AdminNo;
			}

			if (md5($this->input->post("current_pw")) == $db_password) {
				$new_password = md5($this->input->post("new_pw"));
				$this->db->query("UPDATE admin SET `AdminPassword` = '$new_password' WHERE `AdminNo` ='$db_id'") or die(mysql_error());
				$this->session->set_flashdata("password_changed","Password has been changed");
	 			  redirect(base_url() . 'admin/settings/change_password' );
			} else {
				$this->session->set_flashdata("password_error","Incorrect Password");
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/change_pw', $data);
				$this->load->view('admin/template/footer');
			}
		}
	}

	public function webmaster() {
		$data['title'] = "Contact Webmaster";
		$data['admin'] = $this->user_model->show_username();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/contact_webmaster');
		$this->load->view('admin/template/footer');
	}

}
?>