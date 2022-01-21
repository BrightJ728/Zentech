<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Zentech School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');

		/*LOADING ALL THE MODELS HERE*/
		$this->load->model('Crud_model',     'crud_model');
		$this->load->model('User_model',     'user_model');
		$this->load->model('Settings_model', 'settings_model');
		$this->load->model('Payment_model',  'payment_model');

		/*cache control*/
		$this->output->set_header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");

		/*SET DEFAULT TIMEZONE*/
		timezone();

		// CHECK WHETHER student IS LOGGED IN
		if ($this->session->userdata('student_login') != 1) {
			redirect(site_url('login'), 'refresh');
		}
	}

	// INDEX FUNCTION
	public function index()
	{
		redirect(site_url('student/dashboard'), 'refresh');
	}

	//DASHBOARD
	public function dashboard($param1 = null)
	{
		if ($param1 == 'profile') {
			$page_data["student"] = $this->student_model->get_students_by_user_id(user_id());
			$this->load->view('backend/student/dashboard/profile', $page_data);
			return;
		}
		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$page_data['courses'] = $this->student_model->get_student_registered_courses_count_by_user_id(user_id());
		$this->load->view('backend/index', $page_data);
	}

	//START CLASS secion
	public function manage_class($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'section') {
			$response = $this->crud_model->section_update($param2);
			echo $response;
		}

		// show data from database
		if ($param1 == 'list') {
			$this->load->view('backend/student/class/list');
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'class';
			$page_data['page_title'] = 'class';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END CLASS section
	//	SECTION STARTED
	public function section($action = "", $id = "")
	{

		// PROVIDE A LIST OF SECTION ACCORDING TO CLASS ID
		if ($action == 'list') {
			$page_data['class_id'] = $id;
			$this->load->view('backend/student/section/list', $page_data);
		}
	}
	//	SECTION ENDED
	//START SUBJECT section
	public function subject($param1 = '', $param2 = '')
	{

		if ($param1 == 'list') {
			$page_data['class_id'] = $param2;
			$this->load->view('backend/student/subject/list', $page_data);
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'subject';
			$page_data['page_title'] = 'subject';
			$this->load->view('backend/index', $page_data);
		}
	}

	public function class_wise_subject($class_id)
	{

		// PROVIDE A LIST OF SUBJECT ACCORDING TO CLASS ID
		$page_data['class_id'] = $class_id;
		$this->load->view('backend/student/subject/dropdown', $page_data);
	}
	//END SUBJECT section


	//START SYLLABUS section
	public function syllabus($param1 = '', $param2 = '', $param3 = '')
	{

		if ($param1 == 'list') {
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/student/syllabus/list', $page_data);
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'syllabus';
			$page_data['page_title'] = 'syllabus';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END SYLLABUS section


	//START lecturer section
	public function lecturer($param1 = '', $param2 = '', $param3 = '')
	{
		$page_data['folder_name'] = 'lecturer';
		$page_data['page_title'] = 'techers';
		$this->load->view('backend/index', $page_data);
	}
	//END lecturer section

	//START CLASS ROUTINE section
	public function routine($param1 = '', $param2 = '', $param3 = '', $param4 = '')
	{

		if ($param1 == 'filter') {
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/student/routine/list', $page_data);
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'routine';
			$page_data['page_title'] = 'routine';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END CLASS ROUTINE section


	//START DAILY ATTENDANCE section
	public function attendance($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'filter') {
			$date = '01 ' . $this->input->post('month') . ' ' . $this->input->post('year');
			$page_data['attendance_date'] = strtotime($date);
			$page_data['class_id'] = $this->input->post('class_id');
			$page_data['section_id'] = $this->input->post('section_id');
			$page_data['month'] = $this->input->post('month');
			$page_data['year'] = $this->input->post('year');
			$this->load->view('backend/student/attendance/list', $page_data);
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'attendance';
			$page_data['page_title'] = 'attendance';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END DAILY ATTENDANCE section


	//START EVENT CALENDAR section
	public function event_calendar($param1 = '', $param2 = '')
	{

		if ($param1 == 'all_events') {
			echo $this->crud_model->all_events();
		}

		if ($param1 == 'list') {
			$this->load->view('backend/student/event_calendar/list');
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'event_calendar';
			$page_data['page_title'] = 'event_calendar';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EVENT CALENDAR section

	//START EXAM section
	public function exam($param1 = '', $param2 = '')
	{

		if ($param1 == 'list') {
			$this->load->view('backend/student/exam/list');
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'exam';
			$page_data['page_title'] = 'exam';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EXAM section

	//START MARKS section
	public function mark($param1 = '', $param2 = '')
	{

		if ($param1 == 'list') {
			$page_data['class_id'] = $this->input->post('class_id');
			$page_data['section_id'] = $this->input->post('section_id');
			$page_data['subject_id'] = $this->input->post('subject');
			$page_data['exam_id'] = $this->input->post('exam');
			// $this->crud_model->mark_insert($page_data['class_id'], $page_data['section_id'], $page_data['subject_id'], $page_data['exam_id']);
			$this->load->view('backend/student/mark/list', $page_data);
		}

		if ($param1 == 'mark_update') {
			$this->crud_model->mark_update();
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'mark';
			$page_data['page_title'] = 'marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END MARKS sesction

	// COURSE_REGISTRATION STARTS
	// Get Request
	public function course_registration($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 === "register") {
			$data = $this->input->post(NULL, TRUE);
			return $this->student_model->course_registration_by_student($data);
		}

		if ($param1 === "form") {
			$student = $this->student_model->get_students_by_user_id(user_id()) ?? null;
			$semester = $this->crud_model->get_current_semester();



			// Show Instruction on how to register
			if ($semester === NULL || $student == NULL) {
				return $this->load->view('backend/student/course_registration/registration_not_open');
			}


			$fees_payment_status = $this->accounting_m->get_student_fees_payment_status_for_academic_year($student['id'], $semester["academic_year_id"]);
			if ($fees_payment_status !== "paid" && $fees_payment_status !== "Partial payment") {
				// Check if Fees have been paid
				return $this->load->view('backend/student/course_registration/fees_not_paid');
			}

			$student_registrations = $this->student_model->get_student_registered_courses($student['id'], $semester["academic_year_id"], $semester["id"]);
			if (count($student_registrations) > 0) {
				//Show Registration Confirmation
				return $this->load->view('backend/student/course_registration/registration_confirmation');
			} //CHeck if Registration is still open

			if (strtotime($semester["late_registration_deadline"] . "23:59") < time()) {
				//Show Instruction on how to register
				return $this->load->view('backend/student/course_registration/registration_ended');
			}

			//Show New Course Registration Form for student
			$this->load->view('backend/student/course_registration/registration_form');
		}
		if ($param1 === "") {
			$page_data['folder_name'] = 'course_registration';
			$page_data['page_title'] = 'course_registration';
			$this->load->view('backend/index', $page_data);
		}
	}
	// COURSE REGISTRATION ENDS


	//Proof of Registration
	public function proof_of_registration($param1 = "", $param2 = '')
	{

		if ($param1 == "request_form") {
			$this->load->view('backend/student/proof_of_registration/proof_request_form');
		}
		if ($param1 == "semester_academic_year" && is_numeric($param2)) {
			$data["academic_year_id"] = $param2;
			$this->load->view('backend/student/proof_of_registration/semester_list', $data);
		}
		if ($param1 == "pdf" && $_SERVER["REQUEST_METHOD"] == "POST") {
			$data = $this->input->post(NULL, TRUE);
			require_once 'application/libraries/dompdf/autoload.inc.php';
			Dompdf\Autoloader::register();

			// Instantiate and use the dompdf class
			$dompdf = new Dompdf\Dompdf();
			$dompdf->loadHtml($this->load->view('backend/student/proof_of_registration/proof_of_registration', $data)->output->final_output);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portrait');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream();
		}
		if ($param1 == "" && $param2 == "") {
			$page_data['folder_name'] = 'proof_of_registration';
			$page_data['page_title'] = 'proof_request_form';
			$this->load->view('backend/index', $page_data);
		}
	}

	//START SUBJECT section
	public function courses($param1 = '', $param2 = '')
	{
		if ($param1 == 'list') {
			$this->load->view('backend/student/course/list', null);
		}

		if ($param1 == 'info') {
			$data["course_id"] = $param2;
			$this->load->view('backend/student/course/info', $data);
		}

		if ($param1 == "resource_list" && is_numeric($param2)) {
			$data["course_id"] = $param2;
			$this->load->view('backend/student/course_resource/list', $data);
		}

		if ($param1 == 'resource' && is_numeric($param2)) {
			$page_data1['folder_name'] = 'course_resource';
			$page_data1['page_title'] = 'course_resources';
			$page_data1["course_id"] = $param2;
			$this->load->view('backend/index', $page_data1);
		}

		if (empty($param1)) {
			$page_data['folder_name'] = 'course';
			$page_data['page_title'] = 'courses';
			$this->load->view('backend/index', $page_data);
		}
	}





	//END COURSE section

	// GRADE SECTION STARTS
	public function grade($param1 = "", $param2 = "")
	{
		$page_data['folder_name'] = 'grade';
		$page_data['page_title'] = 'grades';
		$this->load->view('backend/index', $page_data);
	}
	// GRADE SECTION ENDS

	// ACCOUNT SECTION STARTS
	public function invoice($param1 = "", $param2 = "")
	{
		// showing the list of invoices
		if ($param1 == 'invoice') {
			$page_data['invoice_id'] = $param2;
			$page_data['folder_name'] = 'invoice';
			$page_data['page_name'] = 'invoice';
			$page_data['page_title']  = 'invoice';
			$this->load->view('backend/index', $page_data);
		}

		// showing the index file
		if (empty($param1)) {
			$page_data['folder_name'] = 'invoice';
			$page_data['page_title']  = 'invoice';
			$this->load->view('backend/index', $page_data);
		}
	}

	// PAYPAL CHECKOUT
	public function paypal_checkout()
	{
		$invoice_id = $this->input->post('invoice_id');
		$invoice_details = $this->crud_model->get_invoice_by_id($invoice_id);

		$page_data['invoice_id']   = $invoice_id;
		$page_data['user_details']    = $this->user_model->get_student_details_by_id('student', $invoice_details['student_id']);
		$page_data['amount_to_pay']   = $invoice_details['total_amount'] - $invoice_details['paid_amount'];
		$page_data['folder_name'] = 'paypal';
		$page_data['page_title']  = 'paypal_checkout';
		$this->load->view('backend/payment_gateway/paypal_checkout', $page_data);
	}
	// STRIPE CHECKOUT
	public function stripe_checkout()
	{
		$invoice_id = $this->input->post('invoice_id');
		$invoice_details = $this->crud_model->get_invoice_by_id($invoice_id);

		$page_data['invoice_id']   = $invoice_id;
		$page_data['user_details']    = $this->user_model->get_student_details_by_id('student', $invoice_details['student_id']);
		$page_data['amount_to_pay']   = $invoice_details['total_amount'] - $invoice_details['paid_amount'];
		$page_data['folder_name'] = 'paypal';
		$page_data['page_title']  = 'paypal_checkout';
		$this->load->view('backend/payment_gateway/stripe_checkout', $page_data);
	}

	// THIS FUNCTION WILL BE CALLED AFTER A SUCCESSFULL PAYMENT
	public function payment_success($payment_method = "", $invoice_id = "", $amount_paid = "")
	{
		if ($payment_method == 'stripe') {
			$stripe = json_decode(get_payment_settings('stripe_settings'));
			$token_id = $this->input->post('stripeToken');
			$stripe_test_mode = $stripe[0]->stripe_mode;
			if ($stripe_test_mode == 'on') {
				$public_key = $stripe[0]->stripe_test_public_key;
				$secret_key = $stripe[0]->stripe_test_secret_key;
			} else {
				$public_key = $stripe[0]->stripe_live_public_key;
				$secret_key = $stripe[0]->stripe_live_secret_key;
			}
			$this->payment_model->stripe_payment($token_id, $invoice_id, $amount_paid, $secret_key);
		}

		$data['payment_method'] = $payment_method;
		$data['invoice_id'] = $invoice_id;
		$data['amount_paid'] = $amount_paid;
		$this->crud_model->payment_success($data);

		redirect(route('invoice'), 'refresh');
	}
	// ACCOUNT SECTION ENDS

	// BACKOFFICE SECTION

	//BOOK LIST MANAGER
	public function book($param1 = "", $param2 = "")
	{
		$page_data['folder_name'] = 'book';
		$page_data['page_title']  = 'books';
		$this->load->view('backend/index', $page_data);
	}

	// BOOK ISSUED BY THE STUDENT
	public function book_issue($param1 = "", $param2 = "")
	{
		// showing the index file
		$page_data['folder_name'] = 'book_issue';
		$page_data['page_title']  = 'issued_book';
		$this->load->view('backend/index', $page_data);
	}

	//MANAGE PROFILE STARTS
	public function profile($param1 = "", $param2 = "")
	{
		if ($param1 == 'update_password') {
			$response = $this->user_model->update_password();
			echo $response;
		}

		// showing the Smtp Settings file
		if (empty($param1)) {
			$page_data['folder_name'] = 'profile';
			$page_data['page_title']  = 'manage_profile';
			$this->load->view('backend/index', $page_data);
		}
	}
	//MANAGE PROFILE ENDS

	public function payment($invoice_id = "")
	{
		$page_data['page_title']  = 'payment_gateway';
		$page_data['invoice_details'] = $this->crud_model->get_invoice_by_id($invoice_id);
		$this->load->view('backend/payment_gateway/index', $page_data);
	}

	public function records($param1 = "", $param2 = "")
	{
		if ($param1 == 'list') {
			$page_data["courses"] = $this->student_model->get_student_records_by_user_id(user_id());
			$page_data["passed_courses"] = $this->student_model->get_student_passed_records_by_user_id(user_id());
			$page_data["failed_courses"] = $this->student_model->get_student_failed_courses_by_user_id(user_id());
            
			$page_data["student"] = $this->student_model->get_students_by_user_id(user_id());
			$current_semester_id = $this->crud_model->get_current_semester_id();
			$current_academic_year = $this->crud_model->get_particular_academic_year();

			$page_data["transcripts"] = $this->student_model->get_student_transcript_by_user_id(user_id(),  $current_academic_year, $current_semester_id);
			$page_data["transcriptdata"] = $this->student_model->get_student_transcript_by_user_id(user_id());
			

			$this->load->view('backend/student/records/list', $page_data);
		}


		if ($param1 == 'pdf') {
			require_once 'application/libraries/dompdf/autoload.inc.php';

			$page_data["courses"] = $this->student_model->get_student_records_by_user_id(user_id());
			$page_data["student"] = $this->student_model->get_students_by_user_id(user_id());


			Dompdf\Autoloader::register();

			// Instantiate and use the dompdf class
			$dompdf = new Dompdf\Dompdf();
			$dompdf->loadHtml($this->load->view('backend/student/records/print', $page_data)->output->final_output);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portrait');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream();
		}

		// showing the index file
		if (empty($param1)) {
			$page_data['folder_name'] = 'records';
			$page_data['page_title']  = 'records';
			$this->load->view('backend/index', $page_data);
		}
	}
	public function transcript($param1 = "", $param2 = "")
	{
		if ($param1 == 'list') {
			$current_semester_id = $this->crud_model->get_current_semester_id();
			$current_academic_year = $this->crud_model->get_particular_academic_year();

			$page_data["transcripts"] = $this->student_model->get_student_transcript_by_user_id(user_id(),  $current_academic_year, $current_semester_id);
			$page_data["transcriptdata"] = $this->student_model->get_student_transcript_by_user_id(user_id());
			$page_data["student"] = $this->student_model->get_students_by_user_id(user_id());

			$this->load->view('backend/student/transcript/list', $page_data);
		}
		if ($param1 == 'pdf') {
			require_once 'application/libraries/dompdf/autoload.inc.php';
			$current_semester_id = $this->crud_model->get_current_semester_id();
			$current_academic_year = $this->crud_model->get_particular_academic_year();

			$page_data["transcripts"] = $this->student_model->get_student_transcript_by_user_id(user_id(),  $current_academic_year, $current_semester_id);

			$page_data["transcriptdata"] = $this->student_model->get_student_transcript_by_user_id(user_id());
			$page_data["student"] = $this->student_model->get_students_by_user_id(user_id());


			Dompdf\Autoloader::register();

			// Instantiate and use the dompdf class
			$dompdf = new Dompdf\Dompdf();
			$dompdf->loadHtml($this->load->view('backend/student/transcript/print', $page_data)->output->final_output);

			// (Optional) Setup the paper size and orientation
			$dompdf->setPaper('A4', 'portrait');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream();
		}
		// showing the index file
		if (empty($param1)) {
			$page_data['folder_name'] = 'transcript';
			$page_data['page_title']  = 'transcript';
			$this->load->view('backend/index', $page_data);
		}
	}
}
