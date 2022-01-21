<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function update_system_settings() {
		$data['system_name'] = $this->input->post('system_name');
		$data['system_email'] = $this->input->post('system_email');
		$data['system_title'] = $this->input->post('system_title');
		$data['phone'] = $this->input->post('phone');
		$data['purchase_code'] = $this->input->post('purchase_code');
		$data['address'] = $this->input->post('address');
		$data['fax'] = $this->input->post('fax');
		$data['footer_text'] = $this->input->post('footer_text');
		$data['footer_link'] = $this->input->post('footer_link');
		$data['timezone'] = $this->input->post('timezone');
		$data['youtube_api_key'] = $this->input->post('youtube_api_key');
		$data['vimeo_api_key'] = $this->input->post('vimeo_api_key');
		$this->db->where('id', 1);
		$this->db->update('settings', $data);
		$response = array(
		'status' => true,
		'notification' => get_phrase('system_settings_updated_successfully')
		);
		return json_encode($response);
	}

	public function last_updated_attendance_data() {
		$data['date_of_last_updated_attendance'] = strtotime(date('d-m-Y H:i:s'));
		$this->db->where('id', 1);
		$this->db->update('settings', $data);
	}

	public function update_system_logo() {
		if ($_FILES['dark_logo']['name'] != "") {
		move_uploaded_file($_FILES['dark_logo']['tmp_name'], 'uploads/system/logo/logo-dark.png');
		}
		if ($_FILES['light_logo']['name'] != "") {
		move_uploaded_file($_FILES['light_logo']['tmp_name'], 'uploads/system/logo/logo-light.png');
		}
		if ($_FILES['small_logo']['name'] != "") {
		move_uploaded_file($_FILES['small_logo']['tmp_name'], 'uploads/system/logo/logo-light-sm.png');
		}
		if ($_FILES['favicon']['name'] != "") {
		move_uploaded_file($_FILES['favicon']['tmp_name'], 'uploads/system/logo/favicon.png');
		}

		$response = array(
		'status' => true,
		'notification' => get_phrase('logo_updated_successfully')
		);
		return json_encode($response);
	}

	// SCHOOL SETTINGS
	public function get_current_school_data() {
		return $this->db->get_where('schools', array('id' => school_id()))->row_array();
	}

	public function update_current_school_settings() {
		$data['name'] = $this->input->post('school_name', TRUE);
		$data['phone'] = $this->input->post('phone', TRUE);
		$data['fee_part_payment_percent'] = $this->input->post('fee_part_payment_percent', TRUE);
		$data['number_of_semesters'] = $this->input->post('number_of_semesters', TRUE);
		$data['address'] = $this->input->post('address', TRUE);
		$this->db->where('id', school_id());
		$this->db->update('schools', $data);
		$response = array(
		'status' => true,
		'notification' => get_phrase('school_settings_updated_successfully')
		);
		return json_encode($response);
	}

	// PAYMENT SETTINGS
	public function update_system_currency_settings() {
		$data['system_currency'] = $this->input->post('system_currency');
		$data['currency_position'] = $this->input->post('currency_position');
		$this->db->where('id', 1);
		$this->db->update('settings', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('system_settings_updated_successfully')
		);
		return json_encode($response);
	}

	public function update_paypal_settings() {
		$paypal_info = array();

		$paypal['paypal_active'] = $this->input->post('paypal_active');
		$paypal['paypal_mode'] = $this->input->post('paypal_mode');
		$paypal['paypal_client_id_sandbox'] = $this->input->post('paypal_client_id_sandbox');
		$paypal['paypal_client_id_production'] = $this->input->post('paypal_client_id_production');
		$paypal['paypal_currency'] = $this->input->post('paypal_currency');
		
		array_push($paypal_info, $paypal);

		$data['value']    =   json_encode($paypal_info);
		$this->db->where('key', 'paypal_settings');
		$this->db->update('payment_settings', $data);

		$response = array(
		'status' => true,
		'notification' => get_phrase('paypal_settings_updated_successfully')
		);
		return json_encode($response);
	}

	public function update_stripe_settings() {
		$stripe_info = array();

		$stripe['stripe_active'] = $this->input->post('stripe_active');
		$stripe['stripe_mode'] = $this->input->post('stripe_mode');
		$stripe['stripe_test_secret_key'] = $this->input->post('stripe_test_secret_key');
		$stripe['stripe_test_public_key'] = $this->input->post('stripe_test_public_key');
		$stripe['stripe_live_secret_key'] = $this->input->post('stripe_live_secret_key');
		$stripe['stripe_live_public_key'] = $this->input->post('stripe_live_public_key');
		$stripe['stripe_currency'] = $this->input->post('stripe_currency');

		array_push($stripe_info, $stripe);

		$data['value']    =   json_encode($stripe_info);
		$this->db->where('key', 'stripe_settings');
		$this->db->update('payment_settings', $data);

		$response = array(
		'status' => true,
		'notification' => get_phrase('paypal_settings_updated_successfully')
		);
		return json_encode($response);
	}

	// UPDATE SMTP CREDENTIALS
	public function update_smtp_settings() {
		if ($this->input->post('mail_sender') == 'php_mailer') {
		if (empty($this->input->post('smtp_secure')) || empty($this->input->post('smtp_set_from')) || empty($this->input->post('smtp_show_error'))) {
			$response = array(
			'status' => false,
			'notification' => get_phrase('please_fill_all_the_fields')
			);
			return json_encode($response);
		}
		}

		$data['mail_sender'] = $this->input->post('mail_sender');
		$data['smtp_protocol'] = $this->input->post('smtp_protocol');
		$data['smtp_host'] = $this->input->post('smtp_host');
		$data['smtp_username'] = $this->input->post('smtp_username');
		$data['smtp_password'] = $this->input->post('smtp_password');
		$data['smtp_port'] = $this->input->post('smtp_port');

		$data['smtp_secure'] = strtolower($this->input->post('smtp_secure'));
		$data['smtp_set_from'] = $this->input->post('smtp_set_from');
		$data['smtp_show_error'] = $this->input->post('smtp_show_error');

		if ($this->db->get('smtp_settings')->num_rows() > 0) {
		$this->db->where('id', 1);
		$this->db->update('smtp_settings', $data);
		}else{
		$this->db->insert('smtp_settings', $data);
		}

		$response = array(
		'status' => true,
		'notification' => get_phrase('smtp_settings_updated_successfully')
		);
		return json_encode($response);
	}

	// UPDATE FEES CURRENCIES
	public function update_fee_currencies_settings() {
		$data = $this->input->post(NULL, TRUE);
		if ($data['local_students_currency'] == '' || 
			$data['foreign_students_currency'] == '' || 
			!is_numeric($data['local_students_currency'])|| 
			!is_numeric($data['foreign_students_currency'])
			){
			$response = array(
			'status' => false,
			'notification' => get_phrase('please_fill_all_the_fields_appropriately')
			);
			return json_encode($response);
		}
		
		$local['currency_id'] = $data["local_students_currency"];
		$foreign['currency_id'] = $data["foreign_students_currency"];
		
		if ($this->db->get_where('school_fees_currencies', ["student_type" => "local"])->num_rows() > 0) {
			$this->db->where('student_type', "local");
			$this->db->update('school_fees_currencies', $local);
		}
		if ($this->db->get_where('school_fees_currencies', ["student_type" => "foreign"])->num_rows() > 0) {
			$this->db->where('student_type', "foreign");
			$this->db->update('school_fees_currencies', $foreign);
		}

		$response = array(
		'status' => true,
		'notification' => get_phrase('fee_currencies_updated_successfully')
		);
		return json_encode($response);
	}

	// This function is responsible for retreving all the files and folder
	function get_list_of_directories_and_files($dir = APPPATH, &$results = array()) {
		$files = scandir($dir);
		foreach($files as $key => $value){
		$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
		if(!is_dir($path)) {
			$results[] = $path;
		} else if($value != "." && $value != "..") {
			$this->get_list_of_directories_and_files($path, $results);
			$results[] = $path;
		}
		}
		return $results;
	}

	// This function is responsible for retreving all the language file from language folder
	function get_list_of_language_files($dir = APPPATH.'/language', &$results = array()) {
		$files = scandir($dir);
		foreach($files as $key => $value){
		$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
		if(!is_dir($path)) {
			$results[] = $path;
		} else if($value != "." && $value != "..") {
			$this->get_list_of_directories_and_files($path, $results);
			$results[] = $path;
		}
		}
		return $results;
	}

	// LANGUAGE SETTINGS
	public function get_all_languages() {
		$language_files = array();
		$all_files = $this->get_list_of_language_files();
		foreach ($all_files as $file) {
		$info = pathinfo($file);
		if( isset($info['extension']) && strtolower($info['extension']) == 'json') {
			$file_name = explode('.json', $info['basename']);
			array_push($language_files, $file_name[0]);
		}
		}
		return $language_files;
	}

	public function create_language() {
		saveDefaultJSONFile(trimmer($this->input->post('language')));
		$response = array(
		'status' => true,
		'notification' => get_phrase('language_added_successfully')
		);
		return json_encode($response);
	}

	public function update_language($param1 = "") {
		if (file_exists('application/language/'.$param1.'.json')) {
		unlink('application/language/'.$param1.'.json');
		}
		saveDefaultJSONFile(trimmer($this->input->post('language')));
		$response = array(
		'status' => true,
		'notification' => get_phrase('language_added_successfully')
		);
		return json_encode($response);
	}

	public function delete_language($param1 = "") {
		if (file_exists('application/language/'.$param1.'.json')) {
		unlink('application/language/'.$param1.'.json');
		}
		$response = array(
		'status' => true,
		'notification' => get_phrase('language_deleted_successfully')
		);
		return json_encode($response);
	}

	public function update_system_language($selected_language = "") {
		$data['language'] = $selected_language;

		$this->db->where('id', 1);
		$this->db->update('settings', $data);
	}

	function get_currencies() {
		return $this->db->get('currencies')->result_array();
	}

	function get_fee_currencies() {
		return $this->db->get('school_fees_currencies')->result_array();
	}

	function get_fee_currencies_view() {
		return $this->db->get('fee_currencies_view')->result_array();
	}

	function get_fee_local_currency() {
		return $this->db->get_where('school_fees_currencies', ["student_type" => "local"])->row_array();
	}

	function get_fee_foreign_currency() {
		return $this->db->get_where('school_fees_currencies',  ["student_type" => "foreign"])->row_array();
	}
	
	function get_paypal_supported_currencies() {
		$this->db->where('paypal_supported', 1);
		return $this->db->get('currencies')->result_array();
	}

	function get_stripe_supported_currencies() {
		$this->db->where('stripe_supported', 1);
		return $this->db->get('currencies')->result_array();
	}

	// ABOUT APPLICATION INFORMATION
	function get_application_details() {
		$purchase_code = get_settings('purchase_code');
		$returnable_array = array(
		'purchase_code_status' => get_phrase('not_found'),
		'support_expiry_date'  => get_phrase('not_found'),
		'customer_name'        => get_phrase('not_found')
		);

		$personal_token = "gC0J1ZpY53kRpynNe4g2rWT5s4MW56Zg";
		$url = "https://api.envato.com/v3/market/author/sale?code=".$purchase_code;
		$curl = curl_init($url);

		//setting the header for the rest of the api
		$bearer   = 'bearer ' . $personal_token;
		$header   = array();
		$header[] = 'Content-length: 0';
		$header[] = 'Content-type: application/json; charset=utf-8';
		$header[] = 'Authorization: ' . $bearer;

		$verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$purchase_code.'.json';
		$ch_verify = curl_init( $verify_url . '?code=' . $purchase_code );

		curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
		curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
		curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

		$cinit_verify_data = curl_exec( $ch_verify );
		curl_close( $ch_verify );

		$response = json_decode($cinit_verify_data, true);

		if (count($response['verify-purchase']) > 0) {

		//print_r($response);
		$item_name 				= $response['verify-purchase']['item_name'];
		$purchase_time 			= $response['verify-purchase']['created_at'];
		$customer 				= $response['verify-purchase']['buyer'];
		$licence_type 			= $response['verify-purchase']['licence'];
		$support_until			= $response['verify-purchase']['supported_until'];
		$customer 				= $response['verify-purchase']['buyer'];

		$purchase_date			= date("d M, Y", strtotime($purchase_time));

		$todays_timestamp 		= strtotime(date("d M, Y"));
		$support_expiry_timestamp = strtotime($support_until);

		$support_expiry_date	= date("d M, Y", $support_expiry_timestamp);

		if ($todays_timestamp > $support_expiry_timestamp)
		$support_status		= get_phrase('expired');
		else
		$support_status		= get_phrase('valid');

		$returnable_array = array(
			'purchase_code_status' => $support_status,
			'support_expiry_date'  => $support_expiry_date,
			'customer_name'        => $customer
		);
		}
		else {
		$returnable_array = array(
			'purchase_code_status' => 'invalid',
			'support_expiry_date'  => 'invalid',
			'customer_name'        => 'invalid'
		);
		}

		return $returnable_array;
	}

		// GET SYSTEM DATA

	// GET DARK LOGO
	public function get_logo_dark($type = "") {
		if ($type == 'small') {
		return base_url('uploads/system/logo/logo-dark-sm.png');
		}else{
		return base_url('uploads/system/logo/logo-dark.png');
		}

	}

	// GET LIGHT LOGO
	public function get_logo_light($type = "") {
		if ($type == 'small') {
		return base_url('uploads/system/logo/logo-light-sm.png');
		}else{
		return base_url('uploads/system/logo/logo-light.png');
		}
	}

	// GET FAVICON
	public function get_favicon() {
		return base_url('uploads/system/logo/favicon.png');
	}

	//START Academic Year Section
	public function academic_year_create()
	{
		$school_data = $this->settings_model->get_current_school_data();
		$number_of_semesters = $school_data["number_of_semesters"];
		$data = html_escape($this->input->post(NULL, TRUE));
		$academic_year_data['description'] = $data['description'];
		$academic_year_data['start_date'] = $data["reporting_date_start_date1"];
		$academic_year_data['end_date'] = $data["vacation_period_start_date$number_of_semesters"];

		// Get School setting (derive number of semesters from data)
		
		$this->db->trans_start();
		$this->db->insert('academic_years', $academic_year_data);
		$academic_year_id = $this->db->insert_id();
		for($i = 1 ; $i < $school_data["number_of_semesters"] + 1; $i++){
			if(strtotime($data["reporting_date_start_date$i"] . "12:12:12") > strtotime($data["reporting_date_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Student reporting start date must come after student reporting end date.',
					'data' => strtotime($data["reporting_date_start_date$i"] . "12:12:12") . "  end: " . strtotime($data["reporting_date_end_date$i"] . "12:12:12")
				);
				return json_encode($response);
			}

			if(strtotime($data["reporting_date_end_date$i"] . "12:12:12") > strtotime($data["teaching_begins$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Teaching begins date must come after student reporting end date.'
				);
				return json_encode($response);
			}

			if(strtotime($data["registration_deadline$i"] . "12:12:12") > strtotime($data["late_registration_deadline$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Registration deadline date must come after last registration deadline date.'
				);
				return json_encode($response);
			}

			if(strtotime($data["mid_semester_exams_start_date$i"] . "12:12:12") > strtotime($data["mid_semester_exams_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Mid semester exams start date must come after mid semester exams end date.'
				);
				return json_encode($response);
			}

			if(strtotime($data["mid_semester_exams_end_date$i"] . "12:12:12") >= strtotime($data["teaching_ends$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Mid semester exams end date start date must come after teaching ends date'
				);
				return json_encode($response);
			}

			if(strtotime($data["teaching_ends$i"] . "12:12:12") > strtotime($data["revision_period_start_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Teaching ends date must come after revision period start date'
				);
				return json_encode($response);
			}
			if(strtotime($data["revision_period_start_date$i"] . "12:12:12") >= strtotime($data["revision_period_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Revision period start date must come after revision period end date.'
				);
				return json_encode($response);
			}
			if(strtotime($data["revision_period_end_date$i"] . "12:12:12") > strtotime($data["final_semester_exams_start_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Revision period end date must come after final semester exams start date.'
				);
				return json_encode($response);
			}
			if(strtotime($data["final_semester_exams_start_date$i"] . "12:12:12") >= strtotime($data["final_semester_exams_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Final semester exams start date must come after final semester exams end date'
				);
				return json_encode($response);
			}
			if(strtotime($data["final_semester_exams_end_date$i"] . "12:12:12") > strtotime($data["vacation_period_start_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Final semester exams end date must come after vacation period start date.'
				);
				return json_encode($response);
			}
			if(strtotime($data["vacation_period_start_date$i"] . "12:12:12") >= strtotime($data["vacation_period_end_date$i"] . "12:12:12") ){
				$response = array(
					'status' => false,
					'notification' => 'Vacation period start date must come after vacation period end date'
				);
				return json_encode($response);
			}

			$semester_data = array(
				"academic_year_id" => $academic_year_id,
				"semester" => $i,
				"reporting_date_start_date" => $data["reporting_date_start_date$i"],
				"reporting_date_end_date" => $data["reporting_date_end_date$i"],
				"teaching_begins" => $data["teaching_begins$i"],
				"registration_deadline" => $data["registration_deadline$i"],
				"late_registration_deadline" => $data["late_registration_deadline$i"],
				"mid_semester_exams_start_date" => $data["mid_semester_exams_start_date$i"],
				"mid_semester_exams_end_date" => $data["mid_semester_exams_end_date$i"],
				"teaching_ends" => $data["teaching_ends$i"],
				"revision_period_start_date" => $data["revision_period_start_date$i"],
				"revision_period_end_date" => $data["revision_period_end_date$i"],
				"final_semester_exams_start_date" => $data["final_semester_exams_start_date$i"],
				"final_semester_exams_end_date" => $data["final_semester_exams_end_date$i"],
				"vacation_period_start_date" => $data["vacation_period_start_date$i"],
				"vacation_period_end_date" => $data["vacation_period_end_date$i"],
			);
			$this->db->insert('semesters', $semester_data);
		}

		$this->db->trans_complete();

		$response = array(
			'status' => true,
			'notification' => get_phrase('academic_year_has_been_added_successfully')
		);

		return json_encode($response);
	}

	public function academic_year_update($academic_year_id)
	{
		$school_data = $this->settings_model->get_current_school_data();
		$number_of_semesters = $school_data["number_of_semesters"];
		$data = html_escape($this->input->post(NULL, TRUE));
		$academic_year_data['description'] = $data['description'];
		$academic_year_data['start_date'] = $data["reporting_date_start_date1"];
		$academic_year_data['end_date'] = $data["vacation_period_end_date$number_of_semesters"];

		// Get School setting (derive number of semesters from data)
		
		$this->db->trans_start();
		$c_id=$this->db->where('id', $academic_year_id);
		$this->db->update('academic_years', $academic_year_data);

		for($i = 1 ; $i < $school_data["number_of_semesters"] + 1; $i++){
			
			if(strtotime($data["reporting_date_start_date$i"] . "12:12:12") > strtotime($data["reporting_date_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Student reporting start date must come after student reporting end date.',
					'data' => strtotime($data["reporting_date_start_date$i"] . "12:12:12") . "  end: " . strtotime($data["reporting_date_end_date$i"] . "12:12:12")
				);
				return json_encode($response);
			}

			if(strtotime($data["reporting_date_end_date$i"] . "12:12:12") > strtotime($data["teaching_begins$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Teaching begins date must come after student reporting end date.'
				);
				return json_encode($response);
			}

			if(strtotime($data["registration_deadline$i"] . "12:12:12") > strtotime($data["late_registration_deadline$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Registration deadline date must come after last registration deadline date.'
				);
				return json_encode($response);
			}

			if(strtotime($data["mid_semester_exams_start_date$i"] . "12:12:12") > strtotime($data["mid_semester_exams_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Mid semester exams start date must come after mid semester exams end date.'
				);
				return json_encode($response);
			}

			if(strtotime($data["mid_semester_exams_end_date$i"] . "12:12:12") >= strtotime($data["teaching_ends$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Mid semester exams end date start date must come after teaching ends date'
				);
				return json_encode($response);
			}

			if(strtotime($data["teaching_ends$i"] . "12:12:12") > strtotime($data["revision_period_start_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Teaching ends date must come after revision period start date'
				);
				return json_encode($response);
			}
			if(strtotime($data["revision_period_start_date$i"] . "12:12:12") >= strtotime($data["revision_period_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Revision period start date must come after revision period end date.'
				);
				return json_encode($response);
			}
			if(strtotime($data["revision_period_end_date$i"] . "12:12:12") > strtotime($data["final_semester_exams_start_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Revision period end date must come after final semester exams start date.'
				);
				return json_encode($response);
			}
			if(strtotime($data["final_semester_exams_start_date$i"] . "12:12:12") >= strtotime($data["final_semester_exams_end_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Final semester exams start date must come after final semester exams end date'
				);
				return json_encode($response);
			}
			if(strtotime($data["final_semester_exams_end_date$i"] . "12:12:12") > strtotime($data["vacation_period_start_date$i"] . "12:12:12")){
				$response = array(
					'status' => false,
					'notification' => 'Final semester exams end date must come after vacation period start date.'
				);
				return json_encode($response);
			}
			if(strtotime($data["vacation_period_start_date$i"] . "12:12:12") >= strtotime($data["vacation_period_end_date$i"] . "12:12:12") ){
				$response = array(
					'status' => false,
					'notification' => 'Vacation period start date must come after vacation period end date'
				);
				return json_encode($response);
			}
    // $academic_semesters = $this->db->get_where('semesters')->result_array(); 
			$semesterss=$this->db->get('semesters')->result_array();
			foreach($semesterss as $sem){
		if($this->db->where('semester',1)&& $this->db->where('academic_year_id',$academic_year_id)){
			$semester_data = array(
				// "academic_year_id" => $academic_year_id,
				"reporting_date_start_date" => $data["reporting_date_start_date1"],
				"reporting_date_end_date" => $data["reporting_date_end_date1"],
				"teaching_begins" => $data["teaching_begins1"],
				"registration_deadline" => $data["registration_deadline1"],
				"late_registration_deadline" => $data["late_registration_deadline1"],
				"mid_semester_exams_start_date" => $data["mid_semester_exams_start_date1"],
				"mid_semester_exams_end_date" => $data["mid_semester_exams_end_date1"],
				"teaching_ends" => $data["teaching_ends1"],
				"revision_period_start_date" => $data["revision_period_start_date1"],
				"revision_period_end_date" => $data["revision_period_end_date1"],
				"final_semester_exams_start_date" => $data["final_semester_exams_start_date1"],
				"final_semester_exams_end_date" => $data["final_semester_exams_end_date1"],
				"vacation_period_start_date" => $data["vacation_period_start_date1"],
				"vacation_period_end_date" => $data["vacation_period_end_date1"]
			);
			$this->db->where('academic_year_id', $academic_year_id);
				$this->db->update('semesters', $semester_data);
			}

			if($this->db->where('semester',2) && $this->db->where('academic_year_id',$academic_year_id)){
				$semester_data = array(
								// "academic_year_id" => $academic_year_id,

				"reporting_date_start_date" => $data["reporting_date_start_date$i"],
				"reporting_date_end_date" => $data["reporting_date_end_date$i"],
				"teaching_begins" => $data["teaching_begins$i"],
				"registration_deadline" => $data["registration_deadline$i"],
				"late_registration_deadline" => $data["late_registration_deadline$i"],
				"mid_semester_exams_start_date" => $data["mid_semester_exams_start_date$i"],
				"mid_semester_exams_end_date" => $data["mid_semester_exams_end_date$i"],
				"teaching_ends" => $data["teaching_ends$i"],
				"revision_period_start_date" => $data["revision_period_start_date$i"],
				"revision_period_end_date" => $data["revision_period_end_date$i"],
				"final_semester_exams_start_date" => $data["final_semester_exams_start_date$i"],
				"final_semester_exams_end_date" => $data["final_semester_exams_end_date$i"],
				"vacation_period_start_date" => $data["vacation_period_start_date$i"],
				"vacation_period_end_date" => $data["vacation_period_end_date$i"]
			);$this->db->where('academic_year_id', $academic_year_id);

			$this->db->update('semesters', $semester_data);

			}
		}

		} 
		
		$this->db->trans_complete();

		$response = array(
			'status' => true,
			'notification' => get_phrase('academic_year_has_been_updated_successfully')
		);

		return json_encode($response);
	}

	public function academic_year_delete($param1 = '')
	{
		$this->db->trans_start();
		$this->db->where('id', $param1);
		$this->db->delete('academic_years');

		$this->db->where('id', $param1);
		$this->db->delete('semesters');
		$this->db->trans_complete();

		$response = array(
			'status' => true,
			'notification' => get_phrase('academic_year_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_academic_year_by_id($academic_year_id = '')
	{
		return $this->db->get_where('academic_year', array('id' => $academic_year_id))->row_array();
	}
	//END Academic Year Section

	//START of Grading scheme
	public function save_grading_scheme($grading_schemes){
		foreach($grading_schemes as $scheme){
			if(isset($scheme["grade"]) && is_string($scheme["grade"]) && is_numeric($scheme["upper_bound"]) && is_numeric($scheme["lower_bound"])  ){
				$scheme["last_updated_by"] = user_id();
				$db_scheme = $this->db->get_where("grading_schemes", ["grade" => $scheme["grade"]])->row_array();
				// Prevent duplicates in grades
				if($db_scheme === null){
					if(!$this->db->insert('grading_schemes', $scheme)){
						$response = array(
							'status' => false,
							'notification' => get_phrase("failed_to_save_values_for_grade_${$scheme['grade']}")
						);
						return json_encode($response);
					}
				}else{
					if( !$this->db->update('grading_schemes', $scheme, ["id" => $db_scheme["id"]] ) ){
						$response = array(
							'status' => false,
							'notification' => get_phrase("failed_to_update_values_for_grade_${$scheme['grade']}")
						);
						return json_encode($response);
					}
				}
			}else{
				$response = array(
					'status' => false,
					'notification' => get_phrase("wrong_input_provided_for_grade_${$scheme['grade']}")
				);
				return json_encode($response);
			}
		}

		$response = array(
			'status' => true,
			'notification' => get_phrase("grading_scheme_saved_successfully")
		);
		return json_encode($response);
	}
}









