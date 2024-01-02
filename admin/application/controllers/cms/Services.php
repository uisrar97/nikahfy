<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Services extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sqa_model');

    }


    public function index(){
        $data['services']=$this->Sqa_model->get_records('tbl_services',array('*'))->result();
        $this->load->view('services/manageServices',$data);
    }

    public function add_service(){
        $this->load->view('services/add_service');
    }




    public function save(){

        $name=$this->input->post('name');
        $content= $this->input->post('desc');
        $sliderimage= $this->input->post('sliderimage');
        $slug= $this->slug_generator($name,'tbl_services');
        $data=array(
            'name'=>$name,'content'=>$content,
            'image'=>$sliderimage,'slug'=>$slug,
            'create_date'=>date('Y-m-d H:i:s'),
       
        );
        $res = $this->Sqa_model->insert_record('tbl_services', $data, $retID = '');
        if ($res) {
            $this->session->set_flashdata('success','Records Successfully Inserted!');
            redirect('cms/Services');
        }

        else
        {
            $this->session->set_flashdata('error','Records Not Successfully Inserted!');
            redirect('cms/Services');
        }
    }




    public function delete_service($id){
        $table='tbl_services';
        $where= array('id'=>$id);
        $res=$this->Sqa_model->delete_records($table,$where);
        if ($res){
            $this->session->set_flashdata('success','Records Successfully Deleted!');
            redirect('cms/Services');

        }else{
            $this->session->set_flashdata('success','Records Not Successfully Deleted!');
            redirect('cms/Services');
        }
    }

    public function edit_service($id){

        $data['ser']=$this->Sqa_model->get_records('tbl_services',array('*'),array('id'=>$id))->row();
        $this->load->view('services/edit_service',$data);
    }



    public function Update(){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $content= $this->input->post('desc');
        $sliderimage= $this->input->post('sliderimage');
        $slug= $this->slug_generator($name,'tbl_services');
        $data=array(
            'name'=>$name,'content'=>$content,
            'image'=>$sliderimage,'slug'=>$slug,
            'updated_at'=>date('Y-m-d H:i:s')
        );
        $res= $this->Sqa_model->update_records('tbl_services', $data, array('id'=>$id));
        if($res){
            $this->session->set_flashdata('msg','Records Successfully Updated!');
            redirect('cms/Services');
        }else{
            $this->session->set_flashdata('error','Records Not Updated!');
            redirect('cms/Services');
        }
    }



    public function slug_generator($title, $table) {
        $title = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', $title)); //Removes special characters
        $title = str_replace (" ", "-", trim(preg_replace("/ {2,}/", " ", $title)));
        $check_string = preg_replace('/-+/', '-', $title);
        $i = 1;
        $slug = "";
        while($i > 0) {
            $this->db->where("slug", $check_string);
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





