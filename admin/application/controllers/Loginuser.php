<?php

/**
 * Created by PhpStorm.
 * User: abc
 * Date: 11/27/2017
 * Time: 4:45 AM
 */
class Loginuser extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
           if ($this->session->userdata('loggedin') == TRUE) {

            redirect('dashboard');

        }
        $this->load->model('Sqa_model');
        $this->load->helper('captcha');
    }

    public function index(){
       $data['captcha'] = $this->creat_captcha();
        $this->load->view('admin/userlogin',$data);

    }

    public function check_user(){

        $username = $this->input->post('username');
        $password=$this->input->post('password');
        $rememberme=$this->input->post('remember-me');
        $captcha_code = trim($this->input->post('captcha_code'));
        $isvalid_captcha = $this->chk_isvalid_captcha($captcha_code);

        $admin_login = $this->db->query("SELECT * FROM `kt_admin` WHERE username = '$username' OR email_address = '$username' AND password = '$password'")->row();
        
        if(!empty($admin_login))
        {
            $data = array(
                'id'=>$admin_login->id,
                'name'=>$admin_login->name,
                'username'=>$admin_login->username,
                'password'=>$admin_login->password,
                'profile_image'=>$admin_login->profile_image,
                'about'=>$admin_login->about,
                'email_address'=>$admin_login->email_address,
                'admin_role_id'=>$admin_login->admin_role_id,
                'is_sup_admin'=>$admin_login->is_sup_admin,
                'status'=>$admin_login->status,
                // 'last_signin_date'=>$admin_login->last_signin_date,
                'created_by'=>$admin_login->created_by,
                'created_date'=>$admin_login->created_date,
                'created_by_ip'=>$admin_login->created_by_ip,
                'last_modified_by'=>$admin_login->last_modified_by,
                'last_modified_date'=>$admin_login->last_modified_date,
                'last_modified_ip'=>$admin_login->last_modified_ip,
                'loggedin' => TRUE
            );
            
            $permissions = $this->db->where('id',$data['admin_role_id'])->get('kt_admin_roles')->row();
                
            $data['permissions'] = explode(',',$permissions->permissions);
                
            if($data['status']==1)
            {
                $this->session->set_userdata($data);
                echo json_encode("yes");
                exit;
            }
            else
            {
                print json_encode("stat");
            }
        }
        else
        {
            print json_encode("false");
        }
    }


    public function set_cookie($rememberme,$username,$password)
    {
        $time= 60*60*24*1;
        if($rememberme!=NULL)
        {
            $this->load->helper('cookie');
            $cookie= array(
                'username'   =>$username,
                'password'  => $password,
                'expire' => $time,
                'secure' => false
            );
            $this->input->set_cookie($cookie);
        }
        else
        {
            $this->load->helper('cookie');
            $cookie= array(
                'username'   =>'',
                'password'  => '',
                'expire' => time()-$time,
                'secure' => false
            );
            $this->input->set_cookie($cookie);
        }
    }






    public function creat_captcha()	{
        $vals = array(
            'img_path' => './assets/captcha/',
            'img_url' => './assets/captcha/',
            'font_path'  =>'./admin/assets/captcha/fonts/obline_regular.ttf',
            'img_width' => 250,
            'word_length'   => 4,
            'font_size'     => 18,
            'img_height' =>42

        );

        $captcha = create_captcha($vals);


        $data = array(
            'cap_time' =>$captcha['time'],
            'cap_word' =>$captcha['word'],
            'ip_address' =>$this->input->ip_address()
        );
        $this->db->insert('captcha',$data);
        $data['captcha'] = $captcha;
        return $captcha;
    }


    public function chk_isvalid_captcha($val) {
        $this->db->where('cap_word',$val);
        $found_row = $this->db->get('captcha')->num_rows();
        $expiration = time()-7200;
        $this->db->query("DELETE FROM captcha WHERE cap_time < ".$expiration);
        return ($found_row == 0) ? 0 : 1 ;
    }

}


