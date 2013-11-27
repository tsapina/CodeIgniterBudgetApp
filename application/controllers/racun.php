<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Racun extends CI_Controller {
	/* Construct, loading models and helpers necessary for further work */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('main');
		$this->load->database();
	}

	/*This is index function, if user is loged in  call function racun data  */
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
        $this->racun_data();      
    }



    /*This function allows displaying data */
    public function racun_data()
	{	
		$r_exist=$this->main->racun_exists();
		$users_data = $this->main->get_users_data();
		$table = 'racun';
		$korisnik_id = $users_data['korisnik_ID'];
		$racun_data['data'] = $this->crud->get_data($table, $korisnik_id);
		
		$name = 'racuni';
		$this->main->display_site($name, $racun_data);	
	}



	/*This function allows adding data */
	public function add()
	{	
		/*If isset post, CI way */
		if($this->input->post('dodaj_racun'))
		{
			/*Login Form Validation*/
			$this->load->library('form_validation');
			$this->form_validation->set_rules('racun', 'Racun', 'required');		
			/*Setting Custom Error Messages*/
			$this->form_validation->set_message('required', 'Sva polja su obavezna!');
			/*If is validation successfull, insert in db*/
			if($this->form_validation->run())
			{
				$table = 'racun';
				$users_data = $this->main->get_users_data();
				$user_id = $users_data['korisnik_ID'];
				$controller = 'racun';
				$insert = $this->crud->insert_data($table, $user_id, $controller);
				if($insert)
				{
					redirect('racun');
				}
			}
			else
			{
				$r_exist=$this->main->racun_exists();
				$data['mode'] = 'add';
				$name = 'racun';
				if($r_exist === FALSE)
				{
					$data['empty'] = 1;
				}
				else
				{
					$data['empty'] = 0;
				}
				$this->main->display_site($name, $data);
			}/*end of if($this->form_validation->run()) */
		}
		else
		{
			$r_exist=$this->main->racun_exists();
			$data['mode'] = 'add';
			if($r_exist === FALSE)
			{
				$data['empty'] = 1;
			}
			else
			{
				$data['empty'] = 0;
			}
			$name = 'racun';
			$this->main->display_site($name, $data);
		}/*end of if($this->input->post('dodaj_racun')) */
	}/*end of public function add() */



	/*This function allows adding data */
	public function edit($id = false)
	{
		/*If isset post, CI way */
		if($this->input->post('uredi_racun'))
		{
			/*Login Form Validation*/
			$this->load->library('form_validation');
			$this->form_validation->set_rules('racun', 'Racun', 'required');		
			/*Setting Custom Error Messages*/
			$this->form_validation->set_message('required', 'Sva polja su obavezna!');
			/*If is validation successfull, insert in db*/
			if($this->form_validation->run())
			{
				$table = 'racun';
				$users_data = $this->main->get_users_data();
				$user_id = $users_data['korisnik_ID'];
				$controller = 'racun';
				$update = $this->crud->update_data($table, $id, $controller);
				if($update)
				{
					redirect('racun');
				}
			}
			else
			{	
				$users_data = $this->main->get_users_data();
				$table = 'racun';
				$korisnik_id = $users_data['korisnik_ID'];
				$data['racun_data'] = $this->crud->get_data_by_id($table, $korisnik_id, $id);
				$data['mode'] = 'edit';
				$name = 'racun';
				$this->main->display_site($name, $data);
			}/*end of if($this->form_validation->run()) */
		}
		else
		{
			$users_data = $this->main->get_users_data();
			$table = 'racun';
			$korisnik_id = $users_data['korisnik_ID'];
			$data['racun_data'] = $this->crud->get_data_by_id($table, $korisnik_id, $id);
			$data['mode'] = 'edit';
			$name = 'racun';
			$this->main->display_site($name, $data);
		}/*end of if($this->input->post('dodaj_racun')) */
	}/*end of public function edit() */

	/*This function allows deleting data */
	public function delete($id)
	{
		$table = 'racun';
		$delete = $this->crud->delete_data($table, $id);
		if($delete)
		{
			redirect('racun');
		}
	}

}
