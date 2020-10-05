<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends MX_Controller {
    function __construct(){
        parent::__construct();
        //This constructor is for session handling purpose
        if($this->session->userdata('isLoggedIn')!=TRUE){
            redirect('login');
        }
    }

    public function index(){
        $username=$this->session->userdata('name');
        $userid=$this->session->userdata('user_id');
        echo "Hi ".$username." I hope your userid is ".$userid;
    }
}