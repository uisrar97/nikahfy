<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sections extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->model('Sqa_model','electric',true);
    }


    public function manage_section() {
        $this->db->order_by("order_number", "asc");
        $data['pages']=$this->electric->get_records('pages',array('*'),$where=array('is_section'=>'yes','sec_type'=>'home'))->result();

        $this->load->view('sections/manage_section', $data);
    }


    public function add_section(){
        $this->load->view('sections/add_sections');
    }

    public function save_section()
    {

        if (!$this->input->post()) {
            $this->session->set_flashdata('error', "No direct access allowed");
            redirect('pages/manage_pages');
        }
        $data = $this->input->post();
        $data['created'] = date("Y-m-d H:i:s");
        $data['sec_type']='home';
        $data['page_slug'] = $this->slug_generator($data['page_title'], "pages");
        $res = $this->electric->insert_record('pages', $data, $retID = '');
        if($res){
            $this->session->set_flashdata('success', "Section Added successfully");
            redirect('Sections/manage_section');
        }else{
            $this->session->set_flashdata('error', "Section has not successfully added");
            redirect('Sections/manage_section');
        }

    }

    public function slug_generator($title, $table) {
        $title = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', $title)); //Removes special characters
        $title = str_replace (" ", "-", trim(preg_replace("/ {2,}/", " ", $title)));
        $check_string = preg_replace('/-+/', '-', $title);
        $i = 1;
        $slug = "";
        while($i > 0) {
            $this->db->where("page_slug", $check_string);
            $data = $this->db->count_all_results($table);
            if($data > 0) {
                $check_string = $title."-".$i;
            }else {
                $slug = $check_string;
                break;
            }
            $i++;
        }
        return $slug;
    }



    public function delete_section($id) {

        $query = $this->electric->delete_records('pages',array('page_id'=>$id,'is_section'=>'yes'));
        if($query) {
            $this->session->set_flashdata('success', "Section deleted successfully");
            redirect('Sections/manage_section');
        }else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again");
            redirect('Sections/manage_section');
        }
    }



    public function edit_section($id) {

        $data['section'] = $this->electric->get_records('pages',array('*'),array('page_id'=>$id,'is_section'=>'yes'))->row();

        if(empty($data['section'])) {
            $this->session->set_flashdata('error', "Unable to retrieve Section data");
            redirect('Sections/manage_section');
        }
        $this->load->view('sections/edit_section', $data);
    }
    public function update_section(){
        $id= $this->input->post('id');
        $page_details= $this->input->post('page_details');
        $page_title= $this->input->post('page_title');
        $data= array(
            'page_title'=>$page_title,
            'page_details'=>$page_details,
            'updated'=>date('Y-m-d H:i:s')
        );

        $res= $this->electric->update_records('pages', $data, array('page_id'=>$id));
        if($res==true){
            $this->session->set_flashdata('success', "Section successfully updated");
            redirect('Sections/manage_section');
        }else{
            $this->session->set_flashdata('error', "Unable to Update Section");
            redirect('Sections/manage_section');
        }
    }


}
