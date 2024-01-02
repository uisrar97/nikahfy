<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Usercons extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');
	}

	public function index()
	{
        $this->load->view('app/usercons');
	}


	public function get_usercons()
	{
		ini_set('memory_limit', '-1');
		$btnstatus='';
		$i = 1;
		$pTable = 'friend_requests_fr';
		//$columns = array('*');
        $this->db->order_by('fr_id DESC');
        //$this->db->group_by('fr_from');
        $this->db->group_by('frm_name');
        $this->db->group_by('frm_image');
        $this->db->group_by('pro_id');
        $this->db->group_by('frm_email');
        $this->db->group_by('frm_contact');
        $this->db->group_by('fr_id');
		$joins = array(
			(0) => array(
				'table' => 'profiles_pro as pro',
				'condition' => 'pro.pro_person_id=friend_requests_fr.fr_from',
				'joinType' => 'inner'
			)
		);
	
		$data = $this->Sqa_model->get_joined_records($pTable,
		array('pro.pro_name as frm_name', 'pro.pro_image as frm_image', 'pro.pro_person_id as pro_id', 'pro.pro_contact_person_email as frm_email', 'pro.pro_contact_person_phone as frm_contact'), $joins, $where='')->result();

        foreach ($data as $val) 
        {
            $img= "http://nikahfy.com/web-services/assets/profileimage/".$val->frm_image;
			$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
            
			$val->btn = '' . $btnstatus .'<button type="button" title="View Connections" class="btn btn-round btn-dark btn-sm view" id="' . $val->pro_id . '"><i class="fa fa-eye"></i></button>';
			    //<button type="button" title="Delete" class="btn btn-round btn-danger btn-sm delete_cat" id="' . $val->pro_person_id . '"><i class="fa fa-trash-o"></i></button>
            
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
	public function get_sentcons($id='')
	{
		ini_set('memory_limit', '-1');
		$btnstatus='';
		$i = 1;
		$pTable = 'friend_requests_fr';
		//$columns = array('*');
        $this->db->order_by('fr_id DESC');
        $joins = array(
			(0) => array(
				'table' => 'profiles_pro as pro',
				'condition' => 'pro.pro_person_id=friend_requests_fr.fr_to',
				'joinType' => 'inner'
			)
		);
	
		$data = $this->Sqa_model->get_joined_records($pTable,
		array('pro.pro_name as to_name', 'pro.pro_image as to_image', 'fr_status'), $joins, $where=array('fr_from'=>$id))->result();

        foreach ($data as $val) 
        {
            $img= "http://nikahfy.com/web-services/assets/profileimage/".$val->to_image;
			$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
			
			if($val->fr_status==1)
			{
				$val->fr_status='Accepted';
			}
			elseif($val->fr_status==0)
			{
				$val->fr_status='Pending';
			}
			elseif($val->fr_status==2)
			{
				$val->fr_status='Rejected';
			}

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
	public function get_receivedcons($id='')
	{
		ini_set('memory_limit', '-1');
		$btnstatus='';
		$i = 1;
		$pTable = 'friend_requests_fr';
		//$columns = array('*');
        $this->db->order_by('fr_id DESC');
        $joins = array(
			(0) => array(
				'table' => 'profiles_pro as pro',
				'condition' => 'pro.pro_person_id=friend_requests_fr.fr_from',
				'joinType' => 'inner'
			)
		);
	
		$data = $this->Sqa_model->get_joined_records($pTable,
		array('pro.pro_name as from_name', 'pro.pro_image', 'fr_status'), $joins, $where=array('fr_to'=>$id))->result();

        foreach ($data as $val) 
        {
            $img= "http://nikahfy.com/web-services/assets/profileimage/".$val->pro_image;
			$val->pro_image='<img style="width:50px; height: 50px;" class="img img-circle" src="'.$img.'">';
			
			if($val->fr_status==1)
			{
				$val->fr_status='Accepted';
			}
			elseif($val->fr_status==0)
			{
				$val->fr_status='Pending';
			}
			elseif($val->fr_status==2)
			{
				$val->fr_status='Rejected';
			}
			

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