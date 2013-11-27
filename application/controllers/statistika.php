<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistika extends CI_Controller {
	/* Construct, loading models and helpers necessary for further work */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('main');
		$this->load->database();
	}

	/*This is index function, if user is loged in call function racun data  */
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
        $this->etikete_prihodi();      
    }

    public function etikete_prihodi()
    {
    	$user = $this->main->get_users_data();
    	$user_id = $user['korisnik_ID'];
    	if($this->input->post('izlistaj_etikete'))
    	{
    		$tip = 'P';
    		$data['izlistane_etikete'] = $this->crud->get_data_by_etiketa($user_id, $tip);
    	}	
    	$tip = 'P';
    	$data['etikete_prihodi'] = $this->crud->get_data_by_tip($user_id, $tip);

    	$name = 'etikete_prihodi';
		$this->main->display_site($name, $data);	
    }

    public function etikete_rashodi()
    {
    	$user = $this->main->get_users_data();
    	$user_id = $user['korisnik_ID'];
    	if($this->input->post('izlistaj_etikete'))
    	{
    		$tip = 'R';
    		$data['izlistane_etikete'] = $this->crud->get_data_by_etiketa($user_id, $tip);
    	}	
    	$tip = 'R';
    	$data['etikete_rashodi'] = $this->crud->get_data_by_tip($user_id, $tip);

    	$name = 'etikete_rashodi';
		$this->main->display_site($name, $data);	
    }

    
}
