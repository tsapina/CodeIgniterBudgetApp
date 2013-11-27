<?php
class Mycal_model extends CI_Model{
	var $conf; 
	public function __construct()
	{
		parent::__construct();
		$this->conf = array (
			'start_day' => 'monday',
			'show_next_prev' => true,
			'day_type' => 'long',
			'next_prev_url' => base_url() . 'stanje/stanje_main'
		);

		$this->load->model('main');

			$this->conf['template'] = '

			{table_open}<table class="calendar">{/table_open}

			{heading_row_start}<tr>{/heading_row_start}

			{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}

			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}

			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td class="day">{/cal_cell_start}

			{cal_cell_content}

				<div class="day_num">{day}</div>
				<div class="content">{content}</div>

			{/cal_cell_content}

			{cal_cell_content_today}
				<div class="day_num highligh">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content_today}

			{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="day_num highligh"><span class="day_listing">{day}</div>{/cal_cell_no_content_today}

			{cal_cell_blank}&nbsp;{/cal_cell_blank}

			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}

			{table_close}</table>{/table_close}
			';
	}

	function get_calendar_data($year, $month)
	{
		
		$korisnik_id = $this->main->get_users_data();

		$query = $this->db->select('date, data')->from('calendar')->where('korisnik_ID_FK', $korisnik_id['korisnik_ID'])->like('date', "$year-$month", 'after')->get(); /*Pogledat ponovo i zapisat komentare */

		$cal_data = array();

		foreach($query->result() as $row)
		{
			$cal_data[ltrim(substr($row->date,8,2),'0')] = $row->data;
		}
		return $cal_data;
	}

	function add_calendar_data($date, $data)
	{
		$korisnik_id = $this->main->get_users_data();
		$array = array('date' => $date, 'korisnik_ID_FK' => $korisnik_id['korisnik_ID']);

		if($this->db->select('date')->from('calendar')->where($array)->count_all_results())
		{	
			$id = $this->db->select('id')->from('calendar')->where($array)->get();

			foreach($id->result() as $row)
			{
				$date_id = $row->id;
			}
			$test = array('date' => $date, 'id' => $date_id);

			$this->db->where($test)
				->update('calendar', array(
				'date' => $date,
				'data' => $data
				));
		}
		else
		{
			$this->db->insert('calendar', array(
			'date' => $date,
			'data' => $data,
			'korisnik_ID_FK' => $korisnik_id['korisnik_ID'] 
			));
		}
		
	}

	function generate($year, $month)
	{
		$this->load->library('calendar', $this->conf);

		$cal_data = $this->get_calendar_data($year, $month);

		return $this->calendar->generate($year, $month, $cal_data);
	}

}