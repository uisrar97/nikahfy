<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class New_Email extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{
        $this->load->view('email/new_email');
	}
	public function send_emails($emails='')
	{
		$this->load->view('email/new_email', $emails);
	}
}