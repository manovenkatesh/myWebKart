<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends MX_Controller {
  	public function index()
	  {
      try{
        echo 'this is signup page';
        $data= Modules::run('login/loginPageInputs'); //calling the functions of the same Modules function elements
        log_message('debug','DATA THAT IS FETCHED FROM '.$data['Name']);
        $this->load->helper('form');
        echo Modules::run('templates/loginHeader',$data);
        $this->load->view('signupView',$data);
        echo Modules::run('templates/loginFooter');

      }
      catch(\Exception $ex){
        log_message('error','[ERROR] {exception}',['exception' =>$ex]);
      }
    }

    public function addUser(){
      try{
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf','Password Confirmation','trim|required|matches[password]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('phoneNumber','PhoneNumber','trim|required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('address','Address','trim|required');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
          
          $data=array('USER_NAME'=> $username, 'PASSWORD'=> md5($password),'NAME',$name);
          $this->load->model('signupModel');
          


        }

      }
      catch(\Exception $ex){
        log_message('error','[ERROR] {exception}',['exception' =>$ex]);
      }

    }
   
}
