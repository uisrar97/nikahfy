<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->model('Sqa_model');
    }


    public function managegallery()
    {
        $data['sliders'] = $this->Sqa_model->get_records('tbl_gallery', array('*'), array('Language'=>$this->session->userdata('Language')))->result();
        $this->load->view('gallery/Glist', $data);
    }

    public function add_gallery()
    {

        $data['galleries'] = $this->Sqa_model->get_records('cat_gallery', array('*'), array('lang'=>$this->session->userdata('Language')))->result();
        $this->load->view('gallery/addgallery',$data);
    }


    public function save()
    {
        $title = $this->input->post('title');
       // $desc = $this->input->post('desc');
        $sliderimage = $this->input->post('sliderimage');
        $slug = $this->input->post('slug');
        $data = array(
            'title' => $title,
            'slug' => $slug,
            'image' => $sliderimage,
            'Language'=>$this->session->userdata('Language')
        );
        // echo "<pre>";print_r($data);die;

        $res = $this->Sqa_model->insert_record('tbl_gallery', $data, $retID = '');
        if ($res) {
            $this->session->set_flashdata('msg', 'Records Successfully Inserted!');
            redirect('Gallery/managegallery');

        } else {
            $this->session->set_flashdata('error', 'Records Not Successfully Inserted!');
            redirect('Gallery/managegallery');
        }

    }


    public function deletegallery($id)
    {
        $table = 'tbl_gallery';
        $where = array('id' => $id);
        $res = $this->Sqa_model->delete_records($table, $where);
        if ($res) {
            $this->session->set_flashdata('error', 'Records Deleted Successfully!');
            redirect('Gallery/managegallery');

        } else {
            $this->session->set_flashdata('error', 'Records Not Deleted Successfully!');
            redirect('Gallery/managegallery');
        }
    }


    public function editgallery($id = '')
    {
        $data['galleries'] = $this->Sqa_model->get_records('cat_gallery', array('*'), array('lang'=>$this->session->userdata('Language')))->result();
        $data['gallery'] = $this->Sqa_model->get_records('tbl_gallery', array('*'), array('id' => $id,'Language'=>$this->session->userdata('Language')))->row();
        $this->load->view('gallery/editgallery', $data);
    }

    public function update()
    {
        // $oldimage=$this->input->post('oldimage');
        $sliderimage = $this->input->post('sliderimage');
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $slug = $this->input->post('slug');

        $data = array(
            'title' => $title,
            'image' => $sliderimage,
            'slug' => $slug,
            'updated_at'=>date('Y-m-d')
        );

        $res = $this->Sqa_model->update_records('tbl_gallery', $data, array('id' => $id));
        if ($res) {
            $this->session->set_flashdata('msg', 'Records Successfully Updated!');
            redirect('Gallery/managegallery');

        } else {
            $this->session->set_flashdata('error', 'Records Not Successfully Updated!');
            redirect('Gallery/managegallery');
        }
    }


}











