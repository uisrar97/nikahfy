<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Newadmin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{
        $table = "kt_admin_roles";
        $columns = "*";
        $where = "id!=1";
        $data['roles'] = $this->Sqa_model->get_records($table, $columns, $where, $order_by='',$limit='')->result();
        
        $this->load->view('manageadmin/newadmin', $data);
    }
    
    public function insert()
    {
        $data = $this->input->post();
        $data['profile_image'] = $_FILES['profile_image']['name'];

        $config['file_name'] = $_FILES['profile_image']['name'];
        $config['allowed_types']  = 'jpg|jpeg|png';
        $config['upload_path'] = 'uploads/admin_profile_images/';
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('profile_image'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $this->Sqa_model->insert_record("kt_admin", $data, $retID = '');
            echo json_encode("yes");
        }
        // print_r($data);
        //         exit;
        
        
    }
}