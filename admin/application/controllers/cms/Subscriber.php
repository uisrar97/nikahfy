<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Subscriber extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sqa_model');

    }

    public function index()
    {

        $this->load->view('subscriber/subscriberlist');
    }

    public function newsletter()
    {
        $data['subs'] = $this->Sqa_model->get_records('subscribers', array('*'), $where = '')->result();
        $this->load->view('subscriber/newsletter', $data);
    }


    public function get_subscriber()
    {
        $i = 1;
        $btnstatus = '';
        $pTable = 'contact_us';
        $columns = array('*');
        $this->db->order_by('id DESC');
        $where = '';
        $data = $this->Sqa_model->get_joined_records($pTable, $columns, $joins = '', $where)->result();
        foreach ($data as $val) {

            $val->btn = '' . $btnstatus .'<button type="button" title="View Message" class="btn btn-round btn-dark btn-sm viewm" id="' . $val->id . '"><i class="fa fa-eye"></i></button>
                <button type="button" title="Delete" class="btn btn-round btn-danger btn-sm delete_cat" id="' . $val->id . '"><i class="fa fa-trash-o"></i></button>';
            $val->cnt = $i;
            $i++;
        }
        if (!empty($data)) {
            $data1 = array('data' => $data);
            print json_encode($data1);
        } else {
            $data1 = array('data' => array());
            print json_encode($data1);
        }
    }

    public function update()
    {
        $id = $this->input->post('sub_id');
        $email = $this->input->post('email');
        $data = array(
            'sub_email' => $email
        );
        $res = $this->Sqa_model->update_records('subscribers', $data, array('sub_id' => $id));
        if ($res) {
            print json_encode("yes");
        } else {
            print json_encode("false");
        }
    }

    public function add_subscriber()
    {
        $sub_email = $this->input->post('sub_email');
        $data = array(
            'sub_email' => $sub_email,
            'created_at' =>date('Y-m-d H:i:s')
        );
        $res = $this->Sqa_model->insert_record('subscribers', $data, $retID = '');
        if($res){
            print json_encode("yes");
        }else{
            print json_encode("false");
        }

    }


    public function Delete_sub()
    {
        $id = $this->input->post('id');
        $table = 'centersq_categories';
        $where = array('id' => $id);
        $res = $this->Sqa_model->delete_records($table, $where);
        if ($res) {
            echo "yes";

        } else {
            echo "false";
        }
    }

    public function Delete_subscribers()
    {
        $id = $this->input->post('id');
        $table = 'contact_us';
        $where = array('id' => $id);
        $res = $this->Sqa_model->delete_records($table, $where);
        if ($res) {
            echo "yes";

        } else {
            echo "false";
        }
    }

    public function get_sub_by_id()
    {
        $id = $this->input->post('catid');

        $res = $this->Sqa_model->get_records('centersq_categories', array('*'), array('id' => $id))->Row();
        if (!empty($res)) {
            print json_encode($res);
        } else {
            print json_encode("false");
        }
    }

    public function get_Subscriber_id()
    {
        $id = $this->input->post('catid');

        $res = $this->Sqa_model->get_records('subscribers', array('*'), array('sub_id' => $id))->row();
        if (!empty($res)) {
            print json_encode($res);
        } else {
            print json_encode("false");
        }
    }

    public function get_Subscriber_msg()
    {
        $id = $this->input->post('id');

        $res = $this->Sqa_model->get_records('contact_us', array('*'), array('id' => $id))->row();
        if (!empty($res)) {
            print json_encode($res);
        } else {
            print json_encode("false");
        }
    }


    public function send()
    {
        $data = $this->input->post('subs');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        if ($data == 'all') {
            $data1 = $this->Sqa_model->get_records('subscribers', array('*'), $where = '')->result();
            $subs = implode(',', $data1);
            $result = $this->send_email_admin($email, $subject, $message);
        } else {
            $subs = implode(',', $data);
            $result = $this->send_email_admin($email, $subject, $message);
        }

        if ($result == true) {
            $this->session->set_flashdata('msg', '');
            print json_encode('Email Sent Successfully');
        } else {
            print json_encode("Email Sending fail try again");

        }

    }

    public function send_email_admin($email, $subject, $message)
    {
        $config = array(
            'mailtype' => 'html',
            'newline' => '\r\n',
            'charset' => 'utf-8'
        );
        $data['MSG'] = $message;
        $data['email'] = $email;
        $data['sub'] = $subject;
        $email_admin = 'centersquaremobile@gmail.com';
        $message = $this->load->view('emailTemplate/subscriberEmail', $data, TRUE);
        $this->load->library('email', $config);
        $this->email->from($email_admin, 'CenterSquare');
        $this->email->to($email);// change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) 
        {
            return true;
        } 
        else 
        {
            return $this->email->print_debugger();
        }
    }
    public function download(){
        $result['result'] = $this->Sqa_model->get_records('subscribers', array('*'), $where = '')->result();
        if(!empty($result)){
            ob_end_clean();
            $this->load->library("MYPDF");
            $this->tcpdf =  new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $this->load->view('subscriber/download',$result);
            // set document information
            /* $this->tcpdf->SetCreator('Razicar');*/
            $this->tcpdf->SetAuthor('CenterSquareApp');
            $this->tcpdf->SetTitle('Subscribers Email List');     //  $this->tcpdf->SetSubject('TCPDF Tutorial');
            $this->tcpdf->SetKeywords('TCPDF, PDF, example, test, guide');
            $this->tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Subscribers Email List', '');
            $this->tcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $this->tcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $this->tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $this->tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $this->tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $html = $this->output->get_output();
            $this->tcpdf->SetMargins(5, 25, 5);
            $this->tcpdf->SetHeaderMargin(3);
            $this->tcpdf->SetFooterMargin(10);
            $this->tcpdf->AddPage('L', 'A3');
            $this->tcpdf->writeHTML($html, false, false, false, false, '');

            $this->tcpdf->Output('Subscribers Email List', 'D');

        }else{
            $this->session->set_flashdata('error','No Records Found Try Again With The Correct Information!');
            redirect('/acceptanceReport');
        }
    }


}


