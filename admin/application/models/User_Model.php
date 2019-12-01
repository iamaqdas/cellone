<?php

class User_Model extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register($data){
        $this->db->insert('users',$data);
        $inser_id = $this->db->insert_id();
        return $inser_id;
    }

    public function checkemail($email){
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email',$email);
        $q = $this->db->get();
        if(!empty($q)){
            return $q->result_array();
        }else{
            return null;
        }
        
    }

    public function login($data){
        $this->db->insert('auth_logs',$data);
        $inser_id = $this->db->insert_id();
        return $inser_id;
    }

    public function checkuser($data){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($data);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function logout($data,$id){
        var_dump($data);
        $this->db->where('id', $id);
        $this->db->update('auth_logs', $data);
        // return true;
    }

    public function get_orders(){
        $this->db->select('order_id');
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

    public function get_orders_customers_from_auth($prev_id){
        $this->db->select('orders,customers');
        $this->db->from('auth_logs');
        $this->db->where('id',$prev_id);
        $q = $this->db->get();
        return $q->result_array();
    }
}

?>