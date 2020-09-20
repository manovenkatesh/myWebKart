<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//All the template call should come here. From here The template which should be called should be accessed properly
class templates extends MX_Controller {
	public function loginHeader($data)
	{
		$this->load->view('login/loginHeader',$data);
	}
	public function loginFooder(){
		$this->load->view('login/loginFooter');
	}

}