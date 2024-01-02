<?php

class Home_model extends CI_Model{
	function __construct() {	
        parent::__construct();
    }
	//Get Site Preferences
	public function homepage_slider() {
        $this->db->where("status", "active");
        $this->db->order_by("priority_order", "ASC");
        return $this->db->get("centersq_blogs")->result_array();
	}
    public function get_records($table, $columns, $where = '',$group_by=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        if($group_by != ''){
            $this->db->group_by($group_by);
        }

        $query = $this->db->get();
        return $query;
    }

    public function update_records($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
        $affectedRows = $this->db->affected_rows();
        if($affectedRows>0){
            return true;
        }else{
            return false;
        }
    }

    public function insert_record($table, $data, $retID = ''){
        $this->db->insert($table, $data);
        $affectedRows = $this->db->affected_rows();
        if($retID != ''){
            return $this->db->insert_id();
        }
        elseif($affectedRows){
            return true;
        }else{
            return false;
        }
    }


	public function get_blogs($type="",$limit="")
	{
		if (!empty($type)) {
			$this->db->order_by('centersq_blogs.views','DESC');
		}else{
			$this->db->order_by('centersq_blogs.id','DESC');
		}
        
		$this->db->select("centersq_blogs.*,centersq_cms_blogcategories.name as category_name");
		$this->db->join("centersq_cms_blogcategories","centersq_cms_blogcategories.id = centersq_blogs.category_id");
		$this->db->from("centersq_blogs");
		if (!empty($limit)) {
			$this->db->limit($limit);
		}
		$query =  $this->db->get()->result_array();
		return $query;
	}
	public function centersq_cms_categories()
	{
		return $this->db->get("centersq_cms_categories")->result_array();
	}
	public function testimonials()
	{
		return $this->db->get("testimonial")->result_array();
	}
	public function get_allFaq()
	{
		return $this->db->get("faqs")->result_array();
	}
	
	public function get_blogs_popular()
	{
		$this->db->select_max('views');
$query = $this->db->get('centersq_blogs')->result_array();  
// echo $result->time;
		// $this->db->select("centersq_blogs.*,centersq_cms_blogcategories.name as category_name");
		// $this->db->join("centersq_cms_blogcategories","centersq_cms_blogcategories.id = centersq_blogs.category_id");
		// $this->db->from("centersq_blogs");
		// $query =  $this->db->get()->result_array();
		return $query;
	}
	
	// function set_counter($slug) {
	
		// $count = $this->db->select('views')->where('slug', urldecode($slug))->get('centersq_blogs')->row();
		// $query = $this->db->set('views', ($count->views + 1))->where('slug', urldecode($slug))->update('centersq_blogs');
	    // return $query;
// }
	function set_counter($slug) {
		// echo $this->get_client_ip();
		// die;
			$count = $this->db->select('views')->where('slug', urldecode($slug))->get('centersq_blogs')->row();
			$query = $this->db->set('views', ($count->views + 1))->where('slug', urldecode($slug))->update('centersq_blogs');
			return $query;
	}
	
	
	function get_client_ip() {
		  $ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP']))
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['REMOTE_ADDR']))
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			return $ipaddress;
	}

	public function get_aboutus_section1()
	{
		return $this->db->where('page_slug','get-your-business-discovered')->get("pages")->row_array();
	}
	public function get_aboutus_section2()
	{
		return $this->db->where('page_slug','reach-the-right-people-at-the-right-time')->get("pages")->row_array();
	}
	public function get_aboutus_section3()
	{
		return $this->db->where('page_slug','connect-with-customers')->get("pages")->row_array();
	}
	public function get_home_section1() 
	{
		return $this->db->where('page_slug','get-to-know-centersquare')->get("pages")->row_array();
	}
	public function get_home_section2() 
	{
		return $this->db->where('page_slug','are-you-a-business-looking-to-get-noticed')->get("pages")->row_array();
	}
	public function get_home_section3() 
	{
		return $this->db->where('page_slug','download-the-free-centersquare-app')->get("pages")->row_array();
	}
	public function get_home_section4()
	{
		return $this->db->where('page_slug','subscribe-for-newsletter')->get("pages")->row_array();
	}
	public function get_slidersection() 
	{
		return $this->db->where('page_slug','centersquare-app')->get("pages")->row_array();
	}
	public function privacy_policy() 
	{
		return $this->db->where('page_slug','privacy-policy')->get("pages")->row_array();
	}
	public function about_us() 
	{
		return $this->db->where('page_slug','about-us')->get("pages")->row_array();
	}
	public function terms_of_use() 
	{
		return $this->db->where('page_slug','terms-of-use')->get("pages")->row_array();
	}
	public function terms_of_sale() 
	{
		return $this->db->where('page_slug','terms-of-sale')->get("pages")->row_array();
	}
	public function subscription_plan() 
	{
		return $this->db->where('page_slug','subscription-plan')->get("pages")->row_array();
	}
	
	public function get_testimonials() 
	{
		return $this->db->get("testimonial")->result_array();
	}
	public function get_blogs_comments($id) 
	{
		$this->db->order_by('blog_comment_id','DESC');
		return $this->db->where('blog_id_fk',$id)->get("blog_comments")->result_array();
	}
	public function get_comments_count($id) 
	{
		return $this->db->where('blog_id_fk',$id)->count_all_results("blog_comments");
	}
	
	
	public function get_team() 
	{
		return $this->db->get("team")->result_array();
	}
	
	public function get_partner() 
	{
		return $this->db->get("partner")->result_array();
	}
}