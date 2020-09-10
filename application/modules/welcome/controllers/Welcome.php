<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {
/*When user access the website with http://localhost/myWebKart/ it will be redirected here
because we have mentioned default controller is welcome in the routes

*/ 
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
