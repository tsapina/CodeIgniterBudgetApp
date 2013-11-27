<?php

class Crud extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	
    /*I use this method when i need retrieve data from table racun*/
	public function get_data($table, $korisnik_id)
    {
    	$query = $this->db->get_where($table, array('korisnik_ID_FK' => $korisnik_id));
		return $query->result_array();
    }

    /*I use this method when i need retrieve one row for editing*/
    public function get_data_by_id($table, $user_id, $id)
    {	
    	$table_id = $table . '_ID';
    	$query = $this->db->get_where($table, array('korisnik_ID_FK' => $user_id, $table_id => $id));
		return $query->result_array();
    }

    /*I use this method when i need display prihod or rashod from table transakcija, $tip can be P or R*/
    public function get_data_by_tip($korisnik_id, $tip)
    {
        $query = $this->db->get_where('transakcija', array('korisnik_ID_FK' => $korisnik_id, 'tip' => $tip));
        return $query->result_array();
    }

    /*I use this method when i need inserting data in table racun or transakcija, $controller can be racun, prihod, rashod*/
    public function insert_data($table, $user_id, $controller, $tip = false)
    {
        if($controller == 'racun')
        {
            $data = array(
                'naziv' => $this->input->post('racun'),
                'valuta' => $this->input->post('valuta'),
                'korisnik_ID_FK' => $user_id
            );
            return $this->db->insert($table, $data);
        }
        elseif($controller == 'prihod')
        {
            $data = array(
                'komentar' => $this->input->post('komentar'),
                'racun' => $this->input->post('racun'),
                'etiketa' => $this->input->post('etiketa'),
                'iznos' => $this->input->post('iznos'),
                'vrsta' => $this->input->post('vrsta'),
                'datum' => $this->input->post('datum'),
                'tip' => $tip,
                'korisnik_ID_FK' => $user_id
            );
            return $this->db->insert($table, $data); 
        }
        elseif($controller == 'rashod')
        {
            $data = array(
                'komentar' => $this->input->post('komentar_rashod'),
                'racun' => $this->input->post('racun_rashod'),
                'etiketa' => $this->input->post('etiketa_rashod'),
                'iznos' => $this->input->post('iznos_rashod'),
                'vrsta' => $this->input->post('vrsta_rashod'),
                'datum' => $this->input->post('datum_rashod'),
                'tip' => $tip,
                'korisnik_ID_FK' => $user_id
            );
             return $this->db->insert($table, $data); 
        }
    	
    }

    /*I use this method when i need update data in table racun or transakcija, $controller can be racun, prihod, rashod*/
    public function update_data($table, $id, $controller)
    {
        if($controller === 'racun')
        {
            $data = array(
            'naziv' => $this->input->post('racun'),
            'valuta' => $this->input->post('valuta'),
            );
            $table_id = $table . '_ID';
            $this->db->where($table_id, $id);
            return $this->db->update($table, $data);    
        }
       elseif($controller == 'prihod')
        {
            $data = array(
                'komentar' => $this->input->post('komentar'),
                'racun' => $this->input->post('racun'),
                'etiketa' => $this->input->post('etiketa'),
                'iznos' => $this->input->post('iznos'),
                'vrsta' => $this->input->post('vrsta'),
                'datum' => $this->input->post('datum')
            );
            $table_id = $table . '_ID';
            $this->db->where($table_id, $id);
            return $this->db->update($table, $data);
        }
        elseif($controller == 'rashod')
        {
            $data = array(
                'komentar' => $this->input->post('komentar_rashod'),
                'racun' => $this->input->post('racun_rashod'),
                'etiketa' => $this->input->post('etiketa_rashod'),
                'iznos' => $this->input->post('iznos_rashod'),
                'vrsta' => $this->input->post('vrsta_rashod'),
                'datum' => $this->input->post('datum_rashod')
            );
            $table_id = $table . '_ID';
            $this->db->where($table_id, $id);
            return $this->db->update($table, $data);
        }
    }

    /*Simple function for deleting date by id*/
    public function delete_data($table, $id)
    {
        if($table == 'racun')
        {
            $user= $this->main->get_users_data();
            $user_id = $user['korisnik_ID'];
            $table = 'racun';
            $this->load->model('crud');
            $racun = $this ->crud->get_data_by_id($table, $user_id,  $id);
            $naziv = $racun[0]['naziv'];
            $this->db->where('racun', $naziv);
            $this->db->delete('transakcija'); 
        }
    	$table_id = $table . '_ID';
		$this->db->where($table_id, $id);
		return $this->db->delete($table); 
    }

    public function password_update()
    {
        $this->load->model('main');
        $user = $this->main->get_users_data();
        $id = $user['korisnik_ID'];
        $data = array(
                'password' => md5($this->input->post('password'))
            );
        $this->db->where('korisnik_ID', $id);
        return $this->db->update('korisnik', $data);
    }

    public function get_data_by_etiketa($user_id, $tip)
    {
        $query = $this->db->get_where('transakcija', array('korisnik_ID_FK' => $user_id, 'tip' => $tip, 'etiketa' => $this->input->post('etiketa')));
        return $query->result_array();
    }
}