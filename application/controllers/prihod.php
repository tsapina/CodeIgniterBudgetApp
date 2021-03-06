<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prihod extends CI_Controller {

	/* Construct, loading models and helpers necessary for further work */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('main');
		$this->load->database();
	}

	/*This is index function, if user is loged in call function prihod data  */
	public function index()
	{
		$r_exist=$this->main->racun_exists();
		if($this->main->is_login() === FALSE)
		{
			redirect('user/restricted');
		}
		elseif($r_exist === FALSE)
		{
			redirect('racun/add');
		}
		$this->prihod_data();
	}

	/*This function allows displaying data */
    public function prihod_data()
	{	
		$users_data = $this->main->get_users_data();
		$tip = 'P';
		$korisnik_id = $users_data['korisnik_ID'];
		$racun_data['data'] = $this->crud->get_data_by_tip($korisnik_id, $tip);
		$name = 'prihodi';
		$this->main->display_site($name, $racun_data);	
	}

	/*This function allows adding data */
	public function add()
	{	
		/*If isset post, CI way */
		if($this->input->post('dodaj_prihod'))
		{
			/*Login Form Validation*/
			$this->load->library('form_validation');
			$this->form_validation->set_rules('etiketa', 'Etiketa', 'required');
			$this->form_validation->set_rules('komentar', 'Komentar', 'required');
			$this->form_validation->set_rules('iznos', 'Iznos', 'required|numeric');
	
			/*Setting Custom Error Messages*/
			$this->form_validation->set_message('required', 'Sva polja su obavezna!');
			$this->form_validation->set_message('numeric', 'Unos mora biti broj!');
			
			/*If is validation successfull, insert in db*/
			if($this->form_validation->run())
			{
				$table = 'transakcija';
				$users_data = $this->main->get_users_data();
				$user_id = $users_data['korisnik_ID'];
				$tip = 'P';
				$controller = 'prihod';
				$insert = $this->crud->insert_data($table, $user_id, $controller, $tip);
				if($insert)
				{
					redirect('prihod');
				}
			}
			else
			{
				/*	Get racun data  */
				$users_data = $this->main->get_users_data();
				$table = 'racun';
				$korisnik_id = $users_data['korisnik_ID'];
				$data['racun_data'] = $this->crud->get_data($table, $korisnik_id);

				/*	Setting mode and displaying site  */
				$data['mode'] = 'add';
				$name = 'prihod';
				$this->main->display_site($name, $data);
			}/*end of if($this->form_validation->run()) */
		}
		else
		{
			/*	Get racun data  */
			$users_data = $this->main->get_users_data();
			$table = 'racun';
			$korisnik_id = $users_data['korisnik_ID'];
			$data['racun_data'] = $this->crud->get_data($table, $korisnik_id);

			/*	Setting mode and displaying site  */
			$data['mode'] = 'add';
			$name = 'prihod';
			$this->main->display_site($name, $data);
		}/*end of if($this->input->post('dodaj_racun')) */
	}/*end of public function add() */



	/*This function allows editing data */
	public function edit($id = false)
	{
		/*If isset post, CI way */
		if($this->input->post('uredi_prihod'))
		{
			/*Login Form Validation*/
			$this->load->library('form_validation');
			$this->form_validation->set_rules('etiketa', 'Etiketa', 'required');
			$this->form_validation->set_rules('komentar', 'Komentar', 'required');
			$this->form_validation->set_rules('iznos', 'Iznos', 'required|numeric');
	
			/*Setting Custom Error Messages*/
			$this->form_validation->set_message('required', 'Sva polja su obavezna!');
			$this->form_validation->set_message('numeric', 'Unos mora biti broj!');
			
			/*If is validation successfull, insert in db*/
			if($this->form_validation->run())
			{
				$table = 'transakcija';
				$users_data = $this->main->get_users_data();
				$user_id = $users_data['korisnik_ID'];
				$controller = 'prihod';
				$update = $this->crud->update_data($table, $id, $controller);
				if($update)
				{
					redirect('prihod');
				}
			}
			else
			{	
				/*	Get racun data  */
				$table1 = 'racun';
				$users_data = $this->main->get_users_data();
				$korisnik_id = $users_data['korisnik_ID'];
				$data['racun_data'] = $this->crud->get_data($table1, $korisnik_id);

				/*	Setting mode and displaying site  */
				$table = 'transakcija';
				$data['prihod_data'] = $this->crud->get_data_by_id($table, $korisnik_id, $id);
				$data['mode'] = 'edit';
				$name = 'prihod';
				$this->main->display_site($name, $data);
			}/*end of if($this->form_validation->run()) */
		}
		else
		{
			/*	Get racun data  */
			$table1 = 'racun';
			$users_data = $this->main->get_users_data();
			$korisnik_id = $users_data['korisnik_ID'];
			$data['racun_data'] = $this->crud->get_data($table1, $korisnik_id);

			/*	Setting mode and displaying site  */
			$table = 'transakcija';
			$data['prihod_data'] = $this->crud->get_data_by_id($table, $korisnik_id, $id);
			$data['mode'] = 'edit';
			$name = 'prihod';
			$this->main->display_site($name, $data);
		}/*end of if($this->input->post('dodaj_racun')) */
	}/*end of public function edit() */


	/*This function allows deleting data */
	public function delete($id)
	{
		$table = 'transakcija';
		$delete = $this->crud->delete_data($table, $id);
		if($delete)
		{
			redirect('prihod');
		}
	}

}
