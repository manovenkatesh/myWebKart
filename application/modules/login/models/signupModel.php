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

    public function checkValueInTable($table,$column,$value){
        try{
            $this->db->select($column);
            $this->db->from($table);
            $this->db->where($column,$value);
            $query=$this->db->get();
            if($query->row()!== null){
                return true;
            }
            else{
                return false;
            }
        }
        catch(\Exception $ex){
            log_message('error','[ERROR] {exception}',['exception' =>$ex]);
        }
    }

}