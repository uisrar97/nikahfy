<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Adminlist extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{

		$this->load->view('manageadmin/adminlist');
	}


	public function get_adminusers()
	{
		ini_set('memory_limit', '-1');
		$valmax = 100;
		$points = 0;
		$btnstatus='';
		$i = 1;

		$data = $this->Sqa_model->get_records('kt_admin', "*", $where = 'is_sup_admin!=1','id ASC',$limit='')->result();

		foreach ($data as $val) {
			
			$val->admin_role_id = $this->db->query("SELECT role_title FROM `kt_admin_roles` WHERE id = $val->admin_role_id")->result_array();
			
			if ($val->status ==1) {
				$val->status = '<h4><span class="label label-success">Active</span></h4>';
				$btnstatus = '<button title="Inactive" type="button" class="btn btn-round btn-success btn-sm disapp" id="' . $val->id . '"><i class="fa fa-thumbs-o-up"></i></button>';
			} else {
				$val->status = '<h4><span class="label label-warning">Inactive</span></h4>';
				$btnstatus = '<button title="Active" type="button" class="btn btn-round btn-warning btn-sm app" id="' . $val->id . '"><i class="fa fa-thumbs-down"></i></button>';
			}
					$val->btn = '' . $btnstatus .
							'<button type="button" title="Delete" class="btn btn-round btn-danger btn-sm delete_cat" id="' . $val->id . '"><i class="fa fa-trash-o"></i></button>';
			
			
			$val->cnt = $i;
			$i++;
		}
		if (!empty($data)) {
			$data1 = array('data' => $data);
			echo json_encode($data1);
		} else {
			$data1 = array('data' => array());
			echo json_encode($data1);
		}
	}

	public function admin_user_del()
	{
		$id = $this->input->post('id');
		$table = 'kt_admin';
		$where = array('id' => $id);
		$res = $this->Sqa_model->delete_records($table, $where);
		if ($res) {
			echo "yes";

		} else {
			echo "false";
		}
	}

	public function Deactivate()
	{
		$id = $this->input->post('id');
		$res = $this->Sqa_model->update_records('kt_admin', array('status' => '0'), array('id' => $id));
		if ($res) {
			print json_encode("yes");
		} else {
			print json_encode("false");
		}
	}


	public function Activate()
	{
		$id = $this->input->post('id');
		$res = $this->Sqa_model->update_records('kt_admin', array('status' => '1'), array('id' => $id));
		if ($res) {
			print json_encode("yes");
		} else {
			print json_encode("false");
		}
	}


}


