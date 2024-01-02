<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



if (!function_exists('settings')) {



    function settings() {

        $CI = & get_instance();

        $CI->db->where("status", "active");

        $homepage_settings = $CI->db->get("settings")->result_array();

        $settings = array();

        foreach ($homepage_settings as $content) {

            $settings[$content['field_name']] = $content['value'];

        }

        return $settings;

    }



}

if(!function_exists('get_comment_count')){

    function get_comment_count($id){

        $CI = & get_instance();

		// $CI->db->select("property_images_documents.*");

        // $CI->db->from("property_images_documents");

        // $CI->db->where("property_images_documents.property_id", $id);

        // $CI->db->where("property_images_documents.type", 'image');

        

        // $query = $CI->db->get()->result_array();

		 $CI->db->where('blog_id_fk',$id);

		 $CI->db->from("blog_comments");

		 $query = $CI->db->count_all_results();

		

        return $query;

    }

}



if (!function_exists('testimonials')) {



    function testimonials() {

        $CI = & get_instance();

        $CI->db->where("status", "active");

        return $CI->db->get("testimonial")->result_array();

    }



}





if (!function_exists('page_sections')) {



    function page_sections($slug) {

        $CI = & get_instance();

        $CI->db->where("page_slug", $slug);

        return $CI->db->get("pages")->row_array();

    }



}



if (!function_exists('slug_generator')) {

    function slug_generator($string, $table) {

        $CI = & get_instance();

        $string = strtolower(preg_replace('/[^a-zA-Z0-9- ]/', '', $string)); //Removes special characters

        $string = str_replace(" ", "-", trim(preg_replace("/ {2,}/", " ", $string))); //replace multiple spaces with 1 space

		$check_string = preg_replace('/-+/', '-', $string); //replace multiple - with 1

        $i = 1;

        $slug = "";

        while ($i > 0) {

            $CI->db->where("slug", $check_string);

            $data = $CI->db->count_all_results($table);

            if ($data > 0) {

                $check_string = $string . "-" . $i;

            } else {

                $slug = $check_string;

                break;

            }

            $i++;

        }

        return $slug;

    }

}

if (!function_exists('pr')) {



    function pr($content) {

        echo "<pre>";

        print_r($content);

        echo "<pre>";

        exit;

    }



}

if (!function_exists('time_ago')) {

    function time_ago($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full)
            $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

}



/* End of file custom_helper.php */

/* Location: /front_app/helpers/custom_helper.php */