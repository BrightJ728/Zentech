<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Lecturer_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

    public function upload_course_resource($name){

        $file_ext = pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION);
        $file_name = md5(time()) . "." . $file_ext;

        $config['upload_path']          = './uploads/course_resources/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx|doc|xslx|pptx';
        $config['max_size']             = 204800;
        $config['file_name'] = $file_name;
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($name))
        {
            var_dump(array('error' => $this->upload->display_errors()));
            return false;
        }
        else
        {
            return $file_name;
        }
    }

    public function get_course_resources($course_id){
        return $this->db->get_where('course_resources', ["course_id" => $course_id])->result_array();
    }

    public function add_course_resource($data_input){

        $data["course_id"] = $data_input["course_id"];
        $data["description"] = $data_input["description"];
        $data["added_by_user_id"] = user_id();
        
        $file_name = $this->upload_course_resource("resource");
        if($file_name)
            $data_input["src"] = $file_name;
        else{
            $response = array(
                'status' => false,
                'notification' => get_phrase('failed_to_upload_resource_file')
            );
            return json_encode($response);
        }

        if($this->db->insert("course_resources", $data_input)){
            $response = array(
                'status' => true,
                'notification' => get_phrase('resource_added_successfully')
            );
        }else{
            $response = array(
                'status' => false,
                'notification' => get_phrase('failed_to_add_resource')
            );
        }

        return json_encode($response);

    }

    public function delete_resource($resource_id){
        $resource = $this->db->get_where("course_resources", ["id" => $resource_id])->row_array();

        //Now Unlink
        if(file_exists(course_resource_file_path($resource["src"])))
        {
            if (!unlink(course_resource_file_path($resource["src"]))) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_delete_resource_from_storage')
                );
                return json_encode($response);
            }
        }

        $this->db->where('id', $resource_id);
        
        if($this->db->delete('course_resources'))
            $response = array(
                'status' => true,
                'notification' => get_phrase('resource_has_been_deleted_successfully')
            );
        else
            $response = array(
                'status' => false,
                'notification' => get_phrase('failed_to_delete_resource')
            );

        return json_encode($response);
    }

    public function assign_course($data){
        $data_input["course_id"] = $data["course_id"];
        $data_input["lecturer_id"] = $data["lecturer_id"];
        $data_input["start_date"] = date("Y-m-d H:i:s");

        //Check for conflicts
        $lecturer_courses_count = $this->db->get_where("lecturer_courses_view", ["course_id" => $data_input["course_id"]])->num_rows();

    
        if($this->db->insert("lecturer_courses", $data_input))
            $response = array(
                'status' => true,
                'notification' => get_phrase('course_assigned_successfully')
            );
        else
            $response = array(
                'status' => false,
                'notification' => get_phrase('failed_to_assign_course')
            );
        return json_encode($response);
    }
    public function revoke_course($course_id){
        $data_input["end_date"] = date("Y-m-d H:i:s");

        //Check for conflicts
        $lecturer_courses_count = $this->db->get_where("lecturer_courses_view", ["course_id" => $course_id])->num_rows();
        
        if($lecturer_courses_count === 0){
            $response = array(
                'status' => false,
                'notification' => get_phrase('course_not_assigned')
            ); 
            return json_encode($response);
        }

        if( $this->db->update("lecturer_courses", $data_input, ["course_id" => $course_id] ) )
            $response = array(
                'status' => true,
                'notification' => get_phrase('course_revoked_successfully')
            );
        else
            $response = array(
                'status' => false,
                'notification' => get_phrase('failed_to_revoke_course')
            );
        return json_encode($response);
    }

    public function get_assigned_courses($lecturer_id){
        return $this->db->get_where("lecturer_courses_view", ["lecturer_id" => $lecturer_id])->result_array();
    }

    public function get_assigned_courses_by_user_id($user_id){
        $lecturer = $this->db->get_where("lecturers", ["user_id" => $user_id])->row_array();
        return $this->db->get_where("lecturer_courses_view", ["lecturer_id" => $lecturer["id"]])->result_array();
    }

    public function save_student_record($data_input){
        $registered_students = $this->student_model->get_course_registered_students($data_input["course_id"], $data_input["academic_year_id"]);

        $user_role = $this->user_model->get_user_role(user_id());
        if($user_role !== "lecturer" && $user_role !== "exam officer" && $user_role !== "head of department" ){
            $response = array(
                'status' => false,
                'notification' => get_phrase('Unauthorized user')
            );
            return json_encode($response);
        }

        foreach($registered_students as $registered_student){
            if(!is_numeric($data_input["class_mark-$registered_student[student_id]"]) 
            && !is_numeric($data_input["course_registration_id-$registered_student[student_id]"]) 
            && !is_numeric($data_input["exam_mark-$registered_student[student_id]"])){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('wrong_input')
                );
                return json_encode($response);
            }
            
            $record["class_score"] = $data_input["class_mark-$registered_student[student_id]"];
            $record["exam_score"] = $data_input["exam_mark-$registered_student[student_id]"];
            $record["student_course_registration_id"] = $data_input["course_registration_id-$registered_student[student_id]"];
            $record["lecturer_id"] = user_id();
            $record["type"] = "exam";
        
            if(!$this->db->insert("student_records", $record)){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_save_records')
                );
                return json_encode($response);
            }
        
        }

        $response = array(
            'status' => true,
            'notification' => get_phrase('records_saved_successfully')
        );

        return json_encode($response);

    }
    public function update_student_record($data_input, $type){
        //TODO improve security by allowing only lecturer assigned to course to update

        $user_role = $this->user_model->get_user_role(user_id());
        if($user_role !== "lecturer" && $user_role !== "exam officer" && $user_role !== "head of department"){
            $response = array(
                'status' => false,
                'notification' => get_phrase('Unauthorized user')
            );
            return json_encode($response);
        }

        if($type === "single"){
            if(!isset($data_input["class_mark"], $data_input["exam_mark"], $data_input["record_id"]) ){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('wrong_input')
                );
                return json_encode($response);
            }
            $record["id"] = $data_input["record_id"];
            $record["class_score"] = $data_input["class_mark"];
            $record["exam_score"] = $data_input["exam_mark"];

            $record["status"] = "pending";

            if(!is_numeric($record["id"]) || !is_numeric($record["class_score"]) || !is_numeric($record["exam_score"])  ){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('wrong input')
                );
                return json_encode($response);
            }

            if(!$this->db->update("student_records", $record, ["id" => $record["id"]])){
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_update_record')
                );
                return json_encode($response);
            }else{
                $response = array(
                    'status' => true,
                    'notification' => get_phrase('record_updated_successfully')
                );
        
                return json_encode($response);
            }
        }else{
            $records = $this->student_model->get_course_academic_year_records($data_input["course_id"], $data_input["academic_year_id"]);
            //var_dump($data_input, $records);
            foreach($records as $record){
                if(!is_numeric($data_input["class_mark-$record[id]"]) || !is_numeric($data_input["exam_mark-$record[id]"])){
                    $response = array(
                        'status' => false,
                        'notification' => get_phrase('wrong_input')
                    );
                    return json_encode($response);
                }

                $update["class_score"] = $data_input["class_mark-$record[id]"];
                $update["exam_score"] = $data_input["exam_mark-$record[id]"];
                             $update["status"] = "Approved";


                if(!$this->db->update("student_records", $update, ["id" => $record["id"]])){
                    $response = array(
                        'status' => false,
                        'notification' => get_phrase('failed_to_update_records')
                    );
                    return json_encode($response);
                }
            }

            $response = array(
                'status' => true,
                'notification' => get_phrase('records_updated_successfully')
            );
    
            return json_encode($response);
        }

    }

    public function get_department_courses($department_id){
        if(is_numeric($department_id)){
            return $this->db->get_where("courses_view", ["department_id" => $department_id])->result_array();
        }
        
        return null;
    }
    
}