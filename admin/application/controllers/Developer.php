<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Developer extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');
	}

	public function index()
	{
		$data['developer']=$this->db->query("SELECT * FROM `contact_team` WHERE t_type='1'")->result();
		
		$this->load->view('email/developer',$data);
	}
}