<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stanje extends CI_Controller {

	/* Construct, loading models and helpers necessary for further work */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
		$this->load->model('main');
		$this->load->database();
	}

	/*This is index function, if user is loged in load function  */
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
		
		$this->stanje_main();
	}

	/*This function purpuse is prepare data for displaying all accounts with  amounts, displaying calendar and displaying   graphs*/
	public function stanje_main($year = null, $month = null)
	{	
		/*Stanje na računima */
		$users_data = $this->main->get_users_data();
		$table = 'racun';
		$user_id = $users_data['korisnik_ID'];
		$racun = $this->crud->get_data($table, $user_id);

		foreach($racun as $row)
		{

			$this->db->select_sum('iznos');
			$prihod = $this->db->get_where('transakcija', array('korisnik_ID_FK' => $user_id, 'tip' => 'P', 'racun' => $row['naziv']));
			$prihod_sum =$prihod ->result_array();
		
			$this->db->select_sum('iznos');
			$rashod = $this->db->get_where('transakcija', array('korisnik_ID_FK' => $user_id, 'tip' => 'R', 'racun' => $row['naziv']));
			$rashod_sum =$rashod ->result_array();
	
			$racun_stanje = $prihod_sum[0]['iznos']-$rashod_sum[0]['iznos'];

			$naziv[] =  $row['naziv'];
			$stanje[] = $racun_stanje;

			$data['naziv_banke'][] = $row['naziv'];
			$data['valuta'][] = $row['valuta'];
			$data['stanje'][]= $racun_stanje;
		}

		/*Pozivanje graf funckije */
		$data['graf_rashod'] = $this->graf_rashod();
		$data['graf_prihod'] = $this->graf_prihod();

		/*Calendar*/
		if(!$year){
			$year = date('Y');
		}
		if(!$month)
		{
			$month = date('m');
		}
		$this->load->model('Mycal_model');

		if($day = $this->input->post('day'))
		{
			$this->Mycal_model->add_calendar_data(
					"$year-$month-$day",
					$this->input->post('data')
				);
		}

		$data['calendar'] = $this->Mycal_model->generate($year,$month);
		$name = 'stanje';
		$this->main->display_site($name, $data);
	}


	public function graf_rashod()
	{	
			$users_data = $this->main->get_users_data();
			$user_id = $users_data['korisnik_ID'];
			$danas = date("Y-m-d");
			$trideset = date("Y-m-d", strtotime("-30 day"));
			$query = mysql_query("SELECT * FROM transakcija WHERE korisnik_ID_FK = $user_id AND tip = 'R' AND datum BETWEEN '$trideset' AND '$danas' ORDER BY datum ASC");
			if(mysql_num_rows($query) < 1)
			{
				$data['uslucajudanemanista'] = '1';
			}
			while ($row = mysql_fetch_array($query)) 
			{
				$iznos[] = $row['iznos'];
				$datum[] = $row['datum'];

				$data['iznos'] = $iznos;
				$data['datum'] = $datum;
			}
			return $data;
	}

	public function graf_prihod()
	{	
			$users_data = $this->main->get_users_data();
			$user_id = $users_data['korisnik_ID'];
			$danas = date("Y-m-d");
			$stoosamdeset = date("Y-m-d", strtotime("-180 day"));
			$query = mysql_query("SELECT * FROM transakcija WHERE korisnik_ID_FK = $user_id AND tip = 'P' AND datum BETWEEN '$stoosamdeset' AND '$danas' ORDER BY datum ASC");
			if(mysql_num_rows($query) < 1)
			{
				$data['uslucajudanemanista'] = '1';
			}
			while ($row = mysql_fetch_array($query)) 
			{
				$iznos[] = $row['iznos'];
				$datum[] = $row['datum'];

				$data['iznos'] = $iznos;
				$data['datum'] = $datum;
			}
			return $data;
	}
}
