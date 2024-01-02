<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Marketing extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');
	}

	public function index()
	{
		$data['market']=$this->db->query("SELECT * FROM `contact_team` WHERE t_type='0'")->result();

		$this->load->view('email/marketing',$data);
	}
}