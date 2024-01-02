<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model');
		$this->load->model('Sqa_model');
	}

	public function manage_pages()
	{

		$data['pages'] = $this->pages_model->get_pages();
		$this->load->view('pages/manage_pages', $data);
	}


	public function settings()
	{

		$data['settings'] = $this->Sqa_model->get_records('settings', array('*'), array('status' => 'active'), $order_by = 'order_num ASC')->result_array();


		$this->load->view('pages/manage_settings', $data);
	}


	public function update_settings()
	{
		ini_set("log_errors", 1);
		ini_set("error_log", "err.txt");
		if (!$this->input->post()) {
			$this->session->set_flashdata('error', "Direct access not allowed!");
			redirect("pages/settings");
		}
		$data = $this->input->post();

		foreach ($data as $key => $val) {
			$data = array('value' => $val);
			$query = $this->Sqa_model->update_records('settings', $data, array('field_name' => $key));
		}


		if ($query) {
			$this->session->set_flashdata("success", "Settings Updated Successfully");
			//	$this->session->set_flashdata("update", "updated");
			redirect("pages/settings");
		} else {
			$this->session->set_flashdata('error', "Something went wrong! Please try again");
			redirect("pages/settings");
		}
	}

	public function add_page()
	{

		$this->load->view('pages/add_page');
	}


	public function add_page_process()
	{

		if (!$this->input->post()) {
			$this->session->set_flashdata('error', "No direct access allowed");
			redirect('pages/manage_pages');
		}

		$data = $this->input->post();
		$data['created'] = date("Y-m-d H:i:s");
		$data['sec_type'] = 'user';
		$data['is_section'] = 'no';
		$data['status'] = 1;

		$data['page_slug'] = $this->slug_generator($data['page_title'], "pages");
		$query = $this->pages_model->add_page($data);
		if ($query) {
			$this->session->set_flashdata('success', "Page added successfully");
			redirect('pages/manage_pages');
		} else {
			$this->session->set_flashdata('error', "Something went wrong. Please try again");
			redirect('pages/add_page');
		}
	}


	public function edit_page($id)
	{

		$data['page'] = $this->pages_model->get_page_details($id);
		if (empty($data['page'])) {
			$this->session->set_flashdata('error', "Unable to retrieve page data");
			redirect('pages/manage_pages');
		}
		$this->load->view('pages/edit_page', $data);
	}


	public function edit_page_process()
	{

		if (!$this->input->post()) {
			$this->session->set_flashdata('error', "No direct access allowed");
			redirect('pages/manage_pages');
		}
		$data = $this->input->post();
		$id = $data['page_id'];
		$old_page_title = $data['old_page_title'];
		$data['meta_title'] = $data['page_title'];


		if ($old_page_title != $data['page_title']) {
			$data['page_slug'] = $this->slug_generator($data['page_title'], "pages");
		}
		unset($data['page_id']);
		unset($data['old_page_title']);
		$query = $this->pages_model->update_page($id, $data);
		if ($query) {
			$this->session->set_flashdata('success', "Page updated successfully");
			$this->session->set_flashdata('update', "Updated");
			redirect('pages/manage_pages');
		} else {
			$this->session->set_flashdata('error', "Something went wrong. Please try again");
			redirect('pages/edit_page/' . $id);
		}
	}


	public function delete_page($id)
	{

		$query = $this->pages_model->delete_page($id);
		if ($query) {
			$this->session->set_flashdata('success', "Page deleted successfully");
			redirect('pages/manage_pages');
		} else {
			$this->session->set_flashdata('error', "Something went wrong. Please try again");
			redirect('pages/manage_pages');
		}
	}


	public function slug_generator($title, $table)
	{
		$title = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', $title)); //Removes special characters
		$title = str_replace(" ", "-", trim(preg_replace("/ {2,}/", " ", $title)));
		$check_string = preg_replace('/-+/', '-', $title);
		$i = 1;
		$slug = "";
		while ($i > 0) {
			$this->db->where("page_slug", $check_string);
			$data = $this->db->count_all_results($table);
			if ($data > 0) {
				$check_string = $title . "-" . $i;
			} else {
				$slug = $check_string;
				break;
			}
			$i++;
		}
		return $slug;
	}


}
