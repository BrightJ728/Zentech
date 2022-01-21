<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Student_model extends CI_Model {
        function __construct(){
            parent::__construct();
        }

    public function upload_certificate(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
    public function get_students($id = NULL){
        if($id === NULL){

            $results = $this->db->get("students_view")->result_array();
        }
        else{
            if( is_numeric(intval($id)) )
                $results = $this->db->get_where("students_view", ["id" => $id])->row_array();
            else
                $results = null;
        }
        return $results;
    }
    public function get_students_by_user_id($user_id){
        if( is_numeric($user_id) )
            $results = $this->db->get_where("students_view", ["user_id" => $user_id])->row_array();
        else
            $results = null;
        
        return $results;
    }
    // public function get_students_by_student_id($student_id=NULL){
    //     if( is_numeric($student_id) )
    //         $results = $this->db->get_where("student_records_view", ["id" => $student_id])->row_array();
    //     else
    //         $results = null;
        
    //     return $results;
    // }
     
    public function get_students_transcript($id= NULL){
        if($id === NULL){
        $results = $this->db->get("transcript_view")->result_array();
        }
        else{
            if( is_numeric(intval($id)) )
                $results = $this->db->get_where("students_view", ["id" => $id])->row_array();
            else
                $results = null;
        }
        return $results;
    }
    

       public function get_student_id_by_user_id($user_id){
        if( is_numeric($user_id) )
            $results = $this->db->get_where("students_view", ["user_id" => $user_id])->row_array();
        else
            $results = null;
        
        return $results;
    }


    // public function get_students_by_department($department_id, $select = NULL){
    //     if( $select !== NULL)
    //         $this->db->select($select);
    //     if( is_numeric( $department_id ) )
    //         $results = $this->db->get_where("students_view", ["program_id" => $department_id])->result_array();
    //     else
    //         $results = null;
    //     return $results;
    // }

    public function get_students_by_programme($program_id, $select = NULL){
        if( $select !== NULL)
            $this->db->select($select);
        if( is_numeric( $program_id ) )
            $results = $this->db->get_where("students_view", ["program_id" == $program_id])->result_array();
        else
            $results = null;
        return $results;
    }

    
    public function get_student_school_fees($student_id){
        $student = $this->db->get_where("students", ["id" => $student_id])->row_array();
        
        if($student == NULL){
            $response = array(
                'status' => false,
                'notification' => get_phrase('student_does_not_exist')
            );
            return json_encode($response);
        }

        $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
        if($current_academic_year_id == null){
            $response = array(
                'status' => false,
                'notification' => get_phrase('current_academic_year_not_found')
            );
            return json_encode($response);
        }
        
        $school_fees = $this->db->get_where("school_fees_view", 
            array(
                "program_id" => $student["program_id"],
                "year_level_id" => $student["level_id"],
                "student_type" => $student["student_type"],
                "academic_year_id" => $current_academic_year_id,
                ) 
            )->row_array();
        if ($school_fees == null) {
            $response = array(
                'status' => false,
                'notification' => get_phrase('school_fees_not_added_for_academic_year')
            );
            return json_encode($response);
        }
        $response = array(
            'status' => true,
            'data' => array(
                "amount" => $school_fees["amount"],
                "currency" => $school_fees["currency_symbol"],
                "currency_id" => $school_fees["currency_id"]
            )
        );
        return json_encode($response);
    }
    public function get_student_resit_fees($student_id){
        $student = $this->db->get_where("students", ["id" => $student_id])->row_array();
        
        if($student == NULL){
            $response = array(
                'status' => false,
                'notification' => get_phrase('student_does_not_exist')
            );
            return json_encode($response);
        }

        $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
        if($current_academic_year_id == null){
            $response = array(
                'status' => false,
                'notification' => get_phrase('current_academic_year_not_found')
            );
            return json_encode($response);
        }
        
        $resit_fees = $this->db->get_where("resit_fees_view", 
            array(
                "program_id" => $student["program_id"],
                "year_level_id" => $student["level_id"],
                "student_type" => $student["student_type"],
                "academic_year_id" => $current_academic_year_id,
                ) 
            )->row_array();
        if ($resit_fees == null) {
            $response = array(
                'status' => false,
                'notification' => get_phrase('resit_fees_not_added_for_academic_year')
            );
            return json_encode($response);
        }
        $response = array(
            'status' => true,
            'data' => array(
                "amount" => $resit_fees["amount"],
                "currency" => $resit_fees["currency_symbol"],
                "currency_id" => $resit_fees["currency_id"]
            )
        );
        return json_encode($response);
    }
    
    public function course_registration()
    {
        
        $student = $this->db->get_where('students', array('user_id'=>$this->session->userdata("user_id")))->row_array();
        $courses = $this->db->get_where('courses', array('level_id'=>$student["level_id"]))->result_array();
        
    }
        
    public function get_current_academic_year_id(){
        $current_date = date("Y-m-d");
        $result = $this->db->get_where("academic_years", array("start_date <=" => $current_date, "end_date >=" => $current_date))->row_array();
        if($result === NULL)
            return false;

        return $result["id"];
    }
 public function get_current_academic_year(){
        $current_date = date("Y-m-d");
        $result = $this->db->get_where("academic_years", array("start_date <=" => $current_date, "end_date >=" => $current_date))->row_array();
        if($result === NULL)
            return false;

        return $result["description"];
    }
    public function get_student_courses_by_user_id($user_id){
        $student = $this->get_students_by_user_id($user_id);
        return $this->db->get_where('courses', array('level_id'=>$student["level_id"]))->result_array();
    }

    public function get_student_courses($student_id){
        $student = $this->get_students($student_id);
        return $this->db->get_where('courses', array('level_id'=>$student["level_id"]))->result_array();
    }
    

    public function get_student_courses_for_current_semester_by_user_id($user_id){
        $student = $this->get_students_by_user_id($user_id);
        $semester = $this->crud_model->get_current_semester();
        if($student !== null ){
            return $this->db->get_where('courses', array('level_id' => $student["level_id"], "semester" => $semester["semester"]))->result_array();
        }
        return null;
    }

    public function get_student_registered_courses_by_user_id($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){

            $student = $this->get_students_by_user_id($user_id);

            $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
            $current_semester_id = $this->crud_model->get_current_semester_id();

            $this->db->where("student_id", $student['id']);

            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
            else
                $this->db->where("academic_year_id", $current_academic_year_id);

            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            else
                $this->db->where("semester_id", $current_semester_id);

            return $this->db->get("course_registration_view")->result_array();
        }
        return null;
    }
    

    public function get_student_registered_courses_count_by_user_id($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){

            $student = $this->get_students_by_user_id($user_id);

            $this->db->where("student_id", $student['id']);

            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);

            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);

            return $this->db->count_all_results("course_registration_view");
        }
        return 0;
    }

   

    public function course_registration_by_student($data){
        $student = $this->get_students_by_user_id(user_id());
        $academic_year_id = $this->crud_model->get_current_academic_year_id();
        $semester = $this->crud_model->get_current_semester();
        
        $results = $this->db->get_where("courses")->row_array();
        if($student === null){
            $response = array(
                'status' => false,
                'notification' => get_phrase('student_not_found')
            );
            echo json_encode($response);
            return;
        }
        if($semester === null){
            $response = array(
                'status' => false,
                'notification' => get_phrase('semester_not_created')
            );
            echo json_encode($response);
            return;
        }
        if($academic_year_id === null){
            $response = array(
                'status' => false,
                'notification' => get_phrase('academic_year_not_available')
            );
            echo json_encode($response);
            return;
        }
        if($student === null){
            $response = array(
                'status' => false,
                'notification' => get_phrase('semester_registration_not_available')
            );
            echo json_encode($response);
            return;
        }
        if(!is_array($data)){
            $response = array(
                'status' => false,
                'notification' => get_phrase('internal_error_occurred.')
            );
            echo json_encode($response);
            return;
        }

        $course_ids = $data["course_ids"];
        $this->db->trans_begin();

        foreach($data["course_ids"] as $course_id){
            $reg_data = array(
                "student_id" => $student["id"],
                "academic_year_id" => $academic_year_id,
                "course_id" => $course_id,
                "semester_id" => $semester["id"],


            );
            //Save course registration for course
            if (!$this->db->insert("course_registration", $reg_data)) {
                $response = array(
                    'status' => false,
                    'notification' => get_phrase('failed_to_register_courses')
                );
                break;
            }
        }

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $response = array(
                'status' => false,
                'notification' => get_phrase('failed_to_register_courses')
            );
        }
        else
        {
            $this->db->trans_commit();
            $response = array(
                'status' => true,
                'notification' => get_phrase('course_registration_successful')
            );
            
        }
        echo json_encode($response);
    }
    
    public function get_student_registration_for_current_semester_student_id(){

        $student = $this->get_students_by_user_id(user_id());
        $academic_year_id = $this->crud_model->get_current_academic_year_id();

        return $this->db->get_where("course_registration_view", array("student_id" => $student["id"], "academic_year_id" => $academic_year_id))->result_array();
    }

    public function get_student_registered_courses_for_current_semester_by_user_id(){
        $student = $this->get_students_by_user_id(user_id());
        $academic_year_id = $this->crud_model->get_current_academic_year_id();
        $semester = $this->crud_model->get_current_semester();

        return $this->db->get_where("course_registration", array("student_id" => $student["id"], "academic_year_id" => $academic_year_id))->result_array();
    }

    public function get_student_registered_courses($student_id, $academic_year_id = NULL, $semester_id = NULL){

        if(is_numeric($student_id)){
            $this->db->where("student_id", $student_id);

            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
            
            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            return $this->db->get("course_registration_view")->result_array();
        }

        return null;
        
    }

    public function get_student_registered_courses_id_for_current_semester_by_user_id(){
        $student = $this->get_students_by_user_id(user_id());
        $semester = $this->crud_model->get_current_semester();
        
        if($semester === NULL){
            return null;
        }

        $this->db->select("course_id");
        return $this->db->get_where("course_registration", array("student_id" => $student["id"], "academic_year_id" => $semester['academic_year_id'], "semester_id" => $semester["id"]))->result_array();
    }
    public function get_course_academic_year_records($course_id, $academic_year_id){
        if(is_numeric($course_id) && is_numeric($academic_year_id)){
            $this->db->where("course_id", $course_id);
            $this->db->where("academic_year_id", $academic_year_id);

            return $this->db->get("student_records_view")->result_array();
        }
        return null;
    }

    public function get_student_records($id = NULL){
        if($id !== NULL){
            $this->db->where("id", $id);
            return $this->db->get_where("student_records_view")->row_array();  
        }
            
        return $this->db->get_where("student_records_view")->result_array();       
    }


  



    // transcript
    public function grade_point(){
        $new =  array();
        
        $current_semester_id = $this->crud_model->get_current_semester_id();
        $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
         $credit= $this->get_student_records_by_user_id(user_id(),$current_academic_year_id,$current_semester_id);
         if( $current_semester_id){
        foreach($credit as $credits){
    if($credits['status']!="pending"){
            if($credits['total_score']>=70){
                $new[] = $credits['credit_hours']*$credits['total_score'];


            }elseif ($credits['total_score']<69.99 && $credits['total_score']>=60){
                $new[] = $credits['credit_hours'] * $credits['total_score'];


            
             }elseif ($credits['total_score']<59.99 && $credits['total_score']>=50){
                $new[] = $credits['credit_hours']*$credits['total_score'];
            }
            else{
                $new[] = $credits['credit_hours']*0;

            }

        }
        else{
            return null;
        }
    }
                return array_sum($new);

                  
    }
}
    public function get_gpa(){ 
        $grade_points= $this->grade_point();
        $student = $this->get_students_by_user_id(user_id());
         // $this->db->where("student_id", $student['id']);
        $total_credits = $this->get_courses_total_credit();
        $current_semester_id = $this->crud_model->get_current_semester_id();      
        if($grade_points>0 && $total_credits>0  && $current_semester_id){
        $gpa = $grade_points/$total_credits;
         $data['gpa'] =$gpa;
         $data['total_grade_point']=$grade_points;
            $this->db->where("student_id", $student['id']);

            $this->db->where("semester_id", $current_semester_id);
             
            $this->db->update("student_records_view",$data);
                 
           return number_format($gpa,2);
           
     }
                     
    }
    public function get_student_failed_records($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){
    
            $student = $this->get_students_by_user_id($user_id);
    
            $this->db->where("student_id", $student['id']);
            
            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
    
            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            
                return $this->db->get_where("student_records_view", ["total_score <" => 50])->result_array();
          
        }
        return null; 
    }
    public function get_student_failed_courses_by_user_id($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){
    
            $student = $this->get_students_by_user_id($user_id);
    
            $this->db->where("student_id", $student['id']);
            
            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
    
            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);

                
                return $this->db->get_where("student_records_view", ["total_score <" => 50])->result_array();
          
        }
        return null; 
    }

    public function get_student_records_by_user_id($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){
    
            $student = $this->get_students_by_user_id($user_id);
    
            $this->db->where("student_id", $student['id']);
            
            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
    
            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            
                return $this->db->get("student_records_view")->result_array();
        }
        return null;
    }
    public function get_student_passed_records_by_user_id($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){
    
            $student = $this->get_students_by_user_id($user_id);
    
            $this->db->where("student_id", $student['id']);
            
            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
    
            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            
                return $this->db->get_where("student_records_view", ["total_score >" => 50])->result_array();
        }
        return null;
    }


      public function get_cpga(){
      
        $total = array();

         $cgpa = $this->get_student_transcript_by_user_id(user_id());
         if(count($cgpa)>0){
         foreach($cgpa as $total_cgpa ){
            $total[] = $total_cgpa['gpa'];

         }
            $cgpa_sum = array_sum($total);

             $total_cgp = $cgpa_sum/count($total);
             return number_format($total_cgp,2);
}
else{
    return null;
}
 }
 





  public function get_courses_total_credit(){
        $courses_credit_hours = $this->student_model->get_student_registered_courses_credit_hours_by_user_id(user_id());
        $registered_course_credit = array();

        foreach($courses_credit_hours as $registered_course_hour){

        $registered_course_credit[] = $registered_course_hour["credit_hours"];
            }
        return array_sum($registered_course_credit);

    }

