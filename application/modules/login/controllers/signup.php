<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends MX_Controller {
  	public function index()
	  {
      try{
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
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[15]|callback_usernameCheck');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf','Password Confirmation','trim|required|matches[password]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_emailCheck');
        $this->form_validation->set_rules('phoneNumber','PhoneNumber','trim|required|min_length[10]|max_length[15]|callback_phonenumberCheck');
        $this->form_validation->set_rules('address','Address','trim|required');
        if($this->form_validation->run($this) == FALSE){
            $this->index();
        }
        else{
          $username=$this->input->post('username');
          $password=$this->input->post('password');
          $name=$this->input->post('name');
          $data=array('USER_NAME'=> $username, 'PASSWORD'=> md5($password),'NAME'=>$name);
          $this->load->model('signupModel');
          $insertId=$this->signupModel->insertData('users',$data);
          $address=$this->input->post('address');
          $email=$this->input->post('email');
          $phone=$this->input->post('phoneNumber');
          $userInfo=array('USER_ID'=>$insertId,'ADDRESS'=> $address,'EMAIL'=>$email,'PHONENUMBER'=>$phone);
          $this->signupModel->insertData('userdetails',$userInfo);
          $logindata= Modules::run('login/loginPageInputs');
          echo Modules::run('templates/loginHeader',$logindata);
          $this->load->view('signupsuccess');
          echo Modules::run('templates/loginFooter');
        }

      }
      catch(\Exception $ex){
        log_message('error','[ERROR] {exception}',['exception' =>$ex]);
      }

    }
    public function usernameCheck($userName){
      try{
        log_message('info','CAME IN TO USERNAMECHECK');
        $this->load->model('signupModel');
        if($this->signupModel->checkValueInTable('users','USER_NAME',$userName)){
            $this->form_validation->set_message('usernameCheck','Please Use different UserName. '.$userName.' is already available');
            return false;
        }
        else{
            return true;
        }
      }
      catch(\Exception $ex){
        log_message('error','[ERROR] {exception}',['exception' =>$ex]);
      }
    }
    public function phonenumberCheck($value){
      try{
        log_message('info','CAME IN TO PHONENUMBERCHECK');
        $this->load->model('signupModel');
        if($this->signupModel->checkValueInTable('userdetails','PHONENUMBER',$value)){
            $this->form_validation->set_message('phonenumberCheck','Please Use different phonenumber. '.$value.' is already available');
            return false;
        }
        else{
            return true;
        }
      }
      catch(\Exception $ex){
        log_message('error','[ERROR] {exception}',['exception' =>$ex]);
      }
    }

    public function emailCheck($value){
      try{
        log_message('info','CAME IN TO EMAILCHECK');
        $this->load->model('signupModel');
        if($this->signupModel->checkValueInTable('userdetails','EMAIL',$value)){
            $this->form_validation->set_message('emailCheck','Please Use different email. '.$value.' is already available');
            return false;
        }
        else{
            return true;
        }
      }
      catch(\Exception $ex){
        log_message('error','[ERROR] {exception}',['exception' =>$ex]);
      }
    }

   
}
