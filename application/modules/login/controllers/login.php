<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
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
                echo "you are authenticated";
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
