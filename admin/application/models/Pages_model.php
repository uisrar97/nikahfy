<?php



class Pages_model extends CI_Model{

	function __construct() {	

        parent::__construct();

    }



	public function get_pages() {

        $this->db->select("*");

        $this->db->from("pages");

		$this->db->where("status", 1);
		$this->db->where("is_section", 'no');
        $this->db->order_by("page_id", "ASC");

        return $this->db->get()->result_array();

	}

	public function get_settings() {

        $this->db->order_by("order_num", "ASC");

        $this->db->where("status", "active");
        
        return $this->db->get("tbl_settings")->result_array();

	}

	public function update_settings($data) {


        foreach ($data as $key => $val) {
            $this->db->where("field_name", $key);
            
            $query = $this->db->update("tbl_settings", array("value" => $val));

            if (!$query) {

                return false;

            }

        }

		return true;

	}

	

	public function get_faq() {

        $this->db->select("*");

        $this->db->from("faqs");

		$this->db->order_by("id", "ASC");

        return $this->db->get()->result_array();

	}



    public function add_page($data) {

	    $query = $this->db->insert("pages", $data);

        return $query;

    }

	

	 //---  function for deleting records  ---//

    public function delete_records($table,$where = ''){

        if($where != '')

            $this->db->where($where);

        $this->db->delete($table);

        $affectedRows = $this->db->affected_rows();

        if($affectedRows){

            return true;

        }else{

            return false;

        }

    }//---  End of function delete_records  ---//

	

	public function get_page_details($id) {

        $this->db->where("page_id", $id);

        return $this->db->get("pages")->row_array();

	}

	

	public function update_page($id, $data) {

        $this->db->where("page_id", $id);

        $query = $this->db->update("pages", $data);

        return $query;

	}

	

	public function delete_page($id) {

        $this->db->where("page_id", $id);

        $query = $this->db->delete("pages");

        return $query;

	}

}