// not done 
     public function add_transcript(){
        $trans = $this->db->get('transcript')->result_array();
        $grade_points= $this->grade_point();
        $student = $this->get_students_by_user_id(user_id());
         // $this->db->where("student_id", $student['id']);
        $total_credits = $this->get_courses_total_credit();
        $current_semester_id = $this->crud_model->get_current_semester_id();    
                $current_semester= $this->crud_model->get_particular_semester();    

        $current_academic_year = $this->crud_model->get_particular_academic_year();  
        if($grade_points>0 && $total_credits>0  && $current_semester_id){
        $gpa = $grade_points/$total_credits;
         
                $data['student_id'] =$student['id'];
                $data['semester']=$current_semester_id;

                $data['gpa'] =$gpa;
                $data['cgpa'] =$this->get_cpga();

                $data['total_point']=$grade_points;
                $data['academic_year']=$current_academic_year;
        $trans = $this->db->get('transcript')->result_array();

        $check_data = $this->db->get_where('transcript', array('student_id' => $data['student_id'], 'academic_year'=>$data['academic_year'], "semester" =>$data['semester']));
        // print_r(count($check_data->num_rows()));
if($check_data->num_rows() > 0){
    foreach($trans as $key => $value):
               $data['student_id']=$student['id'];

                $data['semester']=$current_semester;
                $data['gpa'] =$gpa;
                 $data['cgpa'] =$this->get_cpga();

                $data['total_point']=$grade_points;
                $data['semester_id']=$current_semester_id;

                $data['academic_year']=$current_academic_year;
                $this->db->where('student_id', $student['id']);
                $this->db->update("transcript",$data);

                // return number_format($gpa,2);
         endforeach;

            

       }else{

               $data['student_id'] =$student['id'];
                $data['semester']=$current_semester;
                                $data['semester_id']=$current_semester_id;

                $data['gpa'] =$gpa;
                $data['cgpa'] =$this->get_cpga();
                $data['total_point']=$grade_points;
                $data['academic_year']=$current_academic_year;
            $this->db->insert("transcript",$data);

            
         
         
         
     }
       }
       
        
    }
    

