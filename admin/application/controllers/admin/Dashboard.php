<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 3.34:3.343.34 AM
 */
class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sqa_model');

	}

	public function index()
	{
		$data['totalusers']=$this->Sqa_model->count_get_records('profiles_pro', array('*'), $where = '');
		$data['totalmales']=$this->Sqa_model->count_get_records('profiles_pro', array('*'), $where = array('pro_gender'=>'Male'));
		$data['totalfemales']=$this->Sqa_model->count_get_records('profiles_pro', array('*'), $where = array('pro_gender'=>'Female'));
		
		$data['daily']=$this->db->query("SELECT COUNT(*) as d_count FROM `users` WHERE DATE(`createdOn`) = CURDATE()")->row();
		$data['weekly']=$this->db->query("SELECT COUNT(*) as w_count FROM users WHERE createdOn > (NOW() - INTERVAL 7 DAY)")->row();
		$data['monthly']=$this->db->query("SELECT COUNT(*) as m_count FROM users WHERE createdOn > (NOW() - INTERVAL 30 DAY)")->row();

		$data['s_males']=$this->Sqa_model->count_get_records('profiles_pro', array('*'), $where = array('pro_gender'=>'Male','pro_marital_status'=>'Single'));
		$data['s_females']=$this->Sqa_model->count_get_records('profiles_pro', array('*'), $where = array('pro_gender'=>'Female','pro_marital_status'=>'Single'));

		$data['t_con']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $where = array('fr_status'=>'1'));
		$data['t_com']=$this->Sqa_model->count_get_records('profiles_pro', array('*'), $where = array('pro_status'=>'1'));
		
		$this->db->where("`pro_person_id` IS NULL OR `pro_name` IS NULL OR `pro_relation` IS NULL OR `pro_marital_status` IS NULL OR `pro_dob` IS NULL OR `pro_height` IS NULL OR `pro_about_us` IS NULL OR `pro_childrens` IS NULL OR `pro_nationality1` IS NULL OR `pro_residence_country` IS NULL OR `pro_city` IS NULL OR `pro_language` IS NULL OR `pro_religion` IS NULL OR `pro_sect` IS NULL OR `pro_caste` IS NULL OR `pro_education` IS NULL OR `pro_profession` IS NULL OR `pro_contact_person_name` IS NULL OR `pro_contact_person_email` IS NULL OR `pro_contact_person_phone` IS NULL OR `pro_brothers` IS NULL OR `pro_sisters` IS NULL OR `pro_family_values` IS NULL OR `pro_family_type` IS NULL OR `pro_father_occupation` IS NULL OR `pro_mother_occupation` IS NULL OR `pro_family_hometown` IS NULL OR `pro_smoking` IS NULL OR `pro_alcohalic` IS NULL OR `pro_eat_halal` IS NULL",null,false);
		$data['t_incom'] = $this->db->get("profiles_pro")->num_rows();
		
		$this->load->view('admin/dashboard',$data);
	}

	public function get_profiles()
	{


	}

	public function logout()
	{
		$data = array('id',
			'name',
			'username',
			'email',
			'password',
			'contact',
			'phone',
			'status',
			'loggedin');
		$this->session->sess_destroy($data);
		/*     $expire= time()+(863.3400 * 30);
			 $path='/';
			 $domain = 'centersquare.plandstudios.com';
			 $name='centersquare_username';
			 $value='';
			 setcookie ($name, $value, $expire, $path, $domain, $secure = false, $httponly = false);*/
		redirect('/');
	}

	public function app_user_del(){
		$id = $this->input->post('id');
		$table = 'profiles_pro';
		$where = array('pro_id' => $id);
		$res = $this->Sqa_model->delete_records($table, $where);
		if ($res) {
			echo "yes";

		} else {
			echo "false";
		}
	}


	public function change_lang($lang = '')
	{
		$this->session->set_userdata('Language', $lang);
		echo 'changed';
	}

	public function view($id='')
	{
		$data['profiles']=$this->db->where('pro_id',$id)->get('profiles_pro')->row();
		
		$data['f_sent']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $where = array('fr_from_profile'=>$id));
		
		$wheref_accepted="fr_status=1 AND (fr_from_profile=$id OR fr_to_profile=$id)";
		$data['f_accepted']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheref_accepted);
		
		$wheref_rejected="fr_status=2 AND (fr_from_profile=$id OR fr_to_profile=$id)";
		$data['f_rejected']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheref_rejected);
		
		$wheref_pending="fr_status=0 AND (fr_from_profile=$id OR fr_to_profile=$id)";
		$data['f_pending']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheref_pending);
		
		if(!empty($data['profiles']))
		{
			$valmax = 100;
			$points = 0;

		if (isset($data['profiles']->pro_person_id)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_name)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_relation)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_marital_status)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_dob)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_height)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_about_us)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_childrens)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_nationality1)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_residence_country)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_city)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_language)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_religion)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_sect)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_caste)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_education)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_profession)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_contact_person_name)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_contact_person_email)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_contact_person_phone)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_brothers)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_sisters)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_family_values)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_family_type)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_father_occupation)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_mother_occupation)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_family_hometown)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_smoking)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_alcohalic)) {
			$points += 3.34;
		}
		if (isset($data['profiles']->pro_eat_halal)) {
			$points += 3.34;
		}

		$tot = (round($points, 0) * $valmax) / 100;
		
		$data['profiles']->total=$tot;
		}
	
		$this->load->view('app/profile',$data);
	}

	public function viewAdmin($id='')
	{
		$data=$this->db->where('id',$id)->get('kt_admin_roles')->row_array();

		
		$permissions = explode(',',$data['permissions']);
		
		$data['permissions'] = $permissions;
		
		$this->load->view('manageadmin/adminprofile',$data);
	}

	public function s_email($id='')
	{
		$data['profiles']=$this->db->where('pro_id',$id)->get('profiles_pro')->row();
		
		$this->load->view('email/send_email',$data);
	}

	public function viewCons($id='')
	{
		$data['profiles']=$this->db->where('pro_person_id',$id)->get('profiles_pro')->row();

		$wheret_con="fr_from=$id OR fr_to=$id";
		$data['t_connections']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheret_con);
		
		$wheret_confirm="fr_status=1 AND (fr_from=$id OR fr_to=$id)";
		$data['t_confirmed']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheret_confirm);

		$wheret_pending="fr_status=0 AND (fr_from=$id OR fr_to=$id)";
		$data['t_pending']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheret_pending);
		
		$wheret_reject="fr_status=2 AND (fr_from=$id OR fr_to=$id)";
		$data['t_rejected']=$this->Sqa_model->count_get_records('friend_requests_fr', array('*'), $wheret_reject);
		
		$data['id']=$id;
		$this->load->view('app/cons',$data);
	}

	public function viewChats($id='')
	{
		$data['id']=$id;
		
		$this->load->view('app/v_chats', $data);
	}
	public function vChats($id='')
	{
		$data['id']=$id;
		
		$this->load->view('app/s_chat', $data);
	}
}


