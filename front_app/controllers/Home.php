<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Home_model");
		$this->load->model("Common_model");
		$this->load->helper('custom_helper');

	}


	public function career()
	{
		$data["jobs"] = $this->electric->get_records('tbl_jobs', array('*'), array('Language' => $this->session->userdata('Language')))->result();
		$this->load->view('career', $data);
	}


	public function getRandomNumber()
	{
		$pin = mt_rand(100000, 999999);
		return $pin;
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function slider()
	{

		$data = $this->Common_model->get_records('pages', array('*'), array('page_slug' => 'slider', 'is_section' => 'yes'))->row();
		return $data;
	}

	public function WelcomeNikahfy()
	{

		$data = $this->Common_model->get_records('pages', array('*'), array('page_slug' => 'welcome-to-nikahfy', 'is_section' => 'yes'))->row();
		return $data;
	}

	public function boost()
	{

		$data = $this->Common_model->get_records('pages', array('*'), array('page_slug' => 'boost-up-your-phone-in-just-one-click', 'is_section' => 'yes'))->row();
		return $data;
	}

	public function look_support()
	{

		$data = $this->Common_model->get_records('pages', array('*'), array('page_slug' => 'looking-for-support', 'is_section' => 'yes'))->row();
		return $data;
	}

	public function get_services()
	{
		$this->db->order_by('id DESC');
		$data = $this->Common_model->get_records('tbl_services', array('*'))->result();
		return $data;
	}


	public function get_setting()
	{


		$homepage_settings = $this->Common_model->get_records('settings', array('*'), array('status' => 'active'), $order_by = '')->result_array();


		$settings = array();

		foreach ($homepage_settings as $content) {

			$settings[$content['field_name']] = $content['value'];

		}

		return $settings;
	}


	public function pages($pages = NULL)
	{

		switch ($pages) {
			case "about-us":
			{
				$data['about'] = $this->Common_model->get_records('pages', array('*'), array('page_slug' => 'about-us', 'is_section' => 'no'))->row();
				$this->load->view('about_us', $data);
				break;
			}
			case "faqs":
			{
				$data['faqs'] = $this->Common_model->get_records('tbl_faqs', array('*'),$where='')->result();
				$this->load->view('faqs',$data);
				break;
			}
			case "contact-us":
			{

				$this->load->view('contact_us');
				break;
			}
			default:
			{
				$this->load->view('_container');
			}
		}

	}


	public function contact_send_us()
	{
		$name = $this->input->post('name');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$data = array(
			'fname' => $name,
			'subject' => $subject,
			'email' => $email,
			'message' => $message,
		);
		$fullname = $name;
		$send = $this->db->insert('contact_us', $data);
		$this->send_email_admin($email, $fullname);
		// $this->send_email_user($email, $fname . ' ' . $lname, $phone, $subject1);
		if ($send) {
			print json_encode("yes");

		} else {
			print json_encode("false");
		}
	}


	public function send_email_admin($email, $full_name)
	{
		$config = array(
			/*         'protocol' => 'smtp',
					 'smtp_host'=> 'ssl://smtp.gmail.com',
					 'smtp_port'=>'465',
					 'smtp_user'=>'rame14491@gamil.com',
					 'smtp_pass'=>'85575047',*/
			'mailtype' => 'html',
			'newline' => '\r\n',
			'charset' => 'utf-8'
		);
		$data['full_name'] = $full_name;
		// $data['MSG']=$message;
		$data['email'] = $email;
		$subject = "Someone looking for support!";
		$email_admin = $email;
		$message = $this->load->view('FrontEmailTemplate/adminTemplate', $data, TRUE);
		$this->load->library('email', $config);
		$this->email->from($email_admin, $full_name);
		$this->email->to('rame14491@gmail.com');// change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		} else {

			return $this->email->print_debugger();

		}


	}


	public function send_email_user($email, $full_name, $phone, $subject1)
	{

		$config = array(
			/*            'protocol' => 'smpt',
						'smtp_host'=> 'ssl://smtp.gmail.com',
						'smtp_port'=>'587',
						'smtp_user'=>'rame14491@gamil.com',
						'smtp_pass'=>'85575047',*/
			'mailtype' => 'html',
			'newline' => '\r\n',
			'charset' => 'utf-8'
		);
		$data['full_name'] = $full_name;
		//  $data['MSG']=$message;
		$data['email'] = $email;
		$data['phone'] = $phone;
		$subject = $subject1;
		$email_admin = 'info@gmail.com';
		$message = $this->load->view('FrontEmailTemplate/userTemplate', $data, TRUE);
		$this->load->library('email', $config);
		$this->email->from($email_admin, 'MountexGroup'); // change it to yours
		$this->email->to($email);// change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		} else {

			return $this->email->print_debugger();

		}


	}


	public function subscribers()
	{
		$email = $this->input->post('email');
		$name = $this->input->post('name');
		$data = array('sub_email' => $email, 'created_at' => date('y-m-d H:i:s'), 'name' => $name);
		$res = $this->electric->insert_record('subscribers', $data, $retID = '');
		$this->send_email_subscriber($email, $name);
		if ($res) {
			echo "yes";
		} else {
			echo "false";
		}
	}


	public function send_email_subscriber($email = '', $full_name = '')
	{

		$config = array(
			'mailtype' => 'html',
			'newline' => '\r\n',
			'charset' => 'utf-8'
		);
		$data['full_name'] = $full_name;
		$data['MSG'] = 'Here is message about newsletter';
		$data['email'] = $email;
		$subject = 'Subscriber';
		$email_admin = 'info@gmail.com';
		$message = $this->load->view('FrontEmailTemplate/subscriberTemplate', $data, TRUE);
		$this->load->library('email', $config);
		$this->email->from($email_admin, 'MountexGroup'); // change it to yours
		$this->email->to($email);// change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		} else {

			return $this->email->print_debugger();

		}


	}


	public function Book()
	{

		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$pname = $this->input->post('pname');
		$address = $this->input->post('address');
		$data = array(
			'fullname' => $fullname,
			'phone' => $phone,
			'email' => $email,
			'address' => $address,
			'pname' => implode(',', $pname)
		);
		$res = $this->electric->insert_record('tbl_booking', $data, $retID = '');
		if ($res) {
			//dist $this->cart->destroy();
			print json_encode("yes");
		} else {
			print json_encode("false");
		}
	}


}
