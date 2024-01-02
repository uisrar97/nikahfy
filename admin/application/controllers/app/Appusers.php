<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Appusers extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{
		$this->load->view('app/appusers');
	}

	public function incomplete()
	{
		$this->load->view('app/incomplete');
	}

	public function get_appusers()
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
			if ($val->pro_status ==1) {
				$val->status = '<h4><span class="label label-success">Approved</span></h4>';
				$btnstatus = '<button title="Disapproved" type="button" class="btn btn-round btn-success btn-sm disapp" id="' . $val->pro_person_id . '"><i class="fa fa-thumbs-o-up"></i></button>';
			} else {
				$val->status = '<h4><span class="label label-warning">Disapproved</span></h4>';
				$btnstatus = '<button title="Approved" type="button" class="btn btn-round btn-warning btn-sm app" id="' . $val->pro_person_id . '"><i class="fa fa-thumbs-down"></i></button>';
			}
			$val->btn = '' . $btnstatus .
					'<button type="button" title="View Profile" class="btn btn-round btn-dark btn-sm view" id="' . $val->pro_id . '"><i class="fa fa-eye"></i></button>
					<button type="button" title="Delete" class="btn btn-round btn-danger btn-sm delete_cat" id="' . $val->pro_person_id . '"><i class="fa fa-trash-o"></i></button>';
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

	public function app_user_del()
	{
		$id = $this->input->post('id');
		$table = 'users';
		$where = array('id' => $id);
		$res = $this->Sqa_model->delete_records($table, $where);
		 $this->Sqa_model->delete_records('profiles_pro', array('pro_person_id'=>$id));
		if ($res) {
			echo "yes";

		} else {
			echo "false";
		}
	}

	public function Deactivate()
	{
		$id = $this->input->post('id');
		$res = $this->Sqa_model->update_records('users', array('isActive' => '0', 'isDeleted' => '1'), array('id' => $id));
		 $this->Sqa_model->update_records('profiles_pro', array('pro_status' => 0), array('pro_person_id' => $id));
		if ($res) {
			print json_encode("yes");
		} else {
			print json_encode("false");
		}
	}

	public function Activate()
	{
		$id = $this->input->post('id');
		$res = $this->Sqa_model->update_records('users', array('isActive' => '1', 'isDeleted' => '0'), array('id' => $id));
		$this->Sqa_model->update_records('profiles_pro', array('pro_status' => 1), array('pro_person_id' => $id));
		if ($res) {
			print json_encode("yes");
		} else {
			print json_encode("false");
		}
	}
}


