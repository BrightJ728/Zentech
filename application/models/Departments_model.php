<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Departments_model extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function get_all()
        {
            return $this->db->get("departments")->result_array();
        }

        public function get($id){
            if ($id === null) {
                $results = $this->db->get("departments")->result_array();
            } else {
                if (is_numeric($id)) {
                    $results = $this->db->get_where("departments", ["id" => $id])->row_array();
                } else {
                    $results = null;
                }
            }
            return $results;
        }
    }