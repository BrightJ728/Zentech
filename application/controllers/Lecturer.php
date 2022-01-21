<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Zentech School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Lecturer extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->database();
		$this->load->library('session');

		/*LOADING ALL THE MODELS HERE*/
		$this->load->model('Crud_model',     'crud_model');
		$this->load->model('User_model',     'user_model');
		$this->load->model('Settings_model', 'settings_model');
		$this->load->model('Payment_model',  'payment_model');
		$this->load->model('Email_model',    'email_model');
		$this->load->model('Addon_model',    'addon_model');
		$this->load->model('Frontend_model', 'frontend_model');

		/*cache control*/
		$this->output->set_header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");

		/*SET DEFAULT TIMEZONE*/
		timezone();
		
		if($this->session->userdata('lecturer_login') != 1){
			redirect(site_url('login'), 'refresh');
		}
	}
	//dashboard
	public function index(){
		redirect(route('dashboard'), 'refresh');
	}

	public function dashboard(){

		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$this->load->view('backend/index', $page_data);
	}

	//START STUDENT ADN ADMISSION section
	public function student($param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = ''){

		if($param1 == 'create'){
			//form view
			if($param2 == 'bulk'){
				$page_data['aria_expand'] = 'bulk';
				$page_data['working_page'] = 'create';
				$page_data['folder_name'] = 'student';
				$page_data['page_title'] = 'add_student';
				$this->load->view('backend/index', $page_data);
			}elseif($param2 == 'excel'){
				$page_data['aria_expand'] = 'excel';
				$page_data['working_page'] = 'create';
				$page_data['folder_name'] = 'student';
				$page_data['page_title'] = 'add_student';
				$this->load->view('backend/index', $page_data);
			}else{
				$page_data['aria_expand'] = 'single';
				$page_data['working_page'] = 'create';
				$page_data['folder_name'] = 'student';
				$page_data['page_title'] = 'add_student';
				$this->load->view('backend/index', $page_data);
			}
		}

		//create to database
		if($param1 == 'create_single_student'){
			$response = $this->user_model->single_student_create();
			echo $response;
		}

		if($param1 == 'create_bulk_student'){
			$response = $this->user_model->bulk_student_create();
			echo $response;
		}

		if($param1 == 'create_excel'){
			$response = $this->user_model->excel_create();
			echo $response;
		}

		// form view
		if($param1 == 'edit'){
			$page_data['student_id'] = $param2;
			$page_data['working_page'] = 'edit';
			$page_data['folder_name'] = 'student';
			$page_data['page_title'] = 'update_student_information';
			$this->load->view('backend/index', $page_data);
		}

		//updated to database
		if($param1 == 'updated'){
			$response = $this->user_model->student_update($param2, $param3);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->user_model->delete_student($param2, $param3);
			echo $response;
		}

		if($param1 == 'filter'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/lecturer/student/list', $page_data);
		}

		if(empty($param1)){
			$page_data['working_page'] = 'filter';
			$page_data['folder_name'] = 'student';
			$page_data['page_title'] = 'student_list';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END STUDENT ADN ADMISSION section



	//START SUBJECT section
	public function courses($param1 = '', $param2 = '', $param3 = ""){
		if($param1 == 'list'){
			if(is_numeric($param2)){
				$academic_year_id = $param2;
			}else{
				$academic_year_id = $this->crud_model->get_current_academic_year_id();
			}
			
			$data["academic_year_id"] = $academic_year_id;
			return $this->load->view('backend/lecturer/courses/list', $data);
		}

		if($param1 == 'students_list' && is_numeric($param2) && is_numeric($param3) ){
			
			$academic_year_id = $param3;
			$course_id = $param2;
		
			$data["course_id"] = $course_id;
			$data["academic_year_id"] = $param3;
			return $this->load->view('backend/lecturer/courses/student_list', $data);
		}

		if($param1 == 'info'){
			$data["course_id"] = $param2;
			return $this->load->view('backend/lecturer/courses/info', $data);
		}

		if($param1 == "resource_list" && is_numeric($param2)){
			$data["course_id"] = $param2;
			return $this->load->view('backend/lecturer/course_resource/list', $data);
		}

		if($param1 == 'resource' && is_numeric($param2)){
			$page_data1['folder_name'] = 'course_resource';
			$page_data1['page_title'] = 'course_resources';
			$page_data1["course_id"] = $param2;
			return $this->load->view('backend/index', $page_data1);
		}
		if ($param1 == 'add_resource' && $_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->lecturer_model->add_course_resource($data);
            echo $response;
            return;
		}
		
		if($param1 == 'delete_resource' && is_numeric($param2)){
			$response = $this->lecturer_model->delete_resource($param2);
			echo $response;
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'courses';
			$page_data['page_title'] = 'courses';
			return $this->load->view('backend/index', $page_data);
		}
	}

	//END SUBJECT section


	//START DAILY ATTENDANCE section
	public function attendance($param1 = '', $param2 = '', $param3 = ''){

		if($param1 == 'take_attendance'){
			$response = $this->crud_model->take_attendance();
			echo $response;
		}

		if($param1 == 'filter'){
			$date = '01 '.$this->input->post('month').' '.$this->input->post('year');
			$page_data['attendance_date'] = strtotime($date);
			$page_data['class_id'] = $this->input->post('class_id');
			$page_data['section_id'] = $this->input->post('section_id');
			$page_data['month'] = $this->input->post('month');
			$page_data['year'] = $this->input->post('year');
			$this->load->view('backend/lecturer/attendance/list', $page_data);
		}

		if($param1 == 'student'){
			$page_data['attendance_date'] = strtotime($this->input->post('date'));
			$page_data['class_id'] = $this->input->post('class_id');
			$page_data['section_id'] = $this->input->post('section_id');
			$this->load->view('backend/lecturer/attendance/student', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'attendance';
			$page_data['page_title'] = 'attendance';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END DAILY ATTENDANCE section


	//START EVENT CALENDAR section
	public function event_calendar($param1 = '', $param2 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->event_calendar_create();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->event_calendar_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->event_calendar_delete($param2);
			echo $response;
		}

		if($param1 == 'all_events'){
			echo $this->crud_model->all_events();
		}

		if ($param1 == 'list') {
			$this->load->view('backend/lecturer/event_calendar/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'event_calendar';
			$page_data['page_title'] = 'event_calendar';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EVENT CALENDAR section


	//START EXAM section
	public function records($param1 = '', $param2 = '', $param3 = ""){
		if ($param1 == 'list' && is_numeric($param2) ) {
			if(is_numeric($param2)){
				$academic_year_id = $param2;
			}else{
				$academic_year_id = $this->crud_model->get_current_academic_year_id();
			}
			$data["academic_year"] = $this->crud_model->get_academic_years($academic_year_id);
			$data["courses"] =  $this->lecturer_model->get_assigned_courses_by_user_id(user_id());
			$this->load->view('backend/lecturer/exam/list', $data );
		}

		if ($param1 == 'edit' && is_numeric($param2) ) {
			$data["record"] = $this->student_model->get_student_records($param2);
			$this->load->view('backend/lecturer/exam_student_records/edit', $data );
		}

		if($param1 == "course_students_list" && is_numeric($param2) && is_numeric($param3)){
			if(is_numeric($param3)){
				$academic_year_id = $param3;
			}else{
				$academic_year_id = $this->crud_model->get_current_academic_year_id();
				// Redirect to current academic year
				return redirect(route( "records/course_students/" . $param2 . "/"  . $academic_year_id )); 
			}
			$data["course_id"] = $param2;
			$this->load->view('backend/lecturer/course_resource/list', $data);
		}
		
		if ($param1 == 'save_student_record' && $_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->lecturer_model->save_student_record($data);
            echo $response;
            return;
		}
		
		if ($param1 == 'bulk_update_student_records' && $_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->lecturer_model->update_student_record($data, "bulk");
            echo $response;
            return;
		}

		if ($param1 == 'update_student_record' && $_SERVER["REQUEST_METHOD"] === "POST") {
            $data = $this->input->post(NULL, TRUE);
            $response = $this->lecturer_model->update_student_record($data, "single");
            echo $response;
            return;
		}
		
		if($param1 == 'course_students' && is_numeric($param2)){
			if(is_numeric($param3)){
				$academic_year_id = $param3;
			}else{
				$academic_year_id = $this->crud_model->get_current_academic_year_id();

				// Redirect to current academic year
				return redirect(route( "records/course_students/" . $param2 . "/"  . $academic_year_id )); 
			}
			$page_data1['page_title'] = 'course_records';
			$page_data1['folder_name'] = 'exam_student_records';

			$page_data1["course"] = $this->crud_model->get_courses($param2);
			$page_data1["registered_students"] = $this->student_model->get_course_registered_students($param2, $academic_year_id);
			$page_data1["student_records"] = $this->student_model->get_course_academic_year_records($param2, $academic_year_id);
			$page_data1["academic_year"] = $this->crud_model->get_academic_years($academic_year_id);
			return $this->load->view('backend/index', $page_data1);
			
			$this->load->view('backend/lecturer/course_resource/list', $page_data1);
		}
		
		if(empty($param1)){
			$page_data['folder_name'] = 'exam';
			$page_data['page_title'] = 'exam';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EXAM section

	// GET THE GRADE ACCORDING TO MARK
	public function get_grade($acquired_mark) {
		echo get_grade($acquired_mark);
	}
	//END MARKS sesction


	//MANAGE PROFILE STARTS
	public function profile($param1 = "", $param2 = "") {
		if ($param1 == 'update_profile') {
			$response = $this->user_model->update_profile();
			echo $response;
		}
		if ($param1 == 'update_password') {
			$response = $this->user_model->update_password();
			echo $response;
		}

		// showing the Smtp Settings file
		if(empty($param1)){
			$page_data['folder_name'] = 'profile';
			$page_data['page_title']  = 'manage_profile';
			$this->load->view('backend/index', $page_data);
		}
	}
	//MANAGE PROFILE ENDS
}
