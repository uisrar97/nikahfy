<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Forgot extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sqa_model');
        $this->load->model('Email_model');
    }

    public function index(){
        $this->load->view('admin/forgot');

    }

    public function Reset(){
        $email=$this->input->post('email');
        $columns=array('*');

        $where= array('email_address'=>$email);
        
        $res= $this->Sqa_model->get_records('kt_admin', $columns, $where)->row();
        // $hq=$this->Sqa_model->get_records('centersq_hqs',$columns, $where)->row();
        // $st=$this->Sqa_model->get_records('centersq_stores',$columns,$where)->row();


        if(!empty($res))
        {
            $data['id']=$res->id;
            $subject='Forgot Password';
            $message = $this->load->view('emailTemplate/forgottemplate',$data,TRUE);
            $email = $this->Email_model->sendNewEmail($res->email, $message, $subject, '', '', $toname='admin');
            
            if($email==true)
            {
               $this->session->set_flashdata('msg','Please Check Your Email');
               redirect('forgot');
            }
        }
        // if(!empty($st)){
        //     echo '<pre>';
        //     print_r($st);
        //     exit;
        //     $data['id']=$this->encrypt->encode($st->id);
        //     $id=$st->id;
        //     $subject='Forgot Password';
        //     $email=$this->send_email($st->email,$subject,$id);
        //     if($email==true){
        //         $this->session->set_flashdata('msg','Please Check Your Email');
        //         redirect('forgot');
        //     }
        // }if(!empty($hq)){

        //     $data['id']=$this->encrypt->encode($hq->id);
        //     $id=$hq->id;
        //     $subject='Forgot Password';
        //     $email=$this->send_email($hq->email,$subject,$id);
        //     if($email==true){
        //         $this->session->set_flashdata('msg','Please Check Your Email');
        //         redirect('forgot');
        //     }
        // }
        else
        {
            $this->session->set_flashdata('error','Your Email Is Invalid!');
            redirect('forgot');
        }
    }


    // public function send_email($email,$subject,$id){

    //     $config = array(
    //         'mailtype' => 'html',
    //         'newline' => '\r\n',
    //         'charset' => 'utf-8'
    //     );
    //     $data['id']=$id;
    //     print_r($data);
    //     exit;
    //     $email_admin='info@nikahfy.com';
    //         $message = '<html><body>';
    //         $message .= '<img src="" alt="Razi car logo" />';
    //         $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    //         $message .= "<tr style='background: #eee;'><td><strong>:</strong> </td><td>" .$totaldis . "</td></tr>";
    //         $message .= "<tr><td><strong>Collect Cash:</strong> </td><td>" . $collectcash . "</td></tr>";
    //         $message .= "<tr><td><strong>Total Cost:</strong> </td><td>" .$totalcost. "</td></tr>";

    //         $message .= "</table>";
    //         $message .= "</body></html>";
    //     $message= $this->load->view('emailTemplate/forgottemplate',$data,TRUE);
    //     $this->load->library('email',$config);
    //     $this->email->from($email_admin,'CenterSquare'); // change it to yours
    //     $this->email->to($email);// change it to yours
    //     $this->email->subject($subject);
    //     $this->email->message($message);
    //     if($this->email->send())
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    public function ResetPassword($id){
        $data['id']=base64_decode($id);
        $this->load->view('admin/updateForgot',$data);
    }



    public function updatepassword(){
        $id=$this->input->post('id');
        $newpassword=$this->input->post('newpassword');
        $confirmpassword=$this->input->post('confirmpassword');
        $columns=array('*');

        $where= array('id'=>$id);
        $res= $this->Sqa_model->get_records('centersq_user', $columns, $where)->row();
        $hq=$this->Sqa_model->get_records('centersq_hqs',$columns, $where)->row();
        $st=$this->Sqa_model->get_records('centersq_stores',$columns,$where)->row();

        if(!empty($res)){
            $res=$this->Sqa_model->update_records('centersq_user', array('password'=>$newpassword), array('id'=>$id));
            if($res==true){
                $this->session->set_flashdata('msg','Your Password is Successfully Change');
                redirect('/');
            }


        }if(!empty($st)){
            $res=$this->Sqa_model->update_records('centersq_stores', array('password'=>$newpassword), array('id'=>$id));
            if($res==true){
                $this->session->set_flashdata('msg','Your Password is Successfully Change');
                redirect('/');
            }
        }if(!empty($hq)){
            $res=$this->Sqa_model->update_records('centersq_hqs', array('password'=>$newpassword), array('id'=>$id));
            if($res==true){
                $this->session->set_flashdata('msg','Your Password is Successfully Change');
                redirect('/');
            }
        }else{

            $this->session->set_flashdata('error','Your Password is Invalid!');

            redirect('forgot');

        }

    }

}


