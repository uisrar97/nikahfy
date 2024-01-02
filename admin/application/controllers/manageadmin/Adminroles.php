<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Adminroles extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{
        $data['admin']=$this->db->query("SELECT * FROM `kt_admin_roles`")->result();

		$this->load->view('manageadmin/adminroles', $data);
	}

	public function Update()
	{
		$table = "kt_admin_roles";
		$postData = $this->input->post();
		
		$permissions = implode(",",$postData['checkbox']);
		
		$where = array("id"=>$postData['id']);
		$data['role_title'] = $postData['role_title'];
		$data['permissions'] = $permissions;
		$this->Sqa_model->update_records($table, $data, $where);
		echo json_encode("yes");
	}
	
	public function Add_role()
	{
		$table = "kt_admin_roles";
		$role = $this->input->post();

		$this->Sqa_model->insert_record($table, $role, $retID = '');
		echo json_encode("yes");
	}
}


