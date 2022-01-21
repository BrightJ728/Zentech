<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Zentech School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class User_model extends CI_Model {

	protected $school_id;
	protected $active_session;

	public function __construct()
	{
		parent::__construct();
		$this->school_id = school_id();
		$this->active_session = active_session();
	}

	// GET SUPERADMIN DETAILS
	public function get_superadmin() {
		$this->db->where('role', 'superadmin');
		return $this->db->get('users')->row_array();
	}
	// GET USER DETAILS
	public function get_user_details($user_id = '', $column_name = '') {
		if($column_name != ''){
			return $this->db->get_where('users', array('id' => $user_id))->row($column_name);
		}else{
			return $this->db->get_where('users', array('id' => $user_id))->row_array();
		}
	}

	// ADMIN CRUD SECTION STARTS
	public function create_admin() {
		$data = html_escape($this->input->post(NULL, TRUE));
		$data['school_id'] = $data['school_id'];
		$data['name'] = $data['name'];
		$data['email'] = $data['email'];
		$data['password'] = password($data['password']);
		$data['phone'] = $data['phone'];
		$data['gender'] = $data['gender'];
		$data['address'] = $data['address'];
		$data['role'] = 'admin';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('admin_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_admin($param1)
	{
		$data = html_escape($this->input->post(NULL, TRUE));
		$data['name'] = $data['name'];
		$data['email'] = $data['email'];
		$data['phone'] = $data['phone'];
		$data['gender'] = $data['gender'];
		$data['address'] = $data['address'];
		$data['school_id'] = $data['school_id'];
		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('admin_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_admin($param1)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('admin_has_been_deleted_successfully')
		);
		return json_encode($response);
	}
	// ADMIN CRUD SECTION ENDS

	//START lecturer section
	public function create_lecturer($data_input)
	{
		$password = substr( md5(time()), 0, 12);
		
		$data['school_id'] = $data_input['school_id'];
		$data['name'] = $data_input['name'];
		$data['email'] = $data_input['email'];
		$data['password'] = password( $password );
		$data['phone'] = $data_input['phone'];
		$data['gender'] = $data_input['gender'];
		$data['address'] = $data_input['address'];
		$data['role'] = 'lecturer';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data_input['email']);
		if($duplication_status){
			$this->db->trans_start();

			$this->db->insert('users', $data);

			$lecturer_id = $this->db->insert_id();
			$lecturer_table_data['user_id'] = $lecturer_id;
			$lecturer_table_data['about'] = $data_input['about'];
			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			$lecturer_table_data['social_links'] = json_encode($social_links);
			$lecturer_table_data['department_id'] = $data_input['department_id'];
			$lecturer_table_data['school_id'] = $data_input['school_id'];
			$lecturer_table_data['show_on_website'] = $data_input['show_on_website'];
			$this->db->insert('lecturers', $lecturer_table_data);

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'.$lecturer_id.'.jpg');
			}

			// Commit/Execute Queries
			$this->db->trans_complete();

			// Send user account info to email.
			try {
				$this->email_model->account_opening_email("Lecturer Account", $data['email'], $password);
			} catch ( Exception $exp ){
				log_message('error', 'Failed to send lecturer account creation email. Check smpt settings');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('lecturer_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}
	
	public function update_lecturer($param1, $data_input)
	{
		$data['school_id'] = $data_input['school_id'];
		$data['name'] = $data_input['name'];
		$data['email'] = $data_input['email'];
		$data['phone'] = $data_input['phone'];
		$data['gender'] = $data_input['gender'];
		$data['address'] = $data_input['address'];

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->trans_start();
			$this->db->where('id', $param1);
			$this->db->where('school_id', $data['school_id']);
			$this->db->update('users', $data);

			$lecturer_table_data['user_id'] = $param1;
			$lecturer_table_data['about'] = $data_input['about'];
			$social_links = array(
				'facebook' => $data_input['facebook_link'],
				'twitter' => $data_input['twitter_link'],
				'linkedin' => $data_input['linkedin_link']
			);
			$lecturer_table_data['social_links'] = json_encode($social_links);
			$lecturer_table_data['department_id'] = $data_input['department_id'];
			$lecturer_table_data['school_id'] = $data_input['school_id'];
			$lecturer_table_data['show_on_website'] = $data_input['show_on_website'];

			$this->db->where('school_id', $data_input['school_id']);
			$this->db->where('user_id', $param1);
			$this->db->update('lecturers', $lecturer_table_data);
			$this->db->trans_complete();

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'. $param1 .'.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('lecturer_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_lecturer($param1, $param2)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('lecturers');

		$this->db->where('lecturer_id', $param2);
		$this->db->delete('lecturer_permissions');

		$response = array(
			'status' => true,
			'notification' => get_phrase('lecturer_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_lecturers() {
		$checker = array(
			'school_id' => 1,
			'role' => 'lecturer'
		);
		return $this->db->get_where('users', $checker);
	}
	public function get_lecturers_count() {
		$checker = array(
			'school_id' => 1,
			'role' => 'lecturer'
		);
		return $this->db->get_where('users', $checker)->num_rows();
	}

	public function get_lecturer_by_id($lecturer_id = "") {
		$checker = array(
			'school_id' => 1,
			'id' => $lecturer_id
		);
		$result = $this->db->get_where('lecturers', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END lecturer section
	

	//START ACCOUNTANT section
	public function accountant_create()
	{
		$data = html_escape($this->input->post(NULL, TRUE));
		$data['name'] = $data['name'];
		$data['email'] = $data['email'];
		$data['password'] = password($data['password']);
		$data['phone'] = $data['phone'];
		$data['gender'] = $data['gender'];
		$data['address'] = $data['address'];
		$data['school_id'] = $this->school_id;
		$data['role'] = 'accountant';
		$data['watch_history'] = '[]';

		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('accountant_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function accountant_update($param1)
	{
		$data = html_escape($this->input->post(NULL, TRUE));
		$data['name'] = $data['name'];
		$data['email'] = $data['email'];
		$data['phone'] = $data['phone'];
		$data['gender'] = $data['gender'];
		$data['address'] = $data['address'];
		
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('accountant_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);

	}

	public function accountant_delete($param1)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('accountant_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_accountants() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'accountant'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_accountant_by_id($accountant_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $accountant_id
		);
		return $this->db->get_where('users', $checker);
	}
	//END ACCOUNTANT section

	//START LIBRARIAN section
	public function librarian_create()
	{
		$data = html_escape($this->input->post(NULL, TRUE));
		$data['name'] = $data['name'];
		$data['email'] = $data['email'];
		$data['password'] = password($data['password']);
		$data['phone'] = $data['phone'];
		$data['gender'] = $data['gender'];
		$data['address'] = $data['address'];
		$data['school_id'] = $this->school_id;	
		$data['role'] = 'librarian';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('librarian_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function librarian_update($param1)
	{
		$data = html_escape($this->input->post(NULL, TRUE));
		$data['name'] = $data['name'];
		$data['email'] = $data['email'];
		$data['phone'] = $data['phone'];
		$data['gender'] = $data['gender'];
		$data['address'] = $data['address'];
		
		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('librarian_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function librarian_delete($param1)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('librarian_deleted_successfully')
		);
		return json_encode($response);
	}


	public function get_librarians() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'librarian'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_librarian_by_id($librarian_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $librarian_id
		);
		return $this->db->get_where('users', $checker);
	}
	//END LIBRARIAN section


	//START STUDENT AND ADMISSION section
	public function single_student_create($data){
		
		$data = html_escape($data);

		// Generate a password for user
		$password = substr( md5(time()), 0, 12);

		$user_data['name'] = $data['first_name'] . " " . $data['middle_name'] ." " . $data['last_name'] ;
		$user_data['email'] = $data['email'];
		$user_data['gender'] = $data['gender'];
		$user_data['password'] = password_hash($password, PASSWORD_BCRYPT);
		$user_data['address'] = $data['address'];
		$user_data['phone'] = $data['phone'];
		$user_data['role'] = 'student';
		$user_data['school_id'] = $this->school_id;
		$user_data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $user_data['email']);
		if($duplication_status){

			$this->db->trans_start();

			$this->db->insert('users', $user_data);
			$user_id = $this->db->insert_id();
			$student_data['first_name'] = $data['first_name'];
			$student_data['middle_name'] = $data['middle_name'];
			$student_data['last_name'] = $data['last_name'];
			$student_data['dob'] = $data['dob'];
			$student_data['level_id'] = $data['level_id'];
			$student_data['marital_status'] = $data['marital_status'];
			$student_data['no_of_children'] = $data['no_of_children'];
			$student_data['place_of_birth'] = $data['place_of_birth'];
			$student_data['nationality'] = $data['nationality'];
			$student_data["student_type"] = $data['nationality'] === "ghanaian" ? "local" : "foreign";

	
			$emergency_contact1 = array(
				"name" => $data['emergency_contact1_name'],
				"phone" => $data["emergency_contact1_phone"],	
				"email" => $data["emergency_contact1_email"],
				"relationship_id" => $data["emergency_contact1_relationship"],
			);

			$emergency_contact2 = array(
				"name" => $data['emergency_contact2_name'],
				"phone" => $data["emergency_contact2_phone"],	
				"email" => $data["emergency_contact2_email"],
				"relationship_id" => $data["emergency_contact2_relationship"],
			);

			$student_data['emergency_contact1'] = json_encode($emergency_contact1);
			$student_data['emergency_contact2'] = json_encode($emergency_contact2);

			$student_data['first_language'] = $data['first_language'];
			$student_data['occupation'] = $data['occupation'];
			$student_data['disability'] = $data['disability'];
			$student_data['program_id'] = $data['program'];

			$certificates = array();
			$count = 0;

			foreach($data['certificates'] as $cert){
				$certificates[$count]["type"] = $cert["certificate_type"];
				$certificates[$count]["institution"] = $cert["certificate_institution"];
				$certificates[$count]["year"] = $cert["certificate_year"];
				$cert_upload = $_FILES["certificates"];
				if ($cert_upload["error"][$count]["certificate_document"] == UPLOAD_ERR_OK && in_array($cert_upload["type"][$count]["certificate_document"], ["application/pdf", "image/jpeg", "image/jpg", "image/png"]) ) {
					$tmp_name = $cert_upload["tmp_name"][$count]["certificate_document"];
					$src = "./uploads/certificates/" . time() . "_" . md5(time()) . "." . explode("/",$cert_upload["type"][$count]["certificate_document"])[1];
					if(!move_uploaded_file($tmp_name, $src)) {
						$response = array(
							'status' => false,
							'notification' => get_phrase('sorry_certificates_upload_failed'),
						);
						return json_encode($response);
					}
				}
				else{
					$response = array(
						'status' => false,
						'notification' => get_phrase('sorry_certificates_upload_failed'),
					);
					return json_encode($response);
				}
				$certificates[$count]["src"] = $src;
				$count++;
			}

			$student_data['certificates'] = json_encode($certificates);

			$student_data['code'] = student_code();
			$student_data['user_id'] = $user_id;
			$student_data['school_id'] = $this->school_id;
			$student_data["created_by"] = $this->session->userdata("user_id");
			$this->db->insert('students', $student_data);

			// Commit/Execute Queries
			$this->db->trans_complete();
			move_uploaded_file($_FILES['student_image']['tmp_name'], 'uploads/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('student_added_successfully')
			);

			// Send user account info to email.
            try {
                $this->email_model->account_opening_email("Student Account", $data['email'], $password);
			}catch(Exception $exp){
				log_message('error', 'Failed to send student account creation email. Check smpt settings');
			}
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function bulk_student_create(){
		$duplication_counter = 0;
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));

		$students_name = html_escape($this->input->post('name'));
		$students_email = html_escape($this->input->post('email'));
		$students_password = html_escape($this->input->post('password'));
		$students_gender = html_escape($this->input->post('gender'));
		$students_parent = html_escape($this->input->post('parent_id'));

		foreach($students_name as $key => $value):
			// check email duplication
			$duplication_status = $this->check_duplication('on_create', $students_email[$key]);
			if($duplication_status){
				$user_data['name'] = $students_name[$key];
				$user_data['email'] = $students_email[$key];
				$user_data['password'] = password_hash($students_password[$key], PASSWORD_BCRYPT);
				$user_data['gender'] = $students_gender[$key];
				$user_data['role'] = 'student';
				$user_data['school_id'] = $this->school_id;
				$user_data['watch_history'] = '[]';
				$this->db->insert('users', $user_data);
				$user_id = $this->db->insert_id();

				$student_data['code'] = student_code();
				$student_data['user_id'] = $user_id;
				$student_data['parent_id'] = $students_parent[$key];
				$student_data['session'] = $this->active_session;
				$student_data['school_id'] = $this->school_id;
				$this->db->insert('students', $student_data);
				$student_id = $this->db->insert_id();

				$enroll_data['student_id'] = $student_id;
				$enroll_data['class_id'] = $class_id;
				$enroll_data['section_id'] = $section_id;
				$enroll_data['session'] = $this->active_session;
				$enroll_data['school_id'] = $this->school_id;
				$this->db->insert('enrols', $enroll_data);
			}else{
				$duplication_counter++;
			}
		endforeach;

		if ($duplication_counter > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('some_of_the_emails_have_been_taken')
			);
		}else{
			$response = array(
				'status' => true,
				'notification' => get_phrase('students_added_successfully')
			);
		}

		return json_encode($response);
	}

	public function excel_create(){
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));
		$school_id = $this->school_id;
		$session_id = $this->active_session;
		$role = 'student';

		$file_name = $_FILES['csv_file']['name'];
		move_uploaded_file($_FILES['csv_file']['tmp_name'],'uploads/csv_file/student.generate.csv');

		if (($handle = fopen('uploads/csv_file/student.generate.csv', 'r')) !== FALSE) { // Check the resource is valid
			$count = 0;
			$duplication_counter = 0;
			while (($all_data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
				if($count > 0){
					$user_data['name'] = html_escape($all_data[0]);
					$user_data['email'] = html_escape($all_data[1]);
					$user_data['password'] = password_hash($all_data[2], PASSWORD_BCRYPT); ;
					$user_data['phone'] = html_escape($all_data[3]);
					$user_data['gender'] = html_escape($all_data[5]);
					$user_data['role'] = $role;
					$user_data['school_id'] = $school_id;
					$user_data['watch_history'] = '[]';

					// check email duplication
					$duplication_status = $this->check_duplication('on_create', $user_data['email']);
					if($duplication_status){
						$this->db->insert('users', $user_data);
						$user_id = $this->db->insert_id();

						$student_data['code'] = student_code();
						$student_data['user_id'] = $user_id;
						$student_data['parent_id'] = html_escape($all_data[4]);
						$student_data['session'] = $session_id;
						$student_data['school_id'] = $school_id;
						$this->db->insert('students', $student_data);
						$student_id = $this->db->insert_id();

						$enroll_data['student_id'] = $student_id;
						$enroll_data['class_id'] = $class_id;
						$enroll_data['section_id'] = $section_id;
						$enroll_data['session'] = $session_id;
						$enroll_data['school_id'] = $school_id;
						$this->db->insert('enrols', $enroll_data);
					}else{
						$duplication_counter++;
					}
				}
				$count++;
			}
			fclose($handle);
		}

		if ($duplication_counter > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('some_of_the_emails_have_been_taken')
			);
		}else{
			$response = array(
				'status' => true,
				'notification' => get_phrase('students_added_successfully')
			);
		}

		return json_encode($response);
	}

	public function student_update($data, $student_id, $user_id){
		$data = html_escape($data);

		// Generate a password for user
		$password = md5(time());

		$user_data['name'] = $data['first_name'] . " " . $data['middle_name'] ." " . $data['last_name'] ;
		$user_data['email'] = $data['email'];
		$user_data['gender'] = $data['gender'];
		$user_data['address'] = $data['address'];
		$user_data['phone'] = $data['phone'];
		

		$student_data['first_name'] = $data['first_name'];
		$student_data['middle_name'] = $data['middle_name'];
		$student_data['last_name'] = $data['last_name'];
		$student_data['dob'] = $data['dob'];
		$student_data['year_group'] = $data['year_group'];
		$student_data['level_id'] = $data['level_id'];
		$student_data['marital_status'] = $data['marital_status'];
		$student_data['no_of_children'] = $data['no_of_children'];
		$student_data['place_of_birth'] = $data['place_of_birth'];
		$student_data['nationality'] = $data['nationality'];
		$student_data["student_type"] = $data['nationality'] === "ghanaian" ? "local" : "foreign";


		$emergency_contact1 = array(
			"name" => $data['emergency_contact1_name'],
			"phone" => $data["emergency_contact1_phone"],	
			"email" => $data["emergency_contact1_email"],
			"relationship_id" => $data["emergency_contact1_relationship"],
		);

		$emergency_contact2 = array(
			"name" => $data['emergency_contact2_name'],
			"phone" => $data["emergency_contact2_phone"],	
			"email" => $data["emergency_contact2_email"],
			"relationship_id" => $data["emergency_contact2_relationship"],
		);

		$student_data['emergency_contact1'] = json_encode($emergency_contact1);
		$student_data['emergency_contact2'] = json_encode($emergency_contact2);

		$student_data['first_language'] = $data['first_language'];
		$student_data['occupation'] = $data['occupation'];
		$student_data['disability'] = $data['disability'];
		$student_data['program_id'] = $data['program'];

		// Check Duplication
		$duplication_status = $this->check_duplication('on_update', $user_data['email'], $user_id);
		if ($duplication_status) {
			// TODO certificate uploads and changes
			$this->db->where('id', $student_id);
			$this->db->update('students', $student_data);

			$this->db->where('id', $user_id);
			$this->db->update('users', $user_data);

			move_uploaded_file($_FILES['student_image']['tmp_name'], 'uploads/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('student_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_student($student_id, $user_id) {
		$this->db->where('id', $student_id);
		$this->db->delete('students');

		$this->db->where('student_id', $student_id);
		$this->db->delete('enrols');

		$this->db->where('id', $user_id);
		$this->db->delete('users');

		$path = 'uploads/users/'.$user_id.'.jpg';
		if(file_exists($path)){
			unlink($path);
		}

		$response = array(
			'status' => true,
			'notification' => get_phrase('student_deleted_successfully')
		);

		return json_encode($response);
	}

	public function student_enrolment($section_id = "") {
		return $this->db->get_where('enrols', array('section_id' => $section_id, 'school_id' => $this->school_id, 'session' => $this->active_session));
	}


	// This function will help to fetch student data by section, class or student id
	public function get_student_details_by_id($type = "", $id = "") {
		$enrol_data = array();
		if ($type == "section") {
			$checker = array(
				'section_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->result_array();
			foreach ($enrol_data as $key => $enrol) {
				$student_details = $this->db->get_where('students', array('id' => $enrol['student_id']))->row_array();
				$enrol_data[$key]['code'] = $student_details['code'];
				$enrol_data[$key]['user_id'] = $student_details['user_id'];
				$enrol_data[$key]['parent_id'] = $student_details['parent_id'];
				$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
				$enrol_data[$key]['name'] = $user_details['name'];
				$enrol_data[$key]['email'] = $user_details['email'];
				$enrol_data[$key]['role'] = $user_details['role'];
				$enrol_data[$key]['address'] = $user_details['address'];
				$enrol_data[$key]['phone'] = $user_details['phone'];
				$enrol_data[$key]['birthday'] = $user_details['birthday'];
				$enrol_data[$key]['gender'] = $user_details['gender'];
				$enrol_data[$key]['blood_group'] = $user_details['blood_group'];

				$class_details = $this->crud_model->get_class_details_by_id($enrol['class_id'])->row_array();
				$section_details = $this->crud_model->get_section_details_by_id('section', $enrol['section_id'])->row_array();

				$enrol_data[$key]['class_name'] = $class_details['name'];
				$enrol_data[$key]['section_name'] = $section_details['name'];
			}
		}
		elseif ($type == "class") {
			$checker = array(
				'class_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->result_array();
			foreach ($enrol_data as $key => $enrol) {
				$student_details = $this->db->get_where('students', array('id' => $enrol['student_id']))->row_array();
				$enrol_data[$key]['code'] = $student_details['code'];
				$enrol_data[$key]['user_id'] = $student_details['user_id'];
				$enrol_data[$key]['parent_id'] = $student_details['parent_id'];
				$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
				$enrol_data[$key]['name'] = $user_details['name'];
				$enrol_data[$key]['email'] = $user_details['email'];
				$enrol_data[$key]['role'] = $user_details['role'];
				$enrol_data[$key]['address'] = $user_details['address'];
				$enrol_data[$key]['phone'] = $user_details['phone'];
				$enrol_data[$key]['birthday'] = $user_details['birthday'];
				$enrol_data[$key]['gender'] = $user_details['gender'];
				$enrol_data[$key]['blood_group'] = $user_details['blood_group'];

				$class_details = $this->crud_model->get_class_details_by_id($enrol['class_id'])->row_array();
				$section_details = $this->crud_model->get_section_details_by_id('section', $enrol['section_id'])->row_array();

				$enrol_data[$key]['class_name'] = $class_details['name'];
				$enrol_data[$key]['section_name'] = $section_details['name'];
			}
		}
		elseif ($type == "student") {
			$checker = array(
				'student_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->row_array();
			$student_details = $this->db->get_where('students', array('id' => $enrol_data['student_id']))->row_array();
			$enrol_data['code'] = $student_details['code'];
			$enrol_data['user_id'] = $student_details['user_id'];
			$enrol_data['parent_id'] = $student_details['parent_id'];
			$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
			$enrol_data['name'] = $user_details['name'];
			$enrol_data['email'] = $user_details['email'];
			$enrol_data['role'] = $user_details['role'];
			$enrol_data['address'] = $user_details['address'];
			$enrol_data['phone'] = $user_details['phone'];
			$enrol_data['birthday'] = $user_details['birthday'];
			$enrol_data['gender'] = $user_details['gender'];
			$enrol_data['blood_group'] = $user_details['blood_group'];

			$class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
			$section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();

			$enrol_data['class_name'] = $class_details['name'];
			$enrol_data['section_name'] = $section_details['name'];
		}
		return $enrol_data;
	}
	//END STUDENT AND ADMISSION section


	//STUDENT OF EACH SESSION
	public function get_session_wise_student() {
		$checker = array(
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		return $this->db->get_where('students');
	}

	// Get User Image Starts
	public function get_user_image($user_id) {
		if (file_exists('uploads/users/'.$user_id.'.jpg'))
		return base_url().'uploads/users/'.$user_id.'.jpg';
		else
		return base_url().'uploads/users/placeholder.jpg';
	}
	// Get User Image Ends

	// Check user duplication
	public function check_duplication($action = "", $email = "", $user_id = "") {
		$duplicate_email_check = $this->db->get_where('users', array('email' => $email));

		if ($action == 'on_create') {
			if ($duplicate_email_check->num_rows() > 0) {
				return false;
			}else {
				return true;
			}
		}elseif ($action == 'on_update') {
			if ($duplicate_email_check->num_rows() > 0) {
				if ($duplicate_email_check->row()->id == $user_id) {
					return true;
				}else {
					return false;
				}
			}else {
				return true;
			}
		}
	}

	//GET LOGGED IN USER DATA
	public function get_profile_data() {
		return $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
	}

	public function update_profile() {
		$response = array();
		$user_id = $this->session->userdata('user_id');
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['address'] = $this->input->post('address');
		// Check Duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $user_id);
		if($duplication_status) {
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);

			move_uploaded_file($_FILES['profile_image']['tmp_name'], 'uploads/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('profile_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_password() {
		$user_id = $this->session->userdata('user_id');
		$data = $this->input->post(NULL, TRUE);
        if (empty($data['current_password']) || empty($data['new_password']) || empty($data['confirm_password'])) {
			$response = array(
				'status' => false,
				'notification' => get_phrase('password_can_not_be_empty')
			);
			return json_encode($response);
		}
		$user_details = $this->get_user_details($user_id);
		if($data['new_password'] !== $data['confirm_password']){
			$response = array(
				'status' => false,
				'notification' => get_phrase('password_mismatch')
			);
			return json_encode($response);
		}

		if (password_verify($data['current_password'], $user_details["password"])) {
			$db_data['password'] = password_hash($data['new_password'], PASSWORD_BCRYPT);
			$this->db->where('id', $user_id);
			$this->db->update('users', $db_data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('password_updated_successfully')
			);
			return json_encode($response);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('wrong_current_password')
			);
			return json_encode($response);
		}
	}

	//GET LOGGED IN USERS CLASS ID AND SECTION ID (FOR STUDENT LOGGED IN VIEW)
	public function get_logged_in_student_details() {
		$user_id = $this->session->userdata('user_id');
		$student_data = $this->db->get_where('students', array('user_id' => $user_id))->row_array();
		$student_details = $this->get_student_details_by_id('student', $student_data['id']);
		return $student_details;
	}

	// GET STUDENT LIST BY PARENT
	public function get_student_list_of_logged_in_parent() {
		$parent_id = $this->session->userdata('user_id');
		$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
		$checker = array(
			'parent_id' => $parent_data['id'],
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		$students = $this->db->get_where('students', $checker)->result_array();
		foreach ($students as $key => $student) {
			$checker = array(
				'student_id' => $student['id'],
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->row_array();

			$user_details = $this->db->get_where('users', array('id' => $student['user_id']))->row_array();
			$students[$key]['student_id'] = $student['id'];
			$students[$key]['name'] = $user_details['name'];
			$students[$key]['email'] = $user_details['email'];
			$students[$key]['role'] = $user_details['role'];
			$students[$key]['address'] = $user_details['address'];
			$students[$key]['phone'] = $user_details['phone'];
			$students[$key]['birthday'] = $user_details['birthday'];
			$students[$key]['gender'] = $user_details['gender'];
			$students[$key]['blood_group'] = $user_details['blood_group'];
			$students[$key]['class_id'] = $enrol_data['class_id'];
			$students[$key]['section_id'] = $enrol_data['section_id'];

			$class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
			$section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();

			$students[$key]['class_name'] = $class_details['name'];
			$students[$key]['section_name'] = $section_details['name'];
		}
		return $students;
	}

	// In Array for associative array
	function is_in_array($associative_array = array(), $look_up_key = "", $look_up_value = "") {
		foreach ($associative_array as $associative) {
			$keys = array_keys($associative);
			for($i = 0; $i < count($keys); $i++){
				if ($keys[$i] == $look_up_key) {
					if ($associative[$look_up_key] == $look_up_value) {
						return true;
					}
				}
			}
		}
		return false;
	}

	function get_all_lecturers($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		$this->db->where("(role='superadmin' OR role='admin' OR role='lecturer)");
		return $this->db->get_where('users');
	}

	function get_all_deans($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		$this->db->where("(role='superadmin' OR role='admin' OR role='exam_officer)");
		return $this->db->get_where('users');
	}

	function get_all_users($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		return $this->db->get_where('users');
	}

	public function get_user_role($user_id){
        $this->db->select("role");
        $this->db->where("id", $user_id);
        $result = $this->db->get("users")->row_array();
		return $result["role"] ?? null;
    }

	//START lecturer section
	public function create_dean($data_input)
	{
		$password = substr( md5(time()), 0, 12);
		
		$data['school_id'] = $data_input['school_id'];
		$data['name'] = $data_input['name'];
		$data['email'] = $data_input['email'];
		$data['password'] = password( $password );
		$data['phone'] = $data_input['phone'];
		$data['gender'] = $data_input['gender'];
		$data['address'] = $data_input['address'];
		$data['role'] = 'exam officer';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data_input['email']);
		if($duplication_status){
			$this->db->trans_start();

			$this->db->insert('users', $data);

			$lecturer_id = $this->db->insert_id();
			$lecturer_table_data['user_id'] = $lecturer_id;
			$lecturer_table_data['about'] = $data_input['about'];
			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			$lecturer_table_data['social_links'] = json_encode($social_links);
			$lecturer_table_data['department_id'] = $data_input['department_id'];
			$lecturer_table_data['school_id'] = $data_input['school_id'];
			$lecturer_table_data['show_on_website'] = $data_input['show_on_website'];
			
			$lecturer_table_data["lecturer_id"] = $this->db->insert_id();
			$this->db->insert('deans', $lecturer_table_data);

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'.$lecturer_id.'.jpg');
			}

			// Commit/Execute Queries
			$this->db->trans_complete();

			// Send user account info to email.
			try {
				$this->email_model->account_opening_email("Exam Officer Account", $data['email'], $password);
			} catch ( Exception $exp ){
				log_message('error', 'Failed to send dean account creation email. Check smpt settings');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('exam_officer_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}
	// Start of Dean Methods
	public function update_dean($param1, $data_input)
	{
		$data['school_id'] = $data_input['school_id'];
		$data['name'] = $data_input['name'];
		$data['email'] = $data_input['email'];
		$data['phone'] = $data_input['phone'];
		$data['gender'] = $data_input['gender'];
		$data['address'] = $data_input['address'];

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->trans_start();
			$this->db->where('id', $param1);
			$this->db->where('school_id', $data['school_id']);
			$this->db->update('users', $data);

			$lecturer_table_data['user_id'] = $param1;
			$lecturer_table_data['about'] = $data_input['about'];
			$social_links = array(
				'facebook' => $data_input['facebook_link'],
				'twitter' => $data_input['twitter_link'],
				'linkedin' => $data_input['linkedin_link']
			);
			$lecturer_table_data['social_links'] = json_encode($social_links);
			$lecturer_table_data['department_id'] = $data_input['department_id'];
			$lecturer_table_data['school_id'] = $data_input['school_id'];
			$lecturer_table_data['show_on_website'] = $data_input['show_on_website'];

			$this->db->where('school_id', $data_input['school_id']);
			$this->db->where('user_id', $param1);
			//$this->db->update('lecturers', $dean_table_data);

			$this->db->update('deans', $lecturer_table_data);
			$this->db->trans_complete();

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'. $param1 .'.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('exam_officer_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_dean($param1, $param2)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('deans');

		$this->db->where('user_id', $param1);
		$this->db->delete('lecturers');

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_officer_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_deans() {
		$checker = array(
			'school_id' => 1,
			'role' => 'exam officer'
		);
		return $this->db->get_where('users', $checker);
	}
	public function get_deans_count() {
		$checker = array(
			'school_id' => 1,
			'role' => 'exam officer'
		);
		return $this->db->get_where('users', $checker)->num_rows();
	}

	public function get_dean_by_id($dean_id = "") {
		$checker = array(
			'school_id' => 1,
			'id' => $dean_id
		);
		$result = $this->db->get_where('deans', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END Dean section
	//START lecturer section
	public function create_head_of_department($data_input)
	{
		$password = substr( md5(time()), 0, 12);
		
		$data['school_id'] = $data_input['school_id'];
		$data['name'] = $data_input['name'];
		$data['email'] = $data_input['email'];
		$data['password'] = password( $password );
		$data['phone'] = $data_input['phone'];
		$data['gender'] = $data_input['gender'];
		$data['address'] = $data_input['address'];
		$data['role'] = 'head of department';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data_input['email']);
		if($duplication_status){
			$this->db->trans_start();

			$this->db->insert('users', $data);

			$lecturer_id = $this->db->insert_id();
			$lecturer_table_data['user_id'] = $lecturer_id;
			$lecturer_table_data['about'] = $data_input['about'];
			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			$lecturer_table_data['social_links'] = json_encode($social_links);
			$lecturer_table_data['department_id'] = $data_input['department_id'];
			$lecturer_table_data['school_id'] = $data_input['school_id'];
			$lecturer_table_data['show_on_website'] = $data_input['show_on_website'];
			
			$lecturer_table_data["lecturer_id"] = $this->db->insert_id();
			$this->db->insert('head_of_departments', $lecturer_table_data);

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'.$lecturer_id.'.jpg');
			}

			// Commit/Execute Queries
			$this->db->trans_complete();

			// Send user account info to email.
			try {
				$this->email_model->account_opening_email("Head of Department Account", $data['email'], $password);
			} catch ( Exception $exp ){
				log_message('error', 'Failed to send dean account creation email. Check smpt settings');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('head_of_department_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}
	// Start of Dean Methods
	public function update_head_of_department($param1, $data_input)
	{
		$data['school_id'] = $data_input['school_id'];
		$data['name'] = $data_input['name'];
		$data['email'] = $data_input['email'];
		$data['phone'] = $data_input['phone'];
		$data['gender'] = $data_input['gender'];
		$data['address'] = $data_input['address'];

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->trans_start();
			$this->db->where('id', $param1);
			$this->db->where('school_id', $data['school_id']);
			$this->db->update('users', $data);

			$lecturer_table_data['user_id'] = $param1;
			$lecturer_table_data['about'] = $data_input['about'];
			$social_links = array(
				'facebook' => $data_input['facebook_link'],
				'twitter' => $data_input['twitter_link'],
				'linkedin' => $data_input['linkedin_link']
			);
			$lecturer_table_data['social_links'] = json_encode($social_links);
			$lecturer_table_data['department_id'] = $data_input['department_id'];
			$lecturer_table_data['school_id'] = $data_input['school_id'];
			$lecturer_table_data['show_on_website'] = $data_input['show_on_website'];

			$this->db->where('school_id', $data_input['school_id']);
			$this->db->where('user_id', $param1);
			//$this->db->update('lecturers', $dean_table_data);

			$this->db->update('head_of_departments', $lecturer_table_data);
			$this->db->trans_complete();

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'. $param1 .'.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('head_of_department_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_head_of_department($param1, $param2)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('head_of_departments');

		$this->db->where('user_id', $param1);
		$this->db->delete('lecturers');

		$response = array(
			'status' => true,
			'notification' => get_phrase('head_of_departments_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_head_of_departments() {
		$checker = array(
			'school_id' => 1,
			'role' => 'head of department'
		);
		return $this->db->get_where('users', $checker);
	}
	public function get_head_of_departments_count() {
		$checker = array(
			'school_id' => 1,
			'role' => 'head of department'
		);
		return $this->db->get_where('users', $checker)->num_rows();
	}

	public function get_head_of_department_by_id($hod_id = "") {
		$checker = array(
			'school_id' => 1,
			'id' => $hod_id
		);
		$result = $this->db->get_where('head_of_departments', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END HOD section
	

}
