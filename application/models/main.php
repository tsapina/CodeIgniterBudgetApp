<?php

class Main extends CI_Model
{
	public function display_site($name, $data = false)
	{
		$user_data['user'] = $this->get_users_data();
		$this->load->view('inc/header');
		$this->load->view('inc/nav', $user_data);
		$this->load->view($name, $data);
		$this->load->view('inc/footer');
	}

	public function can_log_in()
	{
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('lozinka')));
		$query = $this->db->get('korisnik');
		if($query-> num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function is_login()
	{
		if($this->session->userdata('is_logged_in') == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_users_data()
	{
		$this->load->database();
		$query = $this->db->get_where('korisnik', array('email' => $this->session->userdata('email')));
		return $query->row_array();
	}

	public function register_user()
	{
		$this->load->database();
		$data = array(
		   'email' => $this->input->post('email'),
		   'password' => md5($this->input->post('password')),
		   'ime' => $this->input->post('ime'),
		   'prezime' => $this->input->post('prezime')
		);
		return $this->db->insert('korisnik', $data); 
	}

	public function racun_exists()
	{
		$korisnik_id = $this->get_users_data();
		$this->db->where('korisnik_ID_FK', $korisnik_id['korisnik_ID']);
		$query = $this->db->get('racun');
		if($query-> num_rows() < 1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	
}