public function get_student_registered_courses_credit_hours_by_user_id($user_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){

            $student = $this->get_students_by_user_id($user_id);

            $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
            $current_semester_id = $this->crud_model->get_current_semester_id();

            $this->db->where("student_id", $student['id']);

            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
            else
                $this->db->where("academic_year_id", $current_academic_year_id);

            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            else
                $this->db->where("semester_id", $current_semester_id);

            return $this->db->get("course_registration_view")->result_array();
        }
        return null;
    }
    

    public function get_course_registered_students($course_id, $academic_year_id, $semester_id = NULL){
        if(is_numeric($course_id)){
            $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
            $current_semester_id = $this->crud_model->get_current_semester_id();

            $this->db->where("course_id", $course_id);

            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
            else
                $this->db->where("academic_year_id", $current_academic_year_id);

            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            else
                $this->db->where("semester_id", $current_semester_id);

            return $this->db->get("course_registration_view")->result_array();
        }
        return null;
    }

    public function count_registered_students($course_id, $academic_year_id = NULL, $semester_id = NULL){
        if(is_numeric($course_id)){
            $current_academic_year_id = $this->crud_model->get_current_academic_year_id();
            $current_semester_id = $this->crud_model->get_current_semester_id();

            $this->db->where("course_id", $course_id);

            if($academic_year_id !== NULL && is_numeric($academic_year_id))
                $this->db->where("academic_year_id", $academic_year_id);
            else
                $this->db->where("academic_year_id", $current_academic_year_id);

            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            else
                $this->db->where("semester_id", $current_semester_id);

            return $this->db->count_all_results("course_registration_view");
        }
        return 0;
    }
    
    

      public function get_student_transcript_by_user_id($user_id, $academic_year = NULL, $semester_id = NULL){
        if(is_numeric($user_id)){

            $student = $this->get_students_by_user_id($user_id);

            $this->db->where("student_id", $student['id']);

            if($academic_year !== NULL && is_numeric($academic_year))
                $this->db->where("academic_year_id", $academic_year);

            if($semester_id !== NULL && is_numeric($semester_id))
                $this->db->where("semester_id", $semester_id);
            return $this->db->get("transcript_view")->result_array();
        }
        return null;
    }
     




   public function get_student_credit_by_user_id($user_id){
        if(is_numeric($user_id)){

            $student = $this->get_students_by_user_id($user_id);

            $this->db->where("student_id", $student['id']);

            

            return $this->db->get("course_registration_view")->result_array();
        }
        return null;
    }



    public function get_students_by_year_level_id($year_level_id){
        return $this->db->get_where("students_view", ["level_id" => $year_level_id])->result_array();
    }

    public function get_students_by_year_level_id_and_department_id($year_level_id, $department_id){
        return  $this->db->query("SELECT * FROM `students_view` WHERE level_id = {$year_level_id} AND program_id IN (SELECT id FROM programs WHERE department_id = {$department_id})")->result_array();
    }

}