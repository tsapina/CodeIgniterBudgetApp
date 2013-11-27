<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		$this->load->model('main');
		$users_data = $this->main->get_users_data();
		if($this->main->is_login() === TRUE)
		{
			redirect('stanje');
		}
		$this->load->view('inc/header');
		$this->load->view('home');
		$this->load->view('inc/footer');
		$this->load->model('main');
	
	}

	public function login_validation()
	{
		/*Login Form Validation*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|callback_validate_credentials');
		$this->form_validation->set_rules('lozinka', 'Password', 'required|md5|trim');
		
		/*Setting Custom Error Messages*/
		$this->form_validation->set_message('required', 'Sva polja su obavezna!');
		$this->form_validation->set_message('valid_email', 'Email adresa nije validna!');


		/*If is validation successfull start session and redirect to stanje*/
		if($this->form_validation->run())
		{
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			redirect('stanje');
		}
		else
		{
			$this->index();
		}
	}

	/*Custom rule, check wheter user exists in db*/
	public function validate_credentials()
	{
		$this->load->model('main');
		if($this->main->can_log_in())
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('validate_credentials', 'Neispravno korisnicko ime ili lozinka.');
			return false;
		}
	}
 	
 	public function register()
 	{
 		$data['success'] = 0;
 		$this->load->view('inc/header');
		$this->load->view('registracija', $data);
		$this->load->view('inc/footer');
 	}
	/*Logout = destroy session and redirect*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}

	public function restricted()
	{
		$this->load->view("inc/header");
		$this->load->view("restricted");
		$this->load->view("inc/footer");
	}

	public function signup_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[korisnik.email]');
		$this->form_validation->set_rules('password', 'Lozinka', 'required|trim');
		$this->form_validation->set_rules('cpassword', 'Potvrda Lozinke', 'required|trim|matches[password]');
		$this->form_validation->set_rules('ime', 'Ime', 'required');
		$this->form_validation->set_rules('prezime', 'Prezime', 'required');
		
		$this->form_validation->set_message('is_unique', "Unijeli ste postojeću email adresu!");

		
		if($this->form_validation->run())
		{
			$this->load->model('main');

			$success = $this->main->register_user();
			if($success)
			{
				$data['success'] = 1;
				$this->load->view("inc/header");
				$this->load->view("registracija", $data);
				$this->load->view("inc/footer");
			}
			else
			{
				echo 'problem';
			}
			
		}
		else
		{
			$data['success'] = 0;
			$this->load->view('inc/header');
			$this->load->view('registracija', $data);
			$this->load->view('inc/footer');
		}	
	}

	public function postavke()
	{
	
		$name = 'postavke';
		$this->load->model('main');
		$this->main->display_site($name);
	}

	public function promjeni_lozinku()
	{

		/*Form Validation*/
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Lozinka', 'required');
		$this->form_validation->set_rules('cpassword', 'Ponovljena lozinka', 'required|matches[password]');

		/*Setting Custom Error Messages*/
		$this->form_validation->set_message('required', 'Sva polja su obavezna!');

		/*If is validation successfull start session and redirect to stanje*/
		if($this->form_validation->run())
		{
			$this->load->model('crud');
			$success = $this->crud->password_update();
			if($success)
			{
				$data['success'] = 1;
				$name = 'postavke';
				$this->load->model('main');
				$this->main->display_site($name, $data);
			}
		}
		else
		{
			$name = 'postavke';
			$this->load->model('main');
			$this->main->display_site($name);
		}
	}

}
