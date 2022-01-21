<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Head_Of_Department_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    public function get_head_of_department_by_user_id($user_id){
        if(is_numeric($user_id)){
            return $this->db->get_where("head_of_departments", ["user_id" => $user_id])->row_array();
        }
        
        return null;
    }

    public function get_head_of_department_for_current_session(){
        $user_id = user_id();
        if(is_numeric($user_id)){
            return $this->db->get_where("head_of_departments", ["user_id" => $user_id])->row_array();
        }
        
        return null;
    }


    public function get_department_courses($department_id){
        if(is_numeric($department_id)){
            return $this->db->get_where("courses_view", ["department_id" => $department_id])->result_array();
        }
        
        return null;
    }
    
}