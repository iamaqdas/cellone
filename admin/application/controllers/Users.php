<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("User_Model");
    }

    public function index(){
        if(!empty($this->session->userdata('email')) && !empty($this->session->userdata('login_stat'))){
            redirect(base_url("dashboard"));
        }
        $this->load->view('users/index');
    }

    public function register(){
        if(!empty($this->session->userdata('email')) && !empty($this->session->userdata('login_stat'))){
            redirect(base_url("dashboard"));
        }
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad request.'));
        }else{
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['regip'] = $this->get_user_ip();
            $data['token'] = $this->generate_token(100);
            $r = $this->User_Model->register($data);
            if($r){
                echo 1;
                return true;
            }else{
                echo 0;
                return false;
            }
        }
    }

    private function generate_token($num){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';

            for ($i = 0; $i < $num; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            return $randomString;
    }

    private function get_user_ip(){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function checkemail(){
        if(!empty($this->session->userdata('email')) && !empty($this->session->userdata('login_stat'))){
            redirect(base_url("dashboard"));
        }
        // $method = $_SERVER['REQUEST_METHOD'];
        // if ($method != 'POST') {
        //     echo json_encode(array('status' => 400, 'message' => 'Bad request.'));
        // }else{
            $email = $this->input->post('email');
            $r = $this->User_Model->checkemail($email);
            if($r){
                echo 1;
                return true;
            }else{
                echo 0;
                return false;
            }
        // }
    }


    public function login(){
        if(!empty($this->session->userdata('email')) && !empty($this->session->userdata('login_stat'))){
            redirect(base_url("dashboard"));
        }
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') {
            echo json_encode(array('status' => 400, 'message' => 'Bad request.'));
        }else{
            $data1['email'] = $this->input->post('email');
            $data1['password'] = md5($this->input->post('password'));
            
            // $data['login_at'] = date('Y-m-d h:i:sa');
            $after_check = $this->User_Model->checkuser($data1);
            if($after_check){
                // var_dump($after_check);
                // var_dump($_SESSION);
                // exit;
                $this->session->set_userdata('email',$data1['email']);
                $this->session->set_userdata('token',$after_check[0]['token']);
                
                $this->session->set_userdata('login_stat',1);
                $this->session->set_userdata('activity','');

                $data['ip'] = $this->get_user_ip();
                $data['user_id'] = $after_check[0]['id'];
                $data['sess_id'] = $_SESSION['__ci_last_regenerate'];
                $ins_auth =  $this->User_Model->login($data);
                $unviewed_orders = 0;
                if($ins_auth){
                    $this->session->set_userdata('id',$ins_auth);
                    $viewed_orders = $this->User_Model->get_orders_customers_from_auth($ins_auth-1);
                    // $viewed_orders = $this->User_Model->get_orders_customers_from_auth($ins_auth-1);
                    $orders = $this->User_Model->get_orders();
                    $customers = $this->User_Model->get_customers();
                    $unviewed_orders = count($orders) - $viewed_orders[0]['orders'];
                    $unviewed_customers = count($customers) - $viewed_orders[0]['customers'];
                    $this->session->set_userdata('new_orders',$unviewed_orders);
                    $this->session->set_userdata('viewed_orders',$viewed_orders[0]['orders']);
                    $this->session->set_userdata('new_customers',$unviewed_customers);
                    $this->session->set_userdata('viewed_customers',$viewed_orders[0]['customers']);
                    $this->session->set_userdata('home_visit',1);
                    // $this->session->set_userdata('customers','');
                    // echo "<script>localStorage.setItem('visit',1);</script>";
                    echo 1;
                    return true;
                }else{
                    echo 0;
                    return false;
                }

            }else{
                echo 0;
                return false;
            }
        }
        
    }


    public function logout(){
        if(!empty($this->session->userdata('email')) && !empty($this->session->userdata('login_stat'))){

        $orders = $this->User_Model->get_orders();
        if(count($orders) > $this->session->userdata('viewed_orders')){
            $data['orders'] = $this->session->userdata('viewed_orders');
        }else{
            $data['orders'] = count($orders);            
        }
        $customers = $this->User_Model->get_customers();
        if(count($customers) >$this->session->userdata('viewed_customers')){
            $data['customers'] = $this->session->userdata('viewed_customers');
        }else{
            $data['customers'] = count($customers);
        }
        
        $data['actions'] = $this->session->userdata('activity');
        
        // $data['customers'] = $this->session->userdata('viewed_orders');
        $id = $this->session->userdata('id');
        $data['logout_at'] = date('Y-m-d h:i:s');
        $this->User_Model->logout($data,$id);
        $this->session->set_userdata('email',"");
        $this->session->set_userdata('token',"");
        $this->session->set_userdata('login_stat',"");
        $this->session->sess_destroy();
        echo "<script>localStorage.removeItem('visit');</script>";
        redirect(base_url());
        }else{
            redirect(base_url());
        }
    }

}
