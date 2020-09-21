<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signupModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertData($table,$data){
        try{
            $this->db->insert($table,$data);
            return $this->db->insert_id();
        }
        catch(\Exception $ex){
            log_message('error','[ERROR] {exception}',['exception' =>$ex]);
        }  
    }

}