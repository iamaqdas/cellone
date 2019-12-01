<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('email')) && !empty($this->session->userdata('login_stat'))) {
            $this->load->model("Product_Model");
        } else {
            redirect(base_url());
        }
    }

    public function index()
    {   $hd['pagename'] = 'Dashboard';
        $hd['title'] = 'Dashboard';
            $this->load->view('templates/header',$hd);
            $this->load->view('users/dashboard');
            $this->load->view('templates/footer');
    }

    public function products()
    {   
        $hd['pagename'] = 'Products';
        $hd['title'] = 'Products';
            $this->load->view('templates/header',$hd);
            $this->load->view('products/index');
            $this->load->view('templates/footer');
    }

    public function category()
    {   
        $hd['pagename'] = 'Category';
        $hd['title'] = 'Category';
            $this->load->view('templates/header',$hd);
            $this->load->view('category/index');
            $this->load->view('templates/footer');
    }

    public function customers()
    {   
        $hd['pagename'] = 'Customers';
        $hd['title'] = 'Customers';
        $data['orders'] = $this->Product_Model->get_customers();
            $this->load->view('templates/header',$hd);
            $this->load->view('customers/index',$data);
            $this->load->view('templates/footer');
    }

    public function orders()
    {   
        $hd['pagename'] = 'Orders';
        $hd['title'] = 'Orders';
        $data['orders'] = $this->Product_Model->get_orders();
            $this->load->view('templates/header',$hd);
            $this->load->view('orders/index',$data);
            $this->load->view('templates/footer');
    }

    public function discounts()
    {   
        $hd['pagename'] = 'Discounts';
        $hd['title'] = 'Discounts';
            $this->load->view('templates/header',$hd);
            $this->load->view('discounts/index');
            $this->load->view('templates/footer');
    }

    public function add_category(){
        $hd['pagename'] = 'Category';
        $hd['title'] = 'Add Category';
            $this->load->view('templates/header',$hd);
            $this->load->view('category/add');
            $this->load->view('templates/footer');
    }

    public function create_category(){
        $data['name'] = $this->input->post('category_name');
        $x = $this->Product_Model->create_category($data);
        if(!empty($x)){
            $activity = $this->session->userdata('activity');
            $activity .= "Added New Category : ".$data['name'].";";
            $this->session->set_userdata('activity',$activity);
            echo 1;
            return true;
        }else{
            echo 0;
            return false;
        }

    }


    public function test(){
        // $this->session->set_userdata('activity','hello');
        // redirect(base_url());
        echo date('Y-m-d h:i:s');
    }



}

?>
