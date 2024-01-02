<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sqa_model','electric',true);
    }


    public function index() {

        $data['faqs'] = $this->electric->get_records('tbl_faqs',array('*'),$where='')->result();
        $this->load->view('faqs/manage_faqs',$data);
    }


    public function add_faq(){
        $this->load->view('faqs/add_faq');
    }

    public function save_faq()
    {

        if (!$this->input->post()) {
            $this->session->set_flashdata('error', "No direct access allowed");
            redirect('Faqs');
        }

        $post = $this->input->post();
        $data['cname']=$post['cname'];
        $data['cat_detail']=$post['cat_detail'];
        $slug='slug';
        $data['slug']=$this->slug_generator($post['cname'], 'tbl_faqs',$slug);
        $pid=$this->electric->insert_record('tbl_faqs',$data,'id');
        if($pid){
            $this->session->set_flashdata('success', "Records successfully inserted");
            redirect('Faqs');
        }else{
            $this->session->set_flashdata('error', "Records not successfully inserted");
            redirect('Faqs');
        }



    }





    public function delete_faq($id) {

        $query = $this->electric->delete_records('tbl_faqs',array('id'=>$id));
        if($query==true) {
            $this->session->set_flashdata('success', "Faqs deleted successfully");
            redirect('Faqs');
        }else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again");
            redirect('Faqs');
        }
    }



    public function edit_fad($id) {

        $data['cat'] = $this->electric->get_records('tbl_faqs',array('*'),array('id'=>$id))->row();

        if(empty($data['cat'])) {
            $this->session->set_flashdata('error', "Unable to retrieve products data");
            redirect('Faqs');
        }
        $this->load->view('faqs/edit_faq', $data);
    }


    public function update_faq(){
        if (!$this->input->post()) {
            $this->session->set_flashdata('error', "No direct access allowed");
            redirect('Faqs');
        }
        $post = $this->input->post();
        $id = $post['cid'];
        $data['cname']=$post['cname'];
        $data['cat_detail']=$post['cat_detail'];
        $res= $this->electric->update_records('tbl_faqs', $data, array('id'=>$id));
        if($res){
            $this->session->set_flashdata('success', "Records successfully Updated");
            redirect('Faqs');
        }else{
            $this->session->set_flashdata('error', "Records not successfully Updated");
            redirect('Faqs');
        }
    }

    public function slug_generator($title='', $table='',$slug='') {
        $title = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', $title)); //Removes special characters
        $title = str_replace (" ", "-", trim(preg_replace("/ {2,}/", " ", $title)));
        $check_string = preg_replace('/-+/', '-', $title);
        $i = 1;
        while($i > 0) {
            $this->db->where($slug, $check_string);
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
}
