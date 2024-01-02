<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class RolesList extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{
		$this->load->view('manageadmin/rolesList');
	}
	public function addNewRole()
	{
		$this->load->view('manageadmin/newrole');
	}

	public function Addrole()
	{
		$table = "kt_admin_roles";
		$role = $this->input->post();
		$data['role_title'] = $role['role_title'];
		$permissions = implode(",",$role['checkbox']);
		$data['permissions'] = $permissions;

		$this->Sqa_model->insert_record($table, $data, $retID = '');
		echo json_encode("yes");
	}

	public function get_adminroles()
	{
		ini_set('memory_limit', '-1');
		$valmax = 100;
		$points = 0;
		$btnstatus='';
		$i = 1;
		//$where = 'id'
        
        $data = $this->Sqa_model->get_records('kt_admin_roles', "*", $where = 'id!=1','id ASC',$limit='')->result();

		foreach ($data as $val) {
			$val->btn = '' . $btnstatus .
							'<button type="button" title="Edit Roles" class="btn btn-round btn-dark btn-sm view" id="' . $val->id . '"><i class="fa fa-pencil-square-o"></i></button>';
            
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
}