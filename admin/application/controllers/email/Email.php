<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Email extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');
		$this->load->model('Email_model');
	}

	public function index()
	{
		$this->load->view('email/email');
	}

	public function insertNewEmail()
	{
		$table = "contact_team";
		$data = $this->input->post();
		$this->Sqa_model->insert_record($table, $data, $retID = '');
		
		echo json_encode("yes");
	}	

	public function addNewEmail()
	{
		$this->load->view('email/addemail');
	}
	public function get_users()
	{
		ini_set('memory_limit', '-1');
		$valmax = 100;
		$points = 0;
		$btnstatus='';
		$i = 1;
		$pTable = 'profiles_pro';
		$columns = array('profiles_pro.*','users.id','users.fullName');
		$this->db->order_by('pro_id DESC');
		$joins = array(
			(0) => array(
				'table' => 'users',
				'condition' => 'users.id=profiles_pro.pro_person_id',
				'joinType' => 'inner'
			)
		);
	
		$data = $this->Sqa_model->get_joined_records($pTable, $columns, $joins, $where='')->result();

		foreach ($data as $val) {
			if(isset($val->pro_image) && !empty($val->pro_image)){
				$img= "http://nikahfy.com/web-services/assets/profileimage/".$val->pro_image;
				$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
			}else{
				$img= "http://nikahfy.com/web-services/assets/profileimage/default.png";
				$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
            }
            $val->btn = '' . $btnstatus .'<button type="button" title="Send Email" class="btn btn-round btn-dark btn-sm view" id="' . $val->pro_id . '"><i class="fa fa-envelope"></i></button>';
			
			if (isset($val->pro_person_id)) {
				$points -= 3.34;
			}
			if (isset($val->pro_name)) {
				$points -= 3.34;
			}
			if (isset($val->pro_relation)) {
				$points -= 3.34;
			}
			if (isset($val->pro_marital_status)) {
				$points -= 3.34;
			}
			if (isset($val->pro_dob)) {
				$points -= 3.34;
			}
			if (isset($val->pro_height)) {
				$points -= 3.34;
			}
			if (isset($val->pro_about_us)) {
				$points -= 3.34;
			}
			if (isset($val->pro_childrens)) {
				$points -= 3.34;
			}
			if (isset($val->pro_nationality1)) {
				$points -= 3.34;
			}
			if (isset($val->pro_residence_country)) {
				$points -= 3.34;
			}
			if (isset($val->pro_city)) {
				$points -= 3.34;
			}
			if (isset($val->pro_language)) {
				$points -= 3.34;
			}
			if (isset($val->pro_religion)) {
				$points -= 3.34;
			}
			if (isset($val->pro_sect)) {
				$points -= 3.34;
			}
			if (isset($val->pro_caste)) {
				$points -= 3.34;
			}
			if (isset($val->pro_education)) {
				$points -= 3.34;
			}
			if (isset($val->pro_profession)) {
				$points -= 3.34;
			}
			if (isset($val->pro_contact_person_name)) {
				$points -= 3.34;
			}
			if (isset($val->pro_contact_person_email)) {
				$points -= 3.34;
			}
			if (isset($val->pro_contact_person_phone)) {
				$points -= 3.34;
			}
			if (isset($val->pro_brothers)) {
				$points -= 3.34;
			}
			if (isset($val->pro_sisters)) {
				$points -= 3.34;
			}
			if (isset($val->pro_family_values)) {
				$points -= 3.34;
			}
			if (isset($val->pro_family_type)) {
				$points -= 3.34;
			}
			if (isset($val->pro_father_occupation)) {
				$points -= 3.34;
			}
			if (isset($val->pro_mother_occupation)) {
				$points -= 3.34;
			}
			if (isset($val->pro_family_hometown)) {
				$points -= 3.34;
			}
			if (isset($val->pro_smoking)) {
				$points -= 3.34;
			}
			if (isset($val->pro_alcohalic)) {
				$points -= 3.34;
			}
			if (isset($val->pro_eat_halal)) {
				$points -= 3.34;
			}

			$points *=-1;
			
			$tot = (round($points, 0) * $valmax) / 100;
						
			$val->total='<h4><span class="btn btn-round btn-primary btn-xs">'.$tot.'%</span></h4>';

			$points = 0;

			$val->cnt = $i;
			$i++;
		}
		if (!empty($data)) {
			$data1 = array('data' => $data);
			print json_encode($data1);
		} else {
			$data1 = array('data' => array());
			print json_encode($data1);
		}
	}

	public function send_new_email()
	{
	    $data = $this->input->post();
	    // print_r($data);
	    // exit;
		$res = $this->Email_model->sendNewEmail($data['to'], $data['emailbody'], $data['subject'], $data['cc'], $data['bcc'], $toname='admin');
		
		if($res == '1')
		{
		    $_SESSION['email'] = 'Email Sent Successfully.';
		    $this->session->mark_as_flash('email');
		}
		else
		{
		    $_SESSION['email'] = 'Email Sending Failed.';
		    $this->session->mark_as_flash('email');
		}
		
		$this->load->view('email/new_email');
	}

	public function send_user_email()
	{
	    $data = $this->input->post();
	    // print_r($data);
	    // exit;
		$res = $this->Email_model->sendUserEmail($data['to'], $data['emailbody'], $data['subject'], $toname='admin');
		
		if($res == '1')
		{
		    $_SESSION['email'] = 'Email Sent Successfully.';
		    $this->session->mark_as_flash('email');
		}
		else
		{
		    $_SESSION['email'] = 'Email Sending Failed.';
		    $this->session->mark_as_flash('email');
		}
		
		$this->load->view('email/email');
	}
	public function send_developer_email()
	{
		$data = $this->input->post();
		
		$res = $this->Email_model->sendNewEmail($data['to'], $data['emailbody'], $data['subject'], $data['cc'], $data['bcc'], $toname='admin');

		if($res == '1')
		{
		    $_SESSION['dev_email'] = 'Email Sent Successfully.';
		    $this->session->mark_as_flash('dev_email');
		}
		else
		{
		    $_SESSION['dev_email'] = 'Email Sending Failed.';
		    $this->session->mark_as_flash('dev_email');
		}

		$data['developer']=$this->db->query("SELECT * FROM `contact_team` WHERE t_type='1'")->result();

		$this->load->view('email/developer',$data);
	}
	public function send_marketing_email()
	{
		$data = $this->input->post();
		
		$res = $this->Email_model->sendNewEmail($data['to'], $data['emailbody'], $data['subject'], $data['cc'], $data['bcc'], $toname='admin');

		if($res == '1')
		{
		    $_SESSION['market_email'] = 'Email Sent Successfully.';
		    $this->session->mark_as_flash('market_email');
		}
		else
		{
		    $_SESSION['market_email'] = 'Email Sending Failed.';
		    $this->session->mark_as_flash('market_email');
		}
		

		$data['market']=$this->db->query("SELECT * FROM `contact_team` WHERE t_type='0'")->result();

		$this->load->view('email/marketing',$data);
	}
}