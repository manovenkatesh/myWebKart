<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function checkCredentials($data){
        $this->db->where($data);
        $result=$this->db->get('users');
        return $result->row();
    } 

}