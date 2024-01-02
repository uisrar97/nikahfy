<?php
class Common_model extends CI_Model{
    public function __construct(){
        parent:: __construct();
        ob_start();
    }

    //---  Getting records  ---//
    public function get_records($table, $columns, $where = '',$order_by=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        if($order_by != ''){
            $this->db->order_by($order_by);
        }

        $query = $this->db->get();
        return $query;
    }


    public function count_get_records($table, $columns, $where = ''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != ''){
            $this->db->where($where);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

   public function get_multi_filter_records($table, $columns, $where= '', $order_by = '',$group_by='', $skip= '', $take='',$field='',$value=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != '')
            $this->db->where($where);
       if($order_by != '')
           $this->db->order_by($order_by);
       if($group_by != '')
           $this->db->group_by($group_by);
       if($field != '' && $value != '')
           $this->db->like($field, $value);
         if($skip != '' && $take != '')
            $this->db->limit($take, $skip);
        $query = $this->db->get();
       return $query;
   }


    public function get_multi_filter_record($table, $columns, $where= '', $order_by = '',$group_by='', $skip= '', $take='',$field='',$value=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != '')
            $this->db->where($where);
        if($order_by != '')
            $this->db->order_by($order_by);
        if($group_by != '')
            $this->db->group_by($group_by);
        if($field != '' && $value != '')
            $this->db->like($field, $value);

            $this->db->limit($take, $skip);
        $query = $this->db->get();
        return $query;
    }
   
   
   
   public function get_random_records($table, $columns, $where= '', $order_by = '',$group_by='', $skip= '', $take='',$field='',$value=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != '')
            $this->db->where($where);
       if($order_by != '')
           $this->db->order_by($order_by,'RANDOM');
       if($group_by != '')
           $this->db->group_by($group_by);
       if($field != '' && $value != '')
           $this->db->like($field, $value);
        if($skip != '' && $take != '')
            $this->db->limit($take, $skip);
        $query = $this->db->get();
       return $query;
   }

   
   
   
   

    public function count_multi_filter_records($table, $columns, $where= '', $order_by = '',$group_by='', $skip= '', $take='',$field='',$value=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != '')
            $this->db->where($where);
        if($order_by != '')
            $this->db->order_by($order_by);
        if($group_by != '')
            $this->db->group_by($group_by);
        if($field != '' && $value != '')
            $this->db->like($field, $value);
        if($skip != '' && $take != '')
            $this->db->limit($take, $skip);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function get_max_or_min_field($table, $max='', $min=''){
        if($max !='')
            $this->db->select_max($max);
        if($min != '')
            $this->db->select_min($min);
        $query = $this->db->get($table);
        return $query;
    }

    public function get_joined_records($pTable, $columns, $joins, $where = '', $or_where='',$order_by=''){
        $this->db->select($columns);
        $this->db->from($pTable);
        if($joins!=''){
            foreach($joins as $join){
                $this->db->join($join['table'],$join['condition'], $join['joinType']);
            }
        }
        if($where != ''){
            $this->db->where($where);
        }
        if($or_where != ''){
            $this->db->or_where($or_where);

        }
        if($order_by != '') {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();
        return $query;
    }

    public function count_joined_records($pTable, $columns, $joins, $where = ''){
        $this->db->select($columns);
        $this->db->from($pTable);
        foreach($joins as $join){
            $this->db->join($join['table'],$join['condition'], $join['joinType']);
        }
        if($where != ''){
            $this->db->where($where);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_joined_multi_filter_records($pTable, $columns, $joins='', $where= '', $order_by = '',$group_by='', $skip= '', $take='',$field='',$value='',$having=''){
        $this->db->select($columns);
        $this->db->from($pTable);
        if($joins != '')
        {
            foreach($joins as $join){
                $this->db->join($join['table'],$join['condition'], $join['joinType']);
            }
        }
        if($where != '')
            $this->db->where($where);
        if($order_by != '')
            $this->db->order_by($order_by);
        if($group_by != '')
            $this->db->group_by($group_by);
        if($field != '' && $value != '')
            $this->db->like($field, $value);
        if($skip != '' && $take != '')
            $this->db->limit($take, $skip);
        if($having!='')
            $this->db->having($having);
        $query = $this->db->get();
        return $query;
    }

    public function count_joined_multi_filter_records($pTable, $columns, $joins='', $where= '', $order_by = '',$group_by='', $skip= '', $take='',$field='',$value=''){
        $this->db->select($columns);
        $this->db->from($pTable);
        if($joins != '')
        {
            foreach($joins as $join){
                $this->db->join($join['table'],$join['condition'], $join['joinType']);
            }
        }
        if($where != '')
            $this->db->where($where);
        if($order_by != '')
            $this->db->order_by($order_by);
        if($group_by != '')
            $this->db->group_by($group_by);
        if($field != '' && $value != '')
            $this->db->like($field, $value);
        if($skip != '' && $take != '')
            $this->db->limit($take, $skip);
        $query = $this->db->get();
        return $query->num_rows();
    }

    //---  function for getting autocomplete records  ---//
    public function get_autocomplete_records($table, $columns, $field, $value, $where=''){
        $this->db->select($columns);
        $this->db->from($table);
        if($where != '')
            $this->db->where($where);
        $this->db->like($field, $value);
        $query = $this->db->get();
        return $query;
    }//---  End of function get_autocomplete_records  ---//


    //---  function for getting autocomplete records with joins  ---//
    public function get_autocomplete_joined_records($pTable, $columns, $field, $value, $where, $joins){
        $this->db->select($columns);
        $this->db->from($pTable);
        foreach($joins as $join){
            $this->db->join($join['table'],$join['condition'], $join['joinType']);
        }
        if($where != '')
            $this->db->where($where);
        $this->db->like($field,$value);
        $query = $this->db->get();
        return $query;
    }//---  End of function get_autocomplete_joined_records  ---//


    //---  inserting records  ---//

    //---  function for inserting new records  ---//
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
    }//---  End of function insert_reocord  ---//


    //---  function for inserting multiple records in batch form  ---//
    public function insert_multiple($tbl,$data)
    {
        $this->db->insert_batch($tbl, $data);
    }//---  End of function insert_multiple  ---//


    //---  updating records   ---//

    //---  function for updating records  ---//
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
    //---  deleting records  ---//


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

   //---  function for truncating table  ---//
   public function truncate_table($table){
       $this->db->truncate($table);
       $affectedRows = $this->db->affected_rows();
       if($affectedRows){
           return true;
       }else{
           return false;
       }
   }//---  End of function truncate_table  ---//
   
     //---  function for making array data from post variables  ---//
    public function array_from_post($fields){
        $data = array();
        foreach($fields as $field){
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }//---  End of function array_from_post  ---//



}