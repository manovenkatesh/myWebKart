<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        //if the user is already logged in this page should not be shown
        if($this->session->userdata('isLoggedIn')==TRUE){
            redirect('home');
        }

    }
	public function index()
	{
        $data=$this->loginPageInputs();
        $this->load->helper('form');
        echo Modules::run('Templates/loginHeader',$data);
        $this->load->view('loginView',$data);
        echo Modules::run('Templates/loginFooder');
    }
    public function validate(){

        $this->load->library('form_validation');
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() ==FALSE){
            $this->index();
        }
        else{
            $data=array('USER_NAME'=> $username, 'PASSWORD'=> md5($password));
            $this->load->model('loginModel');
            $result=$this->loginModel->CheckCredentials($data);   
            if($result){
                log_message('info','Logged in user'.$username);
                $this->session->set_userdata('name',$username);
                $this->session->set_userdata('isLoggedIn',TRUE);
                $userId=$result->USER_ID;
                $this->session->set_userdata('user_id',$userId);
                log_message('info','Logged in user_id',$userId);
                redirect('home');
            }
            else{
                redirect('login');
            }

        }

    }

    public function loginPageInputs(){
        $data['Name']='Test Industry';
        return $data;
    }

}
