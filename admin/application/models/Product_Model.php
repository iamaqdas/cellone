<?php

class Product_Model extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_category($data){
        $this->db->insert('category',$data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function get_orders(){
        $this->db->select('*');
        $this->db->from('orders');
        $q = $this->db->get();
        return $q->result_array();
    }

    public function get_customers(){
        $this->db->select('phone_number');
        $this->db->from('customers');
        $q = $this->db->get();
        return $q->result_array();
    }

}
