<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->model('Sqa_model');
    }
    public function upset(){
        echo "tes";
    }

    public function index() {
		$data['gallery'] = $this->Sqa_model->get_records('tbl_seo',array('*'), array('type'=>'aboutus'))->row_array();
		$data['contact'] = $this->Sqa_model->get_records('tbl_seo',array('*'), array('type'=>'contact'))->row_array();
		$data['home'] = $this->Sqa_model->get_records('tbl_seo',array('*'), array('type'=>'home'))->row_array();
        $this->load->view('pages/seo',$data);
    }



    public function save() {
        $title= $this->input->post('title');
        // $key= $this->input->post('key');
        $desc= $this->input->post('desc');
        $type= $this->input->post('type');
        $data= array('meta_title'=>$title,'keyword'=>$title,'meta_description'=>$desc,'type'=>$type);
		// echo "<pre>";print_r($data);die;
        $this->db->where('type',$type);
		$res= $this->db->update('tbl_seo',$data);
        if($res){
            $this->session->set_flashdata('msg','Records Successfully Updated!');
          redirect('Seo');
        }else{
            $this->session->set_flashdata('error','Records Not Successfully Updated!');
            redirect('Seo');
        }

    }






}
