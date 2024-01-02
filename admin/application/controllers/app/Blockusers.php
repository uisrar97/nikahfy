<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Blockusers extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{

		$this->load->view('app/blockusers');
	}


	public function get_blockusers()
	{
		$btnstatus='';
		$i = 1;
		/*$pTable = 'profiles_pro';
		$columns = array('profiles_pro.*','users.id','users.fullName');
		$this->db->order_by('pro_id DESC');
		$joins = array(
			(0) => array(
				'table' => 'users',
				'condition' => 'users.id=profiles_pro.pro_person_id',
				'joinType' => 'left'
			)
		);*/
		//$pTable = 'blocked_users_bu';
		//$columns = array('*');
	//	$this->db->order_by('profiles_pro.pro_id DESC');
		$joins = array(
			(0) => array(
				'table' => 'profiles_pro as pro',
				'condition' => 'pro.pro_person_id=blocked_users_bu.bu_from',
				'joinType' => 'left'
			),
			(1) => array(
				'table' => 'profiles_pro as pro1',
				'condition' => 'pro1.pro_person_id=blocked_users_bu.bu_to',
				'joinType' => 'left'
			)
			
		);
		//$where = array('bu_status' => 'block');
		$data = $this->Sqa_model->get_joined_records('blocked_users_bu',
		array('pro.pro_id as frm_id', 'pro1.pro_id as to_id', 'pro.pro_visible as frm_pro_visible', 'pro1.pro_visible as to_pro_visible',
			
		'pro.pro_person_id as frm_userId', 'pro1.pro_person_id as to_userId', 'pro.pro_name as frm_name', 'pro1.pro_name as to_name',
		
		'pro.pro_image as frm_image', 'pro1.pro_image as to_image', 'bu_id', 'bu_status'), $joins, $where='', $order_by = '')->result();
		foreach($data as $val)
		{			
			$img1= "http://nikahfy.com/web-services/assets/profileimage/".$val->frm_image;
			$val->frm_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img1.'">';

			$img2= "http://nikahfy.com/web-services/assets/profileimage/".$val->to_image;
			$val->to_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img2.'">';

			if($val->bu_status=='block')
			{
				$val->status='<center><label class="label label-success">Blocked</label></center>';
			}
			elseif($val->bu_status=='reject')
			{
				$val->status='<center><label class="label label-warning">Rejected</label></center>';
			}

			$val->btn = '<center><button type="button" title="Delete" class="btn btn-round btn-danger btn-sm delete_cat" id="'. $val->bu_id .'"><i class="fa fa-trash-o"></i></button></center>';
		}
		
		if (!empty($data)) {
			$data1 = array('data' => $data);
			print json_encode($data1);
		} else {
			$data1 = array('data' => array());
			print json_encode($data1);
		}
	}

	public function block_user_del()
	{
		$id = $this->input->post('id');
		$table = 'blocked_users_bu';
		$where = array('bu_id' => $id);
		$res = $this->Sqa_model->delete_records($table, $where);
		 $this->Sqa_model->delete_records('blocked_users_bu', array('bu_id'=>$id));
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


