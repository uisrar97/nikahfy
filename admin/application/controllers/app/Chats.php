<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Chats extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');
	}

	public function index()
	{

        $this->load->view('app/chats');
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
			} else {
				$val->status = '<h4><span class="label label-warning">Disapproved</span></h4>';
			}
			$val->btn = '' . $btnstatus .
				'<button type="button" title="View Chats" class="btn btn-round btn-dark btn-sm view" id="' . $val->pro_id . '"><i class="fa fa-eye"></i></button>';
			
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

	public function get_chats($id='')
	{
        $btnstatus='';

		$data=$this->db->query("SELECT m.*, u1.fullName AS sender, u2.fullName AS recipient, profiles_pro.pro_image
			FROM user_chat m
			JOIN users u1 ON m.sender_id=u1.id
			JOIN users u2 ON m.receiver_id=u2.id
			JOIN profiles_pro ON pro_person_id=u2.id
			WHERE m.chat_id IN (
			SELECT MAX(chat_id)
			FROM user_chat
			WHERE sender_id = $id OR receiver_id = $id
            GROUP BY conversation_id) ORDER BY m.chat_id DESC")->result();
        foreach ($data as $val) 
        {
            $val->btn= '' . $btnstatus .
            '<center><button type="button" title="View Chats" class="btn btn-round btn-dark btn-sm view" id="' . $val->conversation_id . '"><i class="fa fa-eye"></i></button></center>';
        }
        
        if (!empty($data)) 
        {
            $data1 = array('data' => $data);
            echo json_encode($data1);
        } 
        else 
        {
            $data1 = array('data' => array());
            echo json_encode($data1);
        }
	}
    
    public function get_sentchats($id='')
	{
		$btnstatus='';
		$data=$this->db->query("SELECT m.*, u1.fullName AS sender, u2.fullName AS recipient, profiles_pro.pro_image
					FROM user_chat m
					JOIN users u1 ON m.sender_id=u1.id
					JOIN users u2 ON m.receiver_id=u2.id
					JOIN profiles_pro ON pro_person_id=u2.id
					WHERE conversation_id = '$id' ORDER BY m.chat_id DESC")->result();
		// print_r($data);
        // exit;
		foreach($data as $val)
		{
			$val->btn = '' . $btnstatus .
				'<center><button type="button" title="View Message" class="btn btn-round btn-dark btn-sm viewm" id="' . $val->chat_id . '"><i class="fa fa-eye"></i></button></center>';
		}
        
		if (!empty($data)) {
			$data1 = array('data' => $data);
			print json_encode($data1);
		} else {
			$data1 = array('data' => array());
			print json_encode($data1);
		}
	}

	public function get_full_msg()
    {
		$id = $this->input->post('chat_id');

		$res = $this->Sqa_model->get_records('user_chat', array('*'), array('chat_id' => $id))->row();
		
		if (!empty($res)) 
		{
			print json_encode($res);
		}
		else
		{
			print json_encode("false");
		}
    }
}