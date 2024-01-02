<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->model('Sqa_model');
    }


    public function manageslider()
    {
        $data['sliders'] = $this->Sqa_model->get_records('sliders', array('*'), array('type'=>'home','Language'=>$this->session->userdata('Language')))->result();
        $this->load->view('slider/sliders', $data);
    }

    public function add_slider()
    {
        $this->load->view('slider/addslider');
    }


    public function save()
    {
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $sliderimage = $this->input->post('sliderimage');
        $data = array(
            'slider_title' => $title,
            'desc' => "n/a",
            'sliderimage' => $sliderimage,
            'Language'=>$this->session->userdata('Language')
        );
        // echo "<pre>";print_r($data);die;

        $res = $this->Sqa_model->insert_record('sliders', $data, $retID = '');
        if ($res) {
            $this->session->set_flashdata('msg', 'Records Successfully Inserted!');
            redirect('Slider/manageslider');

        } else {
            $this->session->set_flashdata('error', 'Records Not Successfully Inserted!');
            redirect('Slider/manageslider');
        }

    }


    public function deleteslider($id)
    {
        $table = 'sliders';
        $where = array('slider_id' => $id);
        $res = $this->Sqa_model->delete_records($table, $where);
        if($res) {
            $this->session->set_flashdata('msg', 'Records Deleted Successfully!');
            redirect('Slider/manageslider');

        }else {
            $this->session->set_flashdata('error', 'Records Not Deleted Successfully!');
            redirect('Slider/manageslider');
        }
    }


    public function editslider($id = '')
    {
        $data['sliders'] = $this->Sqa_model->get_records('sliders', array('*'), array('slider_id' => $id,'Language'=>$this->session->userdata('Language')))->row();
        $this->load->view('slider/editsliders', $data);
    }

    public function update()
    {
        // $oldimage=$this->input->post('oldimage');
        $sliderimage = $this->input->post('sliderimage');
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');

        $data = array(
            'slider_title' => $title,
            'desc' => "n/a",
            'sliderimage' => $sliderimage


        );

        $res = $this->Sqa_model->update_records('sliders', $data, array('slider_id' => $id));
        if ($res) {
            $this->session->set_flashdata('msg', 'Records Successfully Updated!');
            redirect('Slider/manageslider');

        } else {
            $this->session->set_flashdata('error', 'Records Not Successfully Updated!');
            redirect('Slider/manageslider');
        }
    }


}











