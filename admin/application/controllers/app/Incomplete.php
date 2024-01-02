<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Incomplete extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');
		$this->load->model('Email_model');
	}

	public function index()
	{
		$this->load->view('app/incomplete');
	}

    public function get_incomplete()
	{
		$btnstatus='';
		
		$this->db->where("`pro_person_id` IS NULL OR `pro_name` IS NULL OR `pro_relation` IS NULL OR 
		`pro_marital_status` IS NULL OR `pro_dob` IS NULL OR `pro_height` IS NULL OR 
		`pro_about_us` IS NULL OR `pro_childrens` IS NULL OR `pro_nationality1` IS NULL OR 
		`pro_residence_country` IS NULL OR `pro_city` IS NULL OR `pro_language` IS NULL OR 
		`pro_religion` IS NULL OR `pro_sect` IS NULL OR `pro_caste` IS NULL OR `pro_education` IS NULL OR 
		`pro_profession` IS NULL OR `pro_contact_person_name` IS NULL OR `pro_contact_person_email` IS NULL OR 
		`pro_contact_person_phone` IS NULL OR `pro_brothers` IS NULL OR `pro_sisters` IS NULL OR 
		`pro_family_values` IS NULL OR `pro_family_type` IS NULL OR `pro_father_occupation` IS NULL OR 
		`pro_mother_occupation` IS NULL OR `pro_family_hometown` IS NULL OR `pro_smoking` IS NULL OR 
		`pro_alcohalic` IS NULL OR `pro_eat_halal` IS NULL",null,false);
		$data = $this->db->get("profiles_pro")->result();
		
		foreach ($data as $val) 
		{
			if(isset($val->pro_image) && !empty($val->pro_image))
			{
		 		$img= "http://nikahfy.com/web-services/assets/profileimage/".$val->pro_image;
		 		$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
			}
			else
			{
		 		$img= "http://nikahfy.com/web-services/assets/profileimage/default.png";
		 		$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
		 	}
		 	$val->btn = '' . $btnstatus .
		 		'<input type="checkbox" class="all" name="email[]" title="Send Email" value="'. $val->pro_contact_person_email . '">';
		}
		if (!empty($data)) {
			$data1 = array('data' => $data);
			echo json_encode($data1);
		} else {
			$data1 = array('data' => array());
			echo json_encode($data1);
		}
	}

    public function send_emails()
    {
		$data = $this->input->post();
		
		$emailArray = explode(",",$data['to']);
		
		foreach ($emailArray as $val)
		{
			$data['to']=$val;
			$res = $this->Email_model->sendUserEmail($data['to'], $data['emailbody'], $data['subject'], $toname='admin');
		}
		$this->load->view("email/new_email");
    }
